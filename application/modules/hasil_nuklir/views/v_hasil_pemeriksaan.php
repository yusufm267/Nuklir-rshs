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
					<input type="text" name="nm_hasil" class="form-control searchHasil"  value="<?= $hs->NM_HASIL ?>" data-id="<?= $hs->ID_JNS_LAYANAN ?>">
					<ul class="dropdown-menu txtHasil" style="margin-top: -85px;margin-left:10px;margin-right:0px;padding-left:10px;padding-right:10px;" role="menu" aria-labelledby="dropdownMenu" id="DropdownHasil"></ul>
				</td>
				<td>
					<input type="text" name="kadar_hasil" class="form-control" value="<?= $hs->KADAR_HASIL ?>" data-id="<?= $hs->ID_JNS_LAYANAN ?>">
				</td>
				<td>
					<input type="text" name="kadar_normal" class="form-control" value="" readonly data-id="<?= $hs->ID_JNS_LAYANAN ?>">
				</td>
				<td>
					<input type="text" name="jenis_rf" class="form-control" value="<?= $hs->JENIS_RF ?>" data-id="<?= $hs->ID_JNS_LAYANAN ?>">	
				</td>
				<td>
					<input type="text" name="dosis_rf" class="form-control" value="<?= $hs->DOSIS_RF ?>" data-id="<?= $hs->ID_JNS_LAYANAN ?>">
				</td>
			</tr>

		<?php } ?>
		
	</tbody>
</table>

<script type="text/javascript">
	$(".searchHasil").keyup(function() {
	var base_url='<?=base_url()?>';
	// alert('test');abc
	$.ajax({
		type: "POST",
		url: base_url+"Hasil_nuklir/getMedrecAutoComplete",
		data: {
			keyword: $(this).val().trim()
		},
		dataType: "json",
		success: function (data) {
			if (data.length > 0) {
				$('#DropdownMedrec').empty();
				$('#DropdownMedrec').dropdown('toggle');
				$('#DropdownMedrec').show();
			}
			else if (data.length == 0) {

			}

			$.each(data, function(key,value){
				if (data.length >= 0)
					$('#DropdownMedrec').append('<li role="displayCountries"><a role="menuitem" dropdownCountryli" class="dropdownlivalue" style="color:black;">' + value['NO_MEDREC'] +' - '+value['NAMA']+' - '+value['UMUR']+' - '+value['TGL_LAHIR']+'</a></li>');
			});
		}
	});
});

$('ul.txtHasil').on('click','li a',function(){
	let jenisLayanan = $(this).data('id');
	console.log(jenisLayanan);
	if ($(this).text()!='NOT FOUND')
	{
		// var res=$(this).text().split(' - ');
		// nm_hasil=typeof res[1]!='undefined'?res[1]:'';
		// $('#medrec').val(medrec);
		// kadar_hasil=typeof res[2]!='undefined'?res[2]:'';
		// $('#nama').val(nama);
		
		// var $td = $(this).closest('li').children('a');
	}else{

	}
	$('#DropdownHasil').hide();
});
</script>