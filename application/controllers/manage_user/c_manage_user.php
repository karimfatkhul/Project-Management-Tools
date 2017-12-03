<?php

class c_manage_user extends CI_Controller
{

function __construct(){
parent::__construct();
$this->load->model('manage_user/m_manage_user');
$this->load->helper('url');
$this->load->database();
$this->load->library('session');

if ($this->session->userdata('akses') == null) {
				   redirect(base_url());
				}
	else if($this->session->userdata('akses') == 'user'){
					redirect(base_url('index.php/c_navigasi'));
	}

}


/// FUNGSI ADMIN BUAT CRUD USER ............!!!!! HERE

	function index(){
		$data['all_user'] = $this->m_manage_user->list();
		$this->load->view('asset');
		$this->load->view('manage_user/v_list_user2', $data);
	}

	function add_user(){
		//$data['all_user'] = $this->m_manage_user->list();
		$this->load->view('asset');
		$data['aksi'] = 'add new';
		$this->load->view('manage_user/v_form_user', $data);
	}


	function insert_user(){
		 	$result = $this->m_manage_user->m_insert_user($_POST);
	}


	function view_user($id = 1){
		$aksi   = $this->uri->segment(2);//$this->input->POST('aksi');
    	$id   = $this->uri->segment(4);//$this->input->POST('id');

		$data['data_member'] = $this->m_manage_user->m_edit_member($id);

		if($aksi == 'edit'){
			$data['aksi'] = $aksi;
			$this->load->view('asset');
			$this->load->view('manage_user/v_form_user', $data);
		}
		else if($aksi == 'view'){
			$this->load->view('asset');
			$this->load->view('manage_user/v_info_user', $data);
		}
	}


	function update_user(){
		 	$result = $this->m_manage_user->m_update_user($_POST);
	}

	function delete_user(){
        $id = $this->input->post('id');

		$this->m_manage_user->m_delete_user($id);
	}



	function password_user($id = 1){
		$data['id_user'] 	= $this->uri->segment(4);
		$this->load->library('encryption');

		$raw_pass = $this->m_manage_user->setting_password($data['id_user']);	

			if($raw_pass != null){
				$data['password'] = $this->encryption->decrypt($raw_pass);
			}else{
				$data['password'] = 'password is empty!!';
			}
		
		//echo json_encode($data); 
		$this->load->view('manage_user/v_password_user', $data);
	}

	function update_password(){
		$result = $this->m_manage_user->m_update_user_pass($_POST);  
		$new_pass = $this->input->post('id_user');

		echo $result;
	}

}
?>