<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		check_not_login();
	}

	public function index()
	{
		$data['title'] = 'Halaman Dashboard';
		$this->template->load('template','dashboard', $data);
	}
}
