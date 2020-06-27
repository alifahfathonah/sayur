<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_pasar extends CI_Model{

	private $_table = "pasar";

	public $id_pasar;
	public $nama_pasar;
	public $gambar = "default.jpg";

	public function rules()
	{
		return[
		    ['field' => 'nama_pasar',
            'label' => 'Nama_pasar',
            'rules' => 'required']
        ];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id_pasar)
	{
		return $this->db->get_where($this->_table, ["id_pasar" => $id_pasar])->row();
	}

	public function save($id_pasar='')
	{
		$post = $this->input->post();
		$this->id_pasar = $id_pasar;
		$this->nama_pasar = $post["nama_pasar"];
		$this->gambar = $this->_uploadGambar();

		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_pasar = $post["id_pasar"];
		$this->nama_pasar = $post["nama_pasar"];

		if (!empty($_FILES["gambar"]["name"])) 
        {
            $this->gambar = $this->_uploadGambar();
        } 
        else
        {
            $this->gambar = $post["old_image"];
        }

        $this->db->update($this->_table, $this, array('id_pasar' => $post['id_pasar']));
	}

	public function delete($id_pasar)
    {
        $this->_deleteGambar($id_pasar);
        return $this->db->delete($this->_table, array("id_pasar" => $id_pasar));
    }

    private function _uploadGambar()
    {
        $config['upload_path']          = './upload/pasar/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['file_name']            = $this->id_pasar;
        $config['overwrite']			= true;
        $config['max_size']             = 20000; // 1MB
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->file_name;
        }
        
        return "default.jpg";
    } 

    private function _deleteGambar($id_pasar)
    {
        $pasar = $this->getById($id_pasar);

        if ($pasar->gambar != "default.jpg") {
            $pasar = explode(".", $pasar->gambar)[0];
            return array_map('unlink', glob(FCPATH."upload/pasar/file_name.*"));
        }
        
    }
}