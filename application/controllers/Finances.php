<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finances extends CI_Controller
{
	/**
	 * Shows the finances main page
	 *
	 * @param string $from
	 */
	public function index($from='')
	{
		// get categories
		$this->load->model('categories');
		$categories = $this->categories->get_all();
		$categories_r = array();
		foreach ($categories as $category) {
			$categories_r[$category->id] = $category->name;
		}
		$data['categories'] = $categories_r;
		// get currencies
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
		$data['currencies'] = $currencies_r;
		// get entries
		$this->load->model('entries');
		$data['entries'] = $this->entries->get_entries();
		// show messages
		$data['insert_entry_successful'] = ($from == 'insert_entry') ? true : false;
		$data['delete_entry_successful'] = ($from == 'delete_entry') ? true : false;
		// load view
		$this->load->view('finances', $data);
	}

	/**
	 * Adds an entry
	 *
	 * @throws Exception
	 */
	public function insert_entry()
	{
		// add entry
		$this->load->model('entries');
		$price = $this->input->post('price');
		$price = str_replace(',', '.', $price);
		if (!$price || $price == 0) {
			throw new Exception('Es necesario poner un precio, por favor vuelve atrás.');
		}
		$currency = $this->input->post('currency');
		$category = $this->input->post('category');
		$description = $this->input->post('description');
		$this->entries->insert_entry($price, $currency, $category, $description);
		// show index page with note
		$this->load->helper('url');
		redirect('/finances/index/insert_entry', 'refresh');
	}

	/**
	 * Deletes an entry with $id
	 *
	 * @param $id
	 */
	public function delete_entry($id)
	{
		// delete entry
		$this->load->model('entries');
		$this->entries->delete_entry($id);
		// show index page with note
		$this->load->helper('url');
		redirect('/finances/index/delete_entry', 'refresh');
	}
}
