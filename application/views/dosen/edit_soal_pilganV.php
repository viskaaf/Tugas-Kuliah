<?php
$this->load->view('head_dosen');
?>

<div class="col-md-9">
  <div class="box-header with-border">
    <h3 class="box-title" style="font-size: 25px"><i class="fa fa-list"></i> Buat Soal</h3>
  </div>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('DosenC') ?>"><i class="fa fa-home"></i> Beranda</a></li>
    <li><a href="#">Buat Soal</a></li>
    <li class="active">Soal Pilihan Ganda</li>
  </ol>
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

    <!-- Horizontal Form -->
    <div class="box box-primary"><br>
      <!-- form start -->
      <div class="form-horizontal">
        <?php echo form_open_multipart('DosenC/tambahSoalPilgan/') ?>
        <div class="box-body"> 
          <input type="hidden" class="form-control" name="id_soal_pilgan" value="<?php echo $soal['id_soal_pilgan']; ?>">

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Pertanyaan No. [<?php echo $nomor; ?>] <span style="color: red;">*</span></label>
            <div class="col-sm-8">
              <textarea class="form-control" rows="3" name="soal_pilgan" id="soal_pilgan" required><?php echo $soal['soal_pilgan']; ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Gambar <sup>(optional)</sup></label>
            <div class="col-sm-8">
              <input type="file" class="form-control" name="gambar" id="gambar">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Pilihan A <span style="color: red;">*</span></label>
            <div class="col-sm-8">
             <textarea class="form-control" rows="1" name="pil_a" id="pil_a" required><?php echo $soal['pil_a']; ?></textarea>
           </div>
         </div>

         <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">Pilihan B <span style="color: red;">*</span></label>
          <div class="col-sm-8">
            <textarea class="form-control" rows="1" name="pil_b" id="pil_b" required><?php echo $soal['pil_b']; ?></textarea>
          </div>
          <div id="tambah_pilsoalC" <?php if(!empty($soal['pil_c'])) { ?> style="display: none;"<?php }?>>
            <a class="btn btn-primary btn-xs tooltips" name="tambah_soal1" id="tambah_pil1" style="margin-top: 6px;">
              <span data-toggle="tooltip" data-original-title="Tambah pilihan soal" <i class="fa fa-plus-square"></i></span>
            </a>
          </div>
        </div>

      <div class="form-group" id="pil_c" <?php if(empty($soal['pil_c'])){ ?> style="display: none;"<?php }?>>
        <label for="inputPassword3" class="col-sm-3 control-label">Pilihan C</label>
        <div class="col-sm-8">
          <textarea class="form-control" rows="1" name="pil_c"><?php echo $soal['pil_c']; ?></textarea>
        </div>
        <div id="tambah_pilsoalD" <?php if(!empty($soal['pil_d'])) { ?> style="display: none;"<?php }?>>
            <a class="btn btn-primary btn-xs tooltips" name="tambah_soal2" id="tambah_pil2" style="margin-top: 6px;">
              <span data-toggle="tooltip" data-original-title="Tambah pilihan soal" <i class="fa fa-plus-square"></i></span>
            </a>
            <a class="btn btn-danger btn-xs tooltips" name="hapus_pil2" id="hapus_pil2" style="margin-top: 6px;">
              <span data-toggle="tooltip" data-original-title="Hapus pilihan soal" <i class="fa fa-remove"></i></span>
            </a>
        </div>
      </div>

      <div class="form-group" id="pil_d" <?php if(empty($soal['pil_d'])){ ?> style="display: none;"<?php }?>>
        <label for="inputPassword3" class="col-sm-3 control-label">Pilihan D</label>
        <div class="col-sm-8">
          <textarea class="form-control" rows="1" name="pil_d"><?php echo $soal['pil_d']; ?></textarea>
        </div>
        <div id="tambah_pilsoalE" <?php if(!empty($soal['pil_e'])) { ?> style="display: none;"<?php }?>>
            <a class="btn btn-primary btn-xs tooltips" name="tambah_soal3" id="tambah_pil3" style="margin-top: 6px;">
              <span data-toggle="tooltip" data-original-title="Tambah pilihan soal" <i class="fa fa-plus-square"></i></span>
            </a>
            <a class="btn btn-danger btn-xs tooltips" name="hapus_pil3" id="hapus_pil3" style="margin-top: 6px;">
              <span data-toggle="tooltip" data-original-title="Hapus pilihan soal" <i class="fa fa-remove"></i></span>
            </a>
        </div>
      </div>

      <div class="form-group" id="pil_e" <?php if(empty($soal['pil_e'])){ ?> style="display: none;"<?php }?>>
        <label for="inputPassword3" class="col-sm-3 control-label">Pilihan E</label>
        <div class="col-sm-8">
          <textarea class="form-control" rows="1" name="pil_e"><?php echo $soal['pil_e']; ?></textarea>
        </div>
        <div id="tambah_pilsoal" <?php if(!empty($soal['pil_e'])) { ?> <?php }?>>
            <a class="btn btn-danger btn-xs tooltips" name="hapus_pil4" id="hapus_pil4" style="margin-top: 6px;">
              <span data-toggle="tooltip" data-original-title="Hapus pilihan soal" <i class="fa fa-remove"></i></span>
            </a>
          </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Kunci <span style="color: red;">*</span></label>
        <div class="col-sm-6">
          <input type="radio" name="kunci" id="kunciA" value="A" <?php if($soal['kunci']=='A'){echo "checked";}?> class="minimal"/> A
          <span><input type="radio" name="kunci" id="kunciB" value="B" <?php if($soal['kunci']=='B'){echo "checked";}?> class="minimal"> B</span>
          <span id="kunciC" <?php if(empty($soal['kunci'])) { ?> style="display: none;"<?php }?>>
            <input type="radio" name="kunci" value="C" <?php if($soal['kunci']=='C'){echo "checked";}?> class="minimal"> C
          </span>
          <span id="kunciD" <?php if(empty($soal['kunci'])) { ?> style="display: none;"<?php }?>>
            <input type="radio" name="kunci" value="D" <?php if($soal['kunci']=='D'){echo "checked";}?> class="minimal"> D
          </span>
          <span id="kunciE" <?php if(empty($soal['kunci'])) { ?> style="display: none;"<?php }?>>
            <input type="radio" name="kunci" value="E" <?php if($soal['kunci']=='E'){echo "checked";}?> class="minimal"> E
          </span>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="pull-right">        
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php echo form_close(); ?>
</div>
<!-- /.box -->
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    $("#tambah_pil1").click(function() {
      $("#pil_c").show();
      $("#tambah_pilsoalC").hide();
      $("#tambah_pilsoalD").show();
      $("#kunciC").show();
    });

    $("#tambah_pil2").click(function() {
      $("#pil_d").show();
      $("#tambah_pilsoalD").hide();
      $("#tambah_pilsoalE").show();
      $("#kunciD").show();
    });

    $("#tambah_pil3").click(function() {
      $("#pil_e").show();
      $("#tambah_pilsoalE").hide();
      $("#kunciE").show();
    });

    $("#hapus_pil2").click(function() {
      $("#pil_c").hide();
      $("#tambah_pilsoalC").show();
      $("#kunciC").hide();
    });

    $("#hapus_pil3").click(function() {
      $("#pil_d").hide();
      $("#tambah_pilsoalD").show();
      $("#kunciD").hide();
    });

    $("#hapus_pil4").click(function() {
      $("#pil_e").hide();
      $("#tambah_pilsoalE").show();
      $("#kunciE").hide();
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });

  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#nama_fakultas').change(function(){
      var id_fakultas=$('#nama_fakultas').val();
      $.get('<?php echo site_url('DosenC/get_prodi/') ?>'+id_fakultas, function(resp){
        $('#nama_prodi').html(resp);
      });
    });
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