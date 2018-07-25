<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currencies extends CI_Model
{
	private $_table = 'currencies';
	public $id;
	public $name;
	public $symbol;
	public $price;

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
