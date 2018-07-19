<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currencies extends CI_Model
{
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
		$query = $this->db->get('currencies');
		return $query->result();
	}
}
