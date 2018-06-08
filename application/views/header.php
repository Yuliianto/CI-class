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
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <!-- Navbar brand -->
    <a class="navbar-brand" href=""><span class="font-weight-bold h4">E</span><span class="font-weight-light">-learning</span></a>
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>


  <!-- Navbar links -->
  <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="#"><span class="fa fa-plus"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><span class="fa fa-bell"></span></a>
        </li>
        <li class="navbar-nav nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""><span class="fa fa-user-circle"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" >        
            <a href="#" class="dropdown-item">Help</a>        
            <a href="#" class="dropdown-item">Account</a>        
            <a href="<?= base_url('index.php/web/logout'); ?>" class="dropdown-item">log out</i></a>
          </div>
        </li>
      </ul>
  </div> 
</nav>

  <footer id="site-footer" role="contentinfo">
  </footer><!-- #site-footer -->
</body>
</html>