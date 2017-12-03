<!Doctype html>
<html>
<head>
	<title>Manage User | Solusi247</title>
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
                        <a class="nav-link" href="<?php echo base_url('index.php/c_navigasi');?>" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="material-icons">dashboard</i><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/manage_user/add/user');?>" data-toggle="tooltip" data-placement="top" title="Create User"><i class="material-icons">person_add</i> 
                       </a>
                    </li>
                    <li class="nav-item cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/add/project');?> "data-toggle="tooltip" data-placement="top" title="Create Project"><i class="material-icons">create_new_folder</i> 
                        </a>
                    </li>
                </ul>
		  	</div>
		</nav>
		<div class="container-fluid dashboard px-4">
			<div class="row">
				<div class="col-md-3">
					<div class="row mb-3">
						<a href="<?php echo base_url('index.php/manage_user/add/user')?>" class="btn btn-info btn-block text-white">Add New User</a>
					</div>
					<div class="row">
						<div class="box">
						  	<div class="box-header">
						    	<h3 class="box-title">User Summary</h3>
						  	</div>
						  <!-- /.box-header -->
						  	<div class="box-body">
						  		<table class="table table-condensed">
						  		  <tr>
						  		    <td>1.</td>
						  		    <td>Back End Developer</td>
						  		    <td><span class="badge badge-primary">55</span></td>
						  		  </tr>
						  		  <tr>
						  		    <td>2.</td>
						  		    <td>Front End Developer</td>
						  		    <td><span class="badge badge-info">70</span></td>
						  		  </tr>
						  		  <tr>
						  		    <td>3.</td>
						  		    <td>Developer Analyst</td>
						  		    <td><span class="badge badge-success">30</span></td>
						  		  </tr>
						  		  <tr>
						  		    <td>4.</td>
						  		    <td>System Analyst</td>
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
					    <h3 class="box-title">User List</h3>
					  </div>
					  <!-- /.box-header -->
					  <div class="box-body">
					    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
					      <thead>
					      <tr>
					        <th>User Name</th>
					        <th>User Type</th>
					        <th>Email</th>
					        <th>Phone</th>
					        <th>Acess Type</th>
					        <th>Option</th>
					      </tr>
					      </thead>
					      <tbody>
					      <?php
					      	foreach ($all_user as $u) {
					      		$id_user 	= $u->id_user;
					      		$nama_user 	= $u->nama_user;
					      		$tipe_user 	= $u->tipe_user;
					      		$email 		= $u->email;
					      		$no_tlp 	= $u->no_tlp;
					      		$akses 		= $u->akses;

					      		echo '
					      			<tr>
					      				<td>'.$nama_user.'</td>
					      				<td>'.$tipe_user.'</td>
					      				<td>'.$email.'</td>
					      				<td>'.$no_tlp.'</td>
					      				<td>'.$akses.'</td>
					      				<td class="text-center">
					      					<ul class="list-unstyled d-inline-flex">
					      						<li style="background-color:#3498db;" >
					      							<a href="'.base_url().'index.php/manage_user/view/user/'.$id_user.'" ><i class="material-icons">visibility</i></a>
					      						</li>
					      						<li style="background-color:#f39c12;">
					      							<a href="'.base_url().'index.php/manage_user/edit/user/'.$id_user.'"  ><i class="material-icons">mode_edit</i></a>
					      						</li>
					      						<li style="background-color:#e74c3c;">
					      							<a href="#"  onclick="delete_user('.$id_user.')"><i class="material-icons">delete</i></a>
					      						</li>
					      						<li style="background: #559E63;">
					      							<a href="'.base_url().'index.php/manage_user/setting/user/'.$id_user.'" ><i class="material-icons">lock</i></a>
					      						</li>
					      					</ul>
					      				</td>
					      			</tr>
					      		';

					      	}
					      ?>
					      </tbody>
					    </table>
					    <script type="text/javascript">
					    	function delete_user(id) {
					    	    if (confirm("Are you sure?")) {
					    	    	console.log(id);
					    		        $.ajax({
					    					type:"POST",
					    					dataType : "JSON",
					    					data : {id:id},
					    					url: "<?php echo base_url('index.php/manage_user/c_manage_user/delete_user'); ?>",
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
    document.getElementById("nav").style.marginLeft = "200px";
    document.getElementById("burger").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("nav").style.marginLeft = "auto";
    document.getElementById("burger").style.display = "block";
}
 $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</html>