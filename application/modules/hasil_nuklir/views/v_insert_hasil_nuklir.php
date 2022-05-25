<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><?=$subtitle?></h3>
	</div>
	<div class="card-body">
		<div class="row">
			<div class=" col-lg-12 col-md-12">
				<div class="info-box box-light">
					<div class="info-box-content">
						<span class="info-box-text text-center text-muted">PENGISIAN HASIL PEMERIKSAAN KEDOKTERAN NUKLIR</span>
						<span class="info-box-number text-center text-muted">NO MEDREC : 10 Digit (Pasien Instalasi Rawat Jalan) <br> NO IPD : 8 Digit (Pasien Instalasi Rawat Inap)</span>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="form-group">
					<label>NO MEDREC</label>
					<input class="form-control" name="medrec" placeholder="NO MEDREC" id="medrec" autocomplete="off">
					<ul class="dropdown-menu txtnik" style="margin-top: -85px;margin-left:10px;margin-right:0px;padding-left:10px;padding-right:10px;" role="menu" aria-labelledby="dropdownMenu" id="DropdownMedrec"></ul>
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
				<input type="text" class="form-control" value="<?php echo date('Y-m-d')?>" name="" placeholder="TANGGAL KUNJUNGAN">
			</div>
			<div class="col-lg-3 col-md-3">
				<label>DOKTER PENGIRIM</label>
				<input type="text" class="form-control" name="" placeholder="DOKTER PENGIRIM">
			</div>
			<div class="col-lg-3 col-md-3">
				<label>DOKTER PERIKSA</label>
				<input type="text" class="form-control" value="<?php echo $this->session->userdata('nm_pegawai')?>" name="dokter_periksa" placeholder="DOKTER PERIKSA" readonly>
			</div>
			<div class="col-lg-3 col-md-3">
				<label>PENGETIK HASIL</label>
				<input type="text" class="form-control" value="<?php echo $this->session->userdata('alias')?>" name="pengetik_hasil" placeholder="PENGETIK HASIL" readonly>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Insert Data</button>
		<button type="reset" class="btn btn-default">Reset</button>
			<div class="float-right">
				<a href="<?php echo base_url(). 'dashboard/'?>" type="button" id="btn_to_action" class="btn btn-danger">Back</a>
			</div>
	</div>
</div>

<script>
$("#medrec").keyup(function() {
	var base_url='<?=base_url()?>';
	// alert('test');abc
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
					$('#DropdownMedrec').append('<li role="displayCountries"><a role="menuitem" dropdownCountryli" class="dropdownlivalue" style="color:black;">' + value['NO_MEDREC'] +' - '+value['NAMA']+'</a></li>');
			});
		}
	});
});

$('ul.txtnik').on('click','li a',function(){
	if ($(this).text()!='NOT FOUND')
	{
		var res=$(this).text().split('-');
		medrec=typeof res[0]!='undefined'?res[0]:'';
		$('#medrec').val(medrec);
		nama=typeof res[1]!='undefined'?res[1]:'';
		$('#nama').val(nama);

		var $td = $(this).closest('li').children('a');
	}else{

	}
	$('#DropdownMedrec').hide();
});

</script>