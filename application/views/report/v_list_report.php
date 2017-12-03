<?php $this->load->view('asset'); ?>
 
 

<table class="table table-bordered">
<?php
		foreach ($user as $u) {
			$id_user	 	= $u->id_user;
			$nama_user 		= $u->nama_user;
		}
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
				';	

			if($this->session->userdata('id_user') == $id_user){

				echo'
							<a href="'.base_url().'index.php/edit/report/'.$id_report.'">Edit</a>
							<a href="#" onclick="delete_report('.$id_report.')">Hapus</a>
					';

				}
			echo'		
					</td>
				</tr>
			';
		}	
		if(isset($id_report) == null){
			echo'<h2>Tidak ada report dari user ini !!</h2>';
		}
	
	

?>

</table>
<br/>
<?php
//if($this->session->userdata('akses') == 'admin'){

		echo'	<button onclick="close_fom()">X Close</button>';

	//}
?>

<a href="<?php echo base_url('index.php/home');?> ">Home </a>
<a href="<?php echo base_url('index.php/manage_user');?> ">manage user</a>
<hr/>
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
	function delete_report(id) {
	    if (confirm("Are you sure?")) {
	    	console.log(id);
		        $.ajax({
					type:"POST",
					dataType : "JSON",
					data : {id:id},
					url: "<?php echo base_url('index.php/report/c_report/delete_report'); ?>",
					success: function(){
							
					}
				}); location.reload();

	    // return false;
	   
		} 
	}

	function edit_report(id) {
		    $('#board').empty();

			var aksi = 'edit';
			console.log(id,aksi);
			$.ajax({
							type:"POST",
							data : { id:id, aksi:aksi },
							url: "<?php echo base_url('index.php/report/c_report/view_report'); ?>",
							success: function(data){
								$('#board').html(data);
							}
				});
		} 
	function view_report(id) {
		    $('#board').empty();

			var aksi = 'view';
			console.log(id,aksi);
			$.ajax({
							type:"POST",
							data : { id:id, aksi:aksi },
							url: "<?php echo base_url('index.php/report/c_report/view_report'); ?>",
							success: function(data){
								$('#board').html(data);
							}
				});
		} 
</script>