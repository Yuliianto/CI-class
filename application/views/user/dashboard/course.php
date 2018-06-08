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
		<?php for ($i=0; $i < 4; $i++) { ?>
			<div class="col-3" style="min-width: 320px;">
				<div class="card">
					<div class="card-header rounded-0" style="color: #fff;background: url(<?= base_url("asset/images/header-card$i.jpg"); ?>) red ; min-height: 100px; background-size: cover;">
						<div style="background: rgba(76, 175, 80, 0.2); width: 100%;min-height: 100px;position: absolute;top:0px;left: 0px;"></div>
						<div class="position-sticky">
					      	<a href="<?= base_url('index.php/web/detail');?>"><span class="card-title h3">Card title</span></a><b class="fa fa-trash pull-right"></b>
						</div>
					</div>
				    <div class="card-body rounded-0" style="min-height: 150px;">
				      <p class="card-text">Some example text. Some example text. Infromasi tentang class ada disini semua silakan klik kotak ini </p>
				    </div>
				    <div class="card-footer bg-dark rounded-0">
				      <a href="#" class="card-link pull-right"><i class="fa fa-folder"></i>&nbsp;&nbsp;</a>
				      <a href="#" class="card-link pull-right"><i class="fa fa-file"></i>&nbsp;&nbsp;</a>
				    </div>
				</div><br>
			</div> 
		<?php } ?>
	</div>
</div>