<?php
 
class c_task extends CI_Controller
{

function __construct(){
parent::__construct();
$this->load->model('project/m_task');
$this->load->model('project/m_project');
$this->load->helper('url');
$this->load->database();
$this->load->library('session');
}

// FUNGSI ADMIN BUAT CRUD PROJECT ............!!!!! HERE  

	function add_task(){
		$data['id_project'] = $this->input->POST('id');

		$data['aksi'] = 'add new';
		$data['member'] = $this->m_project->m_view_p_members($data['id_project']);

		//echo json_encode($data); 
		$this->load->view('project/v_form_task', $data);
	}
	function insert_task(){
		 	$result = $this->m_task->m_insert_task($_POST);

		 	//echo $result;
	}
	function view_task(){
		$data['id_project'] = $this->input->POST('id_p');
		$data['id_task'] = $this->input->POST('id');
		$data['aksi'] = $this->input->POST('aksi'); 

		/*		!!! cek user sebagai anggota team & rolenya dalamg project !!! */
		$id_user = $this->session->userdata('id_user');
		$data['roles'] = $this->m_task->m_act_role($data['id_task'],$id_user);
		if(count($data['roles']) == 1){
			$data['actor'] = 'on task';
		}else $data['actor'] = 'not';

		$data['data_task'] = $this->m_task->m_view_task($data['id_task']);
		$data['member_on'] = $this->m_task->m_user_task($data['id_task']);
		$data['activityes'] = $this->m_task->m_task_activity($data['id_task']);
		$data['list'] = $this->m_task->m_list_activity();

			
	  if($data['aksi'] == 'edit'){
			$data['member'] = $this->m_task->m_other_member($data['id_task'],$data['id_project']);

			$this->load->view('project/v_form_task', $data);
		}
		else if($data['aksi'] == 'view'){
			$this->load->view('project/v_info_task',$data);
		}

		//echo json_encode($data); 
	}

	function update_task(){
		 	$result = $this->m_task->m_update_task($_POST);

		 	//echo $result;
	}
	
	function delete_task(){
        $id = $this->input->post('id');

		$this->m_task->m_delete_task($id);
	}
	/* Ujicoba misil :v
	function test_load(){
		$this->load->view('welcome_message.php');
	}*/

}

?>