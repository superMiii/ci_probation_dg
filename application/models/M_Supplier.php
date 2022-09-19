<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Supplier extends CI_Model {
	public function getAllSupplier()
	{
		$sql = "SELECT * FROM tm_supplier ORDER BY id_supplier ASC";
		return $this->db->query($sql)->result();
	}
	public function getAllActiveSupplier()
	{
		$sql = "SELECT * FROM tm_supplier WHERE status=1 ORDER BY id_supplier ASC";
		return $this->db->query($sql)->result();
	}
	public function getSupplierHeader()
	{
		$sql = "SELECT b.l_supplier_id, b.e_supplier_name, a.tanggal, a.keterangan total
				FROM tr_header a
				INNER JOIN tm_supplier b ON b.id_supplier = a.id_supplier;";
		return $this->db->query($sql)->result();
	}
	public function insertData($data)
	{
		$sql = "INSERT INTO tm_supplier(l_supplier_id, e_supplier_name, status)
				VALUES
					('" . $data['l_supplier_id'] . "', '" . $data['e_supplier_name'] . "'," . $data['status'] .");";
		$this->db->query($sql);
	}
	public function getById($id)
	{
		$sql = "SELECT * FROM tm_supplier WHERE id_supplier=" . $id . ";";
		return $this->db->query($sql)->row();
	}
	public function updateData($data, $id)
	{
		$sql = "UPDATE tm_supplier 
				SET l_supplier_id='" . $data['l_supplier_id'] . "', 
					e_supplier_name='" . $data['e_supplier_name'] . "'
				WHERE id_supplier=" . $id . ";";
		$this->db->query($sql);
	}
	public function getStatus($id)
	{
		$sql = "SELECT status FROM tm_supplier WHERE id_supplier=" . $id . ";";
		return $this->db->query($sql)->row();
	}
	public function updateStatus($status, $id)
	{
		if($status == 1) {
			$sql = "UPDATE tm_supplier SET status=0 WHERE id_supplier=" . $id . ";";
			$this->db->query($sql);
		} else {
			$sql = "UPDATE tm_supplier SET status=1 WHERE id_supplier=" . $id . ";";
			$this->db->query($sql);
		}
	}
}
