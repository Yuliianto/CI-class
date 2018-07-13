
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
			<div class="card">
				<div class="card-body">
					<p class="h4"><?= $dt->kelas; ?></p>
				</div>
			</div>
			<p></p>
			<div class="card">
				<div class="card-body">
					<p class="h4">Drop material untuk upload to </p>
					<div class="container" style="margin-top: 0px;">
	<div class="row justify-content-center">
		<div class="col">

			<div class="container" style="margin-top: 10px;">
				<div class="row justify-content-center">
					<div class="col">
						<div class="container" style="background-color: #fff;">
						<br>
						
						<form action="<?= base_url("index.php/control_upload/upload/") ?><?= $dt->enrol; ?>" id="my-dropzone" method="post" class="dropzone" enctype="multipart/form-data">
					  		<div class="fallback">
								<input name="file" type="file"  />
								<input type="submit" name="submit" value="upload">
							</div>
							<div class="dz-message">
								<h3>Drop files here</h3> or <strong>click</strong> to upload
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			<br>
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

<script type="text/javascript" src="<?= base_url('asset/vendor/dropzone/dropzone.min.js'); ?>"></script>

<script type="text/javascript">
		Dropzone.autoDiscover = false;
		var myDropzone = new Dropzone("#my-dropzone", {
			acceptedFiles: ".pdf,.doc,.docx,.jpg,.jpeg,.png",
			addRemoveLinks: true,
			removedfile: function(file) {
				var name = file.name;

				$.ajax({
					type: "post",
					url: "<?= base_url("index.php/control_upload/remove/")?><?= $dt->enrol; ?>",
					data: { file: name },
					dataType: 'html'
				});

				// remove the thumbnail
				var previewElement;
				return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
			},
			init: function() {
				var me = this;
				$.get("<?= base_url("index.php/control_upload/list_files/") ?><?= $dt->enrol; ?>", function(data) {
					// if any files already in server show all here
					if (data.length > 0) {
						$.each(data, function(key, value) {
							var mockFile = value;
							me.emit("addedfile", mockFile);
							me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>uploads/<?= $dt->enrol; ?>/" + value.name);
							me.emit("complete", mockFile);
						});
					}
				});
			}
		});
</script>