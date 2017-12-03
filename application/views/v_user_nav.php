<h2>
Hello User <?php echo $this->session->userdata('nama_user'); ?>

</h2>


		<a href="<?php echo base_url('index.php/project');?>">Project</a>
        <a href="<?php echo base_url('index.php/report');?>">Reports</a> 
        <a href="<?php echo base_url('index.php/logout');?>">log out</a> 