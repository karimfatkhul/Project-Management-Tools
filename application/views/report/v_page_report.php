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
                        <a class="nav-link" href="<?php echo base_url('index.php/c_navigasi');?>" title="Dashboard"><i class="material-icons">dashboard</i><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/manage_user/add/user');?>" title="Create User"><i class="material-icons">person_add</i> 
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
					<div class="row">
						<div class="box">
						  	<div class="box-header">
						    	<h3 class="box-title">Latest Report</h3>
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
					    <h3 class="box-title">Report List</h3>
					  </div>
					  <!-- /.box-header -->
					  <div class="box-body">
					    <table class="table table-condensed table-sm">
					      <thead>
					      <tr>
					        <th>User Name</th>
					        <th>Latest Report</th>
					      </tr>
					      </thead>
					      <tbody>
					     	<?php
					     			$akses = $this->session->userdata('akses');
					     			if($akses == 'admin'){
					     				foreach ($list_user as $u) {
					     					$id_user	 	= $u->id_user;
					     					$nama_user 		= $u->nama_user;

					     					foreach ($the_report as $u1) {

					     						if($u1->from_id_user == $id_user){
					     							$id_report	 		= $u1->id_report;
					     							$date_report 		= $u1->date_report;
					     						}else {
					     							$id_report	 		= 'null';
					     							$date_report 		= 'null';
					     						}
					     					}

					     					echo'
					     						<tr>
					     							<td>
					     							  <a href="'.base_url().'index.php/list/report/'.$id_user.'" class="btn btn-link" >
					     								'.$nama_user.'
					     							  </a>
					     							</td>
					     							<td>
					     						';
					     					if($id_report != 'null'){
					     						echo'
					     								<a href="'.base_url().'index.php/view/report/'.$id_report.'" class="btn btn-link" >
					     								'.$date_report.'</td>
					     								</a>
					     							';

					     						}
					     					
					     					echo'		<td>
					     							
					     							</td>
					     						</tr>
					     					';
					     				}
					     			}
					     			else if($akses == 'user'){

					     			   $nama_user 		= $this->session->userdata('nama_user');
					     				foreach ($list_report as $u1) {
					     					$id_report	 	= $u1->id_report;
					     					$date_report 	= $u1->date_report;
					     					//$id_project 	= $u1->id_project;
					     					$nama_project 	= $u1->nama_project;


					     				
					     					echo'
					     						<tr>
					     							<td>
					     							  <a class="btn btn-link"  href="'.base_url().'index.php/view/report/'.$id_report.'" >
					     								'.$nama_project.'
					     							  </a>
					     							</td>
					     							<td>'.$nama_user.'</td>
					     							<td>'.$date_report.'</td>
					     							<td>
					     						
					     									<a href="'.base_url().'index.php/edit/report/'.$id_report.'">Edit</a>
					     									<a href="#" onclick="delete_report('.$id_report.')">Hapus</a>
					     									
					     							</td>
					     						</tr>
					     					';
					     				}
					     				if(isset($id_report) == null){
					     					echo'<h2>Tidak ada report dari user ini !!</h2>';
					     				}
					     			}
					     	?>
					      </tbody>
					    </table>

					    <div id="board">
					    	
					    </div>
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