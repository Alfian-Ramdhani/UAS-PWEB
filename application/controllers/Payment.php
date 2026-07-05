<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	// Halaman pembayaran
	public function index()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			return;
		}

		// Jika user sudah premium, redirect ke dashboard
		if ($this->session->userdata('membership') === 'premium') {
			redirect('dashboard');
			return;
		}

		$data['user'] = $this->Auth_model->get_user($this->session->userdata('user_id'));
		$this->load->view('payment', $data);
	}

	// Proses pembayaran (simulasi)
	public function process()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			return;
		}

		$user_id = $this->session->userdata('user_id');

		// Jika sudah premium, tidak perlu bayar
		if ($this->session->userdata('membership') === 'premium') {
			redirect('dashboard');
			return;
		}

		$payment_method = $this->input->post('payment_method');

		if (empty($payment_method)) {
			$this->session->set_flashdata('pay_error', 'Silakan pilih metode pembayaran.');
			redirect('payment');
			return;
		}

		// Simulasi: 80% berhasil, 20% gagal
		$success = (rand(1, 100) <= 80);

		// Insert transaksi ke database
		$this->db->insert('transactions', [
			'user_id'       => $user_id,
			'amount'        => 149000,
			'payment_method'=> $payment_method,
			'status'        => $success ? 'completed' : 'failed',
			'created_at'    => date('Y-m-d H:i:s')
		]);

		if ($success) {
			// Update membership user ke premium
			$this->db->where('id', $user_id);
			$this->db->update('auth', ['membership' => 'premium']);

			// Update session
			$this->session->set_userdata('membership', 'premium');

			// Redirect ke dashboard dengan pesan sukses
			$this->session->set_flashdata('pay_success', 'Pembayaran berhasil! Selamat, kamu sekarang adalah member Premium! 🎉');
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('pay_error', 'Pembayaran gagal. Silakan coba lagi.');
			redirect('payment');
		}
	}
}
