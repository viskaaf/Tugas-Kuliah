<?php
$this->load->view('head_dosen');
?>

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
              <img class="profile-user-img img-responsive img-circle" src="AdminLTE/dist/img/user4-128x128.jpg" alt="User profile picture"> 

              <h3 class="profile-username text-center">Nina Mcintire</h3>

              <p class="text-muted text-center">Dosen</p>

              <p class="text-muted text-center">Universitas Gadjah Mada</p>
              <br>
              <a href="#" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Mata Kuliah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding"> 
                <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Daftar Mata Kuliah
                  <!-- <span class="label label-primary pull-right">12</span></a></li> -->
                <!-- <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li> -->
                <li><a href="#"><i class="fa fa-file-text-o"></i> Kelola Mata Kuliah</a></li>
               <!--  <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Soal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding"> 
                <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-inbox"></i> Daftar Soal
                  <!-- <span class="label label-primary pull-right">12</span></a></li> -->
                <!-- <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li> -->
                <li><a href="#"><i class="fa fa-file-text-o"></i> Kelola Soal</a></li>
               <!--  <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div style="padding-bottom: 15px; width: 20%;">
            <button type="button" class="btn btn-block btn-primary">Tambah Mata Kuliah</button>
          </div>
          <div class="box">
            <table id="datasoal1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Kuliah</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Tugas Sistem Informasi</td>
                  <td>Aktif</td>
                  <td>Detail</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Aljabar</td>
                  <td>Tidak Aktif</td>
                  <td>Detail</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->