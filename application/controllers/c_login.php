<?php

class c_login extends CI_Controller
{

function __construct(){
parent::__construct();
//$this->load->model('m_login');
$this->load->helper('url');
$this->load->database();
$this->load->library('session');
$this->load->library('encryption');
}


	function index(){
		$this->load->view('asset');
		$this->load->view('v_login_page');
	}
	function auth(){

		$email		= 	$this->input->post('email');
        $password	=	$this->input->post('password');
        $auth_konfirm = 'yet';
        $mssg		  = 'yet';
        $mssg2		  = 'yet';

		$data_users	= $this->db->get('tabel_user');
		//$this->load->view('v_Login_page');
			foreach($data_users->result() as $usr){
				$decpass = $this->encryption->decrypt($usr->password);
				if($email == $usr->email){
				if($password == $decpass){
						$this->session->set_userdata('id_user',$usr->id_user);
						$this->session->set_userdata('nama_user',$usr->nama_user);
						$this->session->set_userdata('akses',$usr->akses);
						
						$auth_konfirm = 'ok';
				}else $mssg2 = 'password yang anda masukkann salah!!';
				}else $mssg = 'email yg anda masukkan tidak terdaftar!!';
			}

		if($auth_konfirm == 'ok'){	
			echo $auth_konfirm;
		}else if($mssg2 != 'yet'){
			echo $mssg2;
		}else {
			echo $mssg;
		}
	}

	function out(){
		$this->session->unset_userdata('nama_user');
		$this->session->unset_userdata('akses');
		redirect(base_url());
	}

}