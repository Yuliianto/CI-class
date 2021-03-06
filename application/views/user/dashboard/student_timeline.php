<?php
    
    // Get time interval function
    function getTimeInterval($date) {
        
        // Set date as DateTime object
        $date = new DateTime ($date);
        
        // Set now as DateTime object
        $now = date ('Y-m-d H:i:s', time()); // If you want to compare two dates you both provide just delete this line and add a $now to the function parameter (ie. function getTimeInterval($date, $now))
        $now = new DateTime ($now);
        
        // Check if date is in the past or future and calculate timedifference and set tense accordingly
        if ($now >= $date) {
            $timeDifference = date_diff ($date , $now);
            $tense = " ago";
        } else {
            $timeDifference = date_diff ($now, $date);
            $tense = " until";
        }
        
        // Set posible periods (lowest first as to end result with the highest value that isn't 0)
        $period = array (" second", " minute", " hour", " day", " month", " year");
        
        // Set values of the periods using the DateTime formats (matching the periods above)
        $periodValue= array ($timeDifference->format('%s'), $timeDifference->format('%i'), $timeDifference->format('%h'), $timeDifference->format('%d'), $timeDifference->format('%m'), $timeDifference->format('%y'));
        
        // Loop through the periods (ie. seconds to years)
        for ($i = 0; $i < count($periodValue); $i++) {
            // If current value is different from 1 add 's' to the end of current period (ie. seconds)
            if ($periodValue[$i] != 1) {
                $period[$i] .= "s";
            }
            
            // If current value is larger than 0 set new interval overwriting the lower value that came before ensuring the result shows only the highest value that isn't 0
            if ($periodValue[$i] > 0) {
                $interval = $periodValue[$i].$period[$i].$tense; // ie.: 3 months ago
            }
        }
        
        // If any values were larger than 0 (ie. timedifference is not 0 years, 0 months, 0 days, 0 hours, 0 minutes, 0 seconds ago) return interval
        if (isset($interval)) {
            return $interval;
        // Else if no values were larger than 0 (ie. timedifference is 0 years, 0 months, 0 days, 0 hours, 0 minites, 0 seconds ago) return 0 seconds ago
        } else {
            return "0 seconds" . $tense;
        }
    }
    
    // Ex. (time now = November 23 2017)
    // getTimeInterval("2016-05-04 12:00:00"); // Returns: 1 year ago
    // getTimeInterval("2017-12-24 12:00:00"); // Returns: 1 month until
    
?>
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
								<span class="text-uppercase font-weight-normal">Enrol</span>
							</div>
							<p class="font-weight-light text-muted"><?= $dt->enrol; ?></p>
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
									<div class="ml-auto p-2 align-self-center text-muted">
										<!-- <span class="text-uppercase" style="color: #0C9D58;"><i class="fa fa-check-circle fa-lg">&nbsp;</i>done late</span> -->
										<?= getTimeInterval($waktu); ?>
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
						<div class="card-footer" style="">

							<?php foreach ($dt_komentar->result_array() as $komen) {
								if ($p['post_id']==$komen['post_id']) { ?>
								<div class="d-flex justify-content-start" class="comment-list">
									<div class="p-2">
										<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
									</div>
									<div class="col" style="">
										<p style="margin-top:10px;"><?= $komen['komentar']; ?><br><span class="text-muted"><?= $komen['waktu']; ?></span></p>
									</div>
								</div>
							<?php	}	} ?>
							<hr>
							<!-- form-komen -->
							<div class="d-flex justify-content-start">
								<div class="p-2">
									<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
								</div>
								<div class="col">
									<div class="form-group">
										<textarea class="form-control form-comment" placeholder="Tulis komentar.." name="<?= $p['post_id']; ?>"></textarea>
								    </div>
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
										<?php 
										foreach ($cek_upload->result_array() as $cekup) {
											if ($p['post_id']==$cekup['post_id']&&$cekup['murid_id']==$anggota->anggota_id) { ?>
										<span class="text-uppercase" style="color: #0C9D58;"><i class="fa fa-check-circle fa-lg">&nbsp;</i>Telah dikerjakan</span>
										<a href="<?= base_url('index.php/web/edit_tugas_upload/'.$p['post_id'].$dt->kelas_id.'/'.$dt->enrol.'/') ?>" class="">Edit</a> 
										<?php	} else{ ?>
										<!-- <span class="text-uppercase" style="color: #DC3545;"><i class="fa fa-exclamation fa-lg">&nbsp;</i>Belum dikerjakan</span> -->
										<?php } }
										 ?>
										
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
										<label class="btn btn-info btn-lg" id="open-upload" name="<?php echo $pt['post_id']; ?>">upload</label>
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
											<?php 
												$bhn_path = "./uploads/bahan_tugas/".$dt->enrol."/".$pt['post_id'];
												$bhn_list = get_filenames($bhn_path);
												if (! $bhn_list) {
													echo "tidak ada file";
												}else{
												foreach ($bhn_list as $key => $file ) { ?>
											<div class="media border bg-light">
												<div class="col d-flex justify-content-start border-muted border bg-light">
													<div class="p-2">
														<img class="d-inline" src="<?= base_url('asset/images/file.png'); ?>" alt="avatar-dosen" width="40">
													</div>
													<div class="p-2 align-self-center">
														<a href="<?php echo '/CI-class/uploads/bahan_tugas/'.$dt->enrol.'/'.$pt['post_id'].'/'.$file; ?>" download><span><?php echo $file; ?></span></a> 
													</div>
												</div>
											</div>
											<?php	} }
											?>
										</div>
									</div>
								</div>
						</div>
						<div class="card-footer" style="">

							<?php foreach ($dt_komentar->result_array() as $komen) {
								if ($p['post_id']==$komen['post_id']) { ?>
								<div class="d-flex justify-content-start" class="comment-list">
									<div class="p-2">
										<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
									</div>
									<div class="col" style="">
										<p style="margin-top:10px;"><?= $komen['komentar']; ?><br><span class="text-muted"><?= $komen['waktu']; ?></span></p>
									</div>
								</div>
							<?php	}	} ?>
							<hr>
							<!-- form-komen -->
							<div class="d-flex justify-content-start">
								<div class="p-2">
									<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
								</div>
								<div class="col">
									<div class="form-group">
										<textarea class="form-control form-comment" placeholder="Tulis komentar.." name="<?= $p['post_id']; ?>"></textarea>
								    </div>
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
										<a href="<?= base_url('index.php/web/lembar_kuiz'); ?>/<?= $dt->kelas_id; ?>/<?= $pk['kuiz_id']; ?>" class="btn btn-light btn-lg">OPEN</a>
 									</div>
								</div>
								<div class="container">
									<div class="row">
										<div class="col-md">
											<span class="h4"><?= $pk['deskrip']; ?></span>
											<?php 
											foreach ($data_soal->result_array() as $s) {
											if ($pk['kuiz_id']==$s['kuiz_id']) {
											/*echo $s['soal'];*/ ?>
											<p>
												<div class="box-jawab">
													
												</div>
											</p>
											<?php } } ?>
										</div>
									</div>
								</div>
						</div>
						
						<div class="card-footer" style="">

							<?php foreach ($dt_komentar->result_array() as $komen) {
								if ($p['post_id']==$komen['post_id']) { ?>
								<div class="d-flex justify-content-start" class="comment-list">
									<div class="p-2">
										<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
									</div>
									<div class="col" style="">
										<p style="margin-top:10px;"><?= $komen['komentar']; ?><br><span class="text-muted"><?= $komen['waktu']; ?></span></p>
									</div>
								</div>
							<?php	}	} ?>
							<hr>
							<!-- form-komen -->
							<div class="d-flex justify-content-start">
								<div class="p-2">
									<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
								</div>
								<div class="col">
									<div class="form-group">
										<textarea class="form-control form-comment" placeholder="Tulis komentar.." name="<?= $p['post_id']; ?>"></textarea>
								    </div>
								</div>
							</div>
						</div>
					</div>

											<script type="text/javascript">
												$(document).ready(function(){

													var anggota  = "<?= $anggota->anggota_id; ?>";
													var soal 	 = "<?= $pk['soal_id']; ?>";
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

				<?php }	} }
				echo "&nbsp;";
			} ?>
			
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
    width: 60%;
}
</style>
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

<div id="Modal-upload" class="modal">
  <!-- Modal Content -->
  <div class="modal-content">
    <label class="h3">Upload tugas anggota <span class="close close-create btn btn-light">&times;</span></label>
    	
    <form action="<?= base_url('index.php/web/up_mhs/'.$dt->enrol.'/'.$dt->kelas_id); ?>" method="post">
    	<div class="form-group">
      		<input type="hidden" name="dir_up" value="<?php echo './uploads/upload_mhs/'.$dt->enrol."/"; ?>">
        	<input type="hidden" name="murid_id" value="<?= $anggota->anggota_id; ?>">
      		<input type="hidden" name="post_id" value="">
      	</div>
      	<div class="form-group">
      		<input type="submit" name="submit" value="upload" class="btn btn-primary">
      	</div>
    </form>
        <?= validation_errors(); ?>
    
	<form action="<?= base_url("index.php/control_upload/upload_tugas_murid/") ?><?= $dt->enrol; ?>/" id="my-dropzone" method="post" class="dropzone" enctype="multipart/form-data">
  		<div class="fallback">
			<input name="file" type="file"  />
			<input type="submit" name="submit" value="upload">
		</div>
		<div class="dz-message">
			<h3>Drop files here</h3> or <strong>click</strong> to upload<br><label class="">max. 2 MB</label>
		</div>
	</form>
  </div>
</div>
<script type="text/javascript">
	var dir_up = $("input[name=dir_up]");
	$("#open-upload").click(function(){
		$("input[name=post_id]").val($(this).attr("name"));
		$("input[name=dir_up]").val(dir_up.val()+$(this).attr("name"));
		$("#Modal-upload").css("display","block");
	});
   $('.close').click(function(){
   		$('.modal').css('display','none');
   });
</script>

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

	// KOMENTAR 
	var user_id = <?= $_SESSION['user_id']; ?>;
	$(".form-comment").bind("enterKey",function(e){
		var txt_komen = $(this).val();
		var p_id 	  = $(this).attr('name');
		$.ajax({
		  method: "POST",
		  url: "<?= base_url('index.php/for_ajax/komentar'); ?>/<?= $dt->kelas_id; ?>",
		  data: { user_id	 : user_id,
		  		  txt_komen	 : txt_komen,
		  		  p_id 		 : p_id}
			}).done(function( msg ) {
		    // alert( "Data : " + msg );
		    location.reload();
		  });	
	});
	$(".form-comment").keyup(function(e){
		if (e.keyCode ==  13) {
			$(this).trigger("enterKey");
		}
	});
</script>


<script type="text/javascript" src="<?= base_url('asset/vendor/dropzone/dropzone.min.js'); ?>"></script>
<script type="text/javascript">
		Dropzone.autoDiscover = false;
		var myDropzone = new Dropzone("#my-dropzone", {
			acceptedFiles: ".pdf,.doc,.docx,.jpg,.jpeg,.png",
			maxFilesize: 2, // MB
			addRemoveLinks: true,
			removedfile: function(file) {
				var name = file.name;

				$.ajax({
					type: "post",
					url: "<?= base_url("index.php/control_upload/remove_tugas_dosen/")?><?= $dt->enrol; ?>/<?= $last_row->post_id+1; ?>",
					data: { file: name },
					dataType: 'html'
				});

				// remove the thumbnail
				var previewElement;
				return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
			},
			init: function() {
				var me = this;
				$.get("<?= base_url("index.php/control_upload/list_files_tugas_dosen/") ?><?= $dt->enrol; ?>/<?= $last_row->post_id+1; ?>", function(data) {
					// if any files already in server show all here
					if (data.length > 0) {
						$.each(data, function(key, value) {
							var mockFile = value;
							me.emit("addedfile", mockFile);
							me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>uploads/<?= $dt->enrol; ?>/<?= $last_row->post_id+1; ?>/" + value.name);
							me.emit("complete", mockFile);
						});
					}
				});
			}
		});
</script>