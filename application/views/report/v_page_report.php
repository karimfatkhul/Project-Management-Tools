<?php $this->load->view('asset'); ?>
<title>Report | Solusi 247 </title>
<?php $this->load->view('navigasi'); ?>
		<div class="container-fluid dashboard px-4">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<!-- Latest Report -->
						<div class="box" >
						  	<div class="box-header">
						    	<h3 class="box-title">Lates Report</h3>
						  	</div>
						  	<div class="box-body" style="min-height:450px">
						  		<table class="table table-condensed table-hover">
										<?php
										foreach ($last_report as $u1) {
											$id_report	 		= $u1->id_report;
											$date_report 		= $u1->date_report;
											$from_id_user 		= $u1->from_id_user;
											foreach ($list_user as $u) {
												$id_user	 	= $u->id_user;
												$nama_user 		= $u->nama_user;
												if($from_id_user == $id_user){
													echo'
													<tr>
														<td>
															<a href="'.base_url().'index.php/list/report/'.$id_user.'"  >
															'.$nama_user.'
															</a>
														</td>
														<td>
													';
													echo'
															<a href="'.base_url().'index.php/view/report/'.$id_report.'"  >
															'.$date_report.'
															</a>
															</td>
															<td>

															</td>
													</tr>
													';
												}
											}
										}
										?>
						  		</table>
						  	</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<!-- Today Report -->
					<div class="box" >
					  <div class="box-header">
					    <h3 class="box-title">Today Report</h3>
					  </div>
					  <div class="box-body" style="min-height:450px">
					    <table id="examples" class="table table-condensed  table-hover" cellspacing="0" width="100%">
					      <tbody>
									<?php
									if(count($today_report) > 0){
										foreach ($today_report as $u2) {
											$id_report	 		= $u2->id_report;
											$date_report 			= $u2->date_report;
											$from_id_user 		= $u2->from_id_user;
											foreach ($list_user as $u) {
												$id_user	 	= $u->id_user;
												$nama_user 		= $u->nama_user;
												if($from_id_user == $id_user){
													echo'
													<tr>
														<td>
															<a href="'.base_url().'index.php/list/report/'.$id_user.'" >
															'.$nama_user.'
															</a>
														</td>
													</tr>
													';
												}
											}
										}
									}else {
										echo '<tr><td colspan="2">Belum ada report untuk hari ini.</td></tr>';
									}
									?>
					      </tbody>
					    </table>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<!-- Today Report -->
					<div class="box">
					  <div class="box-header">
					    <h3 class="box-title">Doesn't Input Report</h3>
					  </div>
					  <div class="box-body"  style="min-height:450px">
					    <table id="example" class="table table-condensed table-hover" cellspacing="0" width="100%">
					      <tbody>
									<?php
									foreach ($list_user as $u) {
										$id_user	 	= $u->id_user;
										$nama_user 		= $u->nama_user;
										if(count($today_report) > 0){
											foreach ($today_report as $u3) {
												$id_report	 		= $u3->id_report;
												$date_report 		= $u3->date_report;
												$from_id_user 		= $u3->from_id_user;
														if($from_id_user != $id_user){
															echo'
																<tr>
																	<td>
																	  <a href="'.base_url().'index.php/list/report/'.$id_user.'"  >
																		'.$nama_user.' sfsdf
																	  </a>
																	</td>
																	<td>
																	</td>
																</tr>
															';
														}
													}
												}
												else{
													echo'
														<tr>
															<td>
																<a href="'.base_url().'index.php/list/report/'.$id_user.'" >
																'.$nama_user.' sfsdf
																</a>
															</td>

															<td>

															</td>
														</tr>
													';
												}
										}
									?>
					      </tbody>
					    </table>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('function'); ?>
