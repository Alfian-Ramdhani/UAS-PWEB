<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mentor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			exit;
		}
		if ($this->session->userdata('role') !== 'instructor') {
			redirect('dashboard');
			exit;
		}
		$this->load->model('Module_model');
	}

	private $slug_lang_map = [
		'javascript' => 'js', 'php' => 'php', 'python' => 'py', 'java' => 'java',
		'cpp' => 'cpp', 'c' => 'c', 'csharp' => 'cs', 'go' => 'go',
		'ruby' => 'ruby', 'rust' => 'rust', 'typescript' => 'ts', 'sqlite' => 'sql'
	];

	// ============================================================
	// DASHBOARD
	// ============================================================
	public function dashboard()
	{
		$data['total_modules'] = $this->db->count_all('modules');
		$data['total_premium'] = $this->db->where('membership', 'premium')->count_all_results('auth');
		$data['total_progress'] = $this->db->count_all('progress');
		$data['total_videos'] = $this->db->count_all('module_videos');
		$data['nama'] = $this->session->userdata('nama');
		$data['title'] = 'Mentor Dashboard';
		$this->load->view('mentor/dashboard', $data);
	}

	// ============================================================
	// MODULE CRUD
	// ============================================================
	public function modules()
	{
		$data['title'] = 'Kelola Modul';
		$data['modules'] = $this->Module_model->get_all();
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mentor/modules', $data);
	}

	public function edit_module($slug = '')
	{
		$module = $this->Module_model->get_by_slug($slug);
		if (!$module) show_404();

		// Get videos
		$data['videos'] = $this->db->where('module_slug', $slug)->order_by('sort_order', 'ASC')->get('module_videos')->result_array();
		$data['module'] = $module;
		$data['cert'] = $this->db->where('module_slug', $slug)->get('certificates')->row_array() ?: [];
		$data['nama'] = $this->session->userdata('nama');
		$data['title'] = 'Edit Modul: ' . $module['name'];
		$this->load->view('mentor/edit_module', $data);
	}

	public function update_module($slug = '')
	{
		$module = $this->Module_model->get_by_slug($slug);
		if (!$module) show_404();

		$name = trim($this->input->post('name'));
		$category = trim($this->input->post('category'));
		$difficulty = $this->input->post('difficulty');
		$language = trim($this->input->post('language'));
		$icon_color = trim($this->input->post('icon_color'));
		$content = $this->input->post('content');

		if (empty($name) || empty($content)) {
			$this->session->set_flashdata('error', 'Nama modul dan konten harus diisi.');
			redirect('mentor/edit_module/' . $slug);
			return;
		}

		$update = [
			'name'       => $name,
			'category'   => $category,
			'difficulty' => $difficulty,
			'language'   => $language,
			'icon_color' => $icon_color,
			'content'    => $content,
		];

		$this->db->where('slug', $slug)->update('modules', $update);

		// Update sertifikat
		$cert_title = trim($this->input->post('cert_title'));
		$cert_body = trim($this->input->post('cert_body'));
		$cert_color = trim($this->input->post('cert_color'));

		if (!empty($cert_title) && !empty($cert_body)) {
			$existing_cert = $this->db->where('module_slug', $slug)->get('certificates')->row_array();
			$cert_data = [
				'module_slug' => $slug,
				'title_text'  => $cert_title,
				'body_text'   => $cert_body,
				'color_theme' => $cert_color ?: '#0E6853',
			];
			if ($existing_cert) {
				$this->db->where('module_slug', $slug)->update('certificates', $cert_data);
			} else {
				$this->db->insert('certificates', $cert_data);
			}
		}

		$this->session->set_flashdata('success', 'Modul "' . $name . '" berhasil diperbarui!');
		redirect('mentor/edit_module/' . $slug);
	}

	// ============================================================
	// VIDEO CRUD (AJAX)
	// ============================================================
	public function add_video($slug = '')
	{
		$module = $this->Module_model->get_by_slug($slug);
		if (!$module) show_404();

		$title = trim($this->input->post('title'));
		$youtube_url = trim($this->input->post('youtube_url'));

		if (empty($title) || empty($youtube_url)) {
			$this->session->set_flashdata('error', 'Judul dan URL video harus diisi.');
			redirect('mentor/edit_module/' . $slug);
			return;
		}

		$max_sort = $this->db->select_max('sort_order')->where('module_slug', $slug)->get('module_videos')->row_array();
		$sort_order = ($max_sort['sort_order'] ?? 0) + 1;

		$this->db->insert('module_videos', [
			'module_slug' => $slug,
			'title'       => $title,
			'youtube_url' => $youtube_url,
			'sort_order'  => $sort_order,
		]);

		$this->session->set_flashdata('success', 'Video "' . $title . '" berhasil ditambahkan!');
		redirect('mentor/edit_module/' . $slug);
	}

	public function delete_video($id = 0)
	{
		$video = $this->db->where('id', $id)->get('module_videos')->row_array();
		if (!$video) show_404();

		$this->db->where('id', $id)->delete('module_videos');
		$this->session->set_flashdata('success', 'Video berhasil dihapus!');
		redirect('mentor/edit_module/' . $video['module_slug']);
	}

	public function update_video_sort()
	{
		$id = $this->input->post('id');
		$sort_order = $this->input->post('sort_order');
		if ($id && $sort_order !== null) {
			$this->db->where('id', $id)->update('module_videos', ['sort_order' => $sort_order]);
		}
		echo json_encode(['success' => true]);
	}

	// ============================================================
	// PREMIUM MEMBER PROGRESS (read-only)
	// ============================================================
	public function premium_members()
	{
		$data['title'] = 'Data Premium Member';
		$data['members'] = $this->db->where('role', 'user')->where('membership', 'premium')->order_by('created_at', 'DESC')->get('auth')->result_array();
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mentor/premium_members', $data);
	}

	public function premium_member_detail($id = 0)
	{
		$user = $this->db->where('id', $id)->where('role', 'user')->where('membership', 'premium')->get('auth')->row_array();
		if (!$user) show_404();

		$modules = $this->Module_model->get_all();
		$progress_rows = $this->db->where('user_id', $id)->get('progress')->result_array();

		$progress_map = [];
		foreach ($progress_rows as $p) {
			$progress_map[$p['language']] = json_decode($p['completed_topics'], true) ?? [];
		}

		$course_progress = [];
		$completed_count = 0;
		$in_progress_count = 0;
		$total_done_topics = 0;

		foreach ($modules as $m) {
			$lang = $this->slug_lang_map[$m['slug']] ?? $m['slug'];
			$topics = $progress_map[$lang] ?? [];
			$done = count($topics);

			preg_match_all('/data-topic="' . $lang . '-(\d+)"/', $m['content'], $matches);
			$total = count(array_unique($matches[1] ?? []));
			if ($total == 0) $total = 12;

			$total_done_topics += $done;
			$status = $done >= $total ? 'completed' : ($done > 0 ? 'in-progress' : 'not-started');
			$course_progress[] = [
				'module' => $m, 'done' => $done, 'total' => $total,
				'pct' => $total > 0 ? round(($done / $total) * 100) : 0, 'status' => $status
			];
			if ($done >= $total) $completed_count++;
			elseif ($done > 0) $in_progress_count++;
		}

		$data['user'] = $user;
		$data['course_progress'] = $course_progress;
		$data['completed_count'] = $completed_count;
		$data['in_progress_count'] = $in_progress_count;
		$data['learning_hours'] = round(($total_done_topics * 0.5) * 2) / 2;
		$data['nama'] = $this->session->userdata('nama');
		$data['title'] = 'Progres: ' . $user['nama'];
		$this->load->view('mentor/premium_member_detail', $data);
	}

	// ============================================================
	// CHANGE PASSWORD
	// ============================================================
	public function change_password()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['title'] = 'Ganti Password';
		$this->load->view('mentor/change_password', $data);
	}

	public function update_password()
	{
		$current = $this->input->post('current_password');
		$new = $this->input->post('new_password');
		$confirm = $this->input->post('confirm_password');

		$user = $this->db->where('id', $this->session->userdata('user_id'))->get('auth')->row_array();

		if (!password_verify($current, $user['password'])) {
			$this->session->set_flashdata('error', 'Password saat ini salah.');
			redirect('mentor/change_password');
			return;
		}

		if (strlen($new) < 8) {
			$this->session->set_flashdata('error', 'Password baru minimal 8 karakter.');
			redirect('mentor/change_password');
			return;
		}

		if ($new !== $confirm) {
			$this->session->set_flashdata('error', 'Konfirmasi password tidak cocok.');
			redirect('mentor/change_password');
			return;
		}

		$this->db->where('id', $user['id'])->update('auth', [
			'password' => password_hash($new, PASSWORD_DEFAULT)
		]);

		$this->session->set_flashdata('success', 'Password berhasil diubah!');
		redirect('mentor/change_password');
	}

	// ============================================================
	// LIVE CHAT
	// ============================================================
	public function chat($member_id = 0)
	{
		$user_id = $this->session->userdata('user_id');
		$data['members'] = $this->db->query("SELECT DISTINCT a.id, a.nama, a.email, (SELECT message FROM chat_messages WHERE (sender_id = a.id AND receiver_id = $user_id) OR (sender_id = $user_id AND receiver_id = a.id) ORDER BY created_at DESC LIMIT 1) as last_message, (SELECT created_at FROM chat_messages WHERE (sender_id = a.id AND receiver_id = $user_id) OR (sender_id = $user_id AND receiver_id = a.id) ORDER BY created_at DESC LIMIT 1) as last_time, (SELECT COUNT(*) FROM chat_messages WHERE sender_id = a.id AND receiver_id = $user_id AND is_read = 0) as unread FROM auth a WHERE a.role = 'user' AND a.membership = 'premium' ORDER BY last_time DESC")->result_array();

		$existing_ids = array_column($data['members'], 'id');
		if (!empty($existing_ids)) {
			$others = $this->db->where('role', 'user')->where('membership', 'premium')->where_not_in('id', $existing_ids)->get('auth')->result_array();
		} else {
			$others = $this->db->where('role', 'user')->where('membership', 'premium')->get('auth')->result_array();
		}
		foreach ($others as $o) {
			$data['members'][] = ['id' => $o['id'], 'nama' => $o['nama'], 'email' => $o['email'], 'created_at' => $o['created_at'], 'last_message' => null, 'last_time' => null, 'unread' => '0'];
		}
		$data['selected_id'] = $member_id;
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mentor/chat', $data);
	}

	public function chat_api_messages($member_id = 0)
	{
		$user_id = $this->session->userdata('user_id');
		$member = $this->db->where('id', $member_id)->where('role', 'user')->get('auth')->row_array();
		if (!$member) { echo json_encode(['error' => 'Member tidak ditemukan']); return; }
		$messages = $this->db->query("SELECT * FROM chat_messages WHERE (sender_id = $user_id AND receiver_id = $member_id AND deleted_by_sender = 0) OR (sender_id = $member_id AND receiver_id = $user_id AND deleted_by_receiver = 0) ORDER BY created_at ASC")->result_array();
		$this->db->where('sender_id', $member_id)->where('receiver_id', $user_id)->where('is_read', 0)->update('chat_messages', ['is_read' => 1]);
		echo json_encode(['messages' => $messages, 'member' => $member]);
	}

	public function chat_api_send()
	{
		$user_id = $this->session->userdata('user_id');
		$receiver_id = $this->input->post('receiver_id');
		$message = trim($this->input->post('message'));
		if (empty($receiver_id) || empty($message)) { echo json_encode(['error' => 'Data tidak lengkap']); return; }
		$receiver = $this->db->where('id', $receiver_id)->where('role', 'user')->get('auth')->row_array();
		if (!$receiver) { echo json_encode(['error' => 'Penerima tidak ditemukan']); return; }
		$this->db->insert('chat_messages', ['sender_id' => $user_id, 'sender_role' => 'instructor', 'receiver_id' => $receiver_id, 'message' => $message, 'is_read' => 0]);
		echo json_encode(['success' => true, 'id' => $this->db->insert_id()]);
	}

	public function chat_api_delete($msg_id = 0)
	{
		$user_id = $this->session->userdata('user_id');
		$msg = $this->db->where('id', $msg_id)->get('chat_messages')->row_array();
		if (!$msg) { echo json_encode(['error' => 'Pesan tidak ditemukan']); return; }
		if ($msg['sender_id'] == $user_id) {
			$this->db->where('id', $msg_id)->update('chat_messages', ['deleted_by_sender' => 1]);
		} elseif ($msg['receiver_id'] == $user_id) {
			$this->db->where('id', $msg_id)->update('chat_messages', ['deleted_by_receiver' => 1]);
		} else { echo json_encode(['error' => 'Tidak berhak menghapus']); return; }
		echo json_encode(['success' => true]);
	}
}
