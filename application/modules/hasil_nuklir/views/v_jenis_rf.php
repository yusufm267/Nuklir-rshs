<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><?=$subtitle?></h3>
		<div class="float-sm-right">
		<a href="<?php echo base_url().'/hasil_nuklir/view_insert' ?>" type="button" id="btn_to_action" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i><b> Tambah Data</b></a>
		</div>
	</div>


<div class="card-body">
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="datatable1" style="width:100%">
			<thead>
				<tr>
					<th>NO</th>
					<th class="bg-default">JENIS RF</th>
					<th class="bg-default">ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				foreach ($data_jenis_rf as $rf) {
				?>
				<tr>
					<td class=""><?=$no++;?></td>
					<td class=""><?=$rf->JENIS_RF?></td>
					<td>
						<?php echo anchor('hasil_nuklir/view_update_jenis_rf/' .$rf->JENIS_RF, "<i class='nav-icon fas fa-edit'></i>"); ?> &nbsp;&nbsp;|
        				&nbsp;&nbsp; <?php echo anchor('hasil_nuklir/delete_jenis_rf/' .$rf->JENIS_RF, "<i class='nav-icon fas fa-trash'></i>"); ?>
					</td>
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