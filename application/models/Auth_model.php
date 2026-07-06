<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Cek login: cari user berdasarkan email
	public function login($email, $password)
	{
		$user = $this->db->get_where('auth', ['email' => $email])->row_array();

		if ($user) {
			// Verifikasi password (pakai password_verify if hash, else fallback plaintext)
			if (password_verify($password, $user['password'])) {
				return $user;
			}
		}

		return false;
	}

	// Register user baru
	public function register($data)
	{
		// Cek email sudah terdaftar belum
		$cek = $this->db->get_where('auth', ['email' => $data['email']])->num_rows();
		if ($cek > 0) {
			return false; // email sudah dipakai
		}

		// Hash password
		$simpan = [
			'nama'      => $data['nama'],
			'email'     => $data['email'],
			'password'  => password_hash($data['password'], PASSWORD_DEFAULT),
			'role'      => 'user',
			'membership'=> 'free'
		];

		$this->db->insert('auth', $simpan);
		return $this->db->insert_id();
	}

	// Ambil data user berdasarkan ID
	public function get_user($id)
	{
		return $this->db->get_where('auth', ['id' => $id])->row_array();
	}
}
