<?php
  if ($this->session->userdata('message'))
  {
    echo "<script>showSwal('".($this->session->userdata('message')['type'])."','".($this->session->userdata('message')['message'])."','".($this->session->userdata('message')['head'])."');</script>";
  }
?>
<!-- <?php var_dump($data_users_nuklir) ?> -->
<!-- general form elements -->
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Users Nuklir</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="<?php echo base_url("users/insert") ?>">
        <div class="card-body">
          <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="NIP" placeholder="Masukan NIP" required >
          </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">AKSES</label>
                        <select class="form-control select" id="exampleInputEmail1" name="AKSES">
                            <option value="">-- SELECT AKSES --</option> 
                            <option value=1>ADMIN</option>
                            <option value=2>STAFF</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">AKTIF</label>           
                        <select class="form-control select" id="exampleInputEmail1" name="AKTIF">
                            <option value="">-- SELECT AKTIF--</option>
                            <option value=1>AKTIF</option>
                            <option value=0>TIDAK AKTIF</option>
                            
                        </select>
                </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">STATUS</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="STATUS" placeholder="Contoh : Dokter">
            </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Insert Data</button>
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