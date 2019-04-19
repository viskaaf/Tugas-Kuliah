<?php
$this->load->view('head_admin');
?>

<style type="text/css">
.detail-gambar{
  padding-top: 20px;
  width: 80%;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="box box-info col-xs-12" style="border-top-color: #fff">
      <h1>
        Data Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('AdminC/')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data Mahasiswa</li>
      </ol>
    </div>
  </section>

  <!-- Main Content -->  
  <section class="content" >
    <div class="row">
      <div class="col-xs-12">
        <!-- Alert -->
        <?php
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            <?=$data;?>
          </div>
          <!-- <div class="alert alert-success" id="success-alert"><strong>Sukses! </strong> <?=$data;?></div> -->
        <?php } ?>
        <?php 
        $data2=$this->session->flashdata('error');
        if($data2!=""){ ?>
          <div class="alert alert-danger" id="success-alert"><strong> Error! </strong> <?=$data2;?></div>
        <?php } ?>
        <!-- sampai sini -->
        <div class="box box-info" style="border-top-color: #fff">
          <!-- Box Header -->
          <div class="box-body">
            <!-- <button type="button" class="btn btn-primary pull-right" style="background-color: #002231" data-toggle="modal" data-target="#modal-add">Tambah Dosen</button> -->
            <div class="row" style="padding-bottom: 10px;">

            </div>
            <table id="universitas" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>NIM</center></th>
                  <th><center>Nama Dosen</center></th>
                  <th><center>Status</center></th>
                  <th><center>Opsi</center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0; foreach ($mahasiswa as $value): $no++; ?> 
                <tr>
                  <td><center><?php echo $no; ?></center></td>
                  <td><center><?php echo $value->nim; ?></center></td>
                  <td><center><?php echo $value->nama_depan . ' ' . $value->nama_belakang; ?></center></td>
                  <td><center>
                    <?php if($value->status == 'Aktif') { ?>
                      <span class="label label-success"><?php echo $value->status; ?></span>
                    <?php }else { ?> 
                      <span class="label label-default"><?php echo $value->status; ?></span>
                    <?php } ?>
                  </center></td>
                  <td><center>
                    <?php if($value->status == 'Aktif') { ?> 
                      <a class="btn btn-danger btn-xs tooltips" data-toggle="modal" data-target="#modal-nonaktif-<?php echo $value->id_user;?>-<?php echo $value->id_userrole;?>">
                        <span data-toggle="tooltip" data-original-title="Non-aktifkan Pengguna" <i class="fa fa-dot-circle-o"></i></span>
                      </a>
                    <?php }else { ?>
                      <a class="btn btn-success btn-xs tooltips" data-toggle="modal" data-target="#modal-aktif-<?php echo $value->id_user;?>-<?php echo $value->id_userrole;?>">
                        <span data-toggle="tooltip" data-original-title="Aktifkan Pengguna" <i class="fa fa-dot-circle-o"></i></span>
                      </a>
                    <?php } ?>
                    <a class="btn btn-info btn-xs tooltips" data-toggle="modal" data-target="#modal-lihat-<?php echo $value->id_user; ?>">
                      <span data-toggle="tooltip" data-original-title="Lihat Mahasiswa" <i class="fa fa-eye"></i></span>
                    </a></center>
                  </td>
                </tr>
              <?php  endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <?php foreach ($mahasiswa as $value) { ?>
      <!-- modal untuk tambah pengumuman -->
      <div class="modal fade" id="modal-nonaktif-<?php echo $value->id_user;?>-<?php echo $value->id_userrole;?>">
        <div class="modal-dialog" style="width: 400px;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><center>Non-Aktifkan Akun</center></h4>
              </div>
              <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('AdminC/nonAktifAkun/'.$value->id_user); ?>">
                <div class="modal-body text-center" style="padding-top: 20px; padding-bottom: 20px;">
                  <input type="hidden" name="id_kelas" value="<?php echo $value->id_user;?>">
                  <input type="hidden" name="id_kelas" value="<?php echo $value->id_userrole;?>">
                  <h5 class="modal-title"><b>Apakah Anda yakin untuk menonaktifkan akun ini?</b></h5>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                  <input class="btn btn-primary" type="submit" value="Ya" style="width: 50px;">
                </div>
              </form> 
            </div>
            <!-- /.modal-content --> 
          </div>
          <!-- /.modal-dialog -->
        </div>
      <?php } ?>
      <!-- /.modal -->


      <?php foreach ($mahasiswa as $value) { ?>
        <!-- modal untuk tambah pengumuman -->
        <div class="modal fade" id="modal-aktif-<?php echo $value->id_user;?>-<?php echo $value->id_userrole;?>">
          <div class="modal-dialog" style="width: 400px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><center>Aktifkan Akun</center></h4>
                </div>
                <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('AdminC/aktifkanAkun/'.$value->id_user); ?>">
                  <div class="modal-body text-center" style="padding-top: 20px; padding-bottom: 20px;">
                    <input type="hidden" name="id_kelas" value="<?php echo $value->id_user;?>">
                    <input type="hidden" name="id_kelas" value="<?php echo $value->id_userrole;?>">
                    <h5 class="modal-title"><b>Apakah Anda yakin untuk mengaktifkan akun ini?</b></h5>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <input class="btn btn-primary" type="submit" value="Ya" style="width: 50px;">
                  </div>
                </form> 
              </div>
              <!-- /.modal-content --> 
            </div>
            <!-- /.modal-dialog -->
          </div>
        <?php } ?>
        <!-- /.modal -->

        <?php $no=0; foreach ($mahasiswa as $value): $no++; ?>
        <!-- modal untuk tambah manual -->
        <div class="modal fade" id="modal-lihat-<?php echo $value->id_user; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><center>Detail Data Mahasiswa</center></h4>
                </div>
                <div class="modal-body" style="height: 330px">
                 <div class="col-md-4">
                  <?php if(!empty($value->foto_profil)){ ?>
                    <img class="detail-gambar" align="left" src="<?php echo base_url('gambar/'.$value->foto_profil)?>">
                  <?php }else{ ?>
                    <img class="detail-gambar" align="left" src="<?php echo base_url('gambar/'.'blankphoto.png')?>">
                  <?php } ?>
                </div>
                <div class="col-md-7">
                  <h2><?php echo $value->nama_depan . ' ' . $value->nama_belakang;?></h2> 
                  <h4><?php echo $value->nim;?></h4><br>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Universitas</th>
                        <td><?php echo $value->nama_univ;?></td>
                      </tr>
                      <tr>
                        <th style="width:50%">Jenis Kelamin</th>
                        <td><?php echo $value->jenis_kelamin;?></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td><?php echo $value->email;?></td>
                      </tr>
                      <tr>
                        <th>Status</th>
                        <td>
                          <?php if($value->status == 'Aktif') { ?>
                            <span class="label label-success"><?php echo $value->status; ?></span>
                          <?php }else { ?> 
                            <span class="label label-danger"><?php echo $value->status; ?></span>
                          <?php } ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      <?php  endforeach; ?>
    </div>
  </section>

</div>

<script>
  $(function () {
    $('#universitas').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });

    //Initialize Select2 Elements
    $('.select2').select2({
      placeholder : "Pilih Universitas",
      allowClear : true
    })
  })

  /** add active class and stay opened when selected */
  var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
      return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
  </script>
</body>
<footer class="main-footer">
  <strong><center>Copyright &copy; Tugas Kuliah.com</center></strong>
</footer>
</html>