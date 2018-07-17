
<div class="container">
	<div class="row">
		<div class="col-md" style="padding-top:100px;">
			<?php
			foreach ($posting->result_array() as $p) {
				$jenis= $p['jenis'];
				$waktu= $p['waktu'];
				if($jenis='kuiz'){ 
							foreach ($posting_kuiz->result_array() as $pk) { 
								if ($p['post_id']==$pk['post_id'] && $pk['kuiz_id']== $kus_id) {	
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
 								</div>
								</div>
								<div class="container">
									<div class="row">
										<div class="col-md">
											<?php 
											foreach ($data_soal->result_array() as $s) {
											if ($pk['kuiz_id']==$s['kuiz_id']) {
											echo $s['soal']; ?>
											<p>
												<div class="box-jawab">
													<?php 
													foreach ($kuiz_pil->result_array() as $value) { 
														if ($s['soal_id']==$value['soal_id']) { ?>
														<div class="radio">
														  <label><input type="radio"  name="<?= $s['soal_id']; ?>" value="<?= $value['pilih_id']; ?>">&nbsp; <?= $value['pilih']; ?></label>
														</div>	

														<script type="text/javascript">
															$(document).ready(function(){

																var anggota  = "<?= $anggota->anggota_id; ?>";
																var soal 	 = "<?= $s['soal_id']; ?>";
																$.ajax({
																  method: "POST",
																  url: "<?= base_url('index.php/for_ajax/jawaban_saya'); ?>/<?= $dt->kelas_id; ?>",
																  data: { soal_id	 : soal,
																  		  anggota_id : anggota}
																	}).done(function( msg ) {
																    $("input[value="+msg+"]").attr("checked",true);
																  });
																});
														</script>
													<?php } } ?>
												</div>
											</p>
											<?php } } ?>
										</div>
									</div>
								</div>
						</div>
						<div class="card-footer" style="background-color: #fff;">
							<div class="d-flex justify-content-start">
								<div class="p-2">
									<!-- <img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40"> -->
								</div>
								<div class="p-2">
									<form class="form-row">
										<div class="row">
											<!-- <div class="col-auto">
												<textarea class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" style="height: 40px;width: 500px;resize: both;overflow: auto;" placeholder="Tulis komentar.."></textarea>
										    </div>
										    <div class="col-auto">
										    	<button class="btn btn-light" name="btn" value="batal">BATAL</button>
										    	<button class="btn btn-primary" name="btn" value="post">POST</button>
										    </div> -->
										    <a href="<?= base_url('index.php/web/timeline/'); ?><?= $dt->kelas_id; ?>" class="btn btn-danger">Selesai</a>
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


<script type="text/javascript">
	
	var jawab_id = 0;
	var anggota  = "<?= $anggota->anggota_id; ?>";
	var soal 	 = 0;
	$("input[type=radio]").click(function(){
		jawab_id = $(this).val();
		soal 	 = $(this).attr("name");

		//input
		$.ajax({
		  method: "POST",
		  url: "<?= base_url('index.php/for_ajax/cek_status'); ?>/<?= $dt->kelas_id; ?>",
		  data: { soal_id	 : soal,
		  		  pilih_id	 : jawab_id,
		  		  anggota_id : anggota}
			}).done(function( msg ) {
		     	status = msg;
		     	if (status=="true") {
		     		//Update
					$.ajax({
					  method: "POST",
					  url: "<?= base_url('index.php/for_ajax/update'); ?>/<?= $dt->kelas_id; ?>",
					  data: { soal_id	 : soal,
					  		  pilih_id	 : jawab_id,
					  		  anggota_id : anggota}
						}).done(function( msg ) {
					    /*alert( "Data : " + msg );*/
					  });
		     	}else{
		     		//Input
					$.ajax({
					  method: "POST",
					  url: "<?= base_url('index.php/for_ajax/jawab'); ?>/<?= $dt->kelas_id; ?>",
					  data: { soal_id	 : soal,
					  		  pilih_id	 : jawab_id,
					  		  anggota_id : anggota}
						}).done(function( msg ) {
					    /*alert( "Data : " + msg );*/
					  });
		     	}
		  });

		//input
		/*$.ajax({
		  method: "POST",
		  url: "<?= base_url('index.php/for_ajax/jawab'); ?>/<?= $dt->kelas_id; ?>",
		  data: { soal_id	 : soal,
		  		  pilih_id	 : jawab_id,
		  		  anggota_id : anggota}
			}).done(function( msg ) {
		    alert( "Data : " + msg );
		  });*/
	});

</script>