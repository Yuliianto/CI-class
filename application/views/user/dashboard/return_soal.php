<?php
	foreach ($return_soal->result_array() as $soal) { ?>
		<!-- //Tampilkan soal -->
		<label><?= $soal['soal']; ?></label><br>
		<?php foreach ($return_pilihan->result_array() as $pilihan) {
			if ($soal['soal_id']==$pilihan['soal_id']) { ?>
				<div class="radio">
					<label><input type="radio" name="<?= $soal['soal_id']; ?>" value="<?= $pilihan['pilih_id']; ?>">&nbsp;<?= $pilihan['pilih']; ?></label>
				</div>
			<?php }
			echo "\n";
		}
	}
 ?>

 <script type="text/javascript">
 $("input[type=radio]").click(function() {
 	var soal_id = $(this).attr("name");
 	var kunci_id = $(this).val();
 	// alert("soal id : "+ soal_id + "| kunci id : " + kunci_id);
 	$.ajax({
		  method: "POST",
		  url: "<?= base_url('index.php/for_ajax/update_kunci'); ?>",
		  data: { soal : soal_id , kunci : kunci_id }
			}).done(function( msg ) {
		    alert(msg);
		  });
 });
 </script>