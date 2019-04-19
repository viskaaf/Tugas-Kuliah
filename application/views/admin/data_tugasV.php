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
        Data Tugas
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('AdminC/')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data Tugas</li>
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
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Error!</h4>
            <?=$data2;?>
          </div>
          <!-- <div class="alert alert-danger" id="success-alert"><strong> Error! </strong> <?=$data2;?></div> -->
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
                  <th><center>Nama Tugas</center></th>
                  <th><center>Tanggal Selesai</center></th>
                  <th><center>Waktu</center></th>
                  <th><center>Jenis Tugas</center></th>
                  <th><center>Kelas</center></th>
                  <th><center>Status</center></th>
                  <th><center>Opsi</center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0; foreach ($tugas as $value): $no++; ?> 
                <tr>
                  <td><center><?php echo $no; ?></center></td>
                  <td><center><?php echo $value->nama_tugas; ?></center></td>
                  <td><center><?php echo tgl_indo(date("Y-m-d",strtotime($value->createDtm))); ?></center></td>
                  <td><center><?php echo $value->waktu; ?></center></td>
                  <td><center><?php echo $value->jenis_tugas; ?></center></td>
                  <td><center><?php echo $value->nama_kelas; ?></center></td>  
                  <td><center>
                    <?php if($value->status_tugas == 'Aktif') { ?>
                      <span class="label label-success"><?php echo $value->status_tugas; ?></span>
                    <?php }else { ?> 
                      <span class="label label-default"><?php echo $value->status_tugas; ?></span>
                    <?php } ?>
                  </center></td>
                  <td><center>
                    <?php if($value->status_tugas == 'Aktif') { ?> 
                      <a class="btn btn-danger btn-xs tooltips" data-toggle="modal" data-target="#modal-nonaktif-<?php echo $value->id_tugas;?>">
                        <span data-toggle="tooltip" data-original-title="Non-aktifkan Tugas" <i class="fa fa-dot-circle-o"></i></span>
                      </a>
                    <?php }else { ?>
                      <a class="btn btn-success btn-xs tooltips" data-toggle="modal" data-target="#modal-aktif-<?php echo $value->id_tugas;?>">
                        <span data-toggle="tooltip" data-original-title="Aktifkan Tugas" <i class="fa fa-dot-circle-o"></i></span>
                      </a>
                    <?php } ?>
                  </center>
                  </td>
                </tr>
              <?php  endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <?php foreach ($tugas as $value) { ?>
      <!-- modal untuk tambah pengumuman -->
      <div class="modal fade" id="modal-nonaktif-<?php echo $value->id_tugas;?>">
        <div class="modal-dialog" style="width: 400px;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><center>Non-Aktifkan Tugas</center></h4>
              </div>
              <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('AdminC/ubahStatusTidakAktifTugas/'.$value->id_tugas); ?>">
                <div class="modal-body text-center" style="padding-top: 20px; padding-bottom: 20px;">
                  <input type="text" name="id_kelas" value="<?php echo $value->id_tugas;?>">
                  <h5 class="modal-title"><b>Apakah Anda yakin untuk menonaktifkan tugas ini?</b></h5>
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


      <?php foreach ($tugas as $value) { ?>
        <!-- modal untuk tambah pengumuman -->
        <div class="modal fade" id="modal-aktif-<?php echo $value->id_tugas;?>">
          <div class="modal-dialog" style="width: 400px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><center>Aktifkan Tugas</center></h4>
                </div>
                <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('AdminC/ubahStatusAktifTugas/'.$value->id_tugas); ?>">
                  <div class="modal-body text-center" style="padding-top: 20px; padding-bottom: 20px;">
                    <input type="text" name="id_kelas" value="<?php echo $value->id_tugas;?>">
                    <h5 class="modal-title"><b>Apakah Anda yakin untuk mengaktifkan tugas ini?</b></h5>
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