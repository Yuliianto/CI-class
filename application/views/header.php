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
        <li class="navbar-nav nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-plus"></span></a>
          <div class="dropdown-menu dropdown-menu-right rounded-0" >        
            <a href="#" class="dropdown-item" id="myBtn">Join</a>        
            <a href="#" class="dropdown-item" id="btnCreate">Create</a>        
          </div>
        </li>
        <li class="navbar-nav nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""><span class="fa fa-bell"></span></a>
          <div class="dropdown-menu dropdown-menu-right rounded-0" >        
            <a href="#" class="dropdown-item">Help</a>        
            <a href="#" class="dropdown-item">Account</a>        
            <a href="<?= base_url('index.php/web/logout'); ?>" class="dropdown-item">log out</i></a>
          </div>
        </li>
        <li class="navbar-nav nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""><span class="fa fa-user-circle"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right rounded-0" >        
            <a href="#" class="dropdown-item">Help</a>        
            <a href="#" class="dropdown-item">Account</a>        
            <a href="<?= base_url('index.php/web/logout'); ?>" class="dropdown-item">log out</i></a>
          </div>
        </li>
      </ul>
  </div> 
</nav>

<style>

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
}

</style>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal Content -->
  <div class="modal-content">
    <label class="h3">Gabung kelas 
        <span class="close btn btn-light">&times;</span></label>
    <p class="text-muted">Tanyakan kode kelas kepada dosen anda</p>
    <form>
      <div class="form-group">
        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="" placeholder="Kode kelas">
      </div>
      <div class="form-group">      
        <button type="submit" name="submit" class="btn btn-primary">Gabung</button>  
      </div>
    </form>
  </div>
</div>

<!-- The Modal -->
<div id="myCreate" class="modal">
  <!-- Modal Content -->
  <div class="modal-content">
    <label class="h3">Buat kelas 
        <span class="close close-create btn btn-light">&times;</span></label>
    <form>
      <div class="form-group">
        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="" placeholder="Nama kelas">
      </div>
      <div class="form-group">
        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="" placeholder="Section">
      </div>
      <div class="form-group">
        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="" placeholder="Subject">
      </div>
      <div class="form-group">      
        <button type="submit" name="submit" class="btn btn-primary">Buat</button>  
      </div>
    </form>
  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$(document).ready(function(){
  $("#btnCreate").click(function(){
    $("#myCreate").css("display","block");
  });
  $(".close-create").click(function(){
    $("#myCreate").css("display","none");
  });
});

</script>

  <footer id="site-footer" role="contentinfo">
  </footer><!-- #site-footer -->
</body>
</html>