<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Product extends CI_Model {
	public function getAllProduct()
	{
		$sql = "SELECT * FROM tm_product ORDER BY id_product ASC";
		return $this->db->query($sql)->result();
	}
	public function getAllActiveProduct()
	{
		$sql = "SELECT * FROM tm_product WHERE status=1 ORDER BY id_product ASC";
		return $this->db->query($sql)->result();
	}
	public function getById($id)
	{
		$sql = "SELECT * FROM tm_product WHERE id_product=" . $id . ";";
		return $this->db->query($sql)->row();
	}
	public function getProductId()
	{
		$sql = "SELECT l_product_id from tm_product ORDER BY l_product_id DESC";
		return $this->db->query($sql)->row();
	}
	public function insertData($data)
	{
		$sql = "INSERT INTO tm_product(l_product_id, e_product_name)
				VALUES
					('" . $data['l_product_id'] . "', '" . $data['e_product_name'] . "');";
		$this->db->query($sql);
	}
	public function getStatus($id)
	{
		$sql = "SELECT status FROM tm_product WHERE id_product=" . $id . ";";
		return $this->db->query($sql)->row();
	}
	public function updateStatus($status, $id)
	{
		if($status == 1) {
			$sql = "UPDATE tm_product SET status=0 WHERE id_product=" . $id . ";";
			$this->db->query($sql);
		} else {
			$sql = "UPDATE tm_product SET status=1 WHERE id_product=" . $id . ";";
			$this->db->query($sql);
		}
	}
	public function updateData($data, $id)
	{
		$sql = "UPDATE tm_product SET l_product_id='" . $data['l_product_id'] . "', e_product_name='" . $data['e_product_name'] . "' WHERE id_product=" . $id . ";"; 
		$this->db->query($sql);
	}
	public function deleteData($id)
	{
		$sql = "DELETE tm_product WHERE id_product=" . $id . ";";
		$this->db->query($sql);
	}
}
