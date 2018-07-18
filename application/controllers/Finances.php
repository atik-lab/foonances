<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finances extends CI_Controller
{
	public function index()
	{
		$this->load->model('categories');
		$data['categories'] = $this->categories->get_all();
		$this->load->view('finances', $data);
	}

	public function add()
	{

	}
}
