<?php
$this->load->view('head_mahasiswa');
?>

<div class="col-md-9">
  <div class="box-header with-border">
    <h3 class="box-title" style="font-size: 25px"><i class="fa fa-user"></i> Profil</h3>
  </div>
  <br>

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

    <div class="col-md-6">
      <div class="box box-widget widget-user-2">
        <div class="widget-user-header bg-primary" > 
          <h4 style="padding-left: 10px;">Daftar Kelas
            <a class="btn btn-primary btn-xs tooltips pull-right" style="margin-right: 10px;" data-toggle="modal" data-target="#modal-add">
          <span data-toggle="tooltip" data-original-title="Gabung Kelas" <i class="fa fa-plus"></i></span></a></h4>
        </div>
        <div class="box-footer no-padding">
          <?php if(empty($kelas)) { ?>
            <ul class="nav nav-stacked text-center">
              <li><a><i>-Tidak ada-</i></a></li>
            </ul>
          <?php }else{ ?>
            <?php foreach ($kelas as $value) { ?>
              <ul class="nav nav-stacked">
                <li><a href="<?php echo site_url('MahasiswaC/detailKelas/'.$value->id_kelas) ?>" style="padding-left: 30px;"><?php echo $value->nama_kelas;?><i class="fa fa-mortar-board pull-right" style="color: #5F9EA0; padding-right: 20px;"></i></a></li>
              </ul>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>

<!-- modal untuk tambah manual -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog" style="width: 400px;">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Gabung Kelas</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('MahasiswaC/gabungKelas/')?>">
          <input type="hidden" class="col-sm-10 form-control" name="id_mhs" <?php if(!empty($id_mhs['id_mhs'])){ ?> value="<?php echo $id_mhs['id_mhs']; ?>" <?php } ?>>
          <div class="form-group" style="padding-left: 20px;">
           <label for="" class="col-sm-4 control-label">Kode Kelas</label>
           <div class="col-sm-6">
             <input type="text" class="col-sm-10 form-control" name="kode" placeholder="Masukkan kode kelas" required oninvalid="this.setCustomValidity('Isi kode kelas.')" oninput="setCustomValidity('')">
           </div>
         </div>      
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Gabung</button>
  </div>
</div>
<!-- /.modal-content --> 
</form>  
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

    <div class="col-md-6">
    <div class="box box-widget widget-user-2">
      <div class="widget-user-header bg-primary" > 
        <center><h4>Menunggu Pengesahan</h4></center>
      </div>
        <div class="box-footer no-padding text-center"> 
          <ul class="nav nav-stacked">
            
              <li><a><i>-Tidak ada-</i></a></li>
            
          </ul>
        </div>
    </div>
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

<footer class="main-footer">
  <div class="container text-center">
    Copyright &copy; 2018 <b><a class="text-black">Tugas Kuliah</a></b><br>
    All rights reserved
  </div>
  <!-- /.container -->
</footer>


<script type="text/javascript">
  $(function () {
    // $('#datakelas').DataTable()
    // $('#example2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : false
    // });

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