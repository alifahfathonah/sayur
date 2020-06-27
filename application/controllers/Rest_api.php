<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Rest_api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_pengguna');
        $this->load->model('M_pasar');
        $this->load->model('M_sayur');

        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));

    } 

	function login() 
	{
        $email = $this->input->post("email");
        $password = md5($this->input->post("password"));

        $login = $this->db->get_where('pengguna', array('email' => $email, 'password' => $password));

        if ($login->num_rows() > 0)
        {
            $response['pesan'] = 'Login Sukses';
            $response['sukses'] = true;
            $response['data_login'] = $login->result()[0];
        } 
        else 
        {
            $response['pesan'] = 'Login Gagal';
            $response['sukses'] = false;
        }

        echo json_encode($response);
	}


    function register() {
        // $id_pengguna = $_POST['id_pengguna'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $status = $_POST['status'];

        // $sql_u = "SELECT * FROM pengguna WHERE username='$username'";
        // $sql_e = "SELECT * FROM pengguna WHERE email='$email'";

        $res_u = $this->db->get_where('pengguna', array('username' => $username));
        $res_e = $this->db->get_where('pengguna', array('email' => $email));
        $res_n = $this->db->get_where('pengguna', array('no_hp' => $no_hp));

        $response = array();

        if ($res_u->num_rows() == 1) {
            $response['pesan'] = 'Username Sudah Terdaftar';
            $response['data'] = 0;
        } elseif ($res_e->num_rows() == 1) {
            $response['pesan'] = 'Email Sudah Terdaftar';
            $response['data'] = 0;
        } else if ($res_n->num_rows() == 1){
            $response['pesan'] = 'No HP Sudah Terdaftar';
            $response['data'] = 0;
        } else {
            $data = array('username'=>$username, 'password'=>$password, 'nama'=>$nama, 'no_hp'=>$no_hp, 'email'=>$email, 'alamat'=>$alamat, 'status'=>$status);

            // $login = $this->db->get_where('pengguna', array('username'=>$username, 'password'=>$password, 'nama'=>$nama, 'no_hp'=>$no_hp, 'email'=>$email, 'alamat'=>$alamat));

            $res = $this->db->insert('pengguna', $data);

            $response['pesan'] = 'Register Berhasil';
            $response['data'] = 1;
        }

        echo json_encode($response);
    }

    function get_sayur1()
    {

        $sql = "SELECT sayur.id_sayur, sayur.id_pasar, sayur.id_pengguna, pasar.nama_pasar, pengguna.nama, pengguna.username, sayur.nama_sayur, sayur.gambar, sayur.stok, sayur.keterangan, sayur.harga from sayur join pengguna on sayur.id_pengguna=pengguna.id_pengguna join pasar on sayur.id_pasar=pasar.id_pasar where sayur.id_pasar=1;";

            $data = $this->db->query($sql);

            if ($data->num_rows() > 0) 
            {
                $response['pesan'] = 'Data Ada';
                $response['data'] = 1;
                $response['datanya']= $data->result();
            }
            else
            {
                $response['pesan'] = 'Data Belum Ada';
                $response['data'] = 0;
            }
        

        echo json_encode($response);
    }

    function get_sayur2()
    {

        $sql = "SELECT sayur.id_sayur, sayur.id_pasar, sayur.id_pengguna, pasar.nama_pasar, pengguna.nama, pengguna.username, sayur.nama_sayur, sayur.gambar, sayur.stok, sayur.keterangan, sayur.harga from sayur join pengguna on sayur.id_pengguna=pengguna.id_pengguna join pasar on sayur.id_pasar=pasar.id_pasar where sayur.id_pasar=2;";

            $data = $this->db->query($sql);

            if ($data->num_rows() > 0) 
            {
                $response['pesan'] = 'Data Ada';
                $response['data'] = 1;
                $response['datanya']= $data->result();
            }
            else
            {
                $response['pesan'] = 'Data Belum Ada';
                $response['data'] = 0;
            }
        

        echo json_encode($response);
    }

    function get_sayur3()
    {

        $sql = "SELECT sayur.id_sayur, sayur.id_pasar, sayur.id_pengguna, pasar.nama_pasar, pengguna.nama, pengguna.username, sayur.nama_sayur, sayur.gambar, sayur.stok, sayur.keterangan, sayur.harga from sayur join pengguna on sayur.id_pengguna=pengguna.id_pengguna join pasar on sayur.id_pasar=pasar.id_pasar where sayur.id_pasar=3;";

            $data = $this->db->query($sql);

            if ($data->num_rows() > 0) 
            {
                $response['pesan'] = 'Data Ada';
                $response['data'] = 1;
                $response['datanya']= $data->result();
            }
            else
            {
                $response['pesan'] = 'Data Belum Ada';
                $response['data'] = 0;
            }
        

        echo json_encode($response);
    }
    
    function get_sayur4()
    {

        $sql = "SELECT sayur.id_sayur, sayur.id_pasar, sayur.id_pengguna, pasar.nama_pasar, pengguna.nama, pengguna.username, sayur.nama_sayur, sayur.gambar, sayur.stok, sayur.keterangan, sayur.harga from sayur join pengguna on sayur.id_pengguna=pengguna.id_pengguna join pasar on sayur.id_pasar=pasar.id_pasar where sayur.id_pasar=4;";

        $data = $this->db->query($sql);

        if ($data->num_rows() > 0) 
        {
            $response['pesan'] = 'Data Ada';
            $response['data'] = 1;
            $response['datanya']= $data->result();
            }
        else
        {
            $response['pesan'] = 'Data Belum Ada';
            $response['data'] = 0;
        }
        
        echo json_encode($response);
    }

    function get_sayur5()
    {

        $sql = "SELECT sayur.id_sayur, sayur.id_pasar, sayur.id_pengguna, pasar.nama_pasar, pengguna.nama, pengguna.username, sayur.nama_sayur, sayur.gambar, sayur.stok, sayur.keterangan, sayur.harga from sayur join pengguna on sayur.id_pengguna=pengguna.id_pengguna join pasar on sayur.id_pasar=pasar.id_pasar where sayur.id_pasar=5;";

            $data = $this->db->query($sql);

            if ($data->num_rows() > 0) 
            {
                $response['pesan'] = 'Data Ada';
                $response['data'] = 1;
                $response['datanya']= $data->result();
            }
            else
            {
                $response['pesan'] = 'Data Belum Ada';
                $response['data'] = 0;
            }
        

        echo json_encode($response);
    }

    function insert_sayur() {

        // $id_sayur = $_POST['id_sayur'];
        $id_pengguna = $_POST['id_pengguna'];
        $id_pasar = $_POST['id_pasar'];
        $nama_sayur = $_POST['nama_sayur'];
        $stok = $_POST['stok'];
        $keterangan = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $gambar = $_POST['gambar'];

        $filename = "img".rand(9,9999).".jpg";
        $upload_path = "upload/sayur/".$filename;
        
        $data = array('id_pengguna'=>$id_pengguna, 'id_pasar'=>$id_pasar, 'nama_sayur'=>$nama_sayur, 'stok'=>$stok, 'keterangan'=>$keterangan, 'harga'=>$harga, 'gambar'=>$filename);

        $res = $this->db->insert('sayur', $data);

        // $sayur = $this->M_sayur;
        // $validation = $this->form_validation;
        // $validation->set_rules($sayur->rules());

        $response = array();

        if ($res == true) 
        {
            // $sayur->save();
            file_put_contents($upload_path,base64_decode($gambar));
            $response['pesan'] = 'Insert Sayur Berhasil';
            $response['data'] = 1;
        } 
        else 
        {
            $response['pesan'] = 'Insert Sayur Belum Berhasil';
            $response['data'] = 0;
        }
        
        echo json_encode($response);
    }

    function edit_sayur() {

        $id_sayur = $_POST['id_sayur'];
        $id_pengguna = $_POST['id_pengguna'];
        $id_pasar = $_POST['id_pasar'];
        $nama_sayur = $_POST['nama_sayur'];
        $stok = $_POST['stok'];
        $keterangan = $_POST['keterangan'];
        $harga = $_POST['harga'];

        $this->db->where('id_sayur', $id_sayur);

        $update = array();
        $update ['id_sayur'] = $id_sayur;
        $update ['id_pengguna'] = $id_pengguna;
        $update ['id_pasar'] = $id_pasar;
        $update ['nama_sayur'] = $nama_sayur;
        $update ['stok'] = $stok;
        $update ['keterangan'] = $keterangan;
        $update ['harga'] = $harga;

        $res = $this->db->update('sayur', $update);

        $response = array();
        if($res == true){
            $response['pesan'] = 'Edit data sayur berhasil';
            $response['data'] = 1;

        }else {
            $response['pesan'] = 'Edit data sayur belum berhasil';
            $response['data'] = 0;
        }

        echo json_encode($response);
    }

    function edit_gambar() {
        $id_sayur = $_POST['id_sayur'];
        $gambar = $_POST['gambar'];

        $filename = "img".rand(9,9999).".jpg";
        $upload_path = "upload/sayur/".$filename;

        $this->db->where('id_sayur', $id_sayur);

        $update = array();
        $update ['id_sayur'] = $id_sayur;
        $update ['gambar'] = $filename;

        $res = $this->db->update('sayur', $update);

        $response = array();
        if($res == true){
            file_put_contents($upload_path,base64_decode($gambar));
            $response['pesan'] = 'Edit gambar berhasil';
            $response['data'] = 1;

        }else {
            $response['pesan'] = 'Edit gambar belum berhasil';
            $response['data'] = 0;
        }

        echo json_encode($response);
    }

    function hapus_sayur() {
        //$id_sayur = $_POST['id_sayur'];
        $id_sayur = $this->input->post('id_sayur');
        $this->db->where('id_sayur', $id_sayur);

        //$where = array('id_sayur'=>$id_sayur);
        // $rows = $result->result();
        // foreach ($rows as $row) {
        //      @unlink('upload/sayur/'.$row->gambar);
        // }
        
        $res =  $this->db->delete('sayur');

        //check proses delete
        $response = array();
        if ($res == true){
            // $gambar = $database->selectQuery($res);
            // print_r($gambar);
            // @unlink('upload/sayur/'.$gambar[0]['image']);

            $response['pesan'] = 'Berhasil Menghapus Sayur';
            $response['data'] = 1;

        }else {
            $response['pesan'] = 'Belum Berhasil Menghapus Sayur';
            $response['data'] = 0;
        }

        echo json_encode($response);
    }

    function transaksi() {
        // $id_sayur = $_POST['id_sayur'];
        $id_pengguna = $_POST['id_pengguna'];
        $id_sayur = $_POST['id_sayur'];
        $id_pasar = $_POST['id_pasar'];
        $username_penjual = $_POST['username_penjual'];
        $nama_penjual = $_POST['nama_penjual'];
        $jumlah_beli = $_POST['jumlah_beli'];

        $this->db->select('harga, stok');
        $this->db->from('sayur');
        $this->db->where('id_sayur', $id_sayur);

        $query = $this->db->get();

        $hsl = $query->result();
        foreach ($hsl as $key ) {
           $harga = $key->harga;
           $stok = $key->stok - $jumlah_beli;
        }

        $total = $harga * $jumlah_beli;
        
        $data = array('id_pengguna'=>$id_pengguna, 'id_sayur'=>$id_sayur, 'id_pasar'=>$id_pasar, 'username_penjual'=>$username_penjual, 'nama_penjual'=>$nama_penjual, 'jumlah_beli'=>$jumlah_beli, 'total'=>$total);

        $res = $this->db->insert('transaksi', $data);

        $data_stok = array('stok' => $stok);

        $this->db->where('id_sayur', $id_sayur);
        $this->db->update('sayur', $data_stok); 

        $response = array();
        if ($res == true){
            $response['pesan'] = 'Berhasil Membeli Sayur';
            $response['data'] = 1;

        }else {
            $response['pesan'] = 'Belum Berhasil Membeli Sayur';
            $response['data'] = 0;
        }

        echo json_encode($response);
    }

    function get_transaksi()
    {
        $status = $_POST['status'];

        if($status == "pembeli"){
            $pengguna = $_POST['pengguna'];

            $sql = "SELECT transaksi.id_pengguna, transaksi.username_penjual, pengguna.nama, transaksi.nama_penjual, transaksi.id_sayur, transaksi.id_pasar,sayur.nama_sayur, pasar.nama_pasar, sayur.harga, sayur.keterangan, transaksi.jumlah_beli, transaksi.total from transaksi join pengguna on transaksi.id_pengguna=pengguna.id_pengguna join pasar on transaksi.id_pasar=pasar.id_pasar join sayur on transaksi.id_sayur=sayur.id_sayur where transaksi.id_pengguna='$pengguna' order by transaksi.id_transaksi ASC";

            $data = $this->db->query($sql);
        } 
        else if ($status == "penjual"){
            $username = $_POST['username'];

            $sql = "SELECT transaksi.id_pengguna, transaksi.username_penjual, pengguna.nama, transaksi.nama_penjual, transaksi.id_sayur, transaksi.id_pasar, sayur.nama_sayur, pasar.nama_pasar, sayur.harga, sayur.keterangan, transaksi.jumlah_beli,  transaksi.total from transaksi join pengguna on transaksi.id_pengguna=pengguna.id_pengguna join pasar on transaksi.id_pasar=pasar.id_pasar join sayur on transaksi.id_sayur=sayur.id_sayur where transaksi.username_penjual='$username' order by transaksi.id_transaksi ASC";

            $data = $this->db->query($sql);
        }
        

        if ($data->num_rows() > 0) 
        {
            $response['pesan'] = 'Data Ada';
            $response['data'] = 1;
            $response['datanya']= $data->result();
        }
        else
        {
            $response['pesan'] = 'Data Belum Ada';
            $response['data'] = 0;
        }
        

        echo json_encode($response);
    }

    // function harga() {

    //     $id_sayur = 1;

    //     $this->db->select('harga');
    //     $this->db->from('sayur');
    //     $this->db->where('id_sayur', $id_sayur);

    //     $query = $this->db->get();

    //     $harga = $query->result();
    //     foreach ($harga as $key ) {
    //         echo $key->harga;
    //     }
    //     // echo $query;
    // }

    // function pembeli() {

    //     $id_pembeli = 13;

    //     $this->db->select('nama');
    //     $this->db->from('pengguna');
    //     $this->db->where('id_pengguna', $id_pembeli);

    //     $query = $this->db->get();

    //     $nama = $query->result();
    //     foreach ($nama as $key ) {
    //         echo $key->nama;
    //     }
    //     // echo $query;
    // }

    
    function profile($id_pengguna)
    {
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
       
       $this->db->where('id_pengguna', $id_pengguna);

       $update = array();
       $update ['username'] = $username;
       $update ['nama'] = $nama;
       $update ['no_hp'] = $no_hp;
       $update ['alamat'] = $alamat;

       $status = $this->db->update('pengguna', $update);
    
       $response = array();
        if ($status == true)
        {
            $response['pesan'] = 'Update Sukses. Silahkan Login Kembali';
            $response['sukses'] = 1;
            $response['data_profile'] = $update;
        } 
        else 
        {
            $response['pesan'] = 'Update Gagal';
            $response['sukses'] = 0;
        }
        echo json_encode($response);

    }


    function ubah_password($id_pengguna) {
        $password = md5($_POST['password']);

        $this->db->where('id_pengguna', $id_pengguna);

        $update = array();
       $update ['password'] = $password;

       $status = $this->db->update('pengguna', $update);

         $response = array();
        if ($status == true)
        {
            $response['pesan'] = 'Ubah Password Sukses. Silahkan Login Kembali';
            $response['sukses'] = 1;
            $response['data_password'] = $update;
        } 
        else 
        {
            $response['pesan'] = 'Ubah Password Gagal';
            $response['sukses'] = 0;
        }
        echo json_encode($response);
    }

    function logout() {
        $id_sesi = $_POST['id_sesi'];
        $sesi = 9;

        $where = array('id_sesi' => $id_sesi);

        $update = array();
        $update ['sesi_status'] = $sesi;

        $query = $this->db->update('sesi', $update, $where);

        $response = array();
        if ($query == true)
        {
            $response['pesan'] = 'Logout berhasil';
            $response['sukses'] = 1;
            $response['data_password'] = $update;
        } 
        else 
        {
            $response['pesan'] = 'Logout Gagal';
            $response['sukses'] = 0;
        }
        echo json_encode($response);
    }

}