
<header>
	<div style="background: rgba(232, 240, 254, 0.2); width: 100%;min-height: 350px;" class="position-absolute">
	</div>
	<div class="container position-sticky">
		<div class="row">
			<div class="col-md text-center">
				<p><br><br><br>
					<h3 class=""><?= $dt->kelas; ?></h3>
					<span class="h4"></span>
					<div class="text-center">
					  	<img src="<?= base_url('asset/images/owner-male.png'); ?>" class="rounded  mx-auto d-block" alt="iBU uLFI" width="100"><br>
					  	<h4 class="font-weight-light"><?= $dt->nama;?></h4>
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
.fixed {
    position: fixed;
    bottom: 0;
    padding-bottom: 10px;
    right: 0;
    z-index: 1;
    text-align: right;
}
.fixed a{
	margin: 10px;
}
.kotak{
	position: fixed;
	top: 0;
	width: 100%;
	height: 100%;
	background-color: none;
}
.form-control:focus{
	outline: none;
	box-shadow: none;
}

/* Use a media query to add a break point at 800px: */
@media screen and (max-width:800px) {
  .modal .modal-content{
    width: 100%; /* The width is 100%, when the viewport is 800px or smaller */
  }
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
			foreach ($posting -> result_array() as $p) {
				$jenis = $p['jenis'];
				$waktu = $p['waktu'];
				switch ($jenis) {
					case 'pengumuman':
								foreach ($posting_pengumuman->result_array() as $pp) {
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
													<span class=""><?= $dt->nama; ?><br><small class="text-muted"><?php echo $waktu; ?></small></span>
												</div>
												<div class="ml-auto p-2 align-self-center">
													<!-- <span class="text-uppercase" style="color: #0C9D58;"><i class="fa fa-check-circle fa-lg">&nbsp;</i>done late</span> -->
													<a onclick="confirm('Pengumuman akan dihapus')" href="<?= base_url('index.php/web/hapus_posting/'.$p['post_id'].'/'.$dt->enrol.'/'.$dt->kelas_id); ?>" class="btn btn-danger btn-round btn-lg" data-toggle="tooltip" data-placement="top" title="hapus"><span class="fa fa-trash fa-xs"></span></a>
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
													<p style="margin-top:10px;">
														<strong><?= $komen['email']; ?></strong><br>
														<?= $komen['komentar']; ?><br><span class="text-muted"><?= $komen['waktu']; ?></span></p>
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
							<?php } } 
						break;
					case 'tugas':
									foreach ($posting_tugas->result_array() as $pt) {
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
													<span class="h5"><?= $dt->nama; ?><br><small class="text-muted"><?php echo $waktu; ?></small></span>
												</div>
												<div class="ml-auto p-2 align-self-center">
													<!-- <span class="text-uppercase" style="color: #0C9D58;"><i class="fa fa-check-circle fa-lg">&nbsp;</i>done late</span> -->
													<a onclick="confirm('tugas akan dihapus')" href="<?= base_url('index.php/web/hapus_posting/'.$p['post_id'].'/'.$dt->enrol.'/'.$dt->kelas_id); ?>" class="btn btn-danger btn-round btn-lg" data-toggle="tooltip" data-placement="top" title="hapus"><span class="fa fa-trash fa-xs"></span></a>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">

								<div class="d-flex justify-content-start">
									<div class="p-2">
										<!-- <a href="#" class="btn btn-danger btn-sm"></a> -->
									</div>
									<div class="p-2">
									</div>
									<div class="p-2">
									</div>
									<div class="ml-auto p-2 align-self-center">
										<a href="<?= base_url('index.php/web/lembar_tugas'); ?>/<?= $p['post_id'].'/'.$dt->kelas_id; ?>" class="btn btn-light btn-lg">OPEN</a>
 									</div>
								</div>
											<div class="container">
												<div class="row">
													<div class="col-md">
														<span class="text-muted">batas waktu : <?php echo $pt['batas_waktu']; ?></span><br>
														<a href="" class="h4"><?php echo $pt['judul']; ?></a>
														<?php echo $pt['instruksi']; ?>	
														<?php 
															$bhn_path = "./uploads/bahan_tugas/".$dt->enrol."/".$pt['post_id'];
															$bhn_list = get_filenames($bhn_path);
															if (! $bhn_list) {
																echo "tidak ada file";
															}else{
															?> <a href="<?= base_url('index.php/web/edit_bahan/'.$p['post_id'].'/'.$dt->enrol.'/') ?>" class="">Edit</a> <?php
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
													<p style="margin-top:10px;">
														<strong><?= $komen['email']; ?></strong><br>
														<?= $komen['komentar']; ?><br><span class="text-muted"><?= $komen['waktu']; ?></span></p>
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
							<?php } }
						break;
					case 'kuiz':
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
													<a onclick="confirm('Kuis akan dihapus')" href="<?= base_url('index.php/web/hapus_posting/'.$p['post_id'].'/'.$dt->enrol.'/'.$dt->kelas_id); ?>" class="btn btn-danger btn-round btn-lg" data-toggle="tooltip" data-placement="top" title="hapus"><span class="fa fa-trash fa-xs"></span></a>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">

								<div class="d-flex justify-content-start">
									<div class="p-2">
										<!-- <a href="#" class="btn btn-danger btn-sm"></a> -->
									</div>
									<div class="p-2">
									</div>
									<div class="p-2">
									</div>
									<div class="ml-auto p-2 align-self-center">
										 <a href="<?= base_url('index.php/web/scoring'); ?>/<?= $pk['kuiz_id'].'/'.$dt->kelas_id; ?>" class="btn btn-light btn-lg">OPEN</a>
 									</div>
								</div>
											<div class="container">
												<div class="row">
													<div class="col-md">
														<p><?= $pk['deskrip']; ?></p>
														<?php foreach ($data_soal->result_array() as $s) {
															if ($pk['kuiz_id']==$s['kuiz_id']) {
														  /*echo $s['soal'];*/ ?>
														<p>
															<?php 
															foreach ($kuiz_pil->result_array() as $value) { 
																if ($s['soal_id']==$value['soal_id']) { ?>
																<!-- <div class="radio">
																  <label><input type="radio" disabled name="pijwb" value="<?= $value['pilih']; ?>">&nbsp; <?= $value['pilih']; ?></label> 
																</div> -->
															<?php } } ?>
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
													<p style="margin-top:10px;">
														<strong><?= $komen['email']; ?></strong><br>
														<?= $komen['komentar']; ?><br><span class="text-muted"><?= $komen['waktu']; ?></span></p>
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
							<?php } } 
						break;
					
					default:
						echo "kosong";
						break;
				}
				/*if ($jenis=='pengumuman') { }elseif ($jenis='tugas') {  }elseif($jenis='kuiz'){ }*/
				echo "&nbsp;";
			}
			 ?>
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
    padding: 50px;
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
<div id="Modal-pengumuman" class="modal">
  <!-- Modal Content -->
  <div class="modal-content">
    <label class="h3">Pengumuman 
        <span class="close close-create btn btn-light">&times;</span></label>
        <?= validation_errors(); ?>
    <form action="<?= base_url('index.php/web/post_pengumuman/'.$dt->kelas_id); ?>" method="post">
      <div class="form-group">
      	<textarea class="form-control textarea-tiny" style="height:120px;" name="pengumuman"></textarea>
      </div>
      <div class="form-group">      
        <input type="submit" name="submit" class="btn btn-primary btn-lg pull-right" value="Buat" />  
      </div>
    </form>
  </div>
</div>

<div id="Modal-tugas" class="modal">
  <!-- Modal Content -->
  <div class="modal-content">
    <label class="h3">Tugas 
        <span class="close close-create btn btn-light">&times;</span>
        <hr>
    </label>
        <?= validation_errors(); ?>
    <form action="<?= base_url('index.php/web/post_tugas/'.$dt->kelas_id); ?>" method="post">
      <div class="form-group">
      	<input type="hidden" name="enrol" value="<?php echo $dt->enrol; ?>">
        <input type="hidden" name="path_materi" value="<?php echo $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/bahan_tugas/'.$dt->enrol."/"; ?>">
      </div>
      <div class="form-group">
        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="judul" placeholder="judul">
      </div>
      <div class="form-group row">
      	<label for="date" class="col-sm-4 col-form-label">Batas waktu </label>
      	<div class="col-sm-8">
      	        <input type="date" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="batas_waktu" >
		</div>
      </div>
      <div class="form-group row">
      	<label for="unggah" class="col-sm-4 col-form-label" >file </label>
      	<label id="btn-upload-file" class="btn btn-info btn-sm">pilih file</label> 
      </div>
      <div class="form-group">
      	<textarea class="form-control textarea-tiny" style="height: 240px;" name="instruksi"></textarea>
      </div>
      <div class="form-group">      
        <input type="submit" name="submit" class="btn btn-primary btn-lg pull-right" value="Buat" />  
      </div>
    </form>
    
		<div class="modal" id="modal-upload">
			<script type="text/javascript">
				/*var path = $("input[name=path_materi]").val();
				alert(path);*/
			</script>
			<div class="modal-content">
		    	<label class="h3">Upload 
		        	<span class="close-upload btn btn-light pull-right">&times;</span>
		    	</label>
		    	<form action="<?= base_url("index.php/control_upload/upload_tugas_dosen/") ?><?= $dt->enrol; ?>" id="my-dropzone" method="post" class="dropzone" enctype="multipart/form-data" style="height: 340px;">
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

  </div>
</div>
<div id="Modal-kuiz" class="modal">
  <!-- Modal Content -->
  <div class="modal-content">
    <label class="h3">Kuiz &nbsp;<!-- <button id="mulai" class="btn btn-danger btn-sm">mulai</button> --><label id="no-kuiz"></label>
        <span class="close close-create btn btn-light">&times;</span></label>
        <?= validation_errors(); ?>
    <div>
    	<div class="hiden-input"></div>

    	<div class="form-group">
			<input type="text" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="deskrip" id="deskrip" placeholder="deskrip">
    	</div>
    	<div class="return-soal">
    		
    	</div>
      	<div class="form-group" >
        	<input type="text" class="form-control border-top-0 border-left-0 border-right-0 border-primary rounded-0" name="soal" id="soal" placeholder="soal">
      		<br>
	      	<div class="pilihannya"></div>
	      	<div class="">
	      		<label class="btn btn-outline-dark btn-sm" id="btn-plus-option">tambah pilihan</label>
	      		<!-- <label id="btn-test" class="btn btn-danger">Test</label>   -->  
        		<label name="submit" class="btn btn-primary" id="buat-kuiz"/>post soal</label>
        		<label name="submit" class="btn btn-primary" id="selesai"/>selesai</label> 
	      	</div> 
      	</div>
    </div>
  </div>
  <script type="text/javascript">
 	// $("input[type=radio]").click(function(){
 	// 	alert($(this).val());
 	// });
	$("#Modal-kuiz .close").click(function(){
		var post_id = $("input[name=post_id]").val();
		$.ajax({
		  method: "POST",
		  url: "<?= base_url('index.php/for_ajax/hapus_kuiz'); ?>/<?= $dt->kelas_id; ?>",
		  data: { post_id:post_id }
			}).done(function( msg ) {
		    
		  });
	});
  </script>
</div>

<div class="">
	<div class="fixed">
		<a href="#" class="btn btn-primary btn-round btn-lg btn-pengumuman" data-toggle="tooltip" data-placement="top" title="pengumuman"><span class="fa fa-bullhorn fa-xs"></span></a>
		<br><a href="#" class="btn btn-danger btn-round btn-lg btn-tugas" data-toggle="tooltip" data-placement="top" title="tugas"><span class="fa fa-clipboard fa-xs"></span></a>
		<br><a href="#" id="mulai" class="btn btn-info btn-round btn-lg btn-kuiz" data-toggle="tooltip" data-placement="top" title="kuiz"><span class="fa fa-laptop fa-xs"></span></a>
	</div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
$("#selesai").click(function(){
	var deskrip = $("#deskrip").val();
	var kuiz_id = $("input[name=kuiz_id]").val();
	$.ajax({
		  method: "POST",
		  url: "<?= base_url('index.php/for_ajax/update_deskrip'); ?>/<?= $dt->kelas_id; ?>",
		  data: { deskrip:deskrip, kuiz_id:kuiz_id }
			}).done(function( msg ) {
		    
		  });
	location.reload();
});
</script>
<script type="text/javascript">

$(document).ready(function(){
	$("#btn-plus-option").click(function(){
		$(function () {
                $.get("<?= base_url('asset/pil.html'); ?>", function (data) {
                    $(".pilihannya").append(data);			
                });
            });
	});
	$("#mulai").click(function(){
		var deskrip = $("#deskrip").val();
		$.ajax({
		  method: "POST",
		  url: "<?= base_url('index.php/for_ajax/create_kuiz'); ?>/<?= $dt->kelas_id; ?>",
		  data: { soal: "", jawaban: "",pilih:"",deskrip:deskrip}
			}).done(function( msg ) {
		    $(".hiden-input").html(msg);
		  });
		$(this).attr("disabled",true);
	});
	$("#buat-kuiz").click(function(){
		$(".pilihan").each(function(i){
			 $(".pilihan").attr("name","pil");
		});

		var val = new Array();
				$( "input[name ^=pil" ).each(function(i){
					val[i] = $(this).val();
				});

		var soal 	= $("#soal").val();
		// var jawaban = $("#jawaban").val();
		var kuiz_id = $("input[name=kuiz_id]").val();
		
		$.ajax({
		  method: "POST",
		  url: "<?= base_url('index.php/for_ajax/create_soal'); ?>/<?= $dt->kelas_id; ?>",
		  data: { soal: soal, pilih:val,kuiz_id:kuiz_id}
			}).done(function( msg ) {
		    $(".return-soal").html( msg );
		    // alert(msg);

			$("#soal , #jawaban").val(null);
			$(".option").remove();
		  });
	});
   $(".btn-pengumuman").click(function(){
    	$("#Modal-pengumuman").css("display","block");
    });   
   $(".btn-tugas").click(function(){
    	$("#Modal-tugas").css("display","block");
    });   
   $(".btn-kuiz").click(function(){
    	$("#Modal-kuiz").css("display","block");
    });   
   $("#btn-upload-file").click(function(){
    	$("#modal-upload").css("display","block");
    }); 
   $('.btn-pengumuman , .btn-tugas , .btn-kuiz').mouseover(function(){
   		$('.kotak').css('background-color','rgba(0,0,0,0.4)');
   });
   $('.btn-pengumuman , .btn-tugas , .btn-kuiz').mouseleave(function(){
   		$('.kotak').css('background-color','rgba(0,0,0,0)');
   });

   $('.close').click(function(){
   		$('.modal').css('display','none');
   });
   $('.close-upload').click(function(){
   		$('#modal-upload').css('display','none');
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
});
</script>

<!-- TINY MCE -->

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'.textarea-tiny' });</script>


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