<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="src/jquery.table2excel.js"></script>

<div class="container" style="margin-top: 100px;">
	<div class="row justify-content-center">
		<div class="col-8" style="background-color:#fff;">
			<br>
			
				<div class="row">
					<div class="col">
						<button>Export</button>
						<table class="table">
							<thead>
								<tr>
									<th>Foto</th>
									<th>Nim</th>
									<th>Total benar</th>
									<th>Score</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($cek_jwb_kuiz->result_array() as $cek) { ?>
								<tr>
									<td>
										<img class="rounded d-inline" src="<?= base_url('asset/images/owner-male.png'); ?>" alt="avatar-dosen" width="40">
									</td>
									<td>
										<span><?php echo $cek['nim']; ?></span>
									</td>
									<td><?= $cek['total_benar']; ?></td>
									<td>
										<span class=""><?= ($cek['total_benar']/$jml_soal->jml_soal*100); ?></span>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$("button").click(function(){
	  $("table").table2excel({
	    // exclude CSS class
	    exclude: ".noExl",
	    name: "Worksheet Name",
	    filename: "SomeFile" //do not include extension
	  }); 
	});
</script>