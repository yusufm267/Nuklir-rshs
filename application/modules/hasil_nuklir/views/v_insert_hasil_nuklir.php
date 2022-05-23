<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><?=$subtitle?></h3>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="form-group">
					<label>NO MEDREC</label>
					<input class="form-control" name="medrec" placeholder="NO MEDREC" id="medrec" autocomplete="off">
									<ul class="dropdown-menu txtnik" style="margin-top:-90px;margin-left:17px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownMedrec"></ul>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="form-group">
					<label>NAMA PASIEN</label>
					<input type="text" class="form-control" name="nama" placeholder="NAMA PASIEN" id="nama">
				</div>
			</div>
			<div class="col-lg-3 col-md-3">
				<label>TANGGAL KUNJUNGAN</label>
				<input class="form-control" name="" placeholder="TANGGAL KUNJUNGAN">
			</div>
			<div class="col-lg-3 col-md-3">
				<label>DOKTER PENGIRIM</label>
				<input type="text" class="form-control" name="" placeholder="DOKTER PENGIRIM">
			</div>
			<div class="col-lg-3 col-md-3">
				<label>DOKTER PERIKSA</label>
				<input type="text" class="form-control" name="" placeholder="DOKTER PERIKSA">
			</div><div class="col-lg-3 col-md-3">
				<label>PENGETIK HASIL</label>
				<input type="text" class="form-control" name="" placeholder="PENGETIK HASIL">
			</div>
		</div>
	</div>
</div>

<script>
$("#medrec").keyup(function() {
	var base_url='<?=base_url()?>';
	$.ajax({
		type: "POST",
		url: base_url+"Hasil_nuklir/getMedrecAutoComplete",
		data: {
			keyword: $("#medrec").val().trim()
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
					$('#DropdownMedrec').append('<li role="displayCountries"><a role="menuitem" dropdownCountryli" class="dropdownlivalue">' + value['MEDREC'] +'---'+value['NAMA']+'</a></li>');
			});
		}
	});
});

$('ul.txtnik').on('click','li a',function(){
	if ($(this).text()!='NOT---FOUND')
	{
		var res=$(this).text().split('---');
		medrec=typeof res[0]!='undefined'?res[0]:'';
		$('#medrec').val(medrec);
		nama=typeof res[1]!='undefined'?res[1]:'';
		$('#nama').val(medrec);

		var $td = $(this).closest('li').children('a');
	}else{

	}
	$('#DropdownMedrec').hide();
});

</script>