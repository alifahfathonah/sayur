<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_sayur extends CI_Model{

	private $_table = "sayur";

    public $id_sayur;
    public $id_pengguna;
    public $id_pasar;
    public $nama_sayur;
    public $stok;
    public $keterangan;
    public $harga;
	public $gambar = "default.jpg";

	public function rules() {
		return [
			['field' => 'id_pengguna',
		    'label' => 'id_pengguna',
		    'rules' => 'required'], 

		    ['field' => 'id_pasar',
		    'label' => 'id_pasar',
		    'rules' => 'required'], 

		    ['field' => 'nama_sayur',
		    'label' => 'nama_sayur',
		    'rules' => 'required'],

		    ['field' => 'stok',
		    'label' => 'stok',
		    'rules' => 'required'],

		    ['field' => 'keterangan',
		    'label' => 'keterangan',
		    'rules' => 'required'],

		    ['field' => 'harga',
		    'label' => 'harga',
		    'rules' => 'required']
		];
	}

	public function getAll() 
	{
		$sql = "SELECT sayur.id_sayur, pengguna.nama, pasar.nama_pasar, sayur.nama_sayur, sayur.stok, sayur.keterangan, sayur.gambar, sayur.harga from sayur join pengguna on sayur.id_pengguna=pengguna.id_pengguna join pasar on sayur.id_pasar=pasar.id_pasar order by sayur.id_sayur ASC;";

		return $this->db->query($sql)->result();
	} 

	public function getById($id_sayur) 
	{
		// $sql = "SELECT sayur.id_sayur, pengguna.nama, pasar.nama_pasar, sayur.nama_sayur, sayur.stok, sayur.keterangan, sayur.gambar, sayur.harga from sayur join pengguna on sayur.id_pengguna=pengguna.id_pengguna join pasar on sayur.id_pasar=pasar.id_pasar where sayur.id_sayur='$id_sayur' ";

		// return $this->db->query($sql)->result();

		return $this->db->get_where($this->_table, ["id_sayur" => $id_sayur])->row();
	} 

	public function save($id_sayur='') {
		$post = $this->input->post();
		$this->id_sayur = $id_sayur;
		$this->id_pasar = $post["id_pasar"];
		$this->id_pengguna = $post["id_pengguna"];
		$this->nama_sayur = $post["nama_sayur"];
		$this->stok = $post["stok"];
		$this->keterangan = $post["keterangan"];
		$this->harga = $post["harga"];

		$this->gambar = $this->_uploadGambar();

		$this->db->insert('sayur', $this);
	}

	public function update()
	{
		$post = $this->input->post();
        $this->id_sayur = $post["id_sayur"];
		$this->id_pasar = $post["id_pasar"];
		$this->id_pengguna = $post["id_pengguna"];
		$this->nama_sayur = $post["nama_sayur"];
		$this->stok = $post["stok"];
		$this->keterangan = $post["keterangan"];
		$this->harga = $post["harga"];

		if (!empty($_FILES["gambar"]["name"])) 
        {
            $this->gambar = $this->_uploadGambar();
        } 
        else
        {
            $this->gambar = $post["old_image"];
        }

        $this->db->update($this->_table, $this, array('id_sayur' => $post['id_sayur']));
	}

	// public function update()
 //    {
 //        $post = $this->input->post();
 //        $this->id_sayur = $post["id_sayur"];
	// 	$this->id_pasar = $post["id_pasar"];
	// 	$this->id_pengguna = $post["id_pengguna"];
	// 	$this->nama_sayur = $post["nama_sayur"];
	// 	$this->stok = $post["stok"];
	// 	$this->keterangan = $post["keterangan"];
	// 	$this->harga = $post["harga"];

 //        if (!empty($_FILES["gambar"]["name"])) 
 //        {
 //            $this->gambar = $this->_uploadGambar();
 //        } 
 //        else
 //        {
 //            $this->gambar = $post["old_image"];
 //        }

 //        $this->db->update('sayur', $this, array('id_sayur' => $post['id_sayur']));
 //    }

	public function _uploadGambar()
    {

        $config['upload_path']          = './upload/sayur/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['file_name']            = $this->id_sayur;
        $config['overwrite']			= true;
        $config['max_size']             = 50000; // 1MB
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->file_name;
        }
        
        return "default.jpg";
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

	function getPengguna() {
		$query = $this->db->query("SELECT * FROM pengguna where status='penjual' ORDER BY nama ASC");
		return $query->result();
	}

	function getPasar() {
		$query = $this->db->query("SELECT * FROM pasar ORDER BY nama_pasar ASC");
		return $query->result();
	}
}