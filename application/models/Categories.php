<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Model
{
	public $id;
	public $name;

	public function __construct()
	{
		$this->load->database();
	}

	public function get_all()
	{
		$query = $this->db->get('categories');
		return $query->result();
	}
}
