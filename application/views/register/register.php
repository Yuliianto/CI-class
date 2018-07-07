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
		#side{
			background: url(<?=  base_url('asset/images/header-card1.jpg'); ?>);
			background-size: cover;
			color: #fff;
		}
	</style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #104f60;">
  <!-- Navbar brand -->
    <a class="navbar-brand" href=""><span class="font-weight-bold h4">E</span><span class="font-weight-light">-learning</span></a>
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>">LOGIN</a>
      </li>
      <li class="nav-item  active">
        <a class="nav-link" href="<?= base_url('index.php/web/register'); ?>">SIGN UP</a>
      </li>
    </ul>
  </div> 
</nav>

<div class="container " style="margin-top:100px; box-shadow: 0px 10px 70px -26px rgba(0,0,0,0.59);">
	<div class="row">
			<div class="col-md-6" style="">
				<div class="card rounded-0 border-0">
					<div class="card-body">
						<div class="card-title">						
							<h2>Register account</h2>
							<hr>
						</div>
						<div>
							<?php if (validation_errors()) : ?>
									<div class="alert alert-danger" role="alert">
										<?= validation_errors() ?>
									</div>
							<?php endif; ?>
							<?php if (isset($error)) : ?>
									<div class="alert alert-danger" role="alert">
										<?= $error ?>
									</div>
							<?php endif; ?>
						</div>
						
						<form class="" role="form" action='<?= base_url('index.php/web/register');?>' method="post">

							<div class="form-group row">
								<label for='username' class="col-sm-4 col-form-label">Username</label>
								<div class="col-sm-4">
									<input type="text" name="username" class="form-control" placeholder="Nim / Nip">
								</div>
							</div>
							<div class="form-group row">
								<label for='email' class="col-sm-4 col-form-label">Email</label>
								<div class="col">
									<input type="email" name="email" class="form-control" placeholder="Enter email" style="max-width: 420px;">
								</div>
							</div>
							<div class="form-group row">
								<label for='password' class="col-sm-4 col-form-label">Password</label>
								<div class="col-sm-6">
									<input type="password" name="password" class="form-control" placeholder="Enter password" style="max-width: 320px;">
								</div>
							</div>
							<div class="form-group row">
								<label for='paskonfirm' class="col-sm-4 col-form-label">Konfirm Password</label>
								<div class="col-sm-6">
									<input type="password" name="password_confirm" class="form-control" placeholder="Enter Konfirm Password" style="max-width: 320px;">
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<input type="submit" name="regis" class="btn btn-primary " value="Register">									
								</div>
							</div>
						</form>
					</div>
				</div>	
			</div>
			<div class="col-md-6 text-center" id="side">
				<br><br><br><br><br><br>
				<span class="h3">Gabung bersama teman - teman mahasiswa lainnya</span>
			</div>
	</div>
</div>