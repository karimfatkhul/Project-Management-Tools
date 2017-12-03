<?php $this->load->view('asset'); ?>
<?php
	//$aksi = 'add new';
	if($aksi == 'edit'){
		foreach ($data_project as $u2) {
			$id_project 	= $u2->id_project;
			$nama_project 	= $u2->nama_project;
			$start_date 	= $u2->start_date;
			$finish_date 	= $u2->finish_date;
			$status_project	= $u2->status_project;
			$progresh 		= $u2->progresh;
			$title 		= 'Edit Project | Solusi247';
			$box_title  = 'Edit Project';

			$new_member = $candidat;
		}
	}

	else if($aksi == 'add new'){
			$id_project 	= null;
			$nama_project 	= null;
			$start_date 	= null;
			$finish_date 	= null;
			$status_project = null;
			$progresh 		= null;
			$title 		= 'Add Project | Solusi247';
			$box_title  = 'Add Project';

			$new_member = $all_candidat;
	}

?>
<!Doctype html>
<html>
<head>
	<title><?php echo $title ?></title>
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
                    <li class="nav-item  cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/manage_user/add/user');?>"><i class="material-icons">person_add</i> 
                       </a>
                    </li>
                    <li class="nav-item active cl-effect-12">
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
							<form  name="form_project" id="form_project">
							  <div class="row">
							  	<div class="col-md-6 ml-3">
							  		<h3 class="form-title mb-3" style="font-size:1rem">Project Information</h3>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >Project Name</label>
							  		  <div class="col-sm-12">
							  		    	<input type="hidden" class="form-control" id="aksi" name="aksi" value="<?php echo $aksi?>" >
							  		    	<input type="hidden" class="form-control" id="id_project" name="id_project" value="<?php echo $id_project?>" >
							  		    	<input type="text" class="form-control" id="nama_project" name="nama_project" value="<?php echo $nama_project ?>">
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >Start Date</label>
							  		  <div class="col-sm-12">
							  		    <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date ?>" >
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >End Date</label>
							  		  <div class="col-sm-12">
							  		    <input type="date" class="form-control" id="finish_date" name="finish_date" value="<?php echo $finish_date ?>"  >
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >Project Status</label>
							  		  <div class="col-sm-12">
							  		    <input type="text" class="form-control" id="status_project" name="status_project" value="<?php echo $status_project ?>"  >
							  		  </div>
							  		</div>
							  	</div>
							  	<div class="col-md-5 ml-3">
							  		<div class="col-md-12">
							  			<h3 class="form-title" style="font-size:1rem;display: inline-block;">Add Project Member</h3>
							  			  	<div class="col-sm-4 float-right pr-0" style="margin-bottom:  2rem!important;">
							  			    	<div class="input-group input-group-sm">
							  			        	<input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
							  			        	<span class="input-group-btn">
							  			          		<button class="btn btn-primary" type="button">Go!</button>
							  			        	</span>
							  			    	</div>
							  			  	</div>
							  		</div>
							  		
							  		<div class="col-sm-12">
							  			<table class="table table-condensed">
							  				<?php
                            foreach ($new_member as $u3) {

                              echo '  <tr>
                                    <td>
                                      '. $u3->nama_user.'
                                    </td><td>
                                ';

                               if($aksi == 'add new'){
                              echo '  
                                <input type="checkbox" name="members[]" value="'.$u3->id_user.'" class="member"></input>
                                ';
                            } else if($aksi == 'edit'){
                              
                              $input = null;
                              foreach ($member as $ui3) {

                                if($u3->id_user == $ui3->id_user){
                                  $input = '<input type="checkbox" name="members[]" value="'.$u3->id_user.'" class="member" checked></input>';
                                }
                                  
                              }
                                if($input == null){
                                  $input = '<input type="checkbox" name="members[]" value="'.$u3->id_user.'" class="member" ></input>';
                                }  


                              echo $input;      

                            }

                            echo '
                                    </td>
                                  </tr>
                                ';
                          } ?>
							  			</table>
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
<script>
	$(document).ready(function(){
	    $("#form_project").submit(function(e){
	    	e.preventDefault();

	    	aksi = $('input[name=aksi]').val();
	    	id_project = $('input[name=id_project]').val();

	    	if(aksi == 'add new'){
	    		url = "<?php echo base_url('index.php/project/c_project/insert_project'); ?>"
	    	}else if(aksi == 'edit'){
	    		url = "<?php echo base_url('index.php/project/c_project/update_project'); ?>"
	    	}

	    	//console.log(id_project,aksi);

	        $.ajax({
						type:"POST",
						dataType : "JSON",
						data : $('#form_project').serialize(),
						url: url,
						success: function(data){
							
							//$('#put2').text(data);
							$('#form_project')[0].reset();
						}
			});
			if(aksi=='add new'){
			       location.reload();
			     }else if(aksi =='edit'){
			       document.location.href ="<?php echo base_url('index.php/project'); ?>" ;
			     }
	    });	   
});
</script>
</html>