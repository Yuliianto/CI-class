
<header>
	<div style="background: rgba(232, 240, 254, 0.2); width: 100%;min-height: 350px;" class="position-absolute">
	</div>
	<div class="container position-sticky">
		<div class="row">
			<div class="col-md text-center">
				<p><br><br><br>
					<span class="h3"><?= $dt->kelas; ?></span>
					<div class="text-center">
					  	<img src="<?= base_url('asset/images/owner-male.png'); ?>" class="rounded  mx-auto d-block" alt="iBU uLFI" width="100"><br>
					  	<h4 class="font-weight-light"><?= $dt->nama; ?></h4>
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
							<?php foreach ($posting_tugas->result_array() as $t) { ?>
								<p class="font-weight-light text-muted"><?= $t['judul']; ?></p>
							<?php } ?>
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
							<p class="font-weight-light text-muted">-</p>
						</div>
					</div>
				</div>
			</div>&nbsp;
		</div>
		<div class="col-md">
			<?php
			foreach ($posting->result_array() as $p) {
				$jenis= $p['jenis'];
				$waktu= $p['waktu'];
				if ($jenis=="pengumuman") { 
					foreach ($posting_pengumuman->result_array() as $pp ) {
						if ($p['post_id']==$pp['post_id']) { 	
					?>
					<div class="card" id="panel-pengumuman">
						<div class=" border-bottom border-primary" style="background: #fff;">
							<div class="" style="">
								<div class="d-flex justify-content-start">
									<div class="p-2 align-items-stretch" style="background: #4F59FF;color: #fff;">
										<i class="fa fa-bullhorn fa-xs align-middle" style="margin:15px;">&nbsp;</i>
									</div>
									<div class="p-2">
										<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
									</div>
									<div class="p-2">
										<span class=""><?= $dt->nama ?><br><small class="text-muted"><?php echo $p['waktu']; ?></small></span>
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
											<?php echo $pp['pengumuman']; ?>
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
				<?php } } }elseif ($jenis=="tugas") { 
						foreach ($posting_tugas->result_array() as $pt ) {
							if ($p['post_id']==$pt['post_id']) {
						
						?>
					<div class="card" id="panel-tugas">
						<div class=" border-bottom border-primary" style="background: #fff;">
							<div class="" style="">
								<div class="d-flex justify-content-start">
									<div class="p-2 align-items-stretch bg-danger" style="color: #fff;">
										<i class="fa fa-clipboard fa-xs align-middle" style="margin:15px;">&nbsp;</i>
									</div>
									<div class="p-2">
										<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
									</div>
									<div class="p-2">
										<span class=""><?= $dt->nama; ?><br><small class="text-muted"><?php echo $p['waktu']; ?></small></span>
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
										<a href="#" class="btn btn-danger btn-sm">TUGAS</a>
									</div>
									<div class="p-2">
									</div>
									<div class="p-2">
									</div>
									<div class="ml-auto p-2 align-self-center">
										<a href="<?= base_url('index.php/web/detail'); ?>" class="btn btn-light btn-lg">OPEN</a>
									</div>
								</div>
								<div class="container">
									<div class="row">
										<div class="col-md">
											<span class="text-muted">batas waktu : <?php echo $pt['batas_waktu']; ?></span><br>
											<a href="" class="h2"><?php echo $pt['judul']; ?></a>
											<p>
												<?php echo $pt['instruksi']; ?>
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
				<?php } } } elseif($jenis='kuiz'){ 
							foreach ($posting_kuiz->result_array() as $pk) { 
								if ($p['post_id']==$pk['post_id']) {	
							?>
					<div class="card" id="panel-kuiz">
						<div class=" border-bottom border-primary" style="background: #fff;">
							<div class="" style="">
								<div class="d-flex justify-content-start">
									<div class="p-2 align-items-stretch bg-info" style=";color: #fff;">
										<i class="fa fa-laptop fa-xs align-middle" style="margin:15px;">&nbsp;</i>
									</div>
									<div class="p-2">
										<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
									</div>
									<div class="p-2">
										<span class=""><?= $dt->nama; ?><br><small class="text-muted"><?php echo $waktu; ?></small></span>
									</div>
									<div class="ml-auto p-2 align-self-center">
										<!-- <span class="text-uppercase" style="color: #0C9D58;"><i class="fa fa-check-circle fa-lg">&nbsp;</i>done late</span> -->
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">

								<div class="d-flex justify-content-start">
									<div class="p-2">
										<a href="#" class="btn btn-danger btn-sm">KUIZ</a>
									</div>
									<div class="p-2">
									</div>
									<div class="p-2">
									</div>
									<div class="ml-auto p-2 align-self-center">
<!-- 										<a href="<?= base_url('index.php/web/detail'); ?>" class="btn btn-light btn-lg">OPEN</a>
 -->									</div>
								</div>
								<div class="container">
									<div class="row">
										<div class="col-md">
											<?php echo $pk['soal']; ?>
											<div class="box-jawab">
												<div class="radio">
												  <label><input type="radio" name="optradio">&nbsp; Option 1</label>
												</div>
												<div class="radio">
												  <label><input type="radio" name="optradio">&nbsp; Option 2</label>
												</div>
												<div class="radio">
												  <label><input type="radio" name="optradio">&nbsp; Option 3</label>
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
				<?php }	} }
				echo "&nbsp;";
			} ?>
			
		</div>
	</div>
</div>
<br>