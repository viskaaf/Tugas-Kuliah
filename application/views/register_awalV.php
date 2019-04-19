<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/AdminLTE.min.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen" style="background-image: url('gambar/background1.png'); height: 600px;"> 
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?php echo base_url('HomeC') ?>"><b>Tugas </b>Kuliah</a>
  </div>

  <!-- User name -->
  <div class="lockscreen-name">Buat akun</div>

    <!-- lockscreen credentials (contains the form) -->
    
      <div class="box-body" >
      <form class="lockscreen-logo" action="<?php echo site_url('RegisterC/tampilRegister') ?>" method="POST">
        <input type="hidden" value="1" name="level">
         <button value="" class="btn btn-block btn-default btn-lg">Dosen</button></form>
         <form class="lockscreen-logo" action="<?php echo site_url('RegisterC/tampilRegister') ?>" method="POST">
         <input type="hidden" value="2" name="level">
          <button class="btn btn-block btn-default btn-lg">Mahasiswa</button>
    </form>
    
        </div>
    <!-- /.lockscreen credentials -->

    

  <div class="text-center">
    <a href="<?php echo base_url('LoginC') ?>">Sudah punya akun?</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2018 <b><a href="https://adminlte.io" class="text-black">Tugas Kuliah</a></b><br>
    All rights reserved
  </div> 
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
</body>
</html>
