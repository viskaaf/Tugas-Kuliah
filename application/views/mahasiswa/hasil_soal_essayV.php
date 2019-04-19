<?php
$this->load->view('head_soal');
?>

      <div class="box box-info col-xs-12" style="border-top-color: #fff; margin-top: 20px">
    <!-- <h3 class="box-title" style="font-size: 25px"><i class="fa fa-list"></i> Buat Soal</h3> -->
      <!-- <section class="content-header"> -->
    <h1>
      Hasil Soal Essay
    </h1>
  <!-- </section> -->
  <!-- <div style="margin-left: 15px; margin-right: 15px; margin-top: 10px;"> -->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('MahasiswaC') ?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url('MahasiswaC/detailKelas/'.$ket_soal['id_kelas']) ?>">Detail Kelas</a></li>
        <li class="active">Hasil Soal Essay</li>
    </ol>
  <!-- </div> -->
<div class="col-xs-7">
  <!-- Main content --> 
  <div class="box box-default" style="margin-top: 20px">
    <div class="box-header with-border">
      <center>
        <h1 class="box-title" style="font-size: 25px;"><b> <?php echo $ket_soal['nama_tugas'];?></b></h1>
        <p style="padding-top: 10px;"><i class="fa fa-calendar" ></i> Batas Pengerjaan: <?php echo tgl_indo(date("Y-m-d",strtotime($ket_soal['tgl_selesai']))); ?></p>
      </center>  
    </div>
    <div class="box-body">
      <input type="hidden" class="form-control" name="id_tugas" value="<?php echo $soal['id_tugas']; ?>">
      <input type="hidden" class="form-control" name="id_soal_essay" value="<?php echo $soal['id_soal_essay']; ?>">
      <!-- <input type="text" class="form-control" name="id_mhs" value="<?php echo $id_mhs; ?>"> -->
      <?php if($nilai['status_nilai'] == 'Belum Dinilai') { ?>
        <div class="alert alert-success alert-dismissible">
          <h4><i class="icon fa fa-check"></i> Sukses!</h4>
          Tugas berhasil dikumpulkan! Menunggu penilaian dari dosen. 
        </div>
      <?php } ?>
      
      <div class="attachment-block clearfix" style="margin-bottom: 40px;">
        <?php $link = base_url()."file_upload/".$jawaban['path_file']; ?>
        <a target="_blank" href="<?php echo $link;?>"><img class="attachment-img" src="<?php echo base_url()?>gambar/pdf.svg"></a>
        
        <div class="attachment-pushed">
          <h4 class="attachment-heading"><a target="_blank" href="<?php echo $link;?>"><?php echo $jawaban['path_file']; ?></a></h4>
          <div class="attachment-text">
            PDF File
          </div> 
          <!-- /.attachment-text -->
        </div> 
        <!-- /.attachment-pushed -->  
      </div>
      <h4>Catatan:</h4>
      <p><?php echo $jawaban['jawaban'];?></p>
    </div>
    <!-- /.box-body -->


  </div>
  <!-- /.content -->
</div> 

<div class="col-xs-5">
  <div class="box box-default" style="margin-top: 20px">
    <div class="box-header with-border">
      <center>
        <p>Nilai:</p>
        <?php if($nilai['status_nilai'] == 'Belum Dinilai') { ?>
        <h1 class="box-title" style="font-size: 25px;"><b> Belum Dinilai</b></h1>
        <?php }else { ?>
        <h1 class="box-title" style="font-size: 25px;"><b> <?php echo $nilai['nilai']; ?></b></h1>
        <?php } ?>
      </center>
    </div>
    <div class="box-header with-border">
      <p style="font-size: 12px;">Ditugaskan Oleh:</p>
      <div class="user-block">
        <?php if($ket_soal['foto_profil']) { ?>
          <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/'.$ket_soal['foto_profil'])?>" alt="user image">
          <?php
        }else { ?> 
          <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/blankphoto.png')?>" alt="user image">
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
  <div class="container text-center">
    Copyright &copy; 2018 <b><a class="text-black">Tugas Kuliah</a></b><br>
    All rights reserved
  </div>
  <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->