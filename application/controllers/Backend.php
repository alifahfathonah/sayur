<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
    	
    	$this->load->model('M_pengguna');
        $this->load->model('M_pasar');
        $this->load->model('M_sayur');
        $this->load->model('M_transaksi');

        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));

    } 

    public function index()
    {
        $data['jumlah_penjual'] = $this->db->query("select count(*) as jumlah from pengguna where status='penjual'");

        $data['jumlah_pembeli'] = $this->db->query("select count(*) as jumlah from pengguna where status='pembeli'");

        $data['jumlah_pasar'] = $this->db->query("select count(*) as jumlah from pasar");

        $data['jumlah_sayur'] = $this->db->query("select count(*) as jumlah from sayur");

        $data['jumlah_transaksi'] = $this->db->query("select count(*) as jumlah from transaksi");

        $data['pasar_1'] = $this->db->query("select count(*) as jumlah from sayur where id_pasar=1");

        $data['pasar_2'] = $this->db->query("select count(*) as jumlah from sayur where id_pasar=2");

        $data['pasar_3'] = $this->db->query("select count(*) as jumlah from sayur where id_pasar=3");

        $data['pasar_4'] = $this->db->query("select count(*) as jumlah from sayur where id_pasar=4");

        $data['pasar_5'] = $this->db->query("select count(*) as jumlah from sayur where id_pasar=5");

        $data['username'] = $this->session->userdata('username');
    	$this->load->view('home', $data);
    }

    public function pembeli() 
    {
        $data['data_pengguna'] = $this->M_pengguna->GetPembeli();
        $this->load->view('pembeli/tabel_pembeli', $data);
    }

    public function tambah_pembeli()
    {
        $this->load->view('pembeli/tambah_pembeli');
    }

    public function proses_tambah_pembeli() 
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $status = "pembeli";

        $data = array('username'=>$username, 'password'=>$password, 'nama'=>$nama, 'no_hp'=>$no_hp, 'email'=>$email, 'alamat'=>$alamat, 'status'=>$status);

        $res = $this->M_pengguna->InsertData('pengguna', $data);

        if($res >= 1)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Tambah Data Berhasil.</i>
                </div>'); 
            redirect(base_url('Backend/pembeli'));
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Tambah Data Tidak Berhasil.</i>
                </div>');  
            redirect(base_url('Backend/pembeli'));
        }
    }

    public function edit_pembeli($id_pengguna) 
    {
        $data['data_pengguna'] = $this->db->query("select * from pengguna where id_pengguna = $id_pengguna");
        $this->load->view('pembeli/edit_pembeli', $data);
    }

    public function proses_edit_pembeli()
    {
        $id_pengguna = $_POST['id_pengguna'];
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
       
        $data = array('id_pengguna'=>$id_pengguna, 'username'=>$username, 'nama'=>$nama, 'no_hp'=>$no_hp, 'email'=>$email, 'alamat'=>$alamat);

        $where = array('id_pengguna' => $id_pengguna);

        $res = $this->M_pengguna->UpdateData('pengguna', $data, $where);

        if($res >= 1)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Edit Data Berhasil.</i>
                </div>'); 
            redirect(base_url('Backend/pembeli'));
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Edit Data Tidak Berhasil.</i>
                </div>');  
            redirect(base_url('Backend/pembeli'));
        }
    }

    public function hapus_pembeli($id_pengguna) {
        $where = array('id_pengguna'=>$id_pengguna);
        $res = $this->M_pengguna->DeleteData('pengguna', $where);

        if ($res >= 1) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Hapus Data Berhasil.</i>
                </div>'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Hapus Data Tidak Berhasil.</i>
                </div>');
        }
    }

    public function penjual() 
    {
        $data['data_pengguna'] = $this->M_pengguna->GetPenjual();
        $this->load->view('penjual/tabel_penjual', $data);
    }

    public function tambah_penjual()
    {
        $this->load->view('penjual/tambah_penjual');
    }

    public function proses_tambah_penjual() 
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $status = "penjual";

        $data = array('username'=>$username, 'password'=>$password, 'nama'=>$nama, 'no_hp'=>$no_hp, 'email'=>$email, 'alamat'=>$alamat, 'status'=>$status);

        $res = $this->M_pengguna->InsertData('pengguna', $data);

        if($res >= 1)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Tambah Data Berhasil.</i>
                </div>'); 
            redirect(base_url('Backend/penjual'));
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Tambah Data Tidak Berhasil.</i>
                </div>');  
            redirect(base_url('Backend/penjual'));
        }
    }

    public function edit_penjual($id_pengguna) 
    {
        $data['data_pengguna'] = $this->db->query("select * from pengguna where id_pengguna = $id_pengguna");
        $this->load->view('penjual/edit_penjual', $data);
    }

    public function proses_edit_penjual()
    {
        $id_pengguna = $_POST['id_pengguna'];
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
       
        $data = array('id_pengguna'=>$id_pengguna, 'username'=>$username, 'nama'=>$nama, 'no_hp'=>$no_hp, 'email'=>$email, 'alamat'=>$alamat);

        $where = array('id_pengguna' => $id_pengguna);

        $res = $this->M_pengguna->UpdateData('pengguna', $data, $where);

        if($res >= 1)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Edit Data Berhasil.</i>
                </div>'); 
            redirect(base_url('Backend/penjual'));
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Edit Data Tidak Berhasil.</i>
                </div>');  
            redirect(base_url('Backend/penjual'));
        }
    }

    public function hapus_penjual($id_pengguna) {
        $where = array('id_pengguna'=>$id_pengguna);
        $res = $this->M_pengguna->DeleteData('pengguna', $where);

        if ($res >= 1) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Hapus Data Berhasil.</i>
                </div>'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Hapus Data Tidak Berhasil.</i>
                </div>');
        }
    }

    public function pasar()
    {
        $data["data_pasar"] = $this->M_pasar->getAll();
        $this->load->view("pasar/tabel_pasar", $data);
    }

    public function tambah_pasar()
    {
        $pasar = $this->M_pasar;
        $validation = $this->form_validation;
        $validation->set_rules($pasar->rules());

        if ($validation->run()) {
            $pasar->save();
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Tambah Data Berhasil.</i>
                </div>');  
            redirect(base_url('Backend/pasar'));
        }

        $this->load->view("pasar/tambah_pasar");
    }

    public function edit_pasar($id_pasar = null) 
    {

        $pasar = $this->M_pasar;
        $validation = $this->form_validation;
        $validation->set_rules($pasar->rules());

        if ($validation->run()) {
            $pasar->update();
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Edit Data Berhasil.</i>
                </div>');  
            redirect(site_url('Backend/pasar'));
        }

        $data["data_pasar"] = $pasar->getById($id_pasar);
        if (!$data["data_pasar"]) show_404();

        $this->load->view("pasar/edit_pasar", $data);
    }

    public function hapus_pasar($id_pasar = null) 
    {
        if (!isset($id_pasar)) show_404();
        
        if ($this->M_pasar->delete($id_pasar)) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Hapus Data Berhasil.</i>
                </div>');
            redirect(site_url('Backend/pasar'));
        }
    }

    public function sayur()
    {
        $data["data_sayur"] = $this->M_sayur->getAll();
        $this->load->view("sayur/tabel_sayur", $data);
    }

    public function tambah_sayur()
    {
        $data['pengguna'] = $this->M_sayur->getPengguna();
        $data['pasar'] = $this->M_sayur->getPasar();

        $sayur = $this->M_sayur;
        $validation = $this->form_validation;
        $validation->set_rules($sayur->rules());

        if ($validation->run()) {
            $sayur->save();
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Tambah Data Berhasil.</i>
                </div>');  
            redirect(base_url('Backend/sayur'));
        }


        $this->load->view('sayur/tambah_sayur',$data);
    }

    // public function proses_tambah_sayur() 
    // {
    //     $id_pengguna = $_POST['id_pengguna'];
    //     $id_pasar = $_POST['id_pasar'];
    //     $nama_sayur = $_POST['nama_sayur'];
    //     $stok = $_POST['stok'];
    //     $keterangan = $_POST['keterangan'];
    //     // $gambar = $_POST['gambar'];

    //     $data = array('id_pengguna' => $id_pengguna, 'id_pasar' => $id_pasar, 'nama_sayur' => $nama_sayur, 'stok' => $stok, 'keterangan' => $keterangan);

    //     $res = $this->M_sayur->InsertData('sayur', $data);

    //     if($res >= 1)
    //     {
    //         file_put_contents($upload_path,base64_decode($gambar));
    //         $this->session->set_flashdata('pesan','<div class="alert alert-danger">
    //                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
    //                 <i class="icon fa fa-bell"> Tambah Data Berhasil.</i>
    //             </div>'); 
    //         redirect(base_url('Backend/sayur'));
    //     }
    //     else
    //     {
    //         $this->session->set_flashdata('pesan','<div class="alert alert-warning">
    //                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
    //                 <i class="icon fa fa-warning"> Tambah Data Tidak Berhasil.</i>
    //             </div>');  
    //         redirect(base_url('Backend/sayur'));
    //     }
    // }

    public function edit_sayur($id_sayur = null) 
    {

        $data['pengguna'] = $this->M_sayur->getPengguna();
        $data['pasar'] = $this->M_sayur->getPasar();

        $sayur = $this->M_sayur;
        $validation = $this->form_validation;
        $validation->set_rules($sayur->rules());

        if ($validation->run()) {
            $sayur->update();
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Edit Data Berhasil.</i>
                </div>');  
            redirect(site_url('Backend/sayur'));
        }

        $data["data_sayur"] = $sayur->getById($id_sayur);
        if (!$data["data_sayur"]) show_404();

        $this->load->view("sayur/edit_sayur", $data);
    }


    public function proses_edit_sayur()
    {
        // $data['pengguna'] = $this->M_sayur->getPengguna();
        // $data['pasar'] = $this->M_sayur->getPasar();

        $id_sayur = $_POST['id_sayur'];
        $id_pengguna = $_POST['id_pengguna'];
        $id_pasar = $_POST['id_pasar'];
        $nama_sayur = $_POST['nama_sayur'];
        $stok = $_POST['stok'];
        $keterangan = $_POST['keterangan'];
        $gambar = $_POST['gambar'];

       
        $data = array('id_pengguna' => $id_pengguna, 'id_pasar' => $id_pasar, 'nama_sayur' => $nama_sayur, 'stok' => $stok, 'keterangan' => $keterangan, 'gambar' => $gambar);

        $where = array('id_sayur' => $id_sayur);

        $res = $this->M_sayur->UpdateData('sayur', $data, $where);

        if($res >= 1)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Edit Data Berhasil.</i>
                </div>'); 
            redirect(base_url('Backend/sayur'));
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Edit Data Tidak Berhasil.</i>
                </div>');  
            redirect(base_url('Backend/sayur'));
        }
    }


    public function hapus_sayur($id_sayur) 
    {
        $where = array('id_sayur'=>$id_sayur);
        $res = $this->M_sayur->DeleteData('sayur', $where);

        if ($res >= 1) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Hapus Data Berhasil.</i>
                </div>'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Hapus Data Tidak Berhasil.</i>
                </div>');
        }
    }

    public function transaksi()
    {
        $data["data_transaksi"] = $this->M_transaksi->getAll();
        $this->load->view("transaksi/tabel_transaksi", $data);
    }

    public function hapus_transaksi($id_transaksi) {
        $where = array('id_transaksi'=>$id_transaksi);
        $res = $this->M_transaksi->DeleteData('transaksi', $where);

        if ($res >= 1) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Hapus Data Berhasil.</i>
                </div>'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Hapus Data Tidak Berhasil.</i>
                </div>');
        }
    }

    public function profile()
    {
        $data['data_profile'] = $this->db->query("select * from admin where id_admin='1'");
        $this->load->view('profile/profile', $data);
    }

    public function edit_profile() 
    {
        $data['data_profile'] = $this->db->query("select * from admin where id_admin = '1'");
        $this->load->view('profile/edit_profile', $data);
    }

    public function proses_edit_profile()
    {
        $id_admin = $_POST['id_admin'];
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
       
        $data = array('id_admin'=>$id_admin, 'username'=>$username, 'nama'=>$nama, 'no_hp'=>$no_hp, 'email'=>$email, 'alamat'=>$alamat);

        $where = array('id_admin' => $id_admin);

        $res = $this->M_pengguna->UpdateData('admin', $data, $where);

        if($res >= 1)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Edit Profile Berhasil.</i>
                </div>'); 
            redirect(base_url('Backend/profile'));
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Edit Profile Tidak Berhasil.</i>
                </div>');  
            redirect(base_url('Backend/profile'));
        }
    }

    public function ubah_password()
    {
        $this->load->view('ubah_password');
    }

    public function proses_ubah_password() 
    {
        $username = $this->session->userdata['username'];
        $password = md5($_POST['password']);

        $data = array('password' => $password);
        $where = array('username' => $username);
        print_r($data);

        $res = $this->M_pengguna->UpdateData('admin',$data,$where);

        if($res >= 1)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-bell"> Ubah Password Berhasil.</i>
                </div>'); 
            header('location:'.base_url().'Backend/ubah_password');
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    <i class="icon fa fa-warning"> Ubah Password Tidak Berhasil.</i>
                </div>');  
            header('location:'.base_url().'Backend/ubah_password');
        }
    }

}