<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entries extends CI_Model
{
	public $id;
	public $positive;
	public $price;
	public $category;
	public $description;
	public $creation_date;

	public function __construct()
	{
		$this->load->database();
	}

	public function insert_entry($positive = false, $price, $category, $description = '')
	{
		/*
		$this->positive    = $_POST['title']; // please read the below note
		$this->price  = $_POST['content'];
		$this->category     = time();
		$this->time     = time();

		$this->db->insert('entries', $this);
		*/
	}

	public function get_entries($limit = 20)
	{
		$query = $this->db->get('entries', $limit);
		return $query->result();
	}
}
