<?php
		
		foreach ($data_project as $u2) {
				$id_project 	= $u2->id_project;
				$nama_project 	= $u2->nama_project;
				$start_date 	= $u2->start_date;
				$finish_date 	= $u2->finish_date;
				$status_project	= $u2->status_project;
				$progresh 		= $u2->progresh;
				$id_report 	= $u2->id_report;
				$date_report= $u2->date_report;
				$keterangan	= $u2->keterangan;
				$nama_user 	= $u2->nama_user;
			}

echo '
	<h3>'.$nama_user.' ('.$date_report.')</h3>
	<br/>
	<h3>'.$nama_project.'</h3>
	<hr/>
	<h3>Wktu pengerjaan : '.$start_date.' ---> '.$finish_date.'</h3>
	<h3>status / progresh : '.$status_project.' /'.$progresh.'  </h3>
	<br/>
	<h5> Detail : <br/> 
	';
		

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
				
echo'
	</h5>
	<br/>
	<h5>keterangan : <br/>'.$keterangan.')</h5>


';