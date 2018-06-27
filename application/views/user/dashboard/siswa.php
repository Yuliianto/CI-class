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
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    <span class="fa fa-ellipsis-v"></span>
	  </button>
    	<span class="text-uppercase h4">Judul Course Kelas D 2018</span>
	</div>
  <!-- Navbar Center -->
  	<div class="navbar-nav">
	  	<ul class="nav lead">
	  		<li class="nav-item">
	  			<a class="nav-link" href="<?= base_url('index.php/web/detail');?>">TIMELINE&nbsp;</a>
	  		</li>
	  		<li class="nav-item">
	  			<a class="nav-link active" href="<?= base_url('index.php/web/siswa');?>">SISWA&nbsp;</a>
	  		</li>
	  		<li class="nav-item">
	  			<a class="nav-link" href="<?= base_url('index.php/web/tentang');?>">TENTANG&nbsp;</a>
	  		</li>
	  	</ul>
  	</div>
  <!-- Navbar links -->
  <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
    <ul class="navbar-nav lead">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/web/logout');?>">LOG OUT</a>
      </li>
    </ul>
  </div> 
</nav>
<style type="text/css">
	header{
		width: 100%;
		height: 350px;
		margin-top: 55px;
		background: url(<?= base_url('asset/images/header-card1.jpg');?>);
		color: #fff;
	}
</style>

<div class="container" style="margin-top: 100px;">
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="d-flex justify-content-start border-muted border bg-light">
				<div class="p-2">
					<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
				</div>
				<div class="p-2 align-self-center">
					<span>Nama Dosen</span>
				</div>
			</div><br>
			<div class="d-flex justify-content-start border-muted border bg-light">
				<div class="p-2">
					<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
				</div>
				<div class="p-2 align-self-center">
					<span>Nama Dosen</span>
				</div>
			</div>
			<div class="d-flex justify-content-start border-muted border bg-light">
				<div class="p-2">
					<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
				</div>
				<div class="p-2 align-self-center">
					<span>Nama Dosen</span>
				</div>
			</div>
			<div class="d-flex justify-content-start border-muted border bg-light">
				<div class="p-2">
					<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
				</div>
				<div class="p-2 align-self-center">
					<span>Nama Dosen</span>
				</div>
			</div>
		</div>
	</div>
</div>