<?php //$this->load->view('asset'); ?>
<?php
//$aksi = 'add new'; 

if($aksi == 'edit'){
		foreach ($data_actifity as $v) {
			$id_activity 		= $v->id_activity;
			$nama_activity 		= $v->nama_activity;
			$status_activity	= $v->from_id_task;
			$id_user 			= $v->id_user;
			$nama_user			= $v->nama_user;
			$id_task 			= $v->from_id_task;

			$member = $member;
			//$task_member = $member_on;
		}
	}

	else if($aksi == 'add new'){
			$id_task 		= $id_task;
			$id_activity 	= null;
			$nama_activity	= null;

			$member = $member;
	}

echo '
	<form class="form-horizontal" name="form_activity" id="form_activity" >
	  <input type="hidden" class="form-control" id="aksi" name="aksi" value="'.$aksi.'" disabled>
	  <input type="hidden" class="form-control" id="id_task" name="id_task" value="'.$id_task.'" placeholder="id task">
	  <div class="form-group">
	    <div class="col-sm-12">
	      	<label>Activity Title </label>
	      	<input type="hidden" class="form-control" id="id_activity" name="id_activity" value="'.$id_activity.'" >
	      <input type="text" class="form-control" id="nama_activity" name="nama_activity" value="'.$nama_activity.'" >
	    </div>
	  </div>
	  
	  <div class="form-group">
	    		    <div class="col-sm-12">
	    		    Choose Activity Member 
	    		    	<table class="table table-responsive table-md">
	    		';

	    			foreach ($member as $u3) {
	    				echo '	<tr>
	    							<td>
	    								'. $u3->nama_user.'
	    							</td><td>
	    								<input type="radio" name="member" value="'.$u3->id_user.'" class="member">choiced</input>
	    							</td>
	    						</tr>
	    					';
	    			}

	    	echo'		</table>   
	    			</div>
	    			<div class="col-sm-12">
	    		';

	    if($aksi == 'edit'){
	    	echo '
	    			
	    			    on this activity : 
	    			    	<table class="table table-responsive table-md">	<tr>
	    								<td>
	    									'. $nama_user.'
	    								</td><td>
	    									<input type="radio" name="member" value="'.$id_user.'" class="member" checked>choiced</input>
	    								</td>
	    							</tr>
	    								</table>   
	    				
	    			';
	    	}

	    echo'
	    			</div>
	  </div>
	  
	  <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Submit</button>
	    </div>
	  </div>
	</form>
	';
?>

<script>
	$(document).ready(function(){
	    $("#form_activity").submit(function(e){
	    	e.preventDefault();

	    	aksi = $('input[name=aksi]').val();
	    	id = $('input[name=id_task]').val();
	    	id_p = $('input[name=id_project]').val();
	    	//member = $('input[name=member]').val();

	    	if(aksi == 'add new'){
	    		url = "<?php echo base_url('index.php/project/c_activity/insert_activity'); ?>"
	    	}else if(aksi == 'edit'){
	    		url = "<?php echo base_url('index.php/project/c_activity/update_activity'); ?>"
	    	}

	    	//console.log(id_task,member);

	        $.ajax({
						type:"POST",
						dataType : "JSON",
						data : $('#form_activity').serialize(),
						url: url,
						success: function(){

							//$('#put2').text(data);
							//$('#form_activity')[0].reset();
						}
			}); view_task(id,id_p);
	    });	   
}); 
</script>