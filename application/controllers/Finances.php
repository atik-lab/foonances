<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finances extends CI_Controller
{
	private $entry_inserted = false;
	private $entry_deleted = false;

	public function index()
	{
		// get categories
		$this->load->model('categories');
		$categories = $this->categories->get_all();
		$categories_r = array();
		foreach ($categories as $category) {
			$categories_r[$category->id] = $category->name;
		}
		$data['categories'] = $categories_r;
		// get entries
		$this->load->model('entries');
		$data['entries'] = $this->entries->get_entries();
		// show messages
		$data['insert_entry_successful'] = $this->entry_inserted;
		$data['remove_entry_successful'] = $this->entry_deleted;
		// load view
		$this->load->view('finances', $data);
	}

	public function insert_entry()
	{
		// add entry
		$this->load->model('entries');
		$price = $this->input->post('price');
		$price = str_replace(',', '.', $price);
		$category = $this->input->post('category');
		$description = $this->input->post('description');
		$this->entries->insert_entry($price, $category, $description);
		// show index page with note
		$this->entry_inserted = true;
		$this->index();
	}

	public function delete_entry($id)
	{
		// delete entry
		$this->load->model('entries');
		$this->entries->delete_entry($id);
		// show index page with note
		$this->entry_deleted = true;
		$this->index();
	}
}
