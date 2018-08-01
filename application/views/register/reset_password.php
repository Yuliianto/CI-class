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
			color: #fff;
		}
	</style>
</head>
<body style="background:#274164;">

<div class="container">
	<div class="row justify-content-md-center">
		<div class="col">
			<div class="container text-center" style="margin-top:5%;">
			<span class="h2 text-uppercase">Form Reset Password</span><br><br>
			  <div class="panel panel-default" style="background:#fff; padding:50px;">
			    <div class="panel-heading"></div>
			    <div class="panel-body">
			    	<label class="text-primary lead text-uppercase">Lupa password</label>
			    	<p class="text-muted">
			    		ketik email kemudian enter untuk mencari data anda
			    	</p>
			    	<div class="form-group">
				    	<input type="email" name="email" required class="form-control text-center" placeholder="contoh (budi.perdana@hotmail.com)">
			    	</div>
			    	<div class="container" style="color:#444;" id="lookup">
			    		<table class="table">
			    			<thead>
			    				<th>Nama anda</th>
			    			</thead>
			    		</table>
			    		<p class="text-muted">sistem akan mengirim password baru ke email anda</p>
			    		<button class="btn btn-primary" disabled>kirim</button>
			    	</div>
			    	
			    </div>
			    <div class="panel-footer">
			    	<br><a href="<?= base_url('index.php'); ?>" class="">kembali</a>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>
&nbsp;

<script type="text/javascript">
	$("input[type=email]").bind("enterKey",function(e){
		var email = $(this).val();
		$.ajax({
		  method: "POST",
		  url: "<?= base_url('index.php/for_ajax/check_email'); ?>",
		  data: { email	 : email}
			}).done(function( msg ) {
		     $("th").text(msg).css('color','#00f');
		     if (msg != "user tidak terdaftar") {
		     	$("button").attr("disabled",false);
		     }else if(msg == "user tidak terdaftar"){
		     	$("button").attr("disabled",true);
		     };
		    // location.reload();
		  });
	});
	$("input[type=email]").keyup(function(e){
		if (e.keyCode ==  13) {
			$(this).trigger("enterKey");
		}
	});

	$("button").click(function() {
		var email = $("input[type=email]").val();
		$.ajax({
		  method: "POST",
		  url: "<?= base_url('index.php/for_ajax/kirim_email'); ?>",
		  data: { email	 : email}
			}).done(function( msg ) {
		    alert(msg);
		    // location.reload();
		  });
	});
</script>

<style type="text/css">
  a {
    color: #3D89CD;
  }
  a:hover{
    text-decoration: none;
    color: #4267B2;
  }
</style>