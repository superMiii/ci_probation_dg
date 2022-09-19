<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Supplier');
	}
	public function index()
	{
		$data = [
			'title' => 'Suppliers | Dialogue Group',
			'suppliers' => $this->M_Supplier->getAllSupplier(),
		];
		$this->load->view('_layouts/header', $data);
		$this->load->view('_layouts/sidebar', $data);
		$this->load->view('pages/suppliers/index', $data);
		$this->load->view('_layouts/footer', $data);
	}
	// public function supplierHeader()
	// {
	// 	$data = [
	// 		'title' => 'Supplier Header | Dialogue Group',
	// 		'supplierHeader' => $this->M_Supplier->getSupplierHeader()
	// 	];
	// 	// var_dump($data); die;
	// }
	public function form()
	{
		$this->form_validation->set_rules('l_supplier_id', 'Supplier ID', 'required');
		$this->form_validation->set_rules('e_supplier_name', 'Supplier Name', 'required');
		if($this->form_validation->run() === FALSE)
		{
			$data = [
				'title' => 'Suppliers | Dialogue Group',
			];
			$this->load->view('_layouts/header', $data);
			$this->load->view('_layouts/sidebar', $data);
			$this->load->view('pages/suppliers/add');
			$this->load->view('_layouts/footer', $data);
		} else {
			$data = [
				'l_supplier_id' => htmlspecialchars($this->input->post('l_supplier_id', true)),
				'e_supplier_name' => htmlspecialchars($this->input->post('e_supplier_name', true)),
				'status' => 1,
			];

			$this->M_Supplier->insertData($data);
			$this->session->set_flashdata('alert', 'Data berhasil disimpan');
			redirect('suppliers');
		}
	}
	public function form_edit($id)
	{
		$this->form_validation->set_rules('l_supplier_id', 'Supplier ID', 'required');
		$this->form_validation->set_rules('e_supplier_name', 'Supplier Name', 'required');
		if($this->form_validation->run() === FALSE)
		{
			$data = [
				'title' => 'Edit Suppliers | Dialogue Group',
				'supplier' => $this->M_Supplier->getById($id),
			];
			$this->load->view('_layouts/header', $data);
			$this->load->view('_layouts/sidebar', $data);
			$this->load->view('pages/suppliers/edit', $data);
			$this->load->view('_layouts/footer', $data);
		} else {
			$data = [
				'l_supplier_id' => htmlspecialchars($this->input->post('l_supplier_id', true)),
				'e_supplier_name' => htmlspecialchars($this->input->post('e_supplier_name', true)),
			];
			$this->M_Supplier->updateData($data, $id);
			$this->session->set_flashdata('alert', 'Data berhasil diubah');
			redirect('suppliers');
		}
	}
	public function setStatus($id)
	{
		$res = $this->M_Supplier->getStatus($id);
		$this->M_Supplier->updateStatus($res->status, $id);
		$this->session->set_flashdata('alert', 'Status berhasil diperbarui');
		redirect('suppliers');
	}
}
