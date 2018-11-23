<?php
$this->load->view('head_mahasiswa');
?>

<div class="col-md-9">
  <div class="box-header with-border">
    <h3 class="box-title" style="font-size: 25px"><i class="fa fa-home"></i> Beranda</h3>
  </div>
  <ol class="breadcrumb">
    <li class="active"><a href="<?php echo base_url('MahasiswaC') ?>"><i class="fa fa-home"></i> Beranda</a></li>
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

<?php if(empty($pengumuman)){ ?>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Pengumuman</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="padding-top: 20px; padding-bottom: 20px;">
      <p>
        <center>Tidak ada pengumuman yang dibuat.</center>
      </p>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /. box -->
  <?php
} else { ?>

  <?php foreach($pengumuman as $value) { ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="user-block">
          <?php if($value->foto_profil) { ?>
            <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/'.$value->foto_profil)?>" alt="user image">
          <?php
          }else { ?> 
            <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/admin.png')?>" alt="user image">
          <?php } ?>
          <span class="username">
            <a href="#"><?php echo $value->nama_depan.' '; echo $value->nama_belakang;?></a>
            <a style="color: #999; font-size: 13px">dikirim ke <b><?php echo $value->nama_kelas;?></b></a>
            <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
          </span>
          <span class="description"><?php echo tgl_indo(date("Y-m-d",strtotime($value->createDtm))); ?> - <?php echo date("H:i",strtotime($value->createDtm)); ?></span>
        </div>
        <!-- /.user-block -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <p>
            <?php echo $value->pengumuman;?>
          </p>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /. box -->
  <?php } ?>
<?php } ?>

</div>
<!-- /.col -->
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
    });

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
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </div>
  <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->