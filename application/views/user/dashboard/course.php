<link rel="stylesheet" type="text/css" href="<?= base_url('asset/vendor/dropzone/dropzone.min.css'); ?>">
<style>
		body {
			background: #f7f7f7;
			font-family: 'Montserrat', sans-serif;
		}
		a{
			color: #fff;
			text-decoration: none;
		}
		a:hover{
			color: #eee;
			text-decoration: none;
		}
	</style>
<div class="container-fluid" style="margin-top: 100px;">
	<div class="row">

		<?php
			if ($_SESSION['is_dosen']=='1') { ?>
				<!-- dosen -->
				<?php foreach ($kelas->result_array() as $i) { ?>
					<div class="col-3" style="min-width: 320px;">
						<div class="card">
							<div class="card-header rounded-0" style="color: #fff;background: url(<?= base_url("asset/images/header-card0.jpg"); ?>) red ; min-height: 100px; background-size: cover;">
								<div style="background: rgba(76, 175, 80, 0.2); width: 100%;min-height: 100px;position: absolute;top:0px;left: 0px;"></div>
								<div class="position-sticky">
							      	<a href="<?= base_url('index.php/web/teachertimeline/'.$i['kelas_id']);?>"><span class="card-title h3"><?= $i['kelas']; ?></span></a>
								    <a href="<?= base_url('index.php/web/delete_kelas/'.$i['kelas_id']); ?>"><b class="fa fa-trash pull-right"></b></a>

								</div>
							</div>
						    <div class="card-body rounded-0" style="min-height: 150px;">
						      <p class="card-text"><?= $i['deskripsi']; ?></p>
						    </div>
						    <div class="card-footer bg-dark rounded-0">
						      <a href="#" class="card-link pull-right"><i class="fa fa-folder"></i>&nbsp;&nbsp;</a>
						      <a href="#" class="card-link pull-right"><i class="fa fa-file"></i>&nbsp;&nbsp;</a>
						    </div>
						</div><br>
					</div> 
				<?php } ?>
		<?php	}else{ ?>
				<!-- mahasiswa -->
					<?php foreach ($kelas->result_array() as $i) {
					 ?>
						<div class="col-3" style="min-width: 320px;">
							<div class="card">
								<div class="card-header rounded-0" style="color: #fff;background: url(<?= base_url("asset/images/header-card1.jpg"); ?>) red ; min-height: 100px; background-size: cover;">
									<div style="background: rgba(76, 175, 80, 0.2); width: 100%;min-height: 100px;position: absolute;top:0px;left: 0px;"></div>
									<div class="position-sticky">
								      	<a href="<?= base_url('index.php/web/timeline');?>"><span class="card-title h3"><?= $i['nama']; ?></span></a>
								      	<a href="<?= base_url('index.php/web/do_delete_joined/'.$i['kelas_id']); ?>"><b class="fa fa-trash pull-right"></b></a>
									</div>
								</div>
							    <div class="card-body rounded-0" style="min-height: 150px;">
							      <p class="card-text"><?= $i['deskripsi']; ?></p>
							    </div>
							    <div class="card-footer bg-dark rounded-0">
							      <a href="#" class="card-link pull-right"><i class="fa fa-folder"></i>&nbsp;&nbsp;</a>
							      <a href="#" class="card-link pull-right"><i class="fa fa-file"></i>&nbsp;&nbsp;</a>
							    </div>
							</div><br>
						</div> 
					<?php } ?>
		<?php	}
		 ?>
	</div>
</div>