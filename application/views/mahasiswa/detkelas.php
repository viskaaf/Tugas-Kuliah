<?php
$this->load->view('head_mahasiswa');
?>

<div class="col-md-9">
  <div class="box box-primary" style="background-color: #3c8dbc">
    <div class="box-header">
      <center>
        <h2 style="color: white"><?php echo $kelas['nama_kelas'];?> <a class="btn btn-primary btn-xs tooltips" data-toggle="modal" data-target="">
          <span data-toggle="tooltip" data-original-title="Ubah Kelas" <i class="fa fa-pencil"></i></span>
        </a></h2>
      </center>
      <center><h5 style="color: white"><?php echo $getFakultasProdi['nama_fakultas'];?> · <?php echo $getFakultasProdi['nama_prodi'];?></h5></center>
    </div>
  </div>

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

  <div class="col-md-8">
    <?php if(!empty($pengumuman)){ ?>
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
                <a style="color: #999; font-size: 13px">dikirim ke <b><?php echo $value->nama_kelas?></b></a>
              </span>
              <span class="description"><?php echo tgl_indo(date("Y-m-d",strtotime($value->createDtm))); ?> - <?php echo date("H:i",strtotime($value->createDtm)); ?></span>
            </div>
            <!-- /.user-block -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group" style="padding-left: 50px">
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

    <?php if(!empty($tugas)){ ?>
      <?php foreach($tugas as $value) { ?>
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
                <a style="color: #999; font-size: 13px">dikirim ke <b><?php echo $value->nama_kelas?></b></a>
              </span>
              <span class="description"><?php echo tgl_indo(date("Y-m-d",strtotime($value->createDtm))); ?> - <?php echo date("H:i",strtotime($value->createDtm)); ?></span> 
            </div>
            <!-- /.user-block -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group" style="padding-left: 50px">
              <input type="hidden" name="id_tugas" value="<?php echo $value->id_tugas;?>">
              <!-- <input type="text" name="id_mhs" value="<?php echo $value->id_mhs;?>"> -->
              <p><b><?php echo $value->nama_tugas;?></b></p>
              <p>Batas Pengerjaan: <?php echo tgl_indo(date("Y-m-d",strtotime($value->tgl_selesai))); ?> - <?php echo date("H:i",strtotime($value->tgl_selesai)); ?> </p>

              <?php
              $q = $this->MahasiswaM->getNilai($value->id_tugas, $id_mhs)->row_array();
              $q2 = $this->MahasiswaM->getSoalPilgan($value->id_tugas)->num_rows();
              $q3 = $this->MahasiswaM->getJawabanEssay($value->id_tugas, $id_mhs)->row_array();
              ?>
              <?php if($value->jenis_tugas == 'Pilihan Ganda') {
                if(empty($q['nilai'])) { ?>
                  <a href="<?php echo site_url('MahasiswaC/tampilSoalPilgan/'.$value->id_tugas); ?>" class="btn btn-default" type="submit" onclick="alert('Apakah Anda yakin untuk mengerjakan soal?')">Kerjakan</a>
                <?php }else { ?>
                  <a href="<?php echo site_url('MahasiswaC/tampilHasilPilgan/'.$value->id_tugas); ?>" class="btn btn-default">Lihat Hasil</a>
                <?php } ?>

                <span style="padding-left: 10px"> <b><?php echo $q2; ?> pertanyaan</b></span>

              <?php }else { ?>

                <?php if(empty($q['nilai']) && !empty($q3['jawaban'])) { ?>
                  <a href="<?php echo site_url('MahasiswaC/tampilHasilEssay/'.$value->id_tugas); ?>" class="btn btn-default" type="submit">Sedang dinilai</a>
                <?php }elseif(empty($q['nilai'])) { ?>
                  <a href="<?php echo site_url('MahasiswaC/tampilSoalEssay/'.$value->id_tugas); ?>" class="btn btn-default" type="submit">Kumpulkan</a>
                <?php }else { ?>
                  <a href="<?php echo site_url('MahasiswaC/tampilHasilEssay/'.$value->id_tugas); ?>" class="btn btn-default">Lihat Hasil</a>
                <?php } ?>
              <?php } ?>


            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
      <?php } ?>
    <?php } ?>
  </div>

  <?php if(empty($pengumuman) AND empty($tugas)){ ?>
    <div class="box" style="padding-bottom: 30px; padding-top: 30px;">
      <div class="box-body" style="color: #525252">
        <center>
          <img class="img" style="width: 70px;" src="<?php echo base_url('gambar/checked.png')?>">
        </center>
        <h4 style="padding-top: 10px; text-align: center;">
          Anda telah berhasil bergabung ke kelas
        </h4>
        <h5 style="padding-top: 30px; text-align: center;">
          Anda juga dapat melihat pengumuman dari dosen di kelas ini
        </h5>
        <h5 style="text-align: center;">
          serta dapat mengerjakan tugas yang diberikan oleh dosen.
        </h5>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /. box -->
  <?php } ?>

  <div class="col-md-4">
    <div class="box box-widget widget-user-2">
      <div class="widget-user-header bg-primary">
        <h3>Materi</h3>
      </div>
      <div class="box-footer no-padding"> 
        <ul class="nav nav-stacked">
          <?php foreach ($materi as $value) { 
            $link = base_url()."file_upload/".$value->path_file;
          ?>
          <li><a target="_blank" href="<?php echo $link;?>"><img class="attachment-img" style="width: 14px;" src="<?php echo base_url()?>gambar/pdf.svg"> &nbsp; <?php echo $value->nama_materi; ?></a></li>
          <?php } ?> 
        </ul>
      </div>
    </div> 
    <!-- /.widget-user -->
  </div>


</div>


</div>
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
    $('#datakelas').DataTable()
    $('#examples2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $(function () {
    $('#datatugas').DataTable()
    $('#examples2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    //Initialize Select2 Elements
    $('.select2').select2();

    $("#tgl_selesai").datepicker({ minDate: 0 });
    $('#tgl_selesai').datepicker({dateFormat: 'yy-mm-dd'});

    $("#jenis_tugas").change(function(){
        // $("#waktu").hide()
        if($(this).val() == "jenis_tugas1"){
          $("#waktu").show();
        }else{
          $("#waktu").hide();
        }
      });
  })
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

<script type="text/javascript">
  $(document).ready(function(){
    $('#jenis_tugas').change(function(){
      if($(this).val() == "Pilihan Ganda"){
        $("#waktu").show();
      }else{
        $("#waktu").hide();
      }
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