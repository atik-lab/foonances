<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends CI_Model
{
	private $_table = 'quote';
	public $id;
	public $author;
	public $quote;

	public function __construct()
	{
		$this->load->database();
	}

	public function get_random()
	{
		$count = $this->db->count_all($this->_table);
		$randomEntry = rand(0, $count - 1);
		$query = $this->db->get($this->_table, 1, $randomEntry);
		return $query->row();
	}
}
