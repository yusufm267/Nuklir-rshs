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
         <!--  <a href="<?php echo base_url(). 'users/view_insert'?>" type="button" id="btn_to_action" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> <b>Tambah Data</b></a> -->
          <a href="" type="button" id="btn_to_action" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#userModal"><i class="fas fa-plus"></i> <b>Tambah Data</b></a>
      </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
	<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable1" style="width:100%" >
        <thead>
        <tr>
      <th class="bg-default">NO</th>
			<th class="bg-default">NIP</th>
			<th class="bg-default">NIP2</th>
			<th class="bg-default">NAMA PEGAWAI</th>
      <th class="bg-default">ALIAS</th>
      <!-- <th class="bg-danger">PASSWORD</th> -->
      <!-- <th class="bg-danger">REAL PASSWORD</th> -->
      <th class="bg-default">AKSES</th>
      <th class="bg-default">AKTIF</th>
      <th class="bg-default">STAF</th>
      <th class="bg-default">STATUS</th>
      <th class="bg-default">ACTION</th>
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


<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Input Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url("users/insert_user") ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                      <div class="form-group">
                          <label for="inputError">NIP</label>
                          <input type="text" class="form-control <?=form_error('NIP') ? 'is-invalid' : null ?>" name="NIP" placeholder="Masukan NIP" value="<?=set_value('NIP'); ?>">
                          <?=form_error('NIP'); ?>
                      </div>
                </div>
                <div class="col-lg-6 col-md-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">ALIAS</label>
                          <input type="text" class="form-control <?=form_error('ALIAS') ? 'is-invalid' : null ?>" name="ALIAS" placeholder="Masukan ALIAS" value="<?=set_value('ALIAS'); ?>">
                          <?=form_error('ALIAS'); ?>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">AKSES</label>
                        <select class="form-control select"  name="AKSES">
                            <option value="">-- SELECT AKSES --</option> 
                            <option value=1>ADMIN</option>
                            <option value=2>STAFF</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">AKTIF</label>           
                        <select class="form-control select" name="AKTIF">
                            <option value="">-- SELECT AKTIF --</option>
                            <option value=1>AKTIF</option>
                            <option value=0>TIDAK AKTIF</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">STATUS</label>
                        <input type="text" class="form-control" name="STATUS" placeholder="Contoh : Dokter">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">STAF</label>
                        <select class="form-control select" name="STAF">
                            <option value="">-- SELECT STAF --</option>
                            <option value="Y">YA</option>
                            <option value="N">TIDAK</option>    
                        </select>
                    </div>
                </div>
            </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Insert Data</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
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

