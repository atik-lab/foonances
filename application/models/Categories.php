<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Model
{
	private $_table = 'categories';
	public $id;
	public $name;

	public function __construct()
	{
		$this->load->database();
	}

	public function get_all()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}
}
