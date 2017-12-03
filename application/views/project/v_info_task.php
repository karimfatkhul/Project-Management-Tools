<?php //$this->load->view('plugin'); ?>

<?php
	
		foreach ($data_task as $u2) {
			$id_task 		= $u2->id_task;
			$nama_task 		= $u2->nama_task;
			$status_task 	= $u2->status_task;
			$id_project 	= $u2->from_id_project;
		}
	


echo '
		<table class="table table-responsive table-md">
			<tr>
				<td>';

				foreach ($member_on as $u3) {
							$id_user 		= $u3->id_user;
							$nama_user 		= $u3->nama_user;

							echo $nama_user.'<br/>';
						}

echo '			</td>
			</tr>
			<tr>
				<td>Status task</td><td>'.$status_task.' </td>
			</tr>
<tr>
				<td>
					Activity 
				</td>
				<td>
	  ';
	  			if($actor == 'on task'){
					echo'<button class="btn btn-info btn-sm" onclick="add_activity('.$id_task.')"><small>Add Activity</small></button>';
	  			}


echo'			</td>
</tr>
				<tr>
        <td colspan="2">';

				foreach ($activityes as $u4) {
							$id_activity 		= $u4->id_activity;
							$nama_activity 		= $u4->nama_activity;
							$nama_user 			= $u4->nama_user;

							echo $nama_activity.' /  '. $nama_user ;
										
	  				if($actor == 'on task'){
	  						echo'  <a href="#" onclick="edit_activity('.$id_activity.','.$id_task.')"><i class="material-icons">mode_edit</i></a>
	  						                  <a href="#" onclick="delete_activity('.$id_activity.')"><i class="material-icons">delete</i></a>
	  						                  <a href="#" onclick="add_list('.$id_activity.')"><i class="material-icons">delete</i></a><br/><ul>';
						}

							foreach ($list as $u5) {
								if($u5->from_id_activity == $id_activity){
									if($u5->status_list == 'done'){
										echo '<li>'.$u5->list_activity;
										
	  										if($actor == 'on task'){
												echo'<input type="checkbox" name="status[]" value="'.$u5->id_list.'" class="list" checked></input>
													<button onclick="delete_list('.$u5->id_list.')">X</button></li>';
											}
									}else {
										echo '<li>'.$u5->list_activity;

	  										if($actor == 'on task'){
												echo'<input type="checkbox" name="status[]" value="'.$u5->id_list.'" class="list" ></input>
												<button onclick="delete_list('.$u5->id_list.')">X</button></li>';
											}
									}
									
								}
							}
							echo '</ul><br/>';


						}

echo '			</td>
			</tr>

		</table>
		<hr/>
		<div id="test_bar"></div>
		<br/><br/><br/>
	';
?>
<script>
  $(document).ready(function(){
    $(".list").change(function() {
        if(this.checked) {
          var id = $(this).val();
          var status = 'done';
            $.ajax({
            type:"POST",
            dataType : "JSON",
            data : {id:id,status:status},
            url: "<?php echo base_url('index.php/project/c_activity/list_status'); ?>",
            success: function(data){

            }
      });
        }
    });
  });
</script>
<script type="text/javascript">
  function add_activity(id){
    console.log(id);
      $.ajax({
                type:"POST",
                data: {id:id},
                url: "<?php echo base_url('index.php/project/c_activity/add_activity'); ?>",
                success: function(data){
                  $('.board2'+String(id)).html(data);
                }
              });
    }

  function edit_activity(id,id_t){
    
    var aksi = 'edit';
    console.log(id,id_t,aksi);
    $.ajax({
            type:"POST",
            data : { id:id , id_t:id_t, aksi:aksi },
            url: "<?php echo base_url('index.php/project/c_activity/view_activity'); ?>",
            success: function(data){
              $('#board_form_activity').html(data);
            }
      });

  } 


  function delete_activity(id) {
      if (confirm("Are you sure?")) {
        console.log(id);
            $.ajax({
          type:"POST",
          dataType : "JSON",
          data : {id:id},
          url: "<?php echo base_url('index.php/project/c_activity/delete_activity'); ?>",
          success: function(){
              
          }
        }); location.reload();
            // return false;
         } 
     
    } 
  function delete_list(id) {
      if (confirm("Are you sure?")) {
        console.log(id);
            $.ajax({
          type:"POST",
          dataType : "JSON",
          data : {id:id},
          url: "<?php echo base_url('index.php/project/c_activity/delete_list'); ?>",
          success: function(){
              
          }
        }); location.reload();
            // return false;
         } 
     
    } 

</script>
<script type="text/javascript">
  function add_list(id){
    console.log(id);
      $.ajax({
                type:"POST",
                data: {id:id},
                url: "<?php echo base_url('index.php/project/c_activity/add_list'); ?>",
                success: function(data){
                  $('#board_form_activity').html(data);
                }
              });
    }
  function edit_list(id){
    
    //var aksi = 'edit';
    console.log(id);
    $.ajax({
            type:"POST",
            data : { id:id },
            url: "<?php echo base_url('index.php/project/c_activity/view_list'); ?>",
            success: function(data){
              $('#board_form_activity').html(data);
            }
      });

  } 

</script>