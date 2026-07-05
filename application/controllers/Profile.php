<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			return;
		}

		$user_id = $this->session->userdata('user_id');
		$user = $this->Auth_model->get_user($user_id);
		$modules = $this->Module_model->get_all();
		$progress_rows = $this->db->get_where('progress', ['user_id' => $user_id])->result_array();

		$progress_map = [];
		$total_done = 0;
		$total_all = 0;
		$completed_modules = 0;
		$completed_list = [];

		foreach ($progress_rows as $p) {
			$progress_map[$p['language']] = json_decode($p['completed_topics'], true) ?? [];
		}

		foreach ($modules as $m) {
			$slug = $m['slug'];
			$topics = $progress_map[$slug] ?? [];
			$done = count($topics);

			preg_match_all('/data-topic="' . $slug . '-(\d+)"/', $m['content'], $matches);
			$total = count(array_unique($matches[1] ?? []));
			if ($total == 0) $total = 12;

			$total_done += $done;
			$total_all += $total;

			if ($done >= $total) {
				$completed_modules++;
				$completed_list[] = $m;
			}
		}

		$learning_hours = round(($total_done * 0.5) * 2) / 2;

		// Streak
		$streak = 0;
		if (!empty($progress_rows)) {
			$dates = [];
			foreach ($progress_rows as $p) {
				$d = $p['updated_at'] ?: $p['created_at'];
				if ($d) $dates[] = date('Y-m-d', strtotime($d));
			}
			$dates = array_unique($dates);
			rsort($dates);
			$check = date('Y-m-d');
			foreach ($dates as $d) {
				if ($d == $check) { $streak++; $check = date('Y-m-d', strtotime("$check -1 day")); }
			}
		}

		// Hitung jumlah sertifikat yang sudah didownload
		$cert_count = $this->db->where('user_id', $user_id)->count_all_results('user_certificates');

		$data['user'] = $user;
		$data['completed_modules'] = $completed_modules;
		$data['learning_hours'] = $learning_hours;
		$data['streak'] = $streak;
		$data['completed_list'] = $completed_list;
		$data['cert_count'] = $cert_count;

		$this->load->view('profile', $data);
	}
}
