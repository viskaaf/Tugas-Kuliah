<?php
$this->load->view('head_dosen');
?>

<div class="col-md-9">
  <div class="box-header with-border">
    <h3 class="box-title" style="font-size: 25px"><i class="fa fa-list"></i> Buat Soal</h3>
  </div>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('DosenC') ?>"><i class="fa fa-home"></i> Beranda</a></li>
    <li><a href="#">Detail Kelas</a></li>
    <li class="active">Buat Soal</li>
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
  <div class="box box-primary">
    <div class="box-header with-border">
      <label>Buat Soal: </label> 
      <a class="btn btn-primary" href="<?php echo site_url('DosenC/soalPilgan/'.$id_kelas.'/'.$tugas['id_tugas']);?>"><i class="fa fa-plus-square"></i> Buat Soal</a>
      <a class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-file"></i> Import Soal</a>
    </div>
    <!-- /.box-header -->
    <div class="box-header with-border">
      <div class="callout callout-info">
              <h4><i class="fa fa-info-circle"></i> PERHATIAN!</h4>
              <p>Untuk membuat soal secara manual bisa klik tombol <b>Buat Soal</b>. Soal juga dapat diimport dari file .xlxs dengan klik tombol <b>Import Soal</b>.</p>
            </div>
    </div>
    <!-- /.box-header -->
  </div>
  <!-- /.box -->

  <!-- modal untuk tambah manual --> 
  <form action="<?php echo site_url('DosenC/importexcel') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><center>Import Soal</center></h4>
          </div>
          <div class="modal-body">
            <div class="callout callout-warning">
              <h4><i class="fa fa-info-circle"></i> PERHATIAN!</h4>
              <p>File yang diunggah hanya dapat file dengan format <b>.xlsx</b>.</p>
              <p>Dokumen excel bisa diunduh <a href="<?php echo base_url('berkas/Import_soal.xlsx')?>"><b> di sini.</b></a></p>
            </div>
              <input type="text" name="id_tugas" value="<?php echo $tugas['id_tugas']; ?>">
             <div class="form-group">
              <label for="upload_soal" class="col-sm-3">Unggah File</label>
              <input type="File" name="file" id="upload_soal" class="col-sm-10" required="">
              <p class="help-block col-sm-10"><i>Ukuran maksimal 10MB.</i></p>
            </div>

            <div class="modal-footer">
               <input type="submit" class="btn btn-primary" name="simpan" value="Simpan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
              <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
            </div>
          </div>
          <!-- /.modal-content --> 
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    </form> 
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

<script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2();

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