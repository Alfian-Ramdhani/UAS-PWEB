<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

	public function index()
	{
		$data['modules'] = $this->Module_model->get_all();
		$data['nama'] = $this->session->userdata('nama') ?? 'User';
		$data['membership'] = $this->session->userdata('membership') ?? 'free';
		$this->load->view('library', $data);
	}
}
