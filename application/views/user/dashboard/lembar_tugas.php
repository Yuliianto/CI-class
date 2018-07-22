<div class="container" style="margin-top: 100px;">
	<div class="row justify-content-center">
		<div class="col-8"><!-- 
			<div class="d-flex justify-content-start border-muted border bg-light">
				<div class="p-2">
					<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
				</div>
				<div class="p-2 align-self-center">
					<span>Nama Dosen</span>
				</div>
			</div> --><br>
			<?php
			foreach ($cek_tugas->result_array() as $cek) { ?>
				<div class="d-flex justify-content-start border-muted border bg-light">
					<div class="p-2">
						<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
					</div>
					<div class="p-2 align-self-center">
						<span><?php echo $cek['nama']; ?></span>
					</div>
					<div class="ml-auto p-2 align-self-center">
						<?php 
						$files = get_filenames($cek['dir_upload']); 
							foreach ($files as $key => $file) { 
								$replace = str_replace("/var/www/html", "", realpath($cek['dir_upload']).'/'.$file);
								?>
							<a href="<?= $replace; ?>" download><?= $file; ?></a><br>
							<?php } ?>
					</div>
				</div>
			<?php }
			 ?>
		</div>
	</div>
</div>