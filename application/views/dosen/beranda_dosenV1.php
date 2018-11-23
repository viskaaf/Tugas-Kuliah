<?php
$this->load->view('head_dosen1');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --> 
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <!-- Main Content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
      <div style="padding-bottom: 15px; width: 12%;">
        <button type="button" class="btn btn-block btn-primary">Buat Soal</button>
      </div>
        <div class="box">
          <!-- Box Header -->
          <div class="box-body">
            <div class="row" style="padding-bottom: 15px;">
              
            </div>
            <table id="datasoal1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Soal</th>
                  <th>Jenis Soal</th>
                  <th>Mata Kuliah</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Tugas Sistem Informasi</td>
                  <td>Essay</td>
                  <td>Sistem Informasi</td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Aljabar</td>
                  <td>Pilihan Ganda</td>
                  <td>Matematika</td>
                  <td>Tidak Aktif</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
<script>
  $(function () {
    $('#datasoal1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
 <footer class="main-footer">
    <strong><center>Copyright &copy; Tugas Kuliah.com</center></strong>
  </footer>
</html>