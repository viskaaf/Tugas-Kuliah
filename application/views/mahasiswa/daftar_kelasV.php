<?php
$this->load->view('head_mahasiswa');
?>

<div class="col-md-9">
  <div class="box-header with-border">
    <h3 class="box-title" style="font-size: 25px"><i class="fa fa-list"></i> Daftar Kelas</h3>
  </div>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('MahasiswaC') ?>"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Daftar Kelas</li>
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

  <?php if(empty($kelas)){ ?>
    <div class="box box-primary" style="padding-bottom: 30px; padding-top: 30px;">
      <div class="box-body" style="color: #525252">
        <center>
          <img class="img" style="width: 70px;" src="<?php echo base_url('gambar/list.png')?>">
        </center>
        <h4 style="padding-top: 10px; text-align: center;">
          Anda belum memiliki kelas
        </h4>
        <h5 style="padding-top: 30px; text-align: center;">
          <b>Langkah berikutnya: Bergabung ke Kelas</b>
        </h5>
        <h5 style="text-align: center;">
          Anda dapat bergabung ke kelas dengan klik tombol <b>Gabung Kelas</b> 
        </h5>
        <h5 style="text-align: center;">
          di samping kiri.
        </h5>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /. box -->
    <?php
  } else { ?>
    <div class="box box-primary">
      <div class="box-body">
        <div style="padding-bottom: 10px;">

      </div>

      <table id="datakelas" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Nama Kelas</center></th>
            <th><center>Status</center></th>
            <th><center>Opsi</center></th>
          </tr>
        </thead>
        <tbody>
         <?php $no=0; foreach ($kelas as $value): $no++; ?>
         <tr>
          <td><center><?php echo $no; ?></center></td>
          <td><center><?php echo $value->nama_kelas; ?></center></td>
          <td><center>
            <?php if($value->status_kelas == 'Aktif') { ?>
              <span class="label label-success"><?php echo $value->status_kelas; ?></span>
            <?php }else { ?>
              <span class="label label-danger"><?php echo $value->status_kelas; ?></span>
            <?php } ?>
          </center></td>
          <td><center>
            <a class="btn btn-primary btn-xs tooltips" href="<?php echo site_url('MahasiswaC/detailKelas/'.$value->id_kelas) ?>">
              <span data-toggle="tooltip" data-original-title="Detail Kelas" <i class="fa fa-eye"></i></span>
            </a></center>
          </td>
        </tr>
      <?php  endforeach; ?>
    </tbody>
  </table>



</div>
</div> 
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php } ?>

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


<script type="text/javascript">
  $(function () {
    $('#datakelas').DataTable()
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

</div>
<!-- ./wrapper -->