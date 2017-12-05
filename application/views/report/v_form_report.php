<?php $this->load->view('asset'); ?>
<?php $this->load->view('navigasi'); ?>
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
				$box_title  = 'Edit Report';
			}else {
				$box_title  = 'Create Report';
				$id_report	= null;
				$date_report= date('d-M-Y');
				$keterangan	= null;
				$nama_user 	= $this->session->userdata('nama_user');
			}
		}?>
				<div class="container-fluid dashboard px-4">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title"><?php echo $box_title ?></h3>
						</div>
						<div class="box-body">
							<form  name="form_project" id="form_project">
							  <div class="row">
							  	<div class="col-md-6 ml-3">
							  		<h3 class="form-title mb-3" style="font-size:1rem">Report Information</h3>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >Project Name</label>
							  		  <div class="col-sm-12">
							  		    	<input type="text" value="<?php echo $nama_project ?>" name="nama_project" class="form-control"disabled>
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >Status</label>
							  		  <div class="col-sm-12">
							  		    <input type="text" value="<?php echo $status_project ?>" name="status_project" class="form-control"disabled>
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >Progress</label>
							  		  <div class="col-sm-12">
							  		    <input type="text" value="<?php echo $progresh ?>" name="progress_project" class="form-control"disabled>
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >Handled By</label>
							  		  <div class="col-sm-12">
							  		    <input type="text" value="<?php echo $nama_user ?>" name="nama_user" class="form-control"disabled>
							  		  </div>
							  		</div>
										<div class="form-group">
							  		  <label class="control-label col-sm-6" >Report Date</label>
							  		  <div class="col-sm-12">
							  		    <input type="text" value="<?php $date_report ?>" name="date_report" class="form-control"disabled>
							  		  </div>
							  		</div>
										<div class="form-group">
							  		  <label class="control-label col-sm-6" >Details</label>
							  		  <div class="col-sm-12">
							  		    <?php
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
												 ?>
							  		  </div>
							  		</div>
										<div class="form-group">
							  		  <label class="control-label col-sm-6" >Message</label>
							  		  <div class="col-sm-12">
												<div class="form-group" name="form_report" id="form_report">
					 			    			<div class="col-sm-12">
					 								<input type="hidden" class="form-control" name="id_report" id="id_report" value="'.$id_report.'">
					 								<input type="hidden" class="form-control" name="aksi" id="aksi" value="'.$aksi.'">
					 								<input type="hidden" class="form-control" name="id_project" id="id_project" value="'.$id_project.'">
					 								<textarea class="form-control" name="keterangan" rows="4"><?php echo $keterangan ?>'</textarea>
					 							</div>
					 						</div>
							  		  </div>
							  		</div>
							  	</div>
							  </div>
							  <div class="form-group mt-3">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit" class="btn btn-default mr-3">Cancel</button>
							      <button type="submit" class="btn btn-primary">Save</button>
							    </div>
							  </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
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
<?php $this->load->view('function') ?>
