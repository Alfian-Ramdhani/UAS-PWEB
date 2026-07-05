<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends CI_Controller {

	public function index()
	{
		$data['membership'] = $this->session->userdata('membership') ?? 'free';
		$data['logged_in'] = $this->session->userdata('logged_in') ?? FALSE;
		$this->load->view('pricing', $data);
	}
}
