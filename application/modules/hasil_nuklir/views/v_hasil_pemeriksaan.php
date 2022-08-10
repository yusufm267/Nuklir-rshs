<table class="table table-bordered table-striped text-center">
	<thead>
		<tr>
			<th colspan="3">PEMERIKSAAN</th>
			<th>NAMA HASIL</th>
			<th>KADAR HASIl</th>
			<th>KADAR NORMAL</th>
			<th>JENIS RF</th>
			<th>DOSIS RF</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($hasil as $hs) { ?>
			<tr>
				<td><?= $hs->ID_JNS_LAYANAN ?></td>
				<td><?= $hs->NM_LAYANAN?></td>
				<td><?= $hs->KELOMPOK_NUK?></td>
				<td>
					<input type="text" name="nm_hasil" class="form-control searchHasil namaHasil-<?= $hs->ID_JNS_LAYANAN ?>"  value="<?= $hs->NM_HASIL ?>" data-id="<?= $hs->ID_JNS_LAYANAN ?>">
					<ul class="dropdown-menu txtHasil" style="" role="menu" aria-labelledby="dropdownMenu" id="DropdownHasil"></ul>
				</td>
				<td>
					<input type="text" name="kadar_hasil" class="form-control kadarHasil-<?= $hs->ID_JNS_LAYANAN ?>" value="<?= $hs->KADAR_HASIL ?>">
				</td>
				<td>
					<input type="text" name="kadar_normal" class="form-control kadarNormal-<?= $hs->ID_JNS_LAYANAN ?>" value="" readonly>
				</td>
				<td>
					<input type="text" name="jenis_rf" class="form-control " value="<?= $hs->JENIS_RF ?>">	
				</td>
				<td>
					<input type="text" name="dosis_rf" class="form-control" value="<?= $hs->DOSIS_RF ?>">
				</td>
			</tr>

		<?php } ?>
		
	</tbody>
</table>

<script type="text/javascript">
	$(".searchHasil").keyup(function() {
	var base_url='<?=base_url()?>';
	let idnya = $(this).data("id");
	// alert('test');abc
	$.ajax({
		type: "POST",
		url: base_url+"Hasil_nuklir/getNamaHasilAutoComplete",
		data: {
			keyword: $(this).val().trim()
		},
		dataType: "json",
		success: function (data) {

			if (data.length > 0) {
				$('#DropdownHasil').empty();
				$('#DropdownHasil').dropdown('toggle');
				$('#DropdownHasil').show();
			}
			else if (data.length == 0) {

			}

			$.each(data, function(key,value){
				if (data.length >= 0)
					$('#DropdownHasil').append('<li role="displayCountries"><a  onclick="getValue(\''+idnya+'\', \''+value['NM_HASIL']+'\', \''+value['KADAR_NORMAL']+'\')" role="menuitem" dropdownCountryli" class="dropdownlivalue" style="color:black;" data-nama="'+value['NM_HASIL']+'" data-kadar="'+value['KADAR_NORMAL']+'"  data-id="'+idnya+'"  >' + value['ID_JENIS'] +' - '+value['NM_HASIL']+' - '+value['KADAR_NORMAL']+'</a></li>');
			});
			
		}
	});
});


function getValue(id, nama, kadar) {
	$('.namaHasil-'+id).val(nama);
	$('.kadarNormal-'+id).val(kadar);

	$('#DropdownHasil').hide();
}
</script>