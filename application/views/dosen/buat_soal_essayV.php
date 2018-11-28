<?php
$this->load->view('head_dosen');
?>


<div class="col-md-9">
    <div class="box-header with-border">
      <h3 class="box-title" style="font-size: 25px"><i class="fa fa-list"></i> Buat Soal</h3>
    </div>
    <!-- /.box-header -->
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
  <div class="callout callout-info">
    <h4><i class="fa fa-info-circle"></i> PERHATIAN!</h4>
    Berkas yang diunggah dapat berupa berkas <b>.pdf</b> atau apabila membutuhkan lebih dari satu berkas, maka berkas dapat berupa <b>.zip</b>.
  </div>
  <div class="box box-default">
    <?php echo form_open_multipart('DosenC/tambahSoalEssay') ?>
    <div class="box-body">
      <input type="hidden" class="form-control" name="id_tugas" value="<?php echo $tugas; ?>">
      <div class="form-group">
        <label for="deskripsiSoal" class="col-sm-3">Keterangan</label>
        <div class="col-sm-12">
        <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan..."></textarea>
      </div>
      </div> 
      <div class="form-group">
        <div class="col-sm-3">
          <p><i class="fa fa-paperclip"></i> Lampiran</p>
        </div>
        <div class="col-sm-12">
          <input type="file" name="file_soal" id="file_soal">
        </div>
        <!-- <p class="help-block">Max. 32MB</p> -->
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer"> 
      <div class="pull-right">
        <button type="submit" class="btn btn-default">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div> 
    <!-- /.box-footer -->
    <?php echo form_close(); ?>
  </div>
  <!-- /. box -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

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

    //Initialize Select2 Elements
    $('.select2').select2()
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
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->