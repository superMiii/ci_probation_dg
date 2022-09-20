<?php

class M_Pembelian extends CI_Model
{
	public function getTrHeader()
	{
		$sql = "SELECT a.id_document, b.l_supplier_id, b.e_supplier_name, a.tanggal, a.keterangan
				FROM tr_header a
				INNER JOIN tm_supplier b ON b.id_supplier = a.id_supplier
				ORDER BY a.tanggal DESC;";
		return $this->db->query($sql)->result();
	}
	public function getTrHeaderById($id)
	{
		$sql = "SELECT a.id_document, a.id_supplier, b.l_supplier_id, b.e_supplier_name, a.tanggal, a.keterangan
				FROM tr_header a
				INNER JOIN tm_supplier b ON b.id_supplier = a.id_supplier
				WHERE a.id_document = " . $id . ";";
		return $this->db->query($sql)->row();
	}
	public function getDocumentMax()
	{
		$sql = "SELECT MAX(id_document) AS id_document FROM tr_header;";
		return $this->db->query($sql)->row();
	}
	public function getTrDetail($id)
	{
		$sql = "SELECT c.l_supplier_id, d.e_product_name, a.v_unit_price, a.qty, SUM(v_unit_price * qty) AS subtotal FROM tr_detail a 
				INNER JOIN tr_header b ON b.id_document  = a.id_document
				INNER JOIN tm_supplier c ON c.id_supplier = b.id_supplier
				INNER JOIN tm_product d ON d.id_product = a.id_product 
				WHERE a.id_document=" . $id . "
				GROUP BY c.l_supplier_id, d.e_product_name, a.v_unit_price, a.qty;";
		return $this->db->query($sql)->result();
	}
	public function getTrDetailByIdDocument($id)
	{
		$sql = "SELECT a.id_document, a.id_item, a.id_product, c.l_supplier_id, d.e_product_name, a.v_unit_price, a.qty FROM tr_detail a 
				INNER JOIN tr_header b ON b.id_document  = a.id_document
				INNER JOIN tm_supplier c ON c.id_supplier = b.id_supplier
				INNER JOIN tm_product d ON d.id_product = a.id_product 
				WHERE a.id_document=" . $id . ";";
		return $this->db->query($sql)->result();
	}
	public function getSupplierTrHeader($id)
	{
		$sql = "SELECT *
				FROM tr_header a
				INNER JOIN tm_supplier b ON b.id_supplier=a.id_supplier
				WHERE a.id_document=" . $id . ";";
		return $this->db->query($sql)->row();
	}
	public function insertData($data)
	{
		$sql = "INSERT INTO tr_header(id_supplier, tanggal, keterangan)
				VALUES
					(" . $data['id_supplier'] . ", '" .$data['tanggal']. "', '" .$data['keterangan']. "');";
		$this->db->query($sql);
	}
	public function updateData($data, $id)
	{
		$this->db->where('id_document', $id);
		$this->db->update('tr_header', $data);
	}
	public function insertDataItem($data)
	{
		$this->db->insert_batch('tr_detail', $data);
	}
	public function updateDataItem($data, $id)
	{
		$this->db->where('id_document', $id);
		$this->db->update_batch('tr_detail', $data, 'id_item');
	}
}
