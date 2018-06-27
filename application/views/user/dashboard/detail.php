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
	<div class="navbar-nav">
		<ul class="nav lead">
			<li class="nav-item">
			</li>
		</ul>
	</div>
  <!-- Navbar brand -->
    <div class="navbar-brand mb-0">
    	<!-- Toggler/collapsibe Button -->
		<a class="" href="<?= base_url('index.php/web/detail'); ?>"><span class="fa fa-arrow-left fa-lg nav-link"></span></a>
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
<p style="margin-top: 60px;"></p>
<div class="row" style="background-color: #34495E;color: #fff;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<br>
				<span class="text-muted ">batas waktu : 22 juni 2018, 00:00</span><br>
				<p class="h3 text-uppercase">Kecerdasan Buatan</p>
				<div class="d-flex justify-content-start">
					<div class="p-2">
						<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
					</div>
					<div class="p-2">
						<span class="">Nama Dosen<br><small class="text-muted">May 18</small></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container" >
	<div class="row justify-content-center">
		<div class="col-8">
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

selamat mengerjakan.
			</pre>
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

<link rel="stylesheet" type="text/css" href="<?= base_url('asset/vendor/dropzone/dropzone.min.css'); ?>">
<style>

		.dropzone {
			background: #fff;
			border: 2px dashed #ddd;
			border-radius: 5px;
		}

		.dz-message {
			color: #999;
		}

		.dz-message:hover {
			color: #464646;
		}

		.dz-message h3 {
			font-size: 200%;
			margin-bottom: 15px;
		}
	</style>
<div class="container" style="margin-top: 10px;">
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="container" style="background-color: #fff;">
			<br>
			<?= $error; ?>
			<form action="<?= base_url("index.php/control_upload/upload") ?>" id="my-dropzone" method="post" class="dropzone" enctype="multipart/form-data">
		  		<div class="fallback">
					<input name="file" type="file"  />
					<input type="submit" name="submit" value="upload">
				</div>
				<div class="dz-message">
					<h3>Drop files here</h3> or <strong>click</strong> to upload
				</div>
			</form>
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
<br>


<script type="text/javascript" src="<?= base_url('asset/vendor/dropzone/dropzone.min.js'); ?>"></script>

<script type="text/javascript">
		Dropzone.autoDiscover = false;
		var myDropzone = new Dropzone("#my-dropzone", {
			acceptedFiles: "image/*",
			addRemoveLinks: true,
			removedfile: function(file) {
				var name = file.name;

				$.ajax({
					type: "post",
					url: "<?= base_url("index.php/control_upload/remove")?>",
					data: { file: name },
					dataType: 'html'
				});

				// remove the thumbnail
				var previewElement;
				return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
			},
			init: function() {
				var me = this;
				$.get("<?= base_url("index.php/control_upload/list_files") ?>", function(data) {
					// if any files already in server show all here
					if (data.length > 0) {
						$.each(data, function(key, value) {
							var mockFile = value;
							me.emit("addedfile", mockFile);
							me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>uploads/" + value.name);
							me.emit("complete", mockFile);
						});
					}
				});
			}
		});
</script>

</body>
</html>