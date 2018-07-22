<!DOCTYPE html>
<html>
<head>
	<title>E-LEARNING</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/vendor/font-awesome/css/font-awesome.min.css'?>">

  <!-- js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="<?= base_url('asset/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/script.js') ?>"></script>
  <script src="<?= base_url('asset/js/jquery-3.3.1.min.js') ?>"></script>

	<style type="text/css">
		body{
			background-color: #e8f0fe;
		}
		a{
			color: #4F59FF;
			text-decoration: none;
		}
		a:hover{
			color: #4F59FF;
		}
	</style>
</head>
<body>


<nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #104f60;">
  <!-- Navbar brand -->
    <div class="navbar-brand mb-0">
    	<!-- Toggler/collapsibe Button -->
    	<span style="font-size:30px;cursor:pointer" class="h6" onclick="openNav()">&#9776;</span>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    <span class="fa fa-ellipsis-v"></span>
	  </button>
    	<span class="text-uppercase h4"><?= $dt->kelas; ?></span>
	</div>
  <!-- Navbar Center -->
  <div class="navbar-nav">
  	<ul class="nav lead">
  		<li class="nav-item">
  			<a class="nav-link active" href="<?= base_url('index.php/web/teachertimeline/'.$dt->kelas_id);?>">TIMELINE&nbsp;</a>
  		</li>
  		<li class="nav-item">
  			<a class="nav-link" href="<?= base_url('index.php/web/teachersiswa/'.$dt->kelas_id);?>">SISWA&nbsp;</a>
  		</li>
  		<li class="nav-item">
  			<a class="nav-link" href="<?= base_url('index.php/web/teachertentang/'.$dt->kelas_id);?>">MATERI&nbsp;</a>
  		</li>
  	</ul>
  </div>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
    <ul class="navbar-nav lead">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/web/logout');?>">KELUAR</a>
      </li>
    </ul>
  </div> 
</nav>


<style type="text/css">
	header{
		width: 100%;
		height: 350px;
		margin-top: 55px;
		background: url(<?= base_url('asset/images/header-card0.jpg');?>);
		color: #fff;
	}
	.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #fff;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 18px;
    color: #444;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #000;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<div id="mySidenav" class="sidenav">
	<br>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="<?= base_url('index.php/web'); ?>"><span class="fa fa-home fa-lg">&nbsp;</span> Kelas</a>
  <!-- <a href="#"><span class="fa fa-calendar fa-lg">&nbsp;</span> Kalender</a> -->
</div>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
$(document).ready(function(){
	$(".container").click(function(){
		$("#mySidenav").css("width","0");
	});
});
</script>