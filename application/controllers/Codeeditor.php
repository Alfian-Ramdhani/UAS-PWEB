<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codeeditor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			exit;
		}
	}

	public function index()
	{
		$data['nama'] = $this->session->userdata('nama') ?? 'User';
		$data['membership'] = $this->session->userdata('membership') ?? 'free';
		$this->load->view('codeeditor/index', $data);
	}

	private $lang_map = [
		'js'   => ['lang' => 'JavaScript'],
		'ts'   => ['lang' => 'TypeScript'],
		'py'   => ['lang' => 'Python'],
		'php'  => ['lang' => 'PHP'],
		'java' => ['lang' => 'Java'],
		'cpp'  => ['lang' => 'C++'],
		'c'    => ['lang' => 'C'],
		'cs'   => ['lang' => 'C#'],
		'go'   => ['lang' => 'Go'],
		'rb'   => ['lang' => 'Ruby'],
		'rs'   => ['lang' => 'Rust'],
		'sql'  => ['lang' => 'SQL'],
	];

	private function _find_cmd($names) {
		foreach ((array)$names as $n) {
			$v = exec("$n --version 2>&1", $_, $ec);
			if ($ec === 0) return $n;
		}
		return null;
	}

	public function run()
	{
		$input = json_decode(file_get_contents('php://input'), true);
		$code = $input['code'] ?? '';
		$ext = $input['language'] ?? 'js';

		if (empty(trim($code))) {
			echo json_encode(['output' => '', 'error' => 'Kode kosong.']);
			return;
		}

		$info = $this->lang_map[$ext] ?? null;
		if (!$info) {
			echo json_encode(['output' => '', 'error' => "Ekstensi '$ext' tidak dikenal."]);
			return;
		}

		try {
			$result = $this->_execute($code, $ext);
		} catch (Exception $e) {
			$result = ['output' => '', 'error' => 'Error: ' . $e->getMessage()];
		}

		echo json_encode($result);
	}

	private function _execute($code, $ext) {
		switch ($ext) {
			case 'js':
			case 'ts':
				$node = $this->_find_cmd(['node', 'nodejs']);
				if ($node) {
					if ($ext === 'ts') {
						$code = preg_replace('/:\s*\w+(?:<[^>]*>)?(?:\s*\|\s*\w+(?:<[^>]*>)?)*\s*(?==)/', '', $code);
						$code = preg_replace('/:\s*\w+(?:\s*\|\s*\w+)*\s*\)/', ')', $code);
						$code = preg_replace('/:\s*\w+(?:<[^>]*>)?\s*\)/', ')', $code);
						$code = preg_replace('/as\s+\w+/', '', $code);
					}
					return $this->_run_node($code);
				}
				return $this->_simulate($code, $ext);

			case 'py':
				$py = $this->_find_cmd(['python', 'python3']);
				if ($py) return $this->_run_python($code);
				return $this->_simulate($code, $ext);

			case 'php':
				$php = $this->_find_cmd(['php', 'C:\\xampp\\php\\php.exe', 'D:\\xampp\\php\\php.exe']);
				if ($php) return $this->_run_php($code);
				return $this->_simulate($code, $ext);

			case 'java':
				$javac = $this->_find_cmd(['javac']);
				$java = $this->_find_cmd(['java']);
				if ($javac && $java) return $this->_run_java($code);
				return $this->_simulate($code, $ext);

			case 'cpp':
				return $this->_find_cmd(['g++']) ? $this->_run_compile($code, $ext, 'g++') : $this->_simulate($code, $ext);

			case 'c':
				return $this->_find_cmd(['gcc']) ? $this->_run_compile($code, $ext, 'gcc') : $this->_simulate($code, $ext);

			case 'cs':
				return $this->_simulate($code, $ext);

			case 'go':
				return $this->_find_cmd(['go']) ? $this->_run_interp($code, $ext, 'go run') : $this->_simulate($code, $ext);

			case 'rb':
				return $this->_find_cmd(['ruby']) ? $this->_run_interp($code, $ext, 'ruby') : $this->_simulate($code, $ext);

			case 'rs':
				return $this->_find_cmd(['rustc']) ? $this->_run_compile($code, $ext, 'rustc') : $this->_simulate($code, $ext);

			case 'sql':
				return $this->_find_cmd(['sqlite3']) ? $this->_run_sql($code) : $this->_simulate($code, $ext);

			default:
				return $this->_simulate($code, $ext);
		}
	}

	private function _exec($cmd) {
		$spec = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
		$proc = proc_open($cmd, $spec, $pipes, null, null);
		$out = ''; $err = '';
		if (is_resource($proc)) {
			fclose($pipes[0]);
			$out = stream_get_contents($pipes[1]);
			$err = stream_get_contents($pipes[2]);
			fclose($pipes[1]); fclose($pipes[2]);
			proc_close($proc);
		}
		return ['output' => trim($out), 'error' => trim($err)];
	}

	private function _run_node($code) {
		$f = tempnam(sys_get_temp_dir(), 'js_') . '.mjs';
		file_put_contents($f, $code);
		$r = $this->_exec('node ' . escapeshellarg($f));
		@unlink($f); return $r;
	}

	private function _run_python($code) {
		$py = $this->_find_cmd(['python', 'python3']);
		$f = tempnam(sys_get_temp_dir(), 'py_') . '.py';
		file_put_contents($f, $code);
		$r = $this->_exec($py . ' ' . escapeshellarg($f));
		@unlink($f); return $r;
	}

	private function _run_php($code) {
		$php = $this->_find_cmd(['php', 'C:\\xampp\\php\\php.exe', 'D:\\xampp\\php\\php.exe']);
		$f = tempnam(sys_get_temp_dir(), 'php_') . '.php';
		file_put_contents($f, $code);
		$r = $this->_exec($php . ' ' . escapeshellarg($f));
		@unlink($f); return $r;
	}

	private function _run_java($code) {
		$f = tempnam(sys_get_temp_dir(), 'java_');
		$dir = dirname($f);
		$file = $dir . '/Main.java';
		file_put_contents($file, $code);
		$this->_exec('javac ' . escapeshellarg($file));
		$r = $this->_exec('java -cp ' . escapeshellarg($dir) . ' Main');
		@unlink($dir . '/Main.class');
		@unlink($file);
		return $r;
	}

	private function _run_compile($code, $ext, $compiler) {
		$f = tempnam(sys_get_temp_dir(), $ext . '_') . '.' . $ext;
		$out = tempnam(sys_get_temp_dir(), $ext . '_out');
		file_put_contents($f, $code);
		$this->_exec("$compiler " . escapeshellarg($f) . " -o " . escapeshellarg($out));
		$r = $this->_exec(escapeshellarg($out));
		@unlink($f); @unlink($out);
		return $r;
	}

	private function _run_interp($code, $ext, $cmd) {
		$f = tempnam(sys_get_temp_dir(), $ext . '_') . '.' . $ext;
		file_put_contents($f, $code);
		$r = $this->_exec("$cmd " . escapeshellarg($f));
		@unlink($f); return $r;
	}

	private function _run_sql($code) {
		$sqlite = 'sqlite3';
		$f = tempnam(sys_get_temp_dir(), 'sql_') . '.sql';
		$db = tempnam(sys_get_temp_dir(), 'sql_') . '.db';
		file_put_contents($f, $code);
		$r = $this->_exec("$sqlite " . escapeshellarg($db) . ' < ' . escapeshellarg($f));
		@unlink($f); @unlink($db);
		return $r;
	}

	private function _simulate($code, $ext) {
		// Collect variables
		$vars = [];
		$lines = explode("\n", $code);
		foreach ($lines as $line) {
			$line = trim($line);
			if (preg_match('/^\$(\w+)\s*=\s*"([^"]*)"\s*;/', $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match("/^\$(\w+)\s*=\s*'([^']*)'\s*;/", $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match('/^\$(\w+)\s*=\s*(\d+)\s*;/', $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match('/(?:let|const|var)\s+(\w+)\s*=\s*"([^"]*)"\s*;?/', $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match("/(?:let|const|var)\s+(\w+)\s*=\s*'([^']*)'\s*;?/", $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match('/(?:let|const|var)\s+(\w+)\s*=\s*(\d+)\s*;?/', $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match('/^(\w+)\s*=\s*"([^"]*)"\s*$/', $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match("/^(\w+)\s*=\s*'([^']*)'\s*$/", $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match('/^(\w+)\s*=\s*(\d+)\s*$/', $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match('/(\w+)\s*:?=\s*"([^"]*)"/', $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match("/(\w+)\s*:?=\s*'([^']*)'/", $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match('/(?:\w+(?:\s+|\*+))\s*(\w+)\s*=\s*"([^"]*)"\s*;/', $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match('/(?:\w+(?:\s+|\*+))\s*(\w+)\s*=\s*(\d+)\s*;/', $line, $m)) $vars[$m[1]] = $m[2];
			if (preg_match('/let\s+(?:mut\s+)?(\w+)\s*=\s*"([^"]*)"/', $line, $m)) $vars[$m[1]] = $m[2];
		}

		$resolve = function($name) use ($vars) {
			$name = trim($name);
			if (isset($vars[$name])) return $vars[$name];
			if (isset($vars['$' . $name])) return $vars['$' . $name];
			return $name;
		};

		$output = [];

		foreach ($lines as $line) {
			$line = trim($line);

			// PHP
			if ($ext === 'php' && preg_match('/echo\s+(.+);/', $line, $m)) {
				$t = $m[1];
				if (preg_match('/"([^"]*)"/', $t, $qm)) {
					$str = preg_replace_callback('/\$(\w+)/', fn($m) => $vars[$m[1]] ?? $m[0], $qm[1]);
					$output[] = $str;
				} elseif (preg_match("/'([^']*)'/", $t, $qm)) {
					$output[] = $qm[1];
				} elseif (preg_match('/\$(\w+)/', $t, $vm)) {
					$output[] = $vars[$vm[1]] ?? $vm[0];
				}
				continue;
			}

			// JS/TS
			if (in_array($ext, ['js','ts']) && preg_match('/console\.log\((.+)\)\s*;?\s*$/', $line, $m)) {
				$arg = $m[1];
				if (preg_match('/`([^`]*)`/', $arg, $qm)) {
					$str = preg_replace_callback('/\$\{(\w+)\}/', fn($m) => $vars[$m[1]] ?? $m[0], $qm[1]);
					$output[] = $str;
				} elseif (preg_match('/"([^"]*)"/', $arg, $qm)) {
					$output[] = $qm[1];
				} elseif (preg_match("/'([^']*)'/", $arg, $qm)) {
					$output[] = $qm[1];
				} else {
					$output[] = $resolve($arg);
				}
				continue;
			}

			// Python
			if (in_array($ext, ['py','python']) && preg_match('/print\((.+)\)\s*$/', $line, $m)) {
				$t = $m[1];
				if ((preg_match('/f"([^"]*)"/', $t, $qm) || preg_match("/f'([^']*)'/", $t, $qm)) && preg_match('/\{(\w+)\}/', $qm[1])) {
					$str = preg_replace_callback('/\{(\w+)\}/', fn($m) => $vars[$m[1]] ?? $m[0], $qm[1]);
					$output[] = $str;
				} elseif (preg_match('/"([^"]*)"/', $t, $qm)) {
					$output[] = $qm[1];
				} elseif (preg_match("/'([^']*)'/", $t, $qm)) {
					$output[] = $qm[1];
				} else {
					$output[] = $resolve($t);
				}
				continue;
			}

			// Java
			if ($ext === 'java' && preg_match('/System\.out\.println\((.+)\)\s*;?/', $line, $m)) {
				$parts = explode('+', $m[1]);
				$result = '';
				foreach ($parts as $p) {
					$p = trim($p);
					if (preg_match('/"([^"]*)"/', $p, $qm)) $result .= $qm[1];
					else $result .= $resolve($p);
				}
				$output[] = $result;
				continue;
			}

			// C#
			if (in_array($ext, ['cs','csharp']) && preg_match('/Console\.(?:WriteLine|Write)\((.+)\)\s*;?/', $line, $m)) {
				$t = $m[1];
				if (preg_match('/^\$"([^"]*)"/', $t, $qm)) {
					$str = preg_replace_callback('/\{(\w+)\}/', fn($m) => $vars[$m[1]] ?? $m[0], $qm[1]);
					$output[] = $str;
				} elseif (strpos($t, '+') !== false) {
					$parts = explode('+', $t);
					$result = '';
					foreach ($parts as $p) {
						$p = trim($p);
						if (preg_match('/"([^"]*)"/', $p, $qm)) $result .= $qm[1];
						else $result .= $resolve($p);
					}
					$output[] = $result;
				} elseif (preg_match('/"([^"]*)"/', $t, $qm)) {
					$output[] = $qm[1];
				} else {
					$output[] = $resolve(trim($t));
				}
				continue;
			}

			// Rust
			if (in_array($ext, ['rs','rust']) && preg_match('/println!\("((?:[^"\\\\]|\\\\.)*)"\s*,\s*(.+)\)\s*;?/', $line, $m)) {
				$str = $m[1];
				$args_str = $m[2];
				$args = [];
				$depth = 0; $buf = '';
				for ($i = 0; $i < strlen($args_str); $i++) {
					$c = $args_str[$i];
					if ($c === ',' && $depth === 0) { $args[] = trim($buf); $buf = ''; }
					else { if (in_array($c, ['(','{'])) $depth++; if (in_array($c, [')','}'])) $depth--; $buf .= $c; }
				}
				if (trim($buf)) $args[] = trim($buf);
				$idx = 0;
				$str = preg_replace_callback('/\{[^}]*\}/', function($m) use ($args, &$idx, $resolve) {
					return isset($args[$idx]) ? $resolve($args[$idx++]) : '';
				}, $str);
				$output[] = $str;
				continue;
			}

			// C++
			if ($ext === 'cpp' && preg_match('/cout\s+<<\s+(.+);/', $line, $m)) {
				$parts = explode('<<', $m[1]);
				$result = '';
				foreach ($parts as $p) {
					$p = trim($p);
					if ($p === 'endl' || $p === 'end') $result .= "\n";
					elseif (preg_match('/"([^"]*)"/', $p, $qm)) $result .= $qm[1];
					elseif (preg_match("/'([^']*)'/", $p, $qm)) $result .= $qm[1];
					else $result .= $resolve($p);
				}
				$output[] = $result;
				continue;
			}

			// C
			if ($ext === 'c') {
				if (preg_match('/printf\("([^"]*)"\)\s*;?/', $line, $m)) {
					$output[] = str_replace('\\n', "\n", $m[1]);
				} elseif (preg_match('/printf\("([^"]*)"\s*,\s*(.+)\)\s*;?/', $line, $m)) {
					$str = $m[1];
					$args = array_map('trim', explode(',', $m[2]));
					$idx = 0;
					$str = preg_replace_callback('/%[dsf]/', fn($m) => isset($args[$idx]) ? $resolve($args[$idx++]) : '', $str);
					$output[] = $str;
				}
				continue;
			}

			// Go
			if ($ext === 'go' && preg_match('/fmt\.(?:Println|Print)\((.+)\)\s*$/', $line, $m)) {
				$t = $m[1];
				if (strpos($t, '+') !== false) {
					$parts = explode('+', $t);
					$result = '';
					foreach ($parts as $p) {
						$p = trim($p);
						if (preg_match('/"([^"]*)"/', $p, $qm)) $result .= $qm[1];
						else $result .= $resolve($p);
					}
					$output[] = $result;
				} elseif (strpos($t, ',') !== false) {
					$parts = explode(',', $t);
					$a = [];
					foreach ($parts as $p) {
						$p = trim($p);
						if (preg_match('/"([^"]*)"/', $p, $qm)) $a[] = $qm[1];
						else $a[] = $resolve($p);
					}
					$output[] = implode(' ', $a);
				} elseif (preg_match('/"([^"]*)"/', $t, $qm)) {
					$output[] = $qm[1];
				} else {
					$output[] = $resolve(trim($t));
				}
				continue;
			}

			// Ruby
			if (in_array($ext, ['rb','ruby']) && preg_match('/(?:puts|print)\s+(.+)/', $line, $m)) {
				$t = $m[1];
				if (preg_match('/"([^"]*)"/', $t, $qm)) {
					$str = preg_replace_callback('/#\{(\w+)\}/', fn($m) => $vars[$m[1]] ?? $m[0], $qm[1]);
					$output[] = $str;
				} elseif (preg_match("/'([^']*)'/", $t, $qm)) {
					$output[] = $qm[1];
				} else {
					$output[] = $resolve(trim($t));
				}
				continue;
			}

			// SQL
			if (in_array($ext, ['sql','sqlite3']) && preg_match('/SELECT\s+.+/i', $line)) {
				$output[] = '(hasil query)';
				continue;
			}
		}

		if (empty($output)) {
			$output[] = "Tidak ada output (periksa sintaks atau runtime tidak tersedia).";
		}

		return ['output' => implode("\n", $output), 'error' => ''];
	}
}
