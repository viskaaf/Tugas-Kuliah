<?php
$this->load->view('head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="box box-info col-xs-12" style="border-top-color: #fff">
      <h1>
        Detail Data Dosen
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('AdminC/')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('AdminC/daftarDosen')?>">Data Dosen</a></li>
        <li class="active">Detail Data Dosen</li>
      </ol>
    </div>
  </section>

  <!-- Main Content --> 
  <section class="content" >
    <div class="row">
      <!-- Alert -->
      <?php
      $data=$this->session->flashdata('sukses');
      if($data!=""){ ?>
        <div class="alert alert-success" id="success-alert"><strong>Sukses! </strong> <?=$data;?></div>
      <?php } ?>
      <?php 
      $data2=$this->session->flashdata('error');
      if($data2!=""){ ?>
        <div class="alert alert-danger" id="success-alert"><strong> Error! </strong> <?=$data2;?></div>
      <?php } ?>
      <!-- sampai sini -->

      <section class="col-lg-12 connectedSortable">
        <div class="box box-info">
          <div class="box-body">
            <div class="row">
              <div class="col-md-3">
                <?php if(!empty($dosen['gambar'])){ ?>
                  <img class="detail-gambar" align="left" src="<?php echo base_url('images/'.$dosen['gambar'])?>">
                <?php }else{ ?>
                  <p style="padding-top: 90px;"><center>Belum ada gambar.</center></p>
                <?php } ?>
              </div>
              <div class="col-md-6">
                <address>
                  <h2><?php echo $dosen['nama_depan'] . ' ' . $dosen['nama_belakang'];?></h2> 
                  <h4><?php echo $dosen['nip'];?></h4><br>
                  <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Jenis Kelamin</th>
                      <td>$250.30</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>$10.34</td>
                    </tr>
                    <tr>
                      <th>Pass</th>
                      <td>$5.80</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>$265.24</td>
                    </tr>
                  </table>
                  </div>
                </address>
              </div>
              <div class="col-md-3">
                <strong>Status barang : </strong> 
                <div style="font-size: 20px;"><?php if($getproduk['status_barang'] == "Tersedia"){ ?>
                  <span class="label label-success"><?php echo $getproduk['status_barang']; ?></span>
                <?php } elseif($getproduk['status_barang'] == "Tidak Tersedia"){?>
                  <span class="label label-default"><?php echo $getproduk['status_barang']; ?></span>
                <?php } ?>
              </div><br>
              Stok : <span><?php echo $getproduk['stok'] ;?></span>
            </div>
          </div>
          <br>
        </div>
      </div>
    </section>

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