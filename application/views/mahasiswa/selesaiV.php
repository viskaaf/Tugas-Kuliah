<?php
$this->load->view('head_soal');
?>

<!-- Main content -->
<div class="col-xs-7" style="margin-left: 250px; margin-top: 150px;">
  <div class="box box-primary">
    <div class="row">
      <div class="col-xs-12">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tags"></i><b> <?php echo $soal['nama_tugas'];?></b></h3>
        </div>
        <div class="box-body">
          <div class="form-group" style="padding-left: 50px">
            <input type="hidden" name="id_mhs" value="<?php echo $id_mhs;?>">
            <input type="hidden" name="id_tugas" value="<?php echo $soal['id_tugas'];?>">
            <?php 
            $q = $this->MahasiswaM->getSoalPilgan($soal['id_tugas'])->num_rows();?>
            <p style="font-size: 13px;">Total Pertanyaan: <?php echo $q; ?> | Waktu: <?php echo $soal['waktu'];?> menit</p>
            <p style="font-size: 13px;"><b>Tugas ini telah selesai. Untuk melihat hasil silahkan klik tombol dibawah.</b></p><br>
            <a href="<?php echo site_url('MahasiswaC/tampilHasil/'.$soal['id_tugas']); ?>" class="btn btn-default" type="submit">Lihat Hasil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content -->

</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

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