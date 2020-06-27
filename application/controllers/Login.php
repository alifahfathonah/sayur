<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
    } 

    public function index()
    {   

        $this->load->view('login');
    }

    public function login()
    {
    	$username = $this->input->post("username");
        $password = md5($this->input->post("password"));

        $admin = $this->db->get_where('admin', array('username' => $username, 'password' => $password))->row_array();

        if ($admin == true) 
        {
        	$this->session->set_flashdata('login','<script>window.alert("Login sukses");</script>');
            $this->session->set_userdata('data', $admin);  
            $this->session->set_userdata('nama', $admin['id_admin']);
            $this->session->set_userdata('nama', $admin['nama']);
			$this->session->set_userdata('username', $admin['username']);
            $this->session->set_userdata('password', $admin['password']);
            redirect(base_url("Backend/index"));
        }
        else 
		{
            $this->session->set_flashdata('other','<div style="color: red;">Maaf gagal login</div>');
			redirect(base_url("Login/index"));
        }
    }

    public function logout()
	{
        $this->session->sess_destroy();
			redirect('login','refresh');
    }
}