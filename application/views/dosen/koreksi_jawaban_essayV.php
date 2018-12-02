<?php
$this->load->view('head_soal');
?>


<div class="nav-tabs-custom" style="margin-top: 20px;">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#semua" data-toggle="tab">Semua</a></li>
      <li><a href="#belum" data-toggle="tab">Belum Dinilai</a></li>
      <li><a href="#sudah" data-toggle="tab">Sudah Dinilai</a></li>
    </ul>
    <div class="tab-content">
      <div class="active tab-pane" id="semua">
        <table id="semuadata" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Nama Mahasiswa</center></th>
              <th><center>NIM</center></th>
              <th><center>Hasil</center></th>
              <th><center>Opsi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php $no=0; $no++; ?>
            <tr>
              <td><center><?php echo $no; ?></center></td>
              <td><center></center></td>
              <td><center></center></td>
              <td><center></center></td>
              <td><center>
                <a class="btn btn-success btn-xs tooltips">
                  <span data-toggle="tooltip" data-original-title="Detail Kelas" <i class="fa fa-search"></i></span>
                </a></center>
              </td>
            </tr> 
          <?php ?>
        </tbody>
      </table>
    </div>
    <!-- /.tab-pane -->

    <div class="tab-pane" id="belum">
      <table id="belumdinilai" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Nama Mahasiswa</center></th>
              <th><center>NIM</center></th>
              <th><center>Hasil</center></th>
              <th><center>Opsi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php $no=0; $no++; ?>
            <tr>
              <td><center><?php echo $no; ?></center></td>
              <td><center></center></td>
              <td><center></center></td>
              <td><center></center></td>
              <td><center>
                <a class="btn btn-warning btn-xs tooltips">
                  <span data-toggle="tooltip" data-original-title="Koreksi Jawaban" <i class="fa fa-file-text-o"></i></span>
                </a></center>
              </td>
            </tr> 
          <?php ?>
        </tbody>
  </table>
</div>
<!-- /.tab-pane -->

<div class="tab-pane" id="sudah">
      <table id="sudahdinilai" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Nama Mahasiswa</center></th>
              <th><center>NIM</center></th>
              <th><center>Hasil</center></th>
              <th><center>Opsi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php $no=0; $no++; ?>
            <tr>
              <td><center><?php echo $no; ?></center></td>
              <td><center></center></td>
              <td><center></center></td>
              <td><center></center></td>
              <td><center>
                <a class="btn btn-warning btn-xs tooltips">
                  <span data-toggle="tooltip" data-original-title="Edit Koreksi Jawaban" <i class="fa fa-edit"></i></span>
                </a></center>
              </td>
            </tr> 
          <?php ?>
        </tbody>
  </table>
</div>
<!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->



</div>
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

<script>
  $(function () {
    $('#semuadata').DataTable()
    $('#examples2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $(function () {
    $('#belumdinilai').DataTable()
    $('#examples2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $(function () {
    $('#sudahdinilai').DataTable()
    $('#examples2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<footer class="main-footer">
  <div class="container">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a>Tugas Kuliah</a>.</strong> All rights
    reserved.
  </div>
  <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->