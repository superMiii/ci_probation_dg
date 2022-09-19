<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Product');
	}
	public function index()
	{
		$data = [
			'title' => 'Product | Dialogue Group',
			'products' => $this->M_Product->getAllProduct(),
		];
		$this->load->view('_layouts/header', $data);
		$this->load->view('_layouts/sidebar', $data);
		$this->load->view('pages/products/index', $data);
		$this->load->view('_layouts/footer', $data);
	}
	public function form()
	{
		$this->form_validation->set_rules('l_product_id', 'Product ID', 'required');
		$this->form_validation->set_rules('e_product_name', 'Product Name', 'required');
		if($this->form_validation->run() === FALSE)
		{
			$res = $this->M_Product->getProductId();
			$arrProductId = explode('G', $res->l_product_id);
			$data = [
				'title' => 'Products | Dialogue Group',
				'product_id' => $arrProductId[1] + 1,
			];
			
			$this->load->view('_layouts/header', $data);
			$this->load->view('_layouts/sidebar', $data);
			$this->load->view('pages/products/add', $data);
			$this->load->view('_layouts/footer', $data);
		} else {
			$data = [
				'l_product_id' => htmlspecialchars($this->input->post('l_product_id', true)),
				'e_product_name' => htmlspecialchars($this->input->post('e_product_name', true)),
				'status' => 1,
			];
			
			$this->M_Product->insertData($data);
			$this->session->set_flashdata('alert', 'Data berhasil disimpan');
			redirect('products');
		}
	}
	public function form_edit($id)
	{
		$this->form_validation->set_rules('l_product_id', 'Product ID', 'required');
		$this->form_validation->set_rules('e_product_name', 'Product Name', 'required');
		if($this->form_validation->run() === FALSE)
		{
			$res = $this->M_Product->getById($id);
			$data = [
				'title' => 'Products | Dialogue Group',
				'product' => $res,
			];
			
			$this->load->view('_layouts/header', $data);
			$this->load->view('_layouts/sidebar', $data);
			$this->load->view('pages/products/edit', $data);
			$this->load->view('_layouts/footer', $data);
		} else {
			$data = [
				'l_product_id' => htmlspecialchars($this->input->post('l_product_id', true)),
				'e_product_name' => htmlspecialchars($this->input->post('e_product_name', true)),
			];
			
			$this->M_Product->updateData($data, $id);
			$this->session->set_flashdata('alert', 'Data berhasil disimpan');
			redirect('products');
		}
	}
	public function setStatus($id)
	{
		$res = $this->M_Product->getStatus($id);
		$this->M_Product->updateStatus($res->status, $id);
		$this->session->set_flashdata('alert', 'Status berhasil diperbarui');
		redirect('products');
	}
}
