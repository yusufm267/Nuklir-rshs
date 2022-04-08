<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Kelola Nuklir</title>

  <link rel="shortcut icon" href="<?=base_url()?>assets/img/logo-site2.png" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/vendor/adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
		<div class="card card-outline card-primary">
    <div class="card-header text-center">
      <!-- <a href="#" class="h3"><b>Nuklir</b>RSHS</a><br> -->
      <img src="<?=base_url()?>assets/img/logo-site2.png" type="image/png" width="150" height="100">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>

      <form action="<?=base_url('/login/proses_login')?>" method="POST">
        <div class="input-group mb-3 <?=form_error('nip') ? 'has-error' : null ?>">
          <input type="text" class="form-control" placeholder="NIP" name="nip" value="<?=set_value('nip'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
          <?=form_error('nip'); ?>
        <div class="input-group mb-3 <?=form_error('nip') ? 'has-error' : null ?>">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?=form_error('password'); ?>
        <div class="row">
          <div class="col-12">
          	<button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
      </form>

     <!--  <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- jQuery -->
<script src="<?=base_url()?>assets/vendor/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/vendor/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>