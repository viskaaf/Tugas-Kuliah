<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lupa Kata Sandi | Tugas Kuliah</title>
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
<body class="hold-transition login-page" style="background-image: url('gambar/background1.png'); height: 600px;">
  <div class="login-box" style="width: 600px;">
    <div class="login-logo">
      <a><b>Atur Ulang Kata Sandi</b></a>
    </div>
    <!-- /.login-logo -->
    <center>
      <div class="login-box-body" style="background:rgba(255,255,255,0.4);">
        <p class="login-box-msg">Masukkan email untuk mengatur ulang kata sandi Anda :</p>
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

        <form class="login-form" id="form" action="<?php echo site_url('HomeC/lupaPass'); ?>" method="POST">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Masukkan Email" autofocus required><?php echo form_error('email'); ?>
          </div>
          <br>
          <div class="row">
            <button type="submit" class="btn btn-primary pull-right" style="margin-right: 15px;">Kirim</button>
            <a href="<?php echo base_url().'HomeC' ?>" class="text-center pull-left" style="margin-left: 15px;">Kembali ke Home</a>
          </div>
        </form> 

      </div>
      <!-- /.login-box-body -->
    </center>
  </div>
  <!-- /.login-box -->

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
