<?php
$this->load->view('head_soal'); 
?>

<div class="col-xs-7">
  <!-- Main content --> 
  <div class="box box-primary" style="margin-top: 20px">
    <div class="box-header with-border">
      <center>
        <h1 class="box-title" style="font-size: 25px;"><b> <?php echo $nilai['nama_depan'] . ' ' . $nilai['nama_belakang'];?></b></h1>
        <p style="padding-top: 10px;">NIM: <?php echo $nilai['nim']; ?></p>
      </center> 
    </div>
    <form method="POST" action="<?php echo site_url('DosenC/editNilaiEssay')?>">
    <div class="box-body">
      <input type="hidden" class="form-control" name="id_tugas" value="<?php echo $nilai['id_tugas']; ?>">
      <input type="hidden" class="form-control" name="id_soal_essay" value="<?php echo $nilai['id_jawaban_essay']; ?>">
      <input type="hidden" class="form-control" name="id_mhs" value="<?php echo $nilai['id_mhs']; ?>">
      <input type="hidden" class="form-control" name="id_nilai" value="<?php echo $nilai['id_nilai']; ?>">
      
      <div class="attachment-block clearfix" style="margin-bottom: 40px;">
        <?php $link = base_url()."file_upload/".$nilai['path_file']; ?>
        <a target="_blank" href="<?php echo $link;?>"><img class="attachment-img" src="<?php echo base_url()?>gambar/pdf.svg"></a>
        
        <div class="attachment-pushed">
          <h4 class="attachment-heading"><a target="_blank" href="<?php echo $link;?>"><?php echo $nilai['path_file']; ?></a></h4>
          <div class="attachment-text">
            PDF File
          </div>
          <!-- /.attachment-text -->
        </div> 
        <!-- /.attachment-pushed --> 
      </div> 
      <h4>Catatan:</h4>
      <p><?php echo $nilai['jawaban'];?></p> 
    </div>
    <!-- /.box-body -->


  </div>
  <!-- /.content -->
</div> 

<div class="col-xs-5">
  <div class="box box-primary" style="margin-top: 20px">
    <div class="box-header with-border">
      <center>
        <p>Nilai:</p>
        <input type="text" class="text-center" style="width: 70px;" name="nilai" value="<?php echo $nilai['nilai'];?>">
      </center>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
    </div>
  </div>
</div>
</form>
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