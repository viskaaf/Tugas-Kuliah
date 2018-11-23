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
            <a href="../../index2.html" class="navbar-brand"><b>Tugas</b> Kuliah</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="user">
                <!-- Menu Toggle Button -->
                <a href="<?php echo site_url('LoginC/') ?>">
                  <span>Masuk</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper"> 
      <div class="container">

        <!-- Main content -->
        <section class="content" style="margin-top: 30px;"> 
          <div class="row">
            <div class="box box-solid" style="border-radius: 10px; height: 400px;">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 400px;">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                </ol>

                <div class="carousel-inner" style="border-radius: 10px;">
                  <div class="item active">
                    <img src="<?php echo base_url('gambar/ugm.jpg')?>" style="height: 400px; width: 1200px;" alt="First slide">
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url('gambar/balairung.jpeg')?>" style="height: 400px; width: 1200px;" alt="Second slide">
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box -->

            <div class="box box-solid" style="margin-top: 30px; border-radius: 10px; background:rgba(255,255,255,0.7); padding-bottom: 30px;">
              <div class="text-center box-header with-border" style="">
                <h2 class="section-heading text-uppercase">Cari Materi</h2>
              </div>
            </div>


            <div class="box box-solid" style="margin-top: 30px; border-radius: 10px; background:rgba(255,255,255,0.7); padding-bottom: 30px;"> 
              <div class="row">
                <div class="col-lg-12 text-center box-header with-border">
                  <h2 class="section-heading text-uppercase">Kelebihan</h2>
                </div> 
              </div> 
              <div class="row text-center">
                <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-clock-o fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">24/7</h4>
                  <p class="text-muted">Dapat membuat dan mengerjakan tugas kapan pun dan dimana pun</p>
                </div>
                <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                    <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Materi</h4>
                  <p class="text-muted">Materi mudah didapatkan sesuai bidangnya masing-masing</p>
                </div>
                <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-success"></i>
                    <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Penilaian</h4>
                  <p class="text-muted">Dapat melihat nilai untuk</p>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="container">
        <strong>Copyright &copy; 2018 <a>Tugas Kuliah</a>.</strong> All rights
        reserved.
      </div>
      <!-- /.container -->
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js')?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('AdminLTE/dist/js/demo.js')?>"></script>
</body>
</html>
