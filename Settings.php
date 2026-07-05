<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			return;
		}

		$data['user'] = $this->Auth_model->get_user($this->session->userdata('user_id'));
		$this->load->view('settings', $data);
	}

	// Update nama & email
	public function update_account()
	{
		if (!$this->session->userdata('user_id')) {
			echo json_encode(['success' => false, 'message' => 'Silakan login terlebih dahulu.']);
			return;
		}

		$user_id = $this->session->userdata('user_id');
		$nama  = trim($this->input->post('nama'));
		$email = trim($this->input->post('email'));

		if (empty($nama)) {
			echo json_encode(['success' => false, 'message' => 'Nama tidak boleh kosong.']);
			return;
		}

		if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo json_encode(['success' => false, 'message' => 'Email tidak valid.']);
			return;
		}

		// Cek apakah email sudah dipakai user lain
		$existing = $this->db->where('email', $email)->where('id !=', $user_id)->get('auth')->row_array();
		if ($existing) {
			echo json_encode(['success' => false, 'message' => 'Email sudah digunakan oleh akun lain.']);
			return;
		}

		$this->db->where('id', $user_id)->update('auth', [
			'nama'  => $nama,
			'email' => $email
		]);

		// Update session
		$this->session->set_userdata('nama', $nama);
		$this->session->set_userdata('email', $email);

		echo json_encode(['success' => true, 'message' => 'Informasi akun berhasil diperbarui!']);
	}

	// Ganti password
	public function change_password()
	{
		if (!$this->session->userdata('user_id')) {
			echo json_encode(['success' => false, 'message' => 'Silakan login terlebih dahulu.']);
			return;
		}

		$user_id = $this->session->userdata('user_id');
		$current_password = $this->input->post('current_password');
		$new_password     = $this->input->post('new_password');

		if (empty($current_password) || empty($new_password)) {
			echo json_encode(['success' => false, 'message' => 'Semua field harus diisi.']);
			return;
		}

		if (strlen($new_password) < 8) {
			echo json_encode(['success' => false, 'message' => 'Password baru minimal 8 karakter.']);
			return;
		}

		$user = $this->Auth_model->get_user($user_id);
		if (!$user || !password_verify($current_password, $user['password'])) {
			echo json_encode(['success' => false, 'message' => 'Password saat ini salah.']);
			return;
		}

		$this->db->where('id', $user_id)->update('auth', [
			'password' => password_hash($new_password, PASSWORD_DEFAULT)
		]);

		echo json_encode(['success' => true, 'message' => 'Password berhasil diubah!']);
	}

	// Hapus akun
	public function delete_account()
	{
		if (!$this->session->userdata('user_id')) {
			echo json_encode(['success' => false, 'message' => 'Silakan login terlebih dahulu.']);
			return;
		}

		$user_id = $this->session->userdata('user_id');
		$password = $this->input->post('password');

		if (empty($password)) {
			echo json_encode(['success' => false, 'message' => 'Masukkan password untuk konfirmasi.']);
			return;
		}

		$user = $this->Auth_model->get_user($user_id);
		if (!$user || !password_verify($password, $user['password'])) {
			echo json_encode(['success' => false, 'message' => 'Password salah. Tidak dapat menghapus akun.']);
			return;
		}

		// Hapus semua data terkait
		$this->db->where('user_id', $user_id)->delete('progress');
		$this->db->where('user_id', $user_id)->delete('transactions');
		$this->db->where('id', $user_id)->delete('auth');

		// Destroy session
		$this->session->sess_destroy();

		echo json_encode(['success' => true, 'message' => 'Akun berhasil dihapus.']);
	}
}
