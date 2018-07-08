
<header>
	<div style="background: rgba(232, 240, 254, 0.2); width: 100%;min-height: 350px;" class="position-absolute">
	</div>
	<div class="container position-sticky">
		<div class="row">
			<div class="col-md text-center">
				<p><br><br><br>
					<h3 class="">Kelas Baca Tulis</h3>
					<div class="text-center">
					  	<img src="<?= base_url('asset/images/owner-male.png'); ?>" class="rounded  mx-auto d-block" alt="iBU uLFI" width="100"><br>
					  	<h4 class="font-weight-light">Mr. Johan</h4>
					</div>
				</p>
			</div>
		</div>
	</div>
</header>
&nbsp;
<style type="text/css">
.btn-round {
	padding: 9px 3px 5px 5px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.btn-round.btn-lg {
    width: 48px;
    height: 48px;
}

.btn-round.btn-sm {
    width: 34px;
    height: 34px;
}

.btn-round.btn-xs {
    width: 24px;
    height: 24px;
}
</style>

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
			<div class="container">
				<a href="#" class="btn btn-primary btn-round btn-lg btn-pengumuman" data-toggle="tooltip" data-placement="top" title="pengumuman"><span class="fa fa-bullhorn fa-xs"></span></a>
				<a href="#" class="btn btn-danger btn-round btn-lg btn-tugas" data-toggle="tooltip" data-placement="top" title="tugas"><span class="fa fa-clipboard fa-xs"></span></a>
				<a href="#" class="btn btn-info btn-round btn-lg btn-kuiz" data-toggle="tooltip" data-placement="top" title="kuiz"><span class="fa fa-laptop fa-xs"></span></a>
			</div>
			&nbsp;
			<div class="card" id="panel-tugas">
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
						<!-- <div class="d-flex justify-content-start">
							<div class="p-2">
								<a href="#" class="btn btn-light btn-sm">Topik</a>
							</div>
							<div class="p-2">
							</div>
							<div class="p-2">
							</div>
							<div class="ml-auto p-2 align-self-center">
								<a href="<?= base_url('index.php/web/detail'); ?>" class="btn btn-light btn-lg">OPEN</a>
							</div>
						</div> -->
						<div class="container">
							<div class="row">
								<div class="col-md">
									<span class="text-muted">batas waktu : 22 juni 2018, 00:00</span><br>
									<a href="" class="h4">Kuis Kecerdasan Buatan</a>
									<p>
										test postingan
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
			&nbsp;
			<div class="card" id="panel-pengumuman">
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
								<!-- <span class="text-uppercase" style="color: #0C9D58;"><i class="fa fa-check-circle fa-lg">&nbsp;</i>done late</span> -->
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
						<div class="container">
							<div class="row">
								<div class="col-md">
									Pengumuman besok kuliahnya libur yaa selamat berlibur :)
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


<!-- The Modal -->
<style type="text/css">

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
<div id="Modal-pengumuman" class="modal">
  <!-- Modal Content -->
  <div class="modal-content">
    <label class="h3">Buat kelas 
        <span class="close close-create btn btn-light">&times;</span></label>
        <?= validation_errors(); ?>
    <form action="<?= base_url('index.php/web/dashboard'); ?>" method="post">
      <div class="form-group">
        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="nama" placeholder="Nama kelas">
      </div>
      <div class="form-group">
        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="section" placeholder="Section">
      </div>
      <div class="form-group">
        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="deskripsi" placeholder="Subject">
      </div>
      <div class="form-group">      
        <input type="submit" name="submit" class="btn btn-primary" value="Buat" />  
      </div>
    </form>
  </div>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".btn-pengumuman").click(function(){
    	$(".modal").css("display","block");
    }); 
});
</script>