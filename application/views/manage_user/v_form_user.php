<?php
//$aksi = 'add new';
if($aksi == 'edit'){
	foreach ($data_member as $u2) {
		$id_user 	= $u2->id_user;
		$nama_user 	= $u2->nama_user;
		$tipe_user 	= $u2->tipe_user;
		$email 		= $u2->email;
		$no_tlp 	= $u2->no_tlp;
		$akses 		= $u2->akses;
		$title 		= 'Edit User | Solusi247';
		$box_title  = 'Edit User';
	}
}

else if($aksi == 'add new'){
		$id_user 	= null;
		$nama_user 	= null;
		$tipe_user 	= null;
		$email 		= null;
		$no_tlp 	= null;
		$akses 		= null;
		$title 		= 'Add User | Solusi247';
		$box_title  = 'Add User';
}
?>
<!Doctype html>
<html>
<head>
	<title><?php echo $title ?></title>
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
                    <li class="nav-item active cl-effect-12">
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
							<h3 class="box-title"><?php echo $box_title ?></h3>
						</div>
						<div class="box-body">
							<form  name="form_user" id="form_user">
							  <div class="row">
							  	<div class="col-md-6 ml-3">
							  		<h3 class="form-title mb-3" style="font-size:1rem">Personal Information</h3>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" for="email">User Name</label>
							  		  <div class="col-sm-10">
							  		    	<input type="hidden" id="aksi" name="aksi" value="<?php echo $aksi ?>" >
							  		    	<input type="hidden"  id="id_user" name="id_user" value="<?php echo $id_user ?>" >
							  		    <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?php echo $nama_user ?>" required>
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" for="email">User Type</label>
							  		  <div class="col-sm-10">
							  		    <select class="form-control" id="tipe_user" name="tipe_user">
							  		    <?php
							  		    if ($aksi=='edit') {
							  		    	echo'<option> '.$tipe_user.' </option>';
							  		    }?>
							  		        <option>Developer</option>
							  		        <option>Developer Analyst</option>
							  		        <option>Project Manager</option>
							  		        <option>System Analyst</option>
							  		    </select>
							  		    <!-- <input type="text" class="form-control" id="tipe_user" name="tipe_user" value="<?php echo $tipe_user ?>"  > -->
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" for="email">Email</label>
							  		  <div class="col-sm-10">
							  		    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" required>
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" for="email">Phone</label>
							  		  <div class="col-sm-10">
							  		    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $no_tlp ?>">
							  		  </div>
							  		</div>
							  	</div>
							  </div>
							  <div class="row">
							  <div class="col-md-6 ml-3">
							  		<h3 class="form-title mb-3 mt-3" style="font-size:1rem">Personal Information</h3>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" for="email">Access Type</label>
							  		  <div class="col-sm-10">
							  		  	<select class="form-control" name="akses">
							  		  	    <option>Admin</option>
							  		  	    <option>User</option>
							  		  	</select>
							  		  </div>
							  		</div>
							  </div>
							  </div>
							  
							  <div class="form-group mt-3"> 
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit" class="btn btn-default mr-3">Cancel</button>
							      <button type="submit" class="btn btn-primary">Save</button>
							      <!-- <button class="btn btn-7 btn-7h icon-envelope">Coba</button> -->
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
		$("#form_user").submit(function(e){
	    	e.preventDefault();

	    	aksi = $('input[name=aksi]').val();

	    	if(aksi == 'add new'){
	    		url = "<?php echo base_url('index.php/manage_user/c_manage_user/insert_user'); ?>"
	    	}else if(aksi == 'edit'){
	    		url = "<?php echo base_url('index.php/manage_user/c_manage_user/update_user'); ?>"
	    	}

	    	//console.log(id);

	        $.ajax({
						type:"POST",
						dataType : "JSON",
						data : $('#form_user').serialize(),
						url: url,
						success: function(data){
							
							$('#put').text(data);
							$('#form_user')[0].reset();
						}
			}); 
	    });


	})
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
$("#form_user").validate();
</script>
</html>



		




