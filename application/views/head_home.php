<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Tugas Kuliah</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/skins/_all-skins.min.css')?>">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?php echo site_url('HomeC/index/'); ?>" class="navbar-brand"><b>Tugas</b> Kuliah</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <!-- <li class="user"> -->
                <!-- Menu Toggle Button -->

<!--                 <a href="<?php echo $url ?>">
                  <span><?php echo $nama; ?></span>
                </a> 
              </li> -->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="<?php echo $url ?>" class="dropdown-toggle" title="Kembali ke Halaman Pengguna">
                  <?php if($this->session->userdata("masuk") == TRUE){ ?>
                    <?php 
                    if($foto){
                      ?>
                      <img class="user-image" src="<?php echo base_url('gambar/'.$foto)?>" alt="User Image">
                      <?php
                    }else{
                      ?> 
                      <img class="user-image" src="<?php echo base_url('gambar/admin.png')?>" alt="User Image">
                      <?php
                    }
                    ?>
                    <?php } ?>
                  <span class="hidden-xs"><?php echo $nama; ?></span>
                </a>
              </li>
              <?php if($this->session->userdata("masuk") == TRUE){ ?> 
              <!-- User Account Menu -->
              <li class="user">
                <!-- Menu Toggle Button -->
                <a href="<?php echo site_url('LoginC/logout') ?>" title="Logout dari Tugas Kuliah" onclick="return confirm('Apakah anda yakin ingin keluar dari sistem ini?')">
                  <span><i class="fa fa-sign-out"></i></span>
                </a>
              </li>
              <?php } ?>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>