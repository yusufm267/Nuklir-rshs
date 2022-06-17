<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><?=$subtitle?></h3>
	</div>

<div class="card-body">
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="datatable1" style="width:100%">
			<thead>
				<tr>
					<th class="bg-primary">NO</th>
					<th class="bg-primary">ID JENIS LAYANAN</th>
					<th class="bg-primary">TANGGAL KUNJUNGAN</th>
					<th class="bg-primary">NO MEDREC</th>
					<th class="bg-primary">NAMA HASIL</th>
					<th class="bg-primary">KADAR HASIL</th>
					<th class="bg-primary">JENIS RF</th>
					<th class="bg-primary">DOSIS RF</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=1;
				foreach ($data_pemeriksaan_nuklir as $data) { ?>
				<tr> 
					<td class=""><?=$no++?></td>
					<td class=""><?=$data->ID_JNS_LAYANAN?></td>
					<td class=""><?=$data->TGL_KUNJUNGAN?></td>
					<td class=""><?=$data->NO_MEDREC?></td>
					<td class=""><?=$data->NM_HASIL?></td>
					<td class=""><?=$data->KADAR_HASIL?></td>
					<td class=""><?=$data->JENIS_RF?></td>
					<td class=""><?=$data->DOSIS_RF?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</div>

<script>
  $(function () {
    $("#datatable1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#datatable1_wrapper .col-md-6:eq(0)');
    $('#datatable2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>