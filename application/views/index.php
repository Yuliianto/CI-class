<!DOCTYPE html>
<html>
<head>
	<title>E-LEARNING</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/bootstrap.css'?>">

	<!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url().'asset/vendor/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'asset/css/coming-soon.min.css';?>" rel="stylesheet">
</head>
<body>

    <div class="overlay"></div>

    <div class="masthead">
      <div class="masthead-bg"></div>
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-12 my-auto">
            <div class="masthead-content text-white py-5 py-md-0">
				<div class="contaner">
					<div class="row">


    <?php if (validation_errors()) : ?>
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= validation_errors() ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if (isset($error)) : ?>
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    <?php endif; ?>

						<div class="col-md-12">
							<div class="page-header" style="text-align: center;">
								<h1>Login</h1>
							</div>
							<form role="form" action="<?= base_url(''); ?>" method="post">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Your username">
								</div>
								<!-- <div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Your password">
								</div> -->
								<div class="form-group" style="text-align: center;">
									<input type="submit" class="btn btn-danger" value="Login">
                  
								</div>
							</form>
              <div class="text-center">
                  
              </div>
						</div>	
					</div>
				</div>
            </div>
          </div>
        </div>
      </div>
  	</div>
    <div class="social-icons">
      <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
          <a href="https://twitter.com/Yulianto_SE">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="https://www.facebook.com/loempang">
            <i class="fa fa-facebook"></i>
          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="https://www.instagram.com/julian.404/">
            <i class="fa fa-instagram"></i>
          </a>
        </li>
      </ul>
    </div>
<style type="text/css">
  a {
    color: #fff;
  }
  a:hover{
    text-decoration: none;
    color: #3D89CD;
  }
</style>
<script src="<?php echo base_url().'asset/js/bootstrap.js' ?>"></script>

    <script src="<?php echo base_url();?>asset/vendor/jquery/jquery.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url();?>asset/vendor/vide/jquery.vide.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url();?>asset/js/coming-soon.min.js"></script>
</body>
</html>