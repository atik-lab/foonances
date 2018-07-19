<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entries extends CI_Model
{
	public $id;
	public $positive;
	public $price;
	public $currency;
	public $category;
	public $description;
	public $creation_date;

	public function __construct()
	{
		$this->load->database();
	}

	public function get_last($limit = 20)
	{
		$this->db->from('entries');
		$this->db->limit($limit);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function insert_entry($price, $currency, $category, $description = '', $positive = false)
	{
		$this->price = $price;
		$this->currency = $currency;
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
