<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Akun | Tugas Kuliah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/iCheck/all.css'); ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/select2/dist/css/select2.min.css')?>">
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
<body class="hold-transition register-page" style="background-image: url('gambar/background1.png'); height: 600px;">
<div class="register-box">
  <div class="register-logo">
    <a href="AdminLTE/index2.html"><b>Daftar</b></a>
  </div>

  <div class="register-box-body" style="background:rgba(255,255,255,0.4);">
    <p class="login-box-msg">Daftar Akun</p>
           <?php 
                $data=$this->session->flashdata('sukses');
                if($data!=""){ ?>
                <div class="alert alert-success"><center><strong> Sukses! </strong> <?=$data;?></center></div>
                <?php } ?>
                <?php 
                $data2=$this->session->flashdata('error'); 
                if($data2!=""){ ?>
                <div class="alert alert-danger"><center><strong> Error! </strong> <?=$data2;?></center></div>
                <?php } ?>
        <form id="form" action="<?php echo site_url('RegisterC/register') ?>" method="POST">       
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nama_depan" value="<?php echo set_value('nama_depan'); ?>" placeholder="Nama Depan" required oninvalid="this.setCustomValidity('Wajib diisi')" oninput="setCustomValidity('')">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nama_belakang" value="<?php echo set_value('nama_belakang'); ?>" placeholder="Nama Belakang" required oninvalid="this.setCustomValidity('Wajib diisi')" oninput="setCustomValidity('')">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label class="col-xs-5">Jenis Kelamin:</label>
                <label>
                  <input type="radio" name="jenis_kelamin" value="Laki-laki" class="minimal">
                  Laki-laki
                </label>
                <label> 
                  <input type="radio" name="jenis_kelamin" value="Perempuan" class="minimal">
                  Perempuan
                </label>
      </div> 
      <div class="form-group">
        <select class="form-control select2" name="nama_univ" id="nama_univ" required>
          <option></option>
          <?php foreach ($universitas as $data) {  ?> 
            <option value="<?php echo $data->id_univ;?>"><?php echo $data->nama_univ;?></option>
          <?php  } ?>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" required oninvalid="this.setCustomValidity('Wajib diisi')" oninput="setCustomValidity('')">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Kata Sandi" required oninvalid="this.setCustomValidity('Wajib diisi')" oninput="setCustomValidity('')">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        <input type="hidden" class="form-control" name="level" value="<?php echo $level; ?>">
    
      <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button> 
    </form>
    <br>
    Sudah punya akun? <a href="<?php echo site_url('LoginC') ?>" class="text-center">Masuk</a>
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
<!-- Select2 -->
<script src="<?php echo base_url('AdminLTE/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<script>
  $(function () {
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });

    //Initialize Select2 Elements
    $('.select2').select2({
      placeholder : "Pilih Universitas",
      allowClear : true
    });
  });
</script>
</body>
</html>
