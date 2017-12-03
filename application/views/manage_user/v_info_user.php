
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
	  		    	<li class="nav-item ">
	  		      		<a class="nav-link" href="<?php echo base_url('index.php/c_navigasi');?>"><i class="material-icons">dashboard</i><span class="sr-only">(current)</span></a>
	  		    	</li>
	  		    	<li class="nav-item">
	  		      		<a class="nav-link" href="<?php echo base_url('index.php/manage_user');?>"><i class="material-icons">person_add</i> 
					  	<!-- <span >Add User</span> --></a>
	  		    	</li>
			    	<li class="nav-item">
		  	      		<a class="nav-link" href="<?php echo base_url('index.php/project');?> "><i class="material-icons">create_new_folder</i> 
					  	<!-- <span >Add Project</span> --></a>
		  	    	</li>
		  		</ul>
		  	</div>
		</nav>
		<div class="container-fluid dashboard px-4">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
					  	<div class="box-header">
					    	<h3 class="box-title">User Details</h3>
					  	</div>
					  	<!-- /.box-header -->
					  	<div class="box-body">
					  			<?php
					  				
					  					foreach ($data_member as $u2) {
					  						$id_user 	= $u2->id_user;
					  						$nama_user 	= $u2->nama_user;
					  						$tipe_user 	= $u2->tipe_user;
					  						$email 		= $u2->email;
					  						$no_tlp 	= $u2->no_tlp;
					  						$akses 		= $u2->akses;
					  					}
					  				


					  			echo '
					  			<dl class="dl-horizontal">
					  					<dt>
					  					    User Name
					  					</dt>

					  					<dd>
					  					     '.$nama_user.'
					  					</dd>

					  					<dt>
					  					    User Type
					  					</dt>

					  					<dd>
					  					    '. $tipe_user .'
					  					</dd>
					  					<dt>
					  					    Email
					  					</dt>

					  					<dd>
					  					    '. $email .'
					  					</dd>

					  					<dt>
					  					    Phone
					  					</dt>

					  					<dd>
					  					    '. $no_tlp .'
					  					</dd>
					  					<dt>
					  					    Acess Type
					  					</dt>

					  					<dd>
					  					    '. $akses .'
					  					</dd>
					  				</dl>
					  				';
					  			?>

					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
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
</script>
</html>