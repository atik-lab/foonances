<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entries extends CI_Model
{
	private $_table = 'entries';
	private $_currencies = null;
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
		$this->db->from($this->_table);
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

		$this->db->insert($this->_table, $this);
	}

	public function delete_entry($id)
	{
		$this->db->delete($this->_table, array('id' => $id));
	}

	public function get_totals_month()
	{
		$this->db->from($this->_table);
		$this->db->select('DATE_FORMAT(creation_date, \'%Y-%m\') AS month');
		$this->db->select('currency');
		$this->db->select_sum('price');
		$this->db->group_by('currency, DATE_FORMAT(creation_date, \'%Y%m\')');
		$query = $this->db->get();
		$result = $query->result();
		$data = array();
		foreach ($result as $row) {
			if (!isset($data[$row->month])) {
				$data[$row->month] = $this->_get_in_euro($row->price, $row->currency);
			} else {
				$data[$row->month] += $this->_get_in_euro($row->price, $row->currency);
			}
		}
		krsort($data);
		return $data;
	}

	public function get_totals_category()
	{
		$this->db->from($this->_table);
		$this->db->select('category');
		$this->db->select('currency');
		$this->db->select_sum('price');
		$this->db->group_by('currency, category');
		$query = $this->db->get();
		$result = $query->result();
		$data = array();
		foreach ($result as $row) {
			if (!isset($data[$row->category])) {
				$data[$row->category] = $this->_get_in_euro($row->price, $row->currency);
			} else {
				$data[$row->category] += $this->_get_in_euro($row->price, $row->currency);
			}
		}
		ksort($data);
		return $data;
	}

	private function _get_in_euro($price, $currency_id)
	{
		if ($this->_currencies == null) {
			$this->load->model('currencies');
			$currencies = $this->currencies->get_all();
			$currencies_r = array();
			foreach ($currencies as $currency) {
				$currencies_r[$currency->id] = array(
					'name' => $currency->name,
					'symbol' => $currency->symbol,
					'price' => $currency->price
				);
			}
			$this->_currencies = $currencies_r;
		}
		return round($price/$this->_currencies[$currency_id]['price'], 2);
	}
}
