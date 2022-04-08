<!-- <?php
  if ($this->session->userdata('message'))
  {
    echo "<script>showSwal('".($this->session->userdata('message')['type'])."','".($this->session->userdata('message')['message'])."','".($this->session->userdata('message')['head'])."');</script>";
  }
?> -->
<!-- <?php var_dump($data_users_nuklir) ?> -->
<!-- general form elements -->
<div class="card card-outline card-success">
    <div class="card-header">
        <h3 class="card-title">Update Users Nuklir</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="<?php echo base_url("users/update") ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP</label>
                        <input type="text" class="form-control" name="NIP" value="<?php echo $data_users_nuklir->NIP; ?>" readonly>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP2</label>
                        <input type="text" class="form-control" name="NIP2" value="<?php echo $data_users_nuklir->NIP2; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">NAMA PEGAWAI</label>
                <input type="text" class="form-control" name="NM_PEGAWAI" value="<?php echo $data_users_nuklir->NM_PEGAWAI; ?>" readonly>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">AKSES</label>
                        <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="REAL_PASSWORD" value="<?php echo $data_users_nuklir->AKSES; ?>" placeholder="Example : Z1"> -->
                        <select class="form-control select" id="exampleInputEmail1" name="AKSES">
                            <option value="">-- SELECT AKSES --</option>
                            <?php foreach ($users_nuklir_akses as $data) { ?>
                            <option value="<?php echo $data->AKSES; ?>"><?php echo $data->AKSES; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">AKTIF</label>
                        <select class="form-control select" id="exampleInputEmail1" name="AKTIF">
                            <option value="">-- SELECT AKTIF --</option>
                            <?php foreach ($users_nuklir_aktif as $data) { ?>
                            <option value="<?php echo $data->AKTIF; ?>"><?php echo $data->AKTIF; ?></option>
                            <?php } ?>
                            <option></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">STATUS</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="STATUS" value="<?php echo $data_users_nuklir->STATUS; ?>">
            </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update Data</button>
    </div>
    </form>
</div>
<!-- /.card -->

<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>