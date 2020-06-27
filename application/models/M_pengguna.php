<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {

	public function GetPembeli() 
	{
		return $this->db->query('select * from pengguna where status="pembeli"');
	}

	public function GetPenjual() 
	{
		return $this->db->query('select * from pengguna where status="penjual"');
	}

	public function InsertData($tableName,$data)
	{
		$res = $this->db->insert($tableName,$data);
		return $res;
	}

	public function UpdateData($tableName,$data,$where)
	{
		$res = $this->db->update($tableName,$data,$where);
		return $res;
	}

	public function DeleteData($tableName,$where)
	{
		$res = $this->db->delete($tableName,$where);
		return $res;
	}
}