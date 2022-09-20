<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Supplier');
		$this->load->model('M_Product');
		$this->load->model('M_Pembelian');
	}
	public function index()
	{
		$data = [
			'title' => 'Pembelian | Dialogue Group',
			'tr_header' => $this->M_Pembelian->getTrHeader(),
		];
		$this->load->view('_layouts/header', $data);
		$this->load->view('_layouts/sidebar', $data);
		$this->load->view('pages/pembelian/index', $data);
		$this->load->view('_layouts/footer', $data);
	}
	public function detail($id)
	{
		$data = [
			'title' => 'Detail Pembelian | Dialogue Group',
			'supplier' => $this->M_Pembelian->getSupplierTrHeader($id),
			'tr_detail' => $this->M_Pembelian->getTrDetail($id),
		];
		$this->load->view('_layouts/header', $data);
		$this->load->view('_layouts/sidebar', $data);
		$this->load->view('pages/pembelian/detail', $data);
		$this->load->view('_layouts/footer', $data);
	}
	public function form()
	{
		$this->form_validation->set_rules('id_supplier', 'Supplier', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if($this->form_validation->run() === FALSE)
		{
			$data = [
				'title' => 'Add Tr Header | Dialogue Group',
				'products' => $this->M_Product->getAllActiveProduct(),
				'supplier' => $this->M_Supplier->getAllActiveSupplier(),
			];
			$this->load->view('_layouts/header', $data);
			$this->load->view('_layouts/sidebar', $data);
			$this->load->view('pages/pembelian/add', $data);
			$this->load->view('_layouts/footer', $data);
		} else {
			$dataTrHeader = [
				'id_supplier' => $this->input->post('id_supplier', true),
				'tanggal' => $this->input->post('tanggal', true),
				'keterangan' => $this->input->post('keterangan', true),
			];

			$this->M_Pembelian->insertData($dataTrHeader);
	
			$documentMax = $this->M_Pembelian->getDocumentMax();
			$id_product = $this->input->post('id_product[]', true);
			$v_unit_price = $this->input->post('v_unit_price[]', true);
			$qty = $this->input->post('qty[]', true);
			$data = array();
			$index = 0;
			foreach($id_product as $idp){
				array_push($data, array(
					'id_document'=>((int) $documentMax->id_document),
					'id_product'=>$idp,
					'v_unit_price'=>$v_unit_price[$index],
					'qty'=>$qty[$index],
				));
				$index++;
			}

			$this->M_Pembelian->insertDataItem($data);
			$this->session->set_flashdata('alert', 'Data berhasil ditambah');
			redirect('pembelian');
		}
	}
	public function edit($id) {
		$this->form_validation->set_rules('id_supplier', 'Supplier', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if($this->form_validation->run() === FALSE)
		{
			$data = [
				'title' => 'Add Tr Header | Dialogue Group',
				'tr_header' => $this->M_Pembelian->getTrHeaderById($id),
				'tr_detail' => $this->M_Pembelian->getTrDetailByIdDocument($id),
				'products' => $this->M_Product->getAllActiveProduct(),
				'supplier' => $this->M_Supplier->getAllActiveSupplier(),
			];
			$this->load->view('_layouts/header', $data);
			$this->load->view('_layouts/sidebar', $data);
			$this->load->view('pages/pembelian/edit', $data);
			$this->load->view('_layouts/footer', $data);
		} else {
			$dataTrHeader = [
				'id_supplier' => $this->input->post('id_supplier', true),
				'tanggal' => $this->input->post('tanggal', true),
				'keterangan' => $this->input->post('keterangan', true),
			];
	
			$id_item = $this->input->post('id_item[]', true);
			$id_product = $this->input->post('id_product[]', true);
			$v_unit_price = $this->input->post('v_unit_price[]', true);
			$qty = $this->input->post('qty[]', true);
			$data = array();
			$index = 0;
			foreach($id_product as $idp){
				array_push($data, array(
					'id_item' => ((int) $id_item[$index]),
					'id_document'=>$id,
					'id_product'=>$idp,
					'v_unit_price'=>$v_unit_price[$index],
					'qty'=>$qty[$index],
				));
				$index++;
			}
			$id_product2 = $this->input->post('id_product2[]', true);
			$v_unit_price2 = $this->input->post('v_unit_price2[]', true);
			$qty2 = $this->input->post('qty2[]', true);
			$data2 = array();
			$index2 = 0;
			foreach($id_product2 as $idp2){
				array_push($data2, array(
					'id_document'=>$id,
					'id_product'=>$idp2,
					'v_unit_price'=>$v_unit_price2[$index2],
					'qty'=>$qty2[$index2],
				));
				$index2++;
			}

			$dataIdItem = array();
			foreach($data as $d) {
				array_push($dataIdItem, $d['id_item']);
			}
			$sql = "SELECT id_item FROM tr_detail WHERE id_document=" . $id . " AND id_item NOT IN (" . implode( ", " , $dataIdItem ) . ");";
			$res = $this->db->query($sql)->result();
			$data3 = array();
			foreach($res as $r) {
				array_push($data3, $r->id_item);
			}
			if(!empty($data3)) {
				$sql = "DELETE FROM tr_detail WHERE id_document=" . $id . " AND id_item IN (" . implode( ", " , $data3 ) . ");";
				$this->db->query($sql);
			}

			$this->M_Pembelian->updateData($dataTrHeader, $id);
			$this->M_Pembelian->updateDataItem($data, $id);
			$this->db->insert_batch('tr_detail', $data2);
			$this->session->set_flashdata('alert', 'Data berhasil diubah');
			redirect('pembelian');
		}
	}
}
