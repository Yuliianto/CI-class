
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
		<div class="col" style="text-align: center; width: 80%; margin: auto;">
			<form action="<?= base_url("index.php/control_upload/upload_edit_bahan/") ?><?= $enrol."/".$post_id; ?>" id="my-dropzone" method="post" class="dropzone" enctype="multipart/form-data">
		  		<div class="fallback">
					<input name="file" type="file"  />
					<input type="submit" name="submit" value="upload">
				</div>
				<div class="dz-message">
					<h3>Drop files here</h3> or <strong>click</strong> to upload<br><label class="">max. 2 MB</label>
				</div>
			</form>
			<a href="javascript:history.back()" class="btn btn-success">Go Back</a>

		</div>
	</div>

</div>
				
			
 <script src="<?= base_url('asset/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/script.js') ?>"></script>
  <script src="<?= base_url('asset/js/jquery-3.3.1.min.js') ?>"></script>
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
					url: "<?= base_url("index.php/control_upload/remove_edit_bahan/")?><?= $enrol."/".$post_id; ?>",
					data: { file: name },
					dataType: 'html'
				});

				// remove the thumbnail
				var previewElement;
				return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
			},
			init: function() {
				var me = this;
				$.get("<?= base_url("index.php/control_upload/list_files_edit_bahan/") ?><?= $enrol."/".$post_id; ?>", function(data) {
					// if any files already in server show all here
					if (data.length > 0) {
						$.each(data, function(key, value) {
							var mockFile = value;
							me.emit("addedfile", mockFile);
							me.emit("thumbnail", mockFile, "<?php echo base_url('uploads/bahan_tugas/'); ?><?= $enrol."/".$post_id; ?>/" + value.name);
							me.emit("complete", mockFile);
						});
					}
				});
			}
		});
</script>