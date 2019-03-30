<?php
$this->load->view('head_soal');
?>

  <div style="margin-top: 20px; margin-bottom: 10px;">
  <?php
  $this->load->helper('form');
  $error = $this->session->flashdata('error');
  if($error)
  {
    ?>
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $this->session->flashdata('error'); ?>                    
    </div>
  <?php } ?>
  <?php  
  $sukses = $this->session->flashdata('sukses');
  if($sukses)
  {
    ?>
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $this->session->flashdata('sukses'); ?>
    </div>
  <?php } ?>
</div>
  <div class="box">
    <div class="box-header with-border">
      <!-- <center> -->
        <h3><b>Ringkasan Penilaian</b></h3>
      <!-- </center>  -->
    </div>
    <div class="box-body">
      <!-- <center> -->
        <p>Nama Tugas: <a href="<?php echo site_url('DosenC/tampilSoalPilgan/'.$ket_soal['id_tugas']); ?>" style="font-size: 20px;"><?php echo $ket_soal['nama_tugas'];?></a></p>
        <p>Batas Pengerjaan: <?php echo tgl_indo(date("Y-m-d",strtotime($ket_soal['tgl_selesai']))); ?></p>
      <!-- </center>  -->
    </div>
  </div>

<div class="nav-tabs-custom" style="margin-top: 20px;">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#semua" data-toggle="tab">Semua</a></li>
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
            </tr>
          </thead>
          <tbody>
            <?php 
              foreach ($jawaban as $i => $data) {
            ?>
            <tr>
              <td><center><?php echo $i+1; ?></center></td>
              <td><center><?php echo $data->nama_depan . ' ' . $data->nama_belakang ?></center></td>
              <td><center><?php echo $data->nim ?></center></td>
              <td><center><?php echo !empty($data->nilai) ? $data->nilai : '(tidak ada nilai)'; ?></center></td>
            </tr> 
          <?php } ?>
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