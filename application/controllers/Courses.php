<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	// Mapping slug module ke short code bahasa (progress disimpan dgn short code)
	private $slug_lang_map = [
		'javascript' => 'js',
		'php'        => 'php',
		'python'     => 'py',
		'java'       => 'java',
		'cpp'        => 'cpp',
		'c'          => 'c',
		'csharp'     => 'cs',
		'go'         => 'go',
		'ruby'       => 'ruby',
		'rust'       => 'rust',
		'typescript' => 'ts',
		'sqlite'     => 'sql',
	];

	private function lang_code($slug)
	{
		return $this->slug_lang_map[$slug] ?? $slug;
	}

	public function my_courses()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			return;
		}

		$user_id = $this->session->userdata('user_id');
		$modules = $this->Module_model->get_all();
		$progress_rows = $this->db->get_where('progress', ['user_id' => $user_id])->result_array();

		// Map progress by language (short code)
		$progress_map = [];
		foreach ($progress_rows as $p) {
			$progress_map[$p['language']] = json_decode($p['completed_topics'], true) ?? [];
		}

		// Count topics per module from content
		$topic_counts = [];
		foreach ($modules as $m) {
			$lang = $this->lang_code($m['slug']);
			preg_match_all('/data-topic="' . $lang . '-(\d+)"/', $m['content'], $matches);
			$topic_counts[$m['slug']] = count(array_unique($matches[1] ?? []));
			if ($topic_counts[$m['slug']] == 0) $topic_counts[$m['slug']] = 12; // fallback
		}

		$data['modules'] = $modules;
		$data['progress'] = $progress_map;
		$data['topic_counts'] = $topic_counts;
		$data['nama'] = $this->session->userdata('nama') ?? 'User';
		$data['membership'] = $this->session->userdata('membership') ?? 'free';
		$this->load->view('courses/my_courses', $data);
	}

	public function completed()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			return;
		}

		$user_id = $this->session->userdata('user_id');
		$modules = $this->Module_model->get_all();
		$progress_rows = $this->db->get_where('progress', ['user_id' => $user_id])->result_array();

		$progress_map = [];
		foreach ($progress_rows as $p) {
			$progress_map[$p['language']] = json_decode($p['completed_topics'], true) ?? [];
		}

		$topic_counts = [];
		$completed_count = 0;
		foreach ($modules as $m) {
			$lang = $this->lang_code($m['slug']);
			preg_match_all('/data-topic="' . $lang . '-(\d+)"/', $m['content'], $matches);
			$total = count(array_unique($matches[1] ?? []));
			if ($total == 0) $total = 12;
			$topic_counts[$m['slug']] = $total;

			// Cari progress pakai short code
			$topics = $progress_map[$lang] ?? [];
			if (count($topics) >= $total) {
				$completed_count++;
			}
		}

		// Hitung jumlah sertifikat yang sudah didownload
		$cert_count = $this->db->where('user_id', $user_id)->count_all_results('user_certificates');

		$data['modules'] = $modules;
		$data['progress'] = $progress_map;
		$data['topic_counts'] = $topic_counts;
		$data['completed_count'] = $completed_count;
		$data['cert_count'] = $cert_count;
		$data['nama'] = $this->session->userdata('nama') ?? 'User';
		$data['membership'] = $this->session->userdata('membership') ?? 'free';
		$this->load->view('courses/completed_courses', $data);
	}
}
