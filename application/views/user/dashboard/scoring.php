<div class="container" style="margin-top: 100px;">
	<div class="row justify-content-center">
		<div class="col-8">
			<br>
			<?php
			
			foreach ($cek_jwb_kuiz->result_array() as $cek) { ?>
				<div class="d-flex justify-content-start border-muted border bg-light">
					<div class="p-2">
						<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
					</div>
					<div class="p-2 align-self-center">
						<span><?php echo "anggota : ".$cek['anggota_id']."| jawaban : ".$cek['jawaban']; ?> = <?= "soal : ".$cek['soal']."|kunci :".$cek['kunci']; ?></span>
					</div>
					<div class="ml-auto p-2 align-self-center">
						
					</div>
				</div>
			<?php }
			 ?>
		</div>
	</div>
</div>