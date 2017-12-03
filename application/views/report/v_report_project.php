<?php //$this->load->view('plugin'); ?>

<?php
		
		foreach ($data_project as $u2) {
			$id_project 	= $u2->id_project;
			$nama_project 	= $u2->nama_project;
			$start_date 	= $u2->start_date;
			$finish_date 	= $u2->finish_date;
			$status_project	= $u2->status_project;
			$progresh 		= $u2->progresh;

			if($aksi == 'edit'){
				$id_report 	= $u2->id_report;
				$date_report= $u2->date_report;
				$keterangan	= $u2->keterangan;
				$nama_user 	= $u2->nama_user;
			}else {
				$id_report	= null;
				$date_report= date('d-M-Y');
				$keterangan	= null;
				$nama_user 	= $this->session->userdata('nama_user');
			}

		}
	  //if($actor == 'team member'){
		//foreach ($roles as $ux) {
		//		$role = $ux->role;
		//}
	  //}else $role = 'none';
	


echo '
		<h3><b>Create Report </b></h3>
		<table class="table table-bordered">
			<tr>
				<td>Nama Project </td><td>
				<input type="text" value="'.$nama_project.'" name="nama_project" class="form-control"disabled></td>
			</tr>
			<tr>
				<td>Status </td><td><input type="text" value="'.$status_project.'" name="nama_project" class="form-control"disabled></td>
			</tr>
			<tr>
				<td>Progresh </td><td><input type="text" value="'.$progresh.'" name="nama_project" class="form-control"disabled></td>
			</tr>
			<tr>
				<td>report by </td><td><input type="text" value="'.$nama_user.'" name="nama_project" class="form-control"disabled></td>
			</tr>
			<tr>
				<td>date report </td><td><input type="text" value="'.$date_report.'" name="nama_project" class="form-control"disabled></td>
			</tr>
			<tr>
				<td>
					Detile 
				</td>
				<td>';
				if($n_task >= 1 ){
					foreach ($task as $uvb) {
							$id_task = $uvb->id_task;
							$nama_task = $uvb->nama_task;

							echo $nama_task.' (on progresh)<br/><ul>';
								if($n_activity >= 1 ){
										foreach ($activity as $uvb) {
											$id_activity = $uvb->id_activity;
											$nama_activity = $uvb->nama_activity;
											$from_id_task = $uvb->from_id_task;

											if($from_id_task == $id_task ){
												echo '<li>'.$nama_activity.' (on progresh)<br/><ol>';

												foreach ($list as $uvb) {
													$id_list = $uvb->id_list;
													$list_activity = $uvb->list_activity;
													$from_id_activity = $uvb->from_id_activity;

													if($from_id_activity == $id_activity ){
														echo '<li>'.$list_activity.' (done)<br/></li>';
													}

												
												}
												echo'</ol></li>';
											}

										}
								} echo'</ul>';
					}
				}

echo '			</td>
			</tr>
			<tr>	
				<td>
					keterangan 
				</td>
				<td>
					<form class="form-horizontal" name="form_report" id="form_report" >
						 <div class="form-group">
			    			<div class="col-sm-12">
								<input type="hidden" class="form-control" name="id_report" id="id_report" value="'.$id_report.'">
								<input type="hidden" class="form-control" name="aksi" id="aksi" value="'.$aksi.'">
								<input type="hidden" class="form-control" name="id_project" id="id_project" value="'.$id_project.'">
								<textarea class="form-control" name="keterangan" rows="4">'.$keterangan.'</textarea>
							</div>
						</div>
						<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default">Submit</button>
						    </div>
						  </div>
					</form>
				</td>
			</tr>
			
		</table>
		
		<br/><br/><br/>
	';
?>

<script>
	$(document).ready(function(){
	    $("#form_report").submit(function(e){
	    	e.preventDefault();

	    	//console.log(id_project,aksi);
	    	aksi = $('input[name=aksi]').val();

	    	if(aksi == 'add new'){
	    		url = "<?php echo base_url('index.php/report/c_report/insert_report'); ?>"
	    	}else if(aksi == 'edit'){
	    		url = "<?php echo base_url('index.php/report/c_report/update_report'); ?>"
	    	}

	        $.ajax({
						type:"POST",
						dataType : "JSON",
						data : $('#form_report').serialize(),
						url: url,
						success: function(data){
							
							//$('#put2').text(data);
							$('#board').empty();
							$('#board').html('<h3>'+data+'</h3>');
							//$('#form_report')[0].reset();
						}
			}); //location.reload();
	    });	   
});
</script>
 
