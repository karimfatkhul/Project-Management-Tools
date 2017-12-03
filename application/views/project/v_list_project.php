<?php $this->load->view('asset'); ?>
<!Doctype html>
<html>
<head>
	<title>Manage Project | Solusi247</title>
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
		  	<div class="container-fluid">
		  		<span id="burger" style="font-size:30px;cursor:pointer;margin-right:20px" onclick="openNav()">&#9776;</span>
		  		<!-- <a class="navbar-brand" href="#">Solusi247</a> -->
	  			<ul class="navbar-nav mx-auto">
                        <li class="nav-item  cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/c_navigasi');?>"  title="Dashboard"><i class="material-icons">dashboard</i><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/manage_user/add/user');?>"  title="Create User"><i class="material-icons">person_add</i> 
                       </a>
                    </li>
                    <li class="nav-item cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/add/project');?> " title="Create Project"><i class="material-icons">create_new_folder</i> 
                        </a>
                    </li>
                </ul>
		  	</div>
		</nav>
		<div class="container-fluid dashboard px-4">
			<div class="row">
				<div class="col-md-3">
					<div class="row mb-3">
						<?php
						if($this->session->userdata('akses') == 'admin'){

								echo'<a href="'.base_url().'index.php/add/project" class="btn btn-info btn-block text-white">Add New Project</a>';
								
							}
						?>
						
					</div>
					<div class="row">
						<div class="box">
						  	<div class="box-header">
						    	<h3 class="box-title">Project Summary</h3>
						  	</div>
						  <!-- /.box-header -->
						  	<div class="box-body">
						  		<table class="table table-condensed">
						  		  <tr>
						  		    <td>1.</td>
						  		    <td>Total Project</td>
						  		    <td><span class="badge badge-primary">150</span></td>
						  		  </tr>
						  		  <tr>
						  		    <td>2.</td>
						  		    <td>On Planning</td>
						  		    <td><span class="badge badge-info">70</span></td>
						  		  </tr>
						  		  <tr>
						  		    <td>3.</td>
						  		    <td>On Progress</td>
						  		    <td><span class="badge badge-success">30</span></td>
						  		  </tr>
						  		  <tr>
						  		    <td>4.</td>
						  		    <td>Has Done</td>
						  		    <td><span class="badge badge-danger">90</span></td>
						  		  </tr>
						  		</table>
						  	</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="box">
					  <div class="box-header">
					    <h3 class="box-title">Project List</h3>
					  </div>
					  <!-- /.box-header -->
					  <div class="box-body">
					    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
					      <thead>
					      <tr>
					        <th>Project Name</th>
					        <th>Start Date</th>
					        <th>End Date</th>
					        <th>Project Status</th>
					        <th>Progress</th>
					        <th>Option</th>
					      </tr>
					      </thead>
					      <tbody>
					      <?php
					      	foreach ($all_project as $u) {
					      		$id_project 	= $u->id_project;
					      		$nama_project 	= $u->nama_project;
					      		$start_date 	= $u->start_date;
					      		$finish_date 	= $u->finish_date;
					      		$status_project	= $u->status_project;
					      		$progresh 		= $u->progresh;
					      		echo '
					      			<tr>
					      				<td>
					      				  <a  href="'.base_url().'index.php/view/project/'.$id_project.'" >
					      				            '.$nama_project.'
					      				  </a>
					      				</td>
					      				<td>'.$start_date.'</td>
					      				<td>'.$finish_date.'</td>
					      				<td>'.$status_project.'</td>
					      				<td>'.$progresh.'</td>
					      				<td class="text-center">
					      			';	
					      	if($this->session->userdata('akses') == 'admin'){
					      		echo'
					      				<ul class="list-unstyled d-inline-flex">
					      					<li style="background-color:#f39c12;">
					      						<a href="'.base_url().'index.php/edit/project/'.$id_project.'"><i class="material-icons">mode_edit</i></a>
					      					</li>
					      					<li style="background-color:#e74c3c;">
					      						<a href="#"  onclick="delete_project('.$id_project.')"><i class="material-icons">delete</i></a>
					      					</li>
					      				</ul>
					      			';
					      	}
					      		echo'		
					      				</td>
					      			</tr>
					      		';
					      	}
					      ?>
					      </tbody>
					    </table>

					    <div id="board">
					    	
					    </div>

					    <script type="text/javascript">
					    	function close_fom(){
					    		$('#board').empty();
					    		//location.reload();
					    	}
					    	function add_project(){
					    			$.ajax({
					    								type:"POST",
					    								url: "<?php echo base_url('index.php/project/c_project/add_project'); ?>",
					    								success: function(data){
					    									$('#board').html(data);
					    								}
					    							});
					    		}
					    	function view_project(id){
					    		$('#board').empty();
					    		var aksi = 'view';
					    		$.ajax({
					    						type:"POST",
					    						data : {id:id,aksi:aksi},
					    						url: "<?php echo base_url('index.php/project/c_project/view_project/id'); ?>",
					    						success: function(data){
					    							$('#board').html(data);
					    						}
					    			});
					    		

					    	} 

					    	function edit_project(id){
					    		$('#board').empty();

					    		var aksi = 'edit';
					    		console.log(id,aksi);
					    		$.ajax({
					    						type:"POST",
					    						data : { id:id , aksi:aksi },
					    						url: "<?php echo base_url('index.php/project/c_project/view_project'); ?>",
					    						success: function(data){
					    							$('#board').html(data);
					    						}
					    			});

					    	} 
					    	function delete_project(id) {
					    	    if (confirm("Are you sure?")) {
					    	    	console.log(id);
					    		        $.ajax({
					    					type:"POST",
					    					dataType : "JSON",
					    					data : {id:id},
					    					url: "<?php echo base_url('index.php/project/c_project/delete_project'); ?>",
					    					success: function(){
					    							
					    					}
					    				}); location.reload();

					    	    // return false;
					    	   
					    		} 
					    	}
					    </script>
					  </div>
					  <!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			</div>
		</div>
	</div>
</body>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

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
 $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</html>