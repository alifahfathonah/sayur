<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_transaksi extends CI_Model{

	public function getAll() 
	{
		$sql = "SELECT transaksi.id_transaksi, transaksi.id_pengguna, transaksi.id_sayur, transaksi.id_pasar,transaksi.username_penjual, transaksi.nama_penjual, transaksi.jumlah_beli, pengguna.nama, sayur.nama_sayur, pasar.nama_pasar, transaksi.total, sayur.harga, sayur.keterangan from transaksi join pengguna on transaksi.id_pengguna=pengguna.id_pengguna join pasar on transaksi.id_pasar=pasar.id_pasar join sayur on transaksi.id_sayur=sayur.id_sayur;";

		return $this->db->query($sql)->result();
	} 

	public function DeleteData($tableName,$where)
	{
		$res = $this->db->delete($tableName,$where);
		return $res;
	}

}