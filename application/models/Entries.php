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

	public function get_entries($limit = 20)
	{
		$query = $this->db->get('entries', $limit);
		return $query->result();
	}

	public function insert_entry($price, $category, $description = '', $positive = false)
	{
		$this->price = $price;
		$this->category = $category;
		$this->description = $description;
		$this->positive = $positive;
		$this->creation_date = date('Y-m-d H:i:s');

		$this->db->insert('entries', $this);
	}

	public function delete_entry($id)
	{
		$this->db->delete('entries', array('id' => $id));
	}
}
