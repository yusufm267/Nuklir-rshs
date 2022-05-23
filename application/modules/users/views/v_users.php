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
          <a href="<?php echo base_url(). 'users/view_insert'?>" type="button" id="btn_to_action" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> <b>Tambah Data</b></a>
      </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
	<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable1" style="width:100%" >
        <thead>
        <tr>
      <th class="bg-danger">NO</th>
			<th class="bg-danger">NIP</th>
			<th class="bg-danger">NIP2</th>
			<th class="bg-danger">NAMA PEGAWAI</th>
      <th class="bg-danger">ALIAS</th>
      <!-- <th class="bg-danger">PASSWORD</th> -->
      <!-- <th class="bg-danger">REAL PASSWORD</th> -->
      <th class="bg-danger">AKSES</th>
      <th class="bg-danger">AKTIF</th>
      <th class="bg-danger">STAF</th>
      <th class="bg-danger">STATUS</th>
      <th class="bg-danger">ACTION</th>
		</tr>
         </thead>
         <tbody> 
           <?php
           $no=1;
           foreach ($data_users_nuklir as $data) {
           	?>
    <tr>
      <td class=""><?=$no++;?></td>
			<td class=""><?=$data->NIP?></td>
			<td class=""><?=$data->NIP2?></td>
			<td class=""><?=$data->NM_PEGAWAI?></td>
      <td class=""><?=$data->ALIAS?></td>
      <!-- <td class=""><?=$data->PASSWORD?></td> -->
      <!-- <td class=""><?=$data->REAL_PASSWORD?></td> -->
      <td class="">
        <?php if ($data->AKSES == 1 ) { ?>
          <span class="badge badge-success">ADMIN</span>
        <?php } else { ?>
          <span class="badge badge-warning">USER</span>
        <?php } ?>
      </td>
      <td class="">
        <?php if ($data->AKTIF == 1) { ?>
          <span class="badge badge-primary">AKTIF</span>
        <?php } else { ?>
          <span class="badge badge-danger">TIDAK AKTIF</span>
        <?php } ?>
      </td>
      <td class="">
        <?php if ($data->F_STAFF == 'Y') { ?>
          <span class="badge badge-primary">YA</span>
        <?php } else { ?>
          <span class="badge badge-danger">TIDAK</span>
        <?php } ?>
      </td>
      <td class=""><?=$data->STATUS?></td>
			<!-- <td class=""><?=$data->SHOW_IN_LIST?></td> -->
      <td class="">
        <?php echo anchor('users/view_update/' .$data->NIP, "<i class='nav-icon fas fa-edit'></i>"); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php echo anchor('users/delete/' .$data->NIP, "<i class='nav-icon fas fa-trash'></i>"); ?>
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

