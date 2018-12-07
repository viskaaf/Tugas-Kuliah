<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dosen | Tugas Kuliah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
   <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/iCheck/all.css'); ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/select2/dist/css/select2.min.css')?>">
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
            <a href="<?php echo site_url('HomeC/index/'); ?>" class="navbar-brand"><b>Tugas </b>Kuliah</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="user">
                  <a href="<?php echo site_url('DosenC/index') ?>"> 
                    <span>Beranda</span>
                  </a>
              </li>

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>

              <!-- User Account Menu -->
              <li class="user">
                <!-- Menu Toggle Button -->
                <a href="<?php echo site_url('LoginC/logout') ?>" title="Logout dari Tugas Kuliah">
                  <span><i class="fa fa-sign-out"></i></span>
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
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <?php
                  if($nama['foto_profil']){
                    ?>
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('gambar/'.$nama['foto_profil'])?>" alt="User profile picture">
                    <?php
                  }else{
                    ?> 
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('gambar/admin.png')?>" alt="User profile picture">
                    <?php
                  }
                  ?>

                  <h3 class="profile-username text-center"><?php echo $nama['nama_depan'].' '; echo $nama['nama_belakang'];?></h3>

                  <p class="text-muted text-center">Dosen</p>

                  <p class="text-muted text-center"><?php echo $nama['nama_univ'];?></p>
                  <br>
                  <a href="<?php echo site_url('DosenC/ubahProfil/'.$nama['id_user']) ?>" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->


              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Kelas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding"> 
                  <ul class="nav nav-pills nav-stacked">
                    <li>
                      <?php 
                      $length = 6;
                      $data = 'abcdefghijklmnopqrstuvwxyz1234567890';
                      $string = '';
                      for($i = 0; $i < $length; $i++) {
                        $pos = rand(0, strlen($data)-1);
                        $string .= $data{$pos};
                      } 
                      ?>
                      <a class="btn" data-toggle="modal" data-target="#modal-add-<?php echo $string; ?>-<?php echo $getdosen['id_dosen']?>-<?php echo $getuniv['id_univ']?>"><i class="fa fa-plus-square-o"></i> Buat Kelas</a>
                    </li>
                    <li class="text-center"><a href="<?php echo site_url('DosenC/daftarKelas/'.$nama['id_user']) ?>"><i class="fa fa-inbox"></i> Kelola Kelas</a></li>
               <!--  <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
               </li> -->
             </ul>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

         <!-- modal untuk tambah manual -->
<div class="modal fade" id="modal-add-<?php echo $string; ?>-<?php echo $getdosen['id_dosen']?>-<?php echo $getuniv['id_univ']?>">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Tambah Kelas</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/tambahKelas/')?>">
          <input type="hidden" name="id_dosen" id="id_dosen" value="<?php echo $getdosen['id_dosen']?>">
          <input type="hidden" name="id_univ" id="id_univ" value="<?php echo $getuniv['id_univ']?>">
          <div class="form-group">
           <label for="" class="col-sm-3 control-label">Nama Kelas</label>
           <div class="col-sm-8">
             <input type="text" class="col-sm-10 form-control" name="nama_kelas" placeholder="Nama Kelas" required oninvalid="this.setCustomValidity('Isi nama kelas.')" oninput="setCustomValidity('')">
           </div>
         </div>
         <div class="form-group">
          <label class="col-sm-3 control-label">Fakultas</label> 
          <div class="col-sm-8">
            <select name="nama_fakultas" id="nama_fakultas" class="form-control select2" style="width: 100%;">
              <option disabled selected><i>---Pilih Fakultas---</i></option>
              <?php foreach ($fakultas as $data) {  ?> 
                <option value="<?php echo $data->id_det_univfakultas;?>"><?php echo $data->nama_fakultas;?></option>
              <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Program Studi</label>
          <div class="col-sm-8">
            <select name="nama_prodi" id="nama_prodi" class="form-control select2" style="width: 100%;">
              <option disabled selected><i>---Pilih Program Studi---</i></option>
              <?php if(count($prodi->result())>0) { ?>

                <?php foreach ($prodi->result() as $row) {  ?>
                  <option value="<?php echo $row->id_prodi;?>"><?php echo $row->nama_prodi;?></option>
                <?php } ?>
              <?php  } else { ?>
                <option value="0">- Data Belum Tersedia -</option> 

              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
         <label class="col-sm-3 control-label">Kode</label>
         <div class="col-sm-3">
          <span class="label label-primary" style="font-size: 23px"><b><?php echo $string; ?></b></span>
          <input type="hidden" name="kode" value="<?php echo $string; ?>"></input>
        </div>
        <div class="col-sm-5">
         <span>Bagikan kode kepada mahasiswa untuk dapat bergabung di kelas Anda.</span>
       </div>

     </div>
     <div class="form-group">
      <label for="" class="col-sm-3 control-label">Status</label>
      <div class="col-sm-8">
        <select name="status_kelas" class="form-control required" required="">
          <option value="Aktif">Aktif</option>
          <option value="Tidak Aktif">Tidak Aktif</option>
        </select>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</div>
<!-- /.modal-content -->
</form>  
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

         <!-- About Me Box -->
         <!-- <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tugas</h3>
          </div> -->
          <!-- /.box-header -->
          <!-- <div class="box-body no-padding"> 
            <ul class="nav nav-pills nav-stacked">
              <li><a href=""><i class="fa fa-inbox"></i> Daftar Tugas</a></li>
              <li><a href=""><i class="fa fa-file-text-o"></i> Kelola Tugas</a></li>
            </ul> 
          </div> -->
          <!-- /.box-body -->
        <!-- </div> -->
        <!-- /.box -->

      </div>
      <!-- /.col -->

      <!-- jQuery 3 -->
      <script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
      <!-- iCheck -->
<script src="<?php echo base_url('AdminLTE/plugins/iCheck/icheck.min.js'); ?>"></script>
      <!-- SlimScroll -->
      <script src="<?php echo base_url('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url('AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js')?>"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo base_url('AdminLTE/dist/js/demo.js')?>"></script>
      <!-- DataTables -->
      <script src="<?php echo base_url('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
      <script src="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
      <!-- Select2 -->
      <script src="<?php echo base_url('AdminLTE/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
      <!-- InputMask -->
      <script src="<?php echo base_url('AdminLTE/plugins/input-mask/jquery.inputmask.js')?>"></script>
      <script src="<?php echo base_url('AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js')?>"></script>
      <script src="<?php echo base_url('AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js')?>"></script>
      <!-- bootstrap datepicker -->
      <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
    </body>
    </html>
