<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_model extends CI_Model {

	public function get_all()
	{
		return $this->db->get('modules')->result_array();
	}

	public function get_by_slug($slug)
	{
		return $this->db->get_where('modules', ['slug' => $slug])->row_array();
	}

	public function get_by_category($category)
	{
		return $this->db->get_where('modules', ['category' => $category])->result_array();
	}

	public function get_by_difficulty($difficulty)
	{
		return $this->db->get_where('modules', ['difficulty' => $difficulty])->result_array();
	}

	public function get_categories()
	{
		$this->db->select('category');
		$this->db->distinct();
		return $this->db->get('modules')->result_array();
	}
}
