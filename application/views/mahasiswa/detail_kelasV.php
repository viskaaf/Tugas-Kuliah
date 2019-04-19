<?php
$this->load->view('head_mahasiswa');
?>

<div class="col-md-9">
  <div class="box box-primary" style="background-color: #3c8dbc">
    <div class="box-header">
      <center>
        <h2 style="color: white"><?php echo $kelas['nama_kelas'];?></h2>
      </center>
      <center><h5 style="color: white"><?php echo $getFakultasProdi['nama_fakultas'];?> · <?php echo $getFakultasProdi['nama_prodi'];?></h5></center>
    </div>
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

<div class="col-md-6">
  <div class="box box-widget widget-user-2">
    <div class="widget-user-header bg-primary">
      <h4 style="padding-left: 10px;">Pengumuman</h4>
    </div>
    <?php if(empty($pengumuman) AND empty($tugas)){ ?>
      <div class="box-body with-border text-center">
        <i>-Tidak ada-</i>
      </div>
    <?php } ?>
    <div class="box-body with-border">
      <?php if(!empty($pengumuman)){ ?>
        <?php foreach($pengumuman as $value) { ?>
          <!-- Post -->
          <div class="post clearfix">
            <div class="user-block">
              <?php if($value->foto_profil) { ?>
                <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/'.$value->foto_profil)?>" alt="user image">
                <?php
              }else { ?> 
                <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/blankphoto.png')?>" alt="user image">
              <?php } ?>
              <span class="username">
                <a data-toggle="modal" data-target="#modal-lihat"><?php echo $value->nama_depan.' '; echo $value->nama_belakang;?></a>
                <a style="color: #999; font-size: 13px">dikirim ke <b><?php echo $value->nama_kelas?></b></a>
              </span>
              <span class="description"><?php echo tgl_indo(date("Y-m-d",strtotime($value->createDtm))); ?> - <?php echo date("H:i",strtotime($value->createDtm)); ?></span>
            </div>
            <!-- /.user-block -->
            <p style="padding-left: 50px;">
              <?php echo $value->pengumuman;?>
            </p>
          </div>
          <!-- /.post -->
        <?php } ?>
      <?php } ?>
    </div>
    <div style="height: 100px;"></div>
  </div> 
  <div style="height: 223px;"></div>
</div>

<div class="col-md-3"> 
  <div class="box box-widget widget-user-2">
    <div class="widget-user-header bg-primary">
      <h4>Materi</h4>
    </div>
    <div class="box-footer no-padding"> 
      <?php if(empty($materi)) { ?>
        <ul class="nav nav-stacked text-center">
          <li><a><i>-Tidak ada-</i></a></li> 
        </ul>
      <?php }else{ ?>
      <ul class="nav nav-stacked">
        <?php foreach ($materi as $value) { 
          $link = base_url()."file_upload/".$value->path_file; ?>
        <li><a target="_blank" href="<?php echo $link;?>"><img class="attachment-img" style="width: 14px;" src="<?php echo base_url()?>gambar/pdf.svg"> &nbsp; <?php echo $value->nama_materi; ?></a></li>
        <?php } ?> 
      </ul>
      <?php } ?>
    </div>
  </div>
</div>

<div class="col-md-3"> 
  <div class="box box-widget widget-user-2">
    <div class="widget-user-header bg-primary">
      <h4>Tugas</h4>
    </div>
    <div class="box-footer no-padding"> 
      <?php if(empty($tugas)) { ?>
        <ul class="nav nav-stacked text-center">
          <li><a><i>-Tidak ada-</i></a></li> 
        </ul>
      <?php }else{ ?>
      <ul class="nav nav-stacked">
        <?php foreach ($tugas as $value) {

          $q = $this->MahasiswaM->getNilai($value->id_tugas, $id_mhs)->row_array();
          $q2 = $this->MahasiswaM->getSoalPilgan($value->id_tugas)->num_rows();
          $q3 = $this->MahasiswaM->getJawabanEssay($value->id_tugas, $id_mhs)->row_array();

          if($value->jenis_tugas == 'Pilihan Ganda') {
            if(empty($q['nilai'])) { ?>
              <li><a href="<?php echo site_url('MahasiswaC/tampilSoalPilgan/'.$value->id_tugas); ?>" onclick="alert('Apakah Anda yakin untuk mengerjakan soal?')"><img class="attachment-img" style="width: 14px;" src="<?php echo base_url()?>gambar/file.png"> &nbsp; <?php echo $value->nama_tugas; ?></a></li>
            <?php }else { ?>
              <li><a href="<?php echo site_url('MahasiswaC/tampilHasilPilgan/'.$value->id_tugas); ?>"><img class="attachment-img" style="width: 14px;" src="<?php echo base_url()?>gambar/file.png"> &nbsp; <?php echo $value->nama_tugas; ?></a></li>
            <?php } ?>
          <?php }else { 
            if(empty($q['nilai']) && !empty($q3['jawaban'])) { ?>
              <li><a href="<?php echo site_url('MahasiswaC/tampilHasilEssay/'.$value->id_tugas); ?>"><img class="attachment-img" style="width: 14px;" src="<?php echo base_url()?>gambar/file.png"> &nbsp; <?php echo $value->nama_tugas; ?></a></li>
            <?php }elseif(empty($q['nilai'])) { ?>
              <li><a href="<?php echo site_url('MahasiswaC/tampilSoalEssay/'.$value->id_tugas); ?>" onclick="alert('Apakah Anda yakin untuk mengerjakan soal?')"><img class="attachment-img" style="width: 14px;" src="<?php echo base_url()?>gambar/file.png"> &nbsp; <?php echo $value->nama_tugas; ?></a></li>
            <?php }else { ?>
              <li><a href="<?php echo site_url('MahasiswaC/tampilHasilEssay/'.$value->id_tugas); ?>"><img class="attachment-img" style="width: 14px;" src="<?php echo base_url()?>gambar/file.png"> &nbsp; <?php echo $value->nama_tugas; ?></a></li>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </ul>
      <?php } ?>
    </div>
  </div>
</div>

<div class="col-md-3"> 
  <div class="box box-widget widget-user-2">
    <div class="widget-user-header bg-primary">
      <h4>Anggota
    </div>
    <div class="box-footer no-padding"> 
      <?php if(empty($anggota)) { ?>
        <ul class="nav nav-stacked text-center"> 
          <li><a><i>-Tidak ada-</i></a></li> 
        </ul>
      <?php }else{ ?>
          <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php foreach ($anggota as $value) { ?>
                    <li>
                      <?php
                        if($value->foto_profil){
                      ?>
                      <img src="<?php echo base_url('gambar/'.$value->foto_profil)?>" alt="User Image">
                      <?php
                      }else{
                      ?>
                      <img src="<?php echo base_url('gambar/blankphoto.png')?>" alt="User Image">
                      <?php
                      }
                      ?>
                      <span><?php echo $value->nama_depan.' '; echo $value->nama_belakang ?></span>
                    </li>
                    <?php } ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
<!--                 <div class="box-footer text-center">
                  <a data-toggle="modal" data-target="#modal-lihat" class="btn">Lihat semua</a>
                </div> -->
                <!-- /.box-footer -->
      <?php } ?>
    </div>
  </div>
</div>

        <?php $no=0; foreach ($dosen as $value): $no++; ?>
        <!-- modal untuk tambah manual -->
        <div class="modal fade" id="modal-lihat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><center>Profil Dosen</center></h4>
                </div>
                <div class="modal-body" style="height: 270px">
                 <div class="col-md-4">
                  <?php if(!empty($value->foto_profil)){ ?>
                    <img class="detail-gambar" align="left" src="<?php echo base_url('gambar/'.$value->foto_profil)?>">
                  <?php }else{ ?>
                    <img class="detail-gambar" align="left" src="<?php echo base_url('gambar/'.'blankphoto.png')?>">
                  <?php } ?>
                </div>
                <div class="col-md-7">
                  <h2><?php echo $value->nama_depan . ' ' . $value->nama_belakang;?></h2> 
                  <h4><?php echo $value->nip;?></h4><br>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Universitas</th>
                        <td><?php echo $value->nama_univ;?></td>
                      </tr>
                      <tr>
                        <th style="width:50%">Jenis Kelamin</th>
                        <td><?php echo $value->jenis_kelamin;?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      <?php  endforeach; ?>

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

<footer class="main-footer">
  <div class="container text-center">
    Copyright &copy; 2018 <b><a class="text-black">Tugas Kuliah</a></b><br>
    All rights reserved
  </div>
  <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->