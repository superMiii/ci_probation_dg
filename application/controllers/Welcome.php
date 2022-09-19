<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('_layouts/header');
		$this->load->view('_layouts/sidebar');
		$this->load->view('pages/home');
		$this->load->view('_layouts/footer');
	}
}
