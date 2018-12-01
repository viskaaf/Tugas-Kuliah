<?php
$this->load->view('head_soal');
?>

<div class="col-xs-7">
  <!-- Main content --> 
  <div class="box box-primary" style="margin-top: 20px">
    <div class="box-header with-border">
      <center>
        <h1 class="box-title" style="font-size: 25px;"><b> <?php echo $ket_soal['nama_tugas'];?></b></h1>
        <p style="padding-top: 10px;"><i class="fa fa-calendar" ></i> Batas Pengerjaan: <?php echo tgl_indo(date("Y-m-d",strtotime($ket_soal['tgl_selesai']))); ?></p>
      </center> 
    </div>
    <?php echo form_open_multipart('MahasiswaC/jawabSoalEssay') ?>
    <div class="box-body">
      <input type="hidden" class="form-control" name="id_tugas" value="<?php echo $soal['id_tugas']; ?>">
      <input type="hidden" class="form-control" name="id_soal_essay" value="<?php echo $soal['id_soal_essay']; ?>">
      
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer"> 
      <div class="pull-right">
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
    </div> 
    <!-- /.box-footer -->
    <?php echo form_close(); ?>


  </div>
  <!-- /.content -->
</div> 

<div class="col-xs-5">
  <div class="box box-primary" style="margin-top: 20px">
    <div class="box-header with-border">
      <p style="font-size: 12px;">Ditugaskan Oleh:</p>
      <div class="user-block">
        <?php if($ket_soal['foto_profil']) { ?>
          <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/'.$ket_soal['foto_profil'])?>" alt="user image">
          <?php
        }else { ?> 
          <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/admin.png')?>" alt="user image">
        <?php } ?>
        <span class="username" style="font-size: 11px;">
          <a href="#"><?php echo $ket_soal['nama_depan'].' '; echo $ket_soal['nama_belakang'];?></a>
        </span>
        <span class="description" style="font-size: 11px;">Dosen</span>
      </div>
      <!-- /.user-block -->
    </div>
    <div class="box-body">
      <p style="margin-top: 10px;"><?php echo $soal['keterangan'];?></p>

      <div class="attachment-block clearfix">
        <?php $link = base_url()."file_upload/".$soal['path_file']; ?>
        <a target="_blank" href="<?php echo $link;?>"><img class="attachment-img" src="<?php echo base_url()?>gambar/pdf.svg"></a>
        
        <div class="attachment-pushed">
          <h4 class="attachment-heading"><a target="_blank" href="<?php echo $link;?>"><?php echo $soal['path_file']; ?></a></h4>

          <div class="attachment-text">
            PDF File
          </div>
          <!-- /.attachment-text -->
        </div>
        <!-- /.attachment-pushed -->
      </div>
    </div>

  </div>
</div>

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