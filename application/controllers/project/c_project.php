<?php

class c_project extends CI_Controller
{

function __construct(){
parent::__construct();
$this->load->model('project/m_project');
$this->load->helper('url');
$this->load->database();
$this->load->library('session');

if ($this->session->userdata('akses') == null) {
				   redirect(base_url());
				}
}

// FUNGSI ADMIN BUAT CRUD PROJECT ............!!!!! HERE

	function index(){

		if($this->session->userdata('akses') == 'admin'){
			$data['all_project'] = $this->m_project->m_list_project();
			$this->load->view('project/v_list_project', $data);
		}
		else if($this->session->userdata('akses') == 'user'){
			$id_user = $this->session->userdata('id_user');
			$data['all_user_project'] = $this->m_project->m_list_user_project($id_user);
			$this->load->view('project/v_user_project', $data);
		}


	}

	function add_project(){
		$data['all_candidat'] = $this->m_project->m_all_candidate();

		$data['aksi'] = 'add new';
		$this->load->view('project/v_form_project', $data);
	}

	function insert_project(){
		$cek_members 	= $this->input->post('members');


		if(isset($cek_members)){
			$cek_role 		= $this->input->post('role');
			$n_members 		= count($cek_members);
	        $n_roles 		= count($cek_role);

	         if($n_members == $n_roles){
				$result = $this->m_project->m_insert_project($_POST);
	        	$data['msg'] = 'sukses';
	        }else if($n_members > $n_roles){
	            $data['msg'] = 'pastikan role user telah di tentukan!!';
	        }
	     	else if($n_members < $n_roles){
	            $data['msg'] = 'pilih satu role untuk tiap user!!';
	        }
	     }


		else {
			$result = $this->m_project->m_insert_project($_POST);
			 $data['msg'] = 'sukses';
		}
	        echo json_encode($data);
	}

	function view_project($id = 1){
	      $aksi = $this->uri->segment('1');//$this->input->POST('aksi');
	      $id = $this->uri->segment('3');

	    /*if($aksi == 'edit'){
	      $id = $this->input->POST('id');
	    }
	    else if(isset($aksi) == null){
	      $id = $this->uri->segment('2');//
	    }*/
	      /*    !!! cek user sebagai anggota team & rolenya dalamg project !!! by fly */
	      $id_user = $this->session->userdata('id_user');
	      $data['roles'] = $this->m_project->m_act_role($id,$id_user);
	      if(count($data['roles']) == 1){
	        $data['actor'] = 'team member';
	      }else $data['actor'] = 'not team member';


	      $data['data_project'] = $this->m_project->m_view_project($id);
	      $data['member'] = $this->m_project->m_view_p_members($id);
	      $data['task'] = $this->m_project->m_view_p_task($id);

	     if($aksi == 'edit'){
	      $data['aksi'] = 'edit';
	      $data['candidat'] = $this->m_project->m_candidate($id);

	      $this->load->view('project/v_form_project', $data);
	      }

	      else if(isset($aksi) == 'view'){
	        $this->load->view('project/v_info_project', $data);
	      }
	      //echo json_encode($data);
	    }

	function update_project(){
		$cek_members 	= $this->input->post('members');


		if(isset($cek_members)){
			$cek_role 		= $this->input->post('role');
			$n_members 		= count($cek_members);
	        $n_roles 		= count($cek_role);

	         if($n_members == $n_roles){
				$result = $this->m_project->m_update_project($_POST);
	        	$data['msg'] = 'sukses';
	        }else if($n_members > $n_roles){
	            $data['msg'] = 'pastikan role user telah di tentukan!!';
	        }
	     	else if($n_members < $n_roles){
	            $data['msg'] = 'pilih satu role untuk tiap user!!';
	        }
	     }


		else {
			$result = $this->m_project->m_update_project($_POST);
			 $data['msg'] = 'sukses';
		}
	        echo json_encode($data);

	}

	function delete_project(){
        $id = $this->input->post('id');

		$this->m_project->m_delete_project($id);
	}

}
?>
