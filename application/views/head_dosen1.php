<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tugas Kuliah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/skins/_all-skins.min.css')?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/morris.js/morris.css')?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/jvectormap/jquery-jvectormap.css')?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/select2/dist/css/select2.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/iCheck/flat/blue.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php 
    header("Cache-Control: no cache");
    session_cache_limiter("private_no_expire");
  ?>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="Home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TK</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Tugas Kuliah</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('gambar/admin.png')?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Dosen</span>
            </a>
            <!-- <ul class="dropdown-menu" style="width: 10px;"> -->
              <li class="user-footer">
                  <a href="<?php echo base_url() ?>logoutR" onclick="return confirm('Apakah anda yakin ingin keluar?');">Keluar <i class="fa fa-sign-out"></i></a>
              </li>
            <!-- </ul> -->
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <!-- Profile Image --><span>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('AdminLTE/dist/img/user4-128x128.jpg')?>" alt="User profile picture"> 

              <h3 class="profile-username text-center"><?php echo $nama['nama_depan'].' '; echo $nama['nama_belakang'];?></h3>

              <p class="text-muted text-center">Mahasiswa</p>

              <p class="text-muted text-center">Universitas Gadjah Mada</p>
              <br>
              <a href="<?php echo site_url('DosenC/ubahProfil/'.$nama['id_user']) ?>" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --></span>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVIGASI</li>
        <li class="sidebar-menu">
            <a href="<?php echo site_url('LoginC') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('AdminC/daftarUniversitas') ?>">
            <i class="fa fa-university"></i> <span>Universitas</span>
            </a>
        </li>
         <li>
          <a href="<?php echo site_url('LoginC') ?>">
            <i class="fa fa-book"></i> <span>Mata Kuliah</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- jQuery 3 -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('AdminLTE/bower_components/raphael/raphael.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/morris.js/morris.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('AdminLTE/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('AdminLTE/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('AdminLTE/dist/js/demo.js')?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('AdminLTE/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('AdminLTE/plugins/iCheck/icheck.min.js')?>"></script>