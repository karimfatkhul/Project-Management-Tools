<?php
  
class c_activity extends CI_Controller
{

function __construct(){
parent::__construct();
$this->load->model('project/m_activity');
$this->load->helper('url');
$this->load->database();
$this->load->library('session');
}

// FUNGSI BUAT CRUD ACTIVITY ............!!!!! HERE 


  function add_activity(){
    $data['id_task'] = $this->input->POST('id');

    $data['aksi'] = 'add new';
    $data['member'] = $this->m_activity->m_user_task($data['id_task']);

    //echo json_encode($data); 
    $this->load->view('project/v_form_activity', $data);
  }
  
  function view_activity(){
    $data['id_task'] = $this->input->POST('id_t');
    $data['id_actifity'] = $this->input->POST('id');
    $data['aksi'] = $this->input->POST('aksi');

    $data['data_actifity'] = $this->m_activity->m_view_activity($data['id_actifity']);
      
    if($data['aksi'] == 'edit'){
      $data['member'] = $this->m_activity->m_other_member_t($data['id_actifity'],$data['id_task']);
      $this->load->view('project/v_form_activity', $data);
    }
  }
  function insert_activity(){
      $result = $this->m_activity->m_insert_activity($_POST);

      //echo $result;
  }
  function update_activity(){
      $result = $this->m_activity->m_update_activity($_POST);
  }

  function delete_activity(){
        $id = $this->input->post('id');

    $this->m_activity->m_delete_activity($id);
  }


///section list activity HERE by fly

  function add_list(){
    $data['aksi'] ='add new';
    $data['id_activity'] = $this->input->post('id');
    $this->load->view('project/v_form_list', $data);
  }
  function view_list(){
    $data['id_list'] = $this->input->POST('id');
    $data['aksi'] ='edit';

               $this->db->where('id_list',$data['id_list']);
    $data['data_list'] = $this->db->get('t_list_activity')->result();
      
    //if($data['aksi'] == 'edit'){
      $this->load->view('project/v_form_list', $data);
    //}
  }

  function delete_list(){
        $id = $this->input->post('id');

    $this->m_activity->m_delete_list($id);
  }

  function list_status(){
        $id = $this->input->post('id');
        $status = $this->input->post('status');

    $this->m_activity->m_list_status($id,$status);
  }

  function insert_list(){
    $result = $this->m_activity->m_insert_list($_POST);
  }
  function update_list(){
    $result = $this->m_activity->m_update_list($_POST);
  }


/*
  /* Ujicoba misil :v
  function test_load(){
    $this->load->view('welcome_message.php'); 
  }*/

//}

}

?>