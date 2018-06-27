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
    	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    <span class="fa fa-ellipsis-v"></span>
	  </button>
    	<span class="text-uppercase h4">Judul Course Kelas D 2018</span>
	</div>
  <!-- Navbar Center -->
  <div class="navbar-nav">
  	<ul class="nav lead">
  		<li class="nav-item">
  			<a class="nav-link active" href="<?= base_url('index.php/web/detail');?>">TIMELINE&nbsp;</a>
  		</li>
  		<li class="nav-item">
  			<a class="nav-link" href="<?= base_url('index.php/web/siswa');?>">SISWA&nbsp;</a>
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
	.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
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
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
$(document).ready(function(){
	$(".row","header").click(function(){
		$("#mySidenav").css("width","0");
	});
});
</script>
<header>
	<div style="background: rgba(232, 240, 254, 0.2); width: 100%;min-height: 350px;" class="position-absolute">
	</div>
	<div class="container position-sticky">
		<div class="row">
			<div class="col-md text-center">
				<p><br><br><br>
					<h3 class="">Kecerdasan Buatan UTY 2018</h3>
					<div class="text-center">
					  	<img src="<?= base_url('asset/images/owner-male.png'); ?>" class="rounded  mx-auto d-block" alt="iBU uLFI" width="100"><br>
					  	<h4 class="font-weight-light">Ulfi Aesyi</h4>
					</div>
				</p>
			</div>
		</div>
	</div>
</header>
&nbsp;
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="row">
				<div class="col">
					<div class="card rounded-0" style="background-color: #E3EBF9;">
						<div class="card-body">
							<div class="card-title">
								<span class="text-uppercase font-weight-normal">Daftar Tugas</span>
							</div>
							<p class="font-weight-light text-muted">Sejauh ini belum ada tugas</p>
						</div>
					</div>
				</div>
			</div>&nbsp;
			<div class="row">
				<div class="col">
					<div class="card rounded-0" style="background-color: #E3EBF9;">
						<div class="card-body">
							<div class="card-title">
								<span class="text-uppercase font-weight-normal">Topik</span>
							</div>
							<p class="font-weight-light text-muted">Sejauh ini belum ada tugas</p>
						</div>
					</div>
				</div>
			</div>&nbsp;
		</div>
		<div class="col-md">
			<div class="card">
				<div class=" border-bottom border-primary" style="background: #fff;">
					<div class="" style="">
						<div class="d-flex justify-content-start">
							<div class="p-2 align-items-stretch" style="background: #4F59FF;color: #fff;">
								<i class="fa fa-book fa-lg align-middle" style="margin:15px;">&nbsp;</i>
							</div>
							<div class="p-2">
								<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
							</div>
							<div class="p-2">
								<span class="">Nama Dosen<br><small class="text-muted">May 18</small></span>
							</div>
							<div class="ml-auto p-2 align-self-center">
								<span class="text-uppercase" style="color: #0C9D58;"><i class="fa fa-check-circle fa-lg">&nbsp;</i>done late</span>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
						<div class="d-flex justify-content-start">
							<div class="p-2">
								<a href="#" class="btn btn-light btn-sm">Topik</a>
							</div>
							<div class="p-2">
							</div>
							<div class="p-2">
							</div>
							<div class="ml-auto p-2 align-self-center">
								<a href="<?= base_url('index.php/web/detail_lagi'); ?>" class="btn btn-light btn-lg">OPEN</a>
							</div>
						</div>
						<div class="container">
							<div class="row">
								<div class="col-md">
									<span class="text-muted">batas waktu : 22 juni 2018, 00:00</span><br>
									<a href="" class="h2">Kuis Kecerdasan Buatan</a>
									<p>
										<pre>
kerjakan soal kuis yang Anda Unduh.
tulis jawaban dengan rapi dan jelas.
kemudian scan jawaban anda (boleh menggunakan aplikasi scanner HP).
cek file yang Anda kirim, supaya saya bisa membaca tulisan Anda.
format file : PDF
nama file : NIM

simpan lembar jawab Anda sebagai bahan UAS.

NB : saya berikan waktu tambahan untuk scan dan kirim..

selamat mengerjakan.</pre>
									</p>
									<div class="media border bg-light">
										<a href="#" class="pull-left">
											<img src="sdf.jpg" width="80" class="media-object">
										</a>
										<div class="media-body container">
											<p style="margin-top: 10px;">
											<a download href="<?= base_url('uploads/jst-jurnal.pdf'); ?>" class="media-heading h5">Kuis.pdf</a><br>
											<span class="text-muted">PDF</span>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
				<div class="card-footer" style="background-color: #fff;">
					<div class="d-flex justify-content-start">
						<div class="p-2">
							<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
						</div>
						<div class="p-2">
							<form class="form-row">
								<div class="row">
									<div class="col-auto">
										<textarea class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" style="height: 40px;width: 500px;resize: both;overflow: auto;" placeholder="Tulis komentar.."></textarea>
								    </div>
								    <div class="col-auto">
								    	<button class="btn btn-light" name="btn" value="batal">BATAL</button>
								    	<button class="btn btn-primary" name="btn" value="post">POST</button>
								    </div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>