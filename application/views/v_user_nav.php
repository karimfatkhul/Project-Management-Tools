<?php $this->load->view('asset'); ?>
<?php $this->load->view('navigasi'); ?>
	<h2>Hello User <?php echo $this->session->userdata('nama_user'); ?></h2>
	<a href="<?php echo base_url('index.php/project');?>">Project</a>
	<a href="<?php echo base_url('index.php/report');?>">Reports</a>
	<a href="<?php echo base_url('index.php/logout');?>">log out</a>
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
<?php $this->load->view('foot'); ?>
