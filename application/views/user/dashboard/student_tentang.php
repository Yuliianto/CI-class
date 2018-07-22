
<!-- 
<header>
	<div style="background: rgba(232, 240, 254, 0.2); width: 100%;min-height: 350px;" class="position-absolute">
	</div>
	<div class="container position-sticky">
		<div class="row">
			<div class="col-md text-center">
				<p><br><br><br>
					<h3 class="">Kecerdasan Buatan UTY 2018</h3>
					<div class="text-center">
					  	<img src="<?= base_url('asset/images/owner-male.png'); ?>" class="rounded  mx-auto d-block" alt="iBU uLFI" width="100"><br>
					  	<h4 class="font-weight-light">Ulfi Aesyi</h4>
					</div>
				</p>
			</div>
		</div>
	</div>
</header> -->
<p></p><br><br>
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
								<span class="text-uppercase font-weight-normal">Enrol</span>
							</div>
							<p class="font-weight-light text-muted"><?= $dt->enrol; ?></p>
						</div>
					</div>
				</div>
			</div>&nbsp;
		</div>
		<div class="col-md">
			<div class="card">
				<div class="card-body">
					<p class="h3"><?= $dt->kelas; ?></p>
				</div>
			</div>
			<p></p>
			<div class="card">
				<div class="card-body">
					<p class="h3"> Materi </p>
					<div class="container" style="margin-top: 0px;">
	<div class="row justify-content-center">
		<div class="col">
			<?php 

				$bhn_path = "./uploads/materi/".$dt->enrol;
				$bhn_list = get_filenames($bhn_path);
				
				foreach ($bhn_list as $key => $file ) {?>
				<div class="d-flex justify-content-start border-muted border bg-light">
					<div class="p-2">
						<img class="d-inline" src="<?= base_url('asset/images/file.png'); ?>" alt="avatar-dosen" width="40">
					</div>
					<div class="p-2 align-self-center">
						<a href="<?php echo '/CI-class/uploads/'.$dt->enrol.'/'.$file; ?>" download><span><?php echo $file; ?></span></a> 
					</div>
				</div>
			<?php	}
			?>
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