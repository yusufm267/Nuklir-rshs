<!-- <?php
  if ($this->session->userdata('message'))
  {
    echo "<script>showSwal('".($this->session->userdata('message')['type'])."','".($this->session->userdata('message')['message'])."','".($this->session->userdata('message')['head'])."');</script>";
  }
?> -->
<!-- <?php var_dump($data_users_nuklir) ?> -->
<!-- general form elements -->
<div class="card card-outline card-danger">
    <div class="card-header">
        <h3 class="card-title">Update Users Nuklir</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="<?php echo base_url("jenis_pegawai/update") ?>">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">NIP</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="NIP" value="<?php echo $data_users_nuklir->NIP; ?>" placeholder="Example : Z1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">NIP2</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="NIP2" value="<?php echo $data_users_nuklir->NIP2; ?>" placeholder="Example : Z1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">NAMA PEGAWAI</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="NM_PEGAWAI" value="<?php echo $data_users_nuklir->NM_PEGAWAI; ?>" placeholder="Example : Z1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">REAL PASSWORD</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="REAL_PASSWORD" value="<?php echo $data_users_nuklir->REAL_PASSWORD; ?>" placeholder="Example : Z1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">AKSES</label>
                <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="REAL_PASSWORD" value="<?php echo $data_users_nuklir->AKSES; ?>" placeholder="Example : Z1"> -->
                <select class="form-control select" id="exampleInputEmail1" name="AKSES">
                    <option value="">-- SELECT AKSES --</option>
                    <?php foreach ($users_nuklir as $data) { ?>
                    <option value="<?php echo $data->AKSES; ?>"><?php echo $data->AKSES; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">AKTIF</label>
                <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="REAL_PASSWORD" value="<?php echo $data_users_nuklir->AKTIF; ?>" placeholder="Example : Z1"> -->
                <select class="form-control select" id="exampleInputEmail1" name="AKTIF">
                    <option value="">-- SELECT AKTIF--</option>
                    <option value="<?php echo $data->AKTIF; ?>"><?php echo $data->AKTIF; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">STATUS</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="REAL_PASSWORD" value="<?php echo $data_users_nuklir->STATUS; ?>" placeholder="Example : Z1">
            </div>



           <!--  <div class="form-group">
                <label>JENIS PEGAWAI</label>
                <select class="form-control select2" name="ID_JENIS" style="width: 100%;">
                
                <?php foreach ($data_users_nuklir as $data){?>
                    <option value="<?php echo $data->ID_JENIS; ?>"
                    <?php
                    // Cek ID_Bagian yang ada sesuai db dengan array $data jika sesuai selected 
                    if($data_users_nuklir->ID_JENIS==$data->ID_JENIS) echo 'selected="selected"'; 
                    ?>>
                    <?php echo $data->ID_JENIS." | ".$data->JENIS; ?></option>
                <?php }?>
            </select>
            </div> -->
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