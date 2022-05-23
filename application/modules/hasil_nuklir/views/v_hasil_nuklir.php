<?php
  if ($this->session->userdata('message'))
  {
    echo "<script>showSwal('".($this->session->userdata('message')['type'])."','".($this->session->userdata('message')['message'])."','".($this->session->userdata('message')['head'])."');</script>";
  }
?>

<div class="card card-outline card-primary">
  <div class="card-header">
      <h3 class="card-title"><?=$subtitle?></h3>
      <div class="float-sm-right">
          <!-- <button type="button" id="btn_call_search" class="btn btn-success btn-sm"><i class="fas fa-search"></i> Pencarian</button> -->
          <a href="<?php echo base_url(). 'hasil_nuklir/view_insert'?>" type="button" id="btn_to_action" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> <b>Tambah Data</b></a>
      </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
	<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable1" style="width:100%" >
        <thead>
        <tr>
      <th class="bg-danger">NO</th>
			<th class="bg-danger">NAMA HASIL</th>
			<th class="bg-danger">KADAR NORMAL</th>
			<th class="bg-danger">SATUAN</th>
      <th class="bg-danger">ID JENIS PEMERIKSAAN</th>
      <th class="bg-danger">ACTION</th>
		</tr>
         </thead>
         <tbody> 
           <?php
           $no=1;
           foreach ($data_hasil_nuklir as $data) {
           	?>
    <tr>
      <td class=""><?=$no++;?></td>
			<td class=""><?=$data->NM_HASIL?></td>
			<td class=""><?=$data->KADAR_NORMAL?></td>
			<td class=""><?=$data->SATUAN?></td>
      <td class=""><?=$data->ID_JNS_PEMERIKSAAN?></td>
      
      <td class="">
        <?php echo anchor('hasil_nuklir/view_update/' .$data->ID_JENIS, "<i class='nav-icon fas fa-edit'></i>"); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php echo anchor('hasil_nuklir/delete/' .$data->ID_JENIS, "<i class='nav-icon fas fa-trash'></i>"); ?>
      </td>
		</tr>
           	<?php
           }
           ?>
         </tbody>
   	</table>
    </div>
  </div>
  <!-- /.card-body -->
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