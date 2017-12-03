<?php

class M_activity extends CI_Model
{

function __construct(){
parent::__construct(); 
}
function m_view_activity($id_activity){
    return $query = $this->db->query("SELECT id_activity, nama_activity, status_activity, from_id_task, id_user, nama_user
                                        FROM  tabel_user a, tabel_activity b
                                        WHERE a.id_user = b.from_id_user
                                            AND b.id_activity = $id_activity ")->result();
}

function m_user_task($value0){               // ambil daftar anggota yg di tugaskan untuk task ini

        return  $query = $this->db->query("SELECT id_user,nama_user  
                                             FROM t_user_task a, tabel_user b
                                             WHERE a.from_id_user = b.id_user 
                                                 AND from_id_task = '$value0'")->result();
    }

    function m_other_member_t($value0,$value1){               // ambil daftar anggota project yg tidah di tugaskan pada task 'ini'

          return  $query = $this->db->query("SELECT id_user,nama_user  
                                             FROM tabel_user 
                                             WHERE id_user IN (SELECT from_id_user 
                                                                    FROM t_user_task 
                                                                    WHERE from_id_task = '$value1')

                                                AND id_user NOT IN (SELECT from_id_user 
                                                                    FROM tabel_activity 
                                                                    WHERE id_activity = '$value0')")->result();
    }

function m_insert_activity($values){               // add new project
            $data = array(
                    'nama_activity' => $this->input->post('nama_activity'),
                    'member' => $this->input->post('member'),
                    'id_task' => $this->input->post('id_task')
                );

            //$this->db->set($values);
            $this->db->query("INSERT INTO tabel_activity(nama_activity,from_id_user,from_id_task) 
                                    VALUES('".$data['nama_activity']."','".$data['member']."','".$data['id_task']."')");

             $id_task = $this->db->insert_id();
             $list_activity = $this->input->post('activity_list');


            if(isset($list_activity)){
                $n = count($list_activity);
                $i =0; 
                for($i;$i<$n;$i++){
                    $this->db->query("INSERT INTO t_user_task(from_id_user,from_id_task) 
                                            VALUES('".$list_activity[$i]."',' $id_task') ");
                }
            }
    }

function m_update_activity($values){      // Update data project 

        $id = $this->input->post('id_activity');

         $data = array(
                    'nama_activity' => $this->input->post('nama_activity'),
                    'member' => $this->input->post('member'),
                );
        //if(isset($drop)) { $data['member'] = $drop; }
            //$this->db->set($values);
            $this->db->query("UPDATE tabel_activity 
                                SET nama_activity='".$data['nama_activity']."',
                                    from_id_user='".$data['member']."'
                                WHERE id_activity='$id' ");

             
             /*
             $members = $this->input->post('members');
            if(isset($members)){
                $n = count($members);
                $i =0; 
                for($i;$i<$n;$i++){
                    $this->db->query("INSERT INTO t_user_task(from_id_user,from_id_task) 
                                            VALUES('".$members[$i]."','$id') ");
                }
             }
             */
             
    }

    function m_delete_activity($id){                              // 

            $this->db->query("DELETE FROM tabel_activity WHERE id_activity='$id' ");
    }







    function m_delete_list($id){                                // delete_list

            $this->db->query("DELETE FROM t_list_activity WHERE id_list='$id' ");
    }


  function m_list_status($id,$status){

      $date = date('Y-m-d');

        $this->db->where('id_list', $id);
        $this->db->set('status_list',$status);
        $this->db->set('date_activity',$date);
        $this->db->update('t_list_activity');
  }

  function m_insert_list($values){ 
         $status = null;
         $date = null;

        $nama_list    = $this->input->post('nama_list');
        $id_activity  = $this->input->post('id_activity');

        $status = $this->input->post('status_list');
          $date = date('Y-m-d');
        if($status == null) {
          $status = 'on progresh';
        }


            $this->db->query("INSERT INTO t_list_activity(list_activity,status_list,from_id_Activity,date_activity) 
                                    VALUES('$nama_list','$status','$id_activity','$date') ");

           
    }
    function m_update_list($values){ 

        $id_list      = $this->input->post('id_list');
        $nama_list    = $this->input->post('nama_list');
        //$id_activity  = $this->input->post('id_activity');

        $status = $this->input->post('status_list');
          $date = date('Y-m-d');
        if($status == null) {
          $status = 'on progresh';
        }


            $this->db->query("UPDATE t_list_activity 
                                SET list_activity='$nama_list', status_list='$status', date_activity='$date' 
                                WHERE id_list =' $id_list' ");

           
    }

}



?>