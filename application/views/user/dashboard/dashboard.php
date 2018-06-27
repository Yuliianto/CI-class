<link rel="stylesheet" type="text/css" href="<?= base_url('asset/vendor/dropzone/dropzone.min.css'); ?>">
<style>
		body {
			background: #f7f7f7;
			font-family: 'Montserrat', sans-serif;
		}

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
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-12">
			<?= $error; ?>
			<form action="<?= base_url("index.php/control_upload/upload") ?>" id="my-dropzone" method="post" class="dropzone" enctype="multipart/form-data">
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
<script type="text/javascript" src="<?= base_url('asset/vendor/dropzone/dropzone.min.js'); ?>"></script>

<script type="text/javascript">
		Dropzone.autoDiscover = false;
		var myDropzone = new Dropzone("#my-dropzone", {
			acceptedFiles: "image/*",
			addRemoveLinks: true,
			removedfile: function(file) {
				var name = file.name;

				$.ajax({
					type: "post",
					url: "<?= base_url("index.php/control_upload/remove")?>",
					data: { file: name },
					dataType: 'html'
				});

				// remove the thumbnail
				var previewElement;
				return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
			},
			init: function() {
				var me = this;
				$.get("<?= base_url("index.php/control_upload/list_files") ?>", function(data) {
					// if any files already in server show all here
					if (data.length > 0) {
						$.each(data, function(key, value) {
							var mockFile = value;
							me.emit("addedfile", mockFile);
							me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>uploads/" + value.name);
							me.emit("complete", mockFile);
						});
					}
				});
			}
		});
</script>