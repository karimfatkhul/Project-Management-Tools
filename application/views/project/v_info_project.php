
<?php
	
		foreach ($data_project as $u2) {
			$id_project 	= $u2->id_project;
			$nama_project 	= $u2->nama_project;
			$start_date 	= $u2->start_date;
			$finish_date 	= $u2->finish_date;
			$status_project	= $u2->status_project;
			$progresh 		= $u2->progresh;
		}
	  if($actor == 'team member'){
		foreach ($roles as $ux) {
				$role = $ux->role;
		}
	  }else $role = 'none';	
echo'<br>
	';
?>


<!Doctype html>
<html>
<head>
	<title>Manage User | Solusi247</title>
	<?php $this->load->view('asset'); ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<div id="mySidenav" class="sidenav">
	  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  	<div class="cl-effect-1">
            <a href="<?php echo base_url('index.php/manage_user');?>">Manage User</a>
        </div>
        <div class="cl-effect-1">
            <a href="<?php echo base_url('index.php/project');?>"><span data-hover="Manage Project">Manage Project</span></a>
        </div>
        <div class="cl-effect-1">
            <a href="<?php echo base_url('index.php/report');?>">Reports</a>
        </div>
        <div class="cl-effect-1">
            <a href="<?php echo base_url('index.php/logout');?>">Sign Out</a>
        </div>
	</div>
	<div id="main">
		<nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
		  	<div class="container-fluid"  id="nav">
		  		<span id="burger" style="font-size:30px;cursor:pointer;margin-right:20px" onclick="openNav()">&#9776;</span>
		  		<!-- <a class="navbar-brand" href="#">Solusi247</a> -->
	  			<ul class="navbar-nav mx-auto">
                        <li class="nav-item  cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/c_navigasi');?>"><i class="material-icons">dashboard</i><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/manage_user/add/user');?>"><i class="material-icons">person_add</i> 
                       </a>
                    </li>
                    <li class="nav-item cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/add/project');?> "><i class="material-icons">create_new_folder</i> 
                        </a>
                    </li>
                </ul>
		  	</div>
		</nav>
		<div class="container-fluid dashboard px-4">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
					  	<div class="box-header">
					    	<h3 class="box-title"><?php echo $nama_project ?></h3>
					    	<!--<?php
					    		//if($role != 'none'){
					    		//	echo'<tr>
					    		//			<td><a href="'.base_url().'index.php/report/project/'.$id_project.'">Liat report</a></td><td></td>
					    		//		</tr>
					    		//	';
					    		//}
					    	//?>-->
					    	<span class="float-right">
					    		<ul class="list-unstyled d-inline-flex">
					    			<li class="ml-3 mr-3">Start Date <span class="ml-2 badge badge-primary"><?php echo $start_date ?></span></li>
					    			<li class="ml-3 mr-3">End Date <span class="ml-2 badge badge-info"><?php echo $finish_date ?></span></li>
					    			<li class="ml-3 mr-3">Status <span class="ml-2 badge badge-success"><?php echo $status_project ?></span></li>
					    		</ul>
					    	</span>
					    	<br>
					    	<hr>
					    	<p class="lead" style="font-size:1rem">You are <?php echo $actor ?> in this project as <span class="badge badge-warning" style="color: #fff9f9;"><?php echo $role ?> </span>
					    	<span >
					  			<?php
					  			 		if($role == 'project leader'){
					  						echo'	<button class="btn btn-info btn-sm ml-3" onclick="add_task('.$id_project.')"><small>Add Task</small></button>';
					  					}
					  				  if($actor == 'team member'){
					  					foreach ($roles as $ux) {
					  							$role = $ux->role;
					  							echo'<button class="btn btn-danger btn-sm ml-3"  onclick="create_report('.$id_project.')"><small>Create Report</small></button>';
					  					}
					  				}else $role = 'none';
					  			?>
					  		</span>
					  		</p>			
					  	<div class="box-body">
					  		<div class="row">
					  			<div class="col-md-12">
					  				<div class="box" style="border: 1px solid #80808029 !important;">
					  					<div class="box-body">
					  						<div id="board1">
					  							
					  						</div>
					  					</div>
					  				</div>
					  			</div>
					  			<?php
					  				foreach ($task as $u4) {
					  						$id_task 		= $u4->id_task;
					  						$nama_task 		= $u4->nama_task;
					  						echo'
					  							<div class="col-md-3">
					  								<div class="box" style="border: 1px solid #80808029 !important;">
					  									<div class="box-body">
					  										<p class="box-title" style="display:inline-flex">
					  										 '.$nama_task.'
					  										 <span>
					  										 <ul class="list-unstyled d-inline-flex float-right">
					  										 	<li style="margin:0px 5px; "><a style="color:#3498db" href="#" onclick="view_task('.$id_task.','.$id_project.')"><i class="material-icons">visibility</i></a></li>';
					  										 	 if ($role == 'project leader'){
					  										 			echo '
					  										 			<li style="margin:0px 5px;"><a style="color:#f39c12" href="#" onclick="edit_task('.$id_task.','.$id_project.')"><i class="material-icons">mode_edit</i></a></li>
					  										 			<li style="margin:0px 5px;"><a style="color:#e74c3c" href="#" onclick="delete_task('.$id_task.')"><i class="material-icons">delete</i></a></li>'
					  										 			;
					  										 			}
					  										 echo '			
					  										 </ul>
					  										 </span>
					  										</p>
					  									</div>
					  								</div>
					  								<div class="board'.$id_task.'"></div>
					  								<div class="board2'.$id_task.'"></div>
					  							</div>
					  						';
					  				}
					  			?>
					  		</div>
					  		<div class="row">
					  			<div>
					  				<span class="lead" style="font-size:1rem">Members of this project: <?php
					  					foreach ($member as $u3) {
					  											$id_user 		= $u3->id_user;
					  											$nama_user 		= $u3->nama_user;

					  											echo '<p  class="d-inline-flex ml-3 lead" style="font-size:1rem">['.$nama_user.']</p>';
					  										}
					  				?></span>
					  			</div>	
					  		</div>
					  		<div class="row">
					  			<div id="board">
					  				
					  			</div>
					  		</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	function close_fom(){
		$('#board').empty();
		//location.reload();
	}
	function add_task(id){
		console.log(id);
			$.ajax({
								type:"POST",
								data: {id:id},
								url: "<?php echo base_url('index.php/project/c_task/add_task'); ?>",
								success: function(data){
									$('#board1').html(data);
								}
							});
		}

	function view_task(id,id_p){
		$('#board').empty();

		var aksi = 'view';
		console.log(id,aksi);
		$.ajax({
						type:"POST",
						data : { id:id , id_p:id_p, aksi:aksi },
						url: "<?php echo base_url('index.php/project/c_task/view_task'); ?>",
						success: function(data){
							$('.board'+String(id)).html(data);
						}
			});
	} 

	function edit_task(id,id_p){
		$('#board').empty();

		var aksi = 'edit';
		console.log(id,aksi);
		$.ajax({
						type:"POST",
						data : { id:id , id_p:id_p, aksi:aksi },
						url: "<?php echo base_url('index.php/project/c_task/view_task'); ?>",
						success: function(data){
							$('.board'+String(id)).html(data);
						}
			});

	} 

	function delete_task(id) {
	    if (confirm("Are you sure?")) {
	    	console.log(id);
		        $.ajax({
					type:"POST",
					dataType : "JSON",
					data : {id:id},
					url: "<?php echo base_url('index.php/project/c_task/delete_task'); ?>",
					success: function(){
							
					}
				}); location.reload();
		        // return false;
	   		} 
	   
		} 
	function create_report(id) {
        $('#board').empty();

      var aksi = 'report';
      console.log(id,aksi);
      $.ajax({
              type:"POST",
              data : { id:id, aksi:aksi },
              url: "<?php echo base_url('index.php/report/c_report/requesto_create_report'); ?>",
              success: function(data){
                
                if(data == 'ok'){
                    document.location.href ="<?php echo base_url(''); ?>index.php/create/report/"+id ;
                }else $('#board').html(data);
              }
        }); 
    } 
</script>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
    document.getElementById("burger").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("burger").style.display = "block";
}
</script>
</html>