

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
			foreach ($siswa->result_array() as $s) { ?>
				<div class="d-flex justify-content-start border-muted border bg-light">
					<div class="p-2">
						<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
					</div>
					<div class="p-2 align-self-center">
						<span><?php echo $s['nama']; ?></span>
					</div>
				</div>
			<?php }
			 ?>
		</div>
	</div>
</div>