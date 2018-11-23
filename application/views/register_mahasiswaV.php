<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/AdminLTE.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/iCheck/square/blue.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="AdminLTE/index2.html"><b>Register</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftar Akun</p>

    <form action="<?php echo base_url('AdminLTE/index.html'); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama Depan">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama Belakang">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="NIM">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select id="pilihsemester" name="namasmstr" class="form-control required">
          <option value="" disabled selected=""> <i>--- Pilih Jenis Kelamin ---</i></option>
          <option>Laki-laki</option>
          <option>Perempuan</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Ulangi password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select id="pilihsemester" name="namasmstr" class="form-control required">
          <option value="" disabled selected=""> <i>--- Pilih Universitas ---</i></option>
          <option>Laki-laki</option>
          <option>Perempuan</option>
        </select>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4"> 
          
        </div>
        <!-- /.col -->
      </div>
      <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
    </form>
    <br>
    <a href="<?php echo site_url('HomeC') ?>" class="text-center">Saya sudah punya akun.</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('AdminLTE/plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
