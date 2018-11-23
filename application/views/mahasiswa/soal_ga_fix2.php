<?php
$this->load->view('head_soal');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Top Navigation
  </h1>
</section><br>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('MahasiswaC') ?>"><i class="fa fa-home"></i> Beranda</a></li>
  <li><a href="#">Buat Soal</a></li>
  <li class="active">Soal Pilihan Ganda</li>
</ol>
<!-- /.content-header -->

<!-- Main content -->
<div class="box box-primary">
  <?php $pilihan = 1; foreach($soal as $value) { $nomor=$nomor+1; ?>
   <!-- form start -->
     <form role="form" action="" method="POST">
      <div class="box-body">
        <div style="padding-bottom: 10px">
          <input type="hidden" name="id_soal_pilgan" value="<?php echo $value->id_soal_pilgan; ?>">
          <div>
            <span><?php echo $nomor; ?>.</span>
            <span style="padding-left: 20px"><?php echo $value->soal_pilgan; ?></span>
          </div>
          <?php if(!empty($value->gambar)) { ?>
          <div style="padding-left: 33px;">
            <img src="<?php echo base_url('gambar/gambar_pilgan/'.$value->gambar);?>">
          </div>
          <?php } ?>
          <div style="padding-left: 33px"><input name="pilgan<?php echo $pilihan; ?>" type="radio" value="A"> A. <?php echo "$value->pil_a";?></div>
          <div style="padding-left: 33px"><input name="pilgan<?php echo $pilihan; ?>" type="radio" value="B"> B. <?php echo "$value->pil_b";?></div>
          <?php if(!empty($value->pil_c)) { ?>
          <div style="padding-left: 33px"><input name="pilgan<?php echo $pilihan; ?>" type="radio" value="C"> C. <?php echo "$value->pil_c";?></div>
          <?php } ?>
          <?php if(!empty($value->pil_d)) { ?>
          <div style="padding-left: 33px"><input name="pilgan<?php echo $pilihan; ?>" type="radio" value="D"> D. <?php echo "$value->pil_d";?></div>
          <?php } ?>
          <?php if(!empty($value->pil_e)) { ?>
          <div style="padding-left: 33px"><input name="pilgan<?php echo $pilihan; ?>" type="radio" value="E"> E. <?php echo "$value->pil_e";?></div>
          <?php } ?>

        </div>        
  <?php $pilihan++; } ?>

    <div class="box-footer">
          <center>
            <button type="submit" class="btn btn-success">Selesai</button>
          </center>
        </div>
  </div>
</form>
</div>
<!-- /.content -->

</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(function () {


  });
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