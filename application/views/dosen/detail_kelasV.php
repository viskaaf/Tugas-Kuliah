<?php
$this->load->view('head_dosen');
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
</div>
 
<div class="col-md-6">
  <div class="box box-widget widget-user-2">
    <div class="widget-user-header bg-primary">
      <h4 style="padding-left: 10px;">Pengumuman
      <a class="btn btn-primary btn-xs tooltips pull-right" data-toggle="modal" data-target="#modal-add">
        <span data-toggle="tooltip" data-original-title="Tambah Pengumuman" <i class="fa fa-plus"></i></span></a></h4>
    </div>
    <?php if(empty($pengumuman) AND empty($tugas)){ ?> 
      <div class="box-body with-border text-center" style="height: 223px;">
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
                <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/admin.png')?>" alt="user image">
              <?php } ?>
              <span class="username">
                <a href="#"><?php echo $value->nama_depan.' '; echo $value->nama_belakang;?></a>
                <a style="color: #999; font-size: 13px">dikirim ke <b><?php echo $value->nama_kelas?></b></a>
                <!-- <a href="<?php echo site_url('DosenC/hapusPengumuman/'.$value->id_pengumuman); ?>" class="pull-right btn-box-tool" style="margin-right: 10px;"><i class="fa fa-times"></i></a> -->
                <a data-toggle="modal" data-target="#modal-delete-<?php echo $value->id_pengumuman;?>" class="btn btn-box-tool btn-xs pull-right" style="margin-right: 10px;"><i class="fa fa-times"></i></a>
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
  </div>
</div> 

<div class="col-md-3"> 
  <div class="box box-widget widget-user-2">
    <div class="widget-user-header bg-primary">
      <h4>Materi
      <a class="btn btn-primary btn-xs tooltips pull-right" data-toggle="modal" data-target="#modal-add-materi">
        <span data-toggle="tooltip" data-original-title="Tambah Materi" <i class="fa fa-plus"></i></span></a></h4>
    </div>
    <div class="box-footer no-padding"> 
      <?php if(empty($materi)) { ?>
        <ul class="nav nav-stacked text-center">
          <li><a><i>-Tidak ada-</i></a></li> 
        </ul>
      <?php }else{ ?> 
        <?php foreach ($materi as $value) { 
          $link = base_url()."file_upload/".$value->path_file; ?>
              <div class="mailbox-messages">
                <table class="table table-hover">
                  <tbody> 
                    <tr>
                      <td>
                        <a target="_blank" href="<?php echo $link;?>"><img class="attachment-img" style="width: 14px;" src="<?php echo base_url()?>gambar/pdf.svg"> &nbsp; <?php echo $value->nama_materi; ?></a>
                      </td>
                      <td>
                        <div class="box-tools pull-right" style="margin-right: 10px;">
                          <div class="btn-group">
                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-toggle-down"></i></button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a data-toggle="modal" data-target="#modal-edit-<?php echo $value->id_materi; ?>">Ubah Nama Materi</a></li>
                              <li><a data-toggle="modal" data-target="#modal-delete-<?php echo $value->id_materi;?>")">Hapus</a></li>
                            </ul>
                          </div>
                        </div>
                      </td>
                      <?php foreach ($materi as $value) { ?>
<!-- modal untuk ubah nama materi -->
<div class="modal fade" id="modal-edit-<?php echo $value->id_materi; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Ubah Nama Materi</center></h4>
        </div>

        <div class="modal-body">
         <form class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/ubahMateri') ?>">
          <input type="hidden" class="col-sm-10 form-control" id="id_kelas" name="id_kelas" value="<?php echo $kelas['id_kelas'];?>">
          <input type="hidden" class="col-sm-10 form-control" id="id_materi" name="id_materi" value="<?php echo $value->id_materi; ?>">
          <div class="form-group">
           <label class="col-sm-3 control-label">Nama Materi</label>
           <div class="col-sm-9">
             <input type="text" class="col-sm-10 form-control" name="nama_materi" value="<?php echo $value->nama_materi; ?>" placeholder="Masukkan Nama Materi" required>
           </div>
         </div>
      </div><br>
      <div class="modal-footer">
        <input class="btn btn-primary" type="submit" value="Simpan">
      </div>
    </div>
    <!-- /.modal-content -->
  </form>
</div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

<?php foreach ($materi as $value) { ?>
<!-- modal untuk hapus materi -->
<div class="modal fade" id="modal-delete-<?php echo $value->id_materi;?>">
  <div class="modal-dialog" style="width: 400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Hapus Materi</center></h4>
        </div>
      <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/hapusMateri/'.$value->id_materi); ?>">
      <div class="modal-body text-center" style="padding-top: 20px; padding-bottom: 20px;>
          <input type="hidden" name="id_kelas" value="<?php echo $kelas['id_kelas'];?>">
          <input type="hidden" name="id_pengumuman" value="<?php echo $value->id_materi;?>">
          <h5 class="modal-title"><b>Apakah Anda yakin untuk menghapus materi ini?</b></h5>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <input class="btn btn-primary" type="submit" value="Ya" style="width: 50px;">
      </div>
  </form> 
</div>
  <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->
                    </tr>
                  </tbody>
                </table>
              </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</div>

<div class="col-md-3"> 
  <div class="box box-widget widget-user-2">
    <div class="widget-user-header bg-primary">
      <h4>Tugas
      <a class="btn btn-primary btn-xs tooltips pull-right" data-toggle="modal" data-target="#modal-add-tugas">
        <span data-toggle="tooltip" data-original-title="Tambah Tugas" <i class="fa fa-plus"></i></span></a></h4>
    </div>
    <div class="box-footer no-padding"> 
      <?php if(empty($tugas)) { ?>
        <ul class="nav nav-stacked text-center">
          <li><a><i>-Tidak ada-</i></a></li> 
        </ul>
      <?php }else{ ?> 
        <?php foreach ($tugas as $value) { ?>
              <div class="mailbox-messages">
                <table class="table table-hover">
                  <tbody> 
                    <tr>
                      <td>
                        <?php if($value->jenis_tugas == "Pilihan Ganda") { ?>
                          <a href="<?php echo site_url('DosenC/tampilSoalPilgan/'.$value->id_tugas); ?>"><img class="attachment-img" style="width: 14px;" src="<?php echo base_url()?>gambar/file.png"> &nbsp; <?php echo $value->nama_tugas; ?></a>
                        <?php }else{ ?>
                          <a href="<?php echo site_url('DosenC/tampilSoalEssay/'.$value->id_tugas); ?>"><img class="attachment-img" style="width: 14px;" src="<?php echo base_url()?>gambar/file.png"> &nbsp; <?php echo $value->nama_tugas; ?></a>
                        <?php } ?>
                      </td>
                      <td>
                        <div class="box-tools pull-right" style="margin-right: 10px;">
                          <div class="btn-group">
                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-toggle-down"></i></button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a data-toggle="modal" data-target="#modal-edit-<?php echo $value->id_tugas; ?>">Ubah Tugas</a></li>
                              <?php if($value->jenis_tugas == "Pilihan Ganda") { ?>
                                <li><a href="<?php echo site_url('DosenC/tampilDaftarNilaiPilgan/'.$value->id_tugas); ?>">Lihat Nilai</a></li>
                              <?php }else{ ?>
                                <li><a href="<?php echo site_url('DosenC/tampilDaftarKoreksiEssay/'.$value->id_tugas); ?>">Lihat Nilai</a></li>
                              <?php } ?>
                              <li><a data-toggle="modal" data-target="#modal-delete-<?php echo $value->id_tugas;?>">Hapus</a></li>
                            </ul>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</div>

  <!-- modal untuk tambah tugas -->
<div class="modal fade" id="modal-add-tugas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Tambah Tugas</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/tambahTugas') ?>">
          <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $kelas['id_kelas']?>">
          <div class="form-group">
           <label for="" class="col-sm-3 control-label">Nama Tugas</label>
           <div class="col-sm-8">
             <input type="text" class="col-sm-10 form-control" name="nama_tugas" placeholder="Nama Tugas" required>
           </div>
         </div>
         <input type="hidden" class="col-sm-10 form-control" name="tgl_mulai" id="tgl_mulai" value="<?php echo date('Y-m-d');?>" required>
         <div class="form-group">
          <label for="" class="col-sm-3 control-label">Tanggal Selesai</label>
          <div class="col-sm-8">
            <input type="date" class="col-sm-10 form-control" name="tgl_selesai" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask min="<?php echo date('Y-m-d');?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Jenis Tugas</label>
          <div class="col-sm-8">
            <select name="jenis_tugas" id="jenis_tugas" class="form-control required" required>
              <option value="" disabled selected><i>---Pilih Jenis Tugas---</i></option>
              <option value="Pilihan Ganda">Pilihan Ganda</option>
              <option value="Essay">Essay</option>
            </select>
          </div>
        </div>
        <div class="form-group" id="waktu" hidden>
         <label for="" class="col-sm-3 control-label">Waktu</label>
         <div class="col-sm-2">
           <input type="text" class="col-sm-10 form-control" style="text-align: center;" name="waktu" value="0" required>
         </div>
         <label class="control-label">menit</label>
       </div>
       <div class="form-group">
        <label for="" class="col-sm-3 control-label">Status</label>
        <div class="col-sm-8">
          <select name="status_tugas" class="form-control required" required>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
          </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
      <input class="btn btn-primary" id="" type="submit" value="Simpan" >
    </div>
  </div>
  <!-- /.modal-content -->
</form>  
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="col-md-3"> 
  <div class="box box-widget widget-user-2">
    <div class="widget-user-header bg-primary">
      <h4>Anggota 
      <a class="btn btn-primary btn-xs tooltips pull-right" data-toggle="modal" data-target="#modal-add-anggota">
        <span data-toggle="tooltip" data-original-title="Tambah Anggota" <i class="fa fa-plus"></i></span></a></h4>
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
                      <img src="<?php echo base_url('gambar/admin.png')?>" alt="User Image">
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
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">Lihat semua</a>
                </div>
                <!-- /.box-footer -->
      <?php } ?>
    </div>
  </div>
</div>

<!-- modal untuk tambah pengumuman -->
<div class="modal fade" id="modal-add-anggota">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Tambah Anggota</center></h4>
        </div>

        <div class="modal-body">
          <div class="callout callout-info">
              <h4><i class="fa fa-info-circle"></i> PERHATIAN!</h4>
              <p>Anda bisa menambahkan anggota dengan memasukkan alamat email anggota.</p>
            </div>
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/tambahPengumuman') ?>">
          <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $kelas['id_kelas']?>">
          <div class="form-group">           
            <div class="col-sm-11">
              <input type="text" class="form-control" name="email1" placeholder="Masukkan email anggota" required></input>
            </div>
            <div id="tambah_email1">
             <a class="btn btn-primary btn-xs tooltips" name="tambah_soal1" id="email1" style="margin-top: 6px;">
              <span data-toggle="tooltip" data-original-title="Tambah" <i class="fa fa-plus-square"></i></span>
             </a>
            </div>
         </div>
         <div class="form-group" id="tambah1" hidden>           
            <div class="col-sm-11">
              <input type="text" class="form-control" name="email2" placeholder="Masukkan email anggota"></input>
            </div>
            <div id="tambah_email2">
             <a class="btn btn-primary btn-xs tooltips" name="tambah_soal2" id="email2" style="margin-top: 6px;">
              <span data-toggle="tooltip" data-original-title="Tambah" <i class="fa fa-plus-square"></i></span>
             </a>
            </div>
         </div>
         <div class="form-group" id="tambah2" hidden>           
            <div class="col-sm-11">
              <input type="text" class="form-control" name="email3" placeholder="Masukkan email anggota"></input>
            </div>
            <div id="tambah_email3">
             <a class="btn btn-primary btn-xs tooltips" name="tambah_soal3" id="email3" style="margin-top: 6px;">
              <span data-toggle="tooltip" data-original-title="Tambah" <i class="fa fa-plus-square"></i></span>
             </a>
            </div>
         </div>
         <div class="form-group" id="tambah3" hidden>           
            <div class="col-sm-11">
              <input type="text" class="form-control" name="email4" placeholder="Masukkan email anggota"></input>
            </div>
            <div id="tambah_email4">
             <a class="btn btn-primary btn-xs tooltips" name="tambah_soal3" id="email4" style="margin-top: 6px;">
              <span data-toggle="tooltip" data-original-title="Tambah" <i class="fa fa-plus-square"></i></span>
             </a>
            </div>
         </div>
         <div class="form-group" id="tambah4" hidden>
            <div class="col-sm-11">
              <input type="text" class="form-control" name="email5" placeholder="Masukkan email anggota"></input>
            </div>
         </div>
        </div>

      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button> -->
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  </div>
  <!-- /.modal-content -->
</form>   
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($tugas as $value) { ?>
<!-- modal untuk ubah manual -->
<div class="modal fade" id="modal-edit-<?php echo $value->id_tugas; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Ubah Tugas</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/ubahTugas') ?>">
          <input type="hidden" class="col-sm-10 form-control" id="id_kelas" name="id_kelas" value="<?php echo $kelas['id_kelas'];?>">
          <input type="hidden" class="col-sm-10 form-control" id="id_tugas" name="id_tugas" value="<?php echo $value->id_tugas; ?>">
          <div class="form-group">
           <label for="" class="col-sm-3 control-label">Nama Tugas</label>
           <div class="col-sm-8">
             <input type="text" class="col-sm-10 form-control" id="nama_tugas" name="nama_tugas" value="<?php echo $value->nama_tugas; ?>">
           </div>
         </div>
            <input type="hidden" class="col-sm-10 form-control" name="tgl_mulai" value="<?php echo date("d/m/Y",strtotime($value->tgl_mulai)); ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Tanggal Selesai</label>
            <div class="col-sm-8">
              <input type="date" class="col-sm-10 form-control" name="tgl_selesai" value="<?php echo date("Y-m-d",strtotime($value->tgl_selesai)); ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask min="<?php echo date('Y-m-d');?>"> 
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Jenis Tugas</label>
            <div class="col-sm-8">
              <input type="text" class="col-sm-10 form-control" name="jenis_tugas" value="<?php echo $value->jenis_tugas; ?>" required readonly>
            </div>
          </div>
          <?php if($value->jenis_tugas == "Pilihan Ganda") { ?>
          <div class="form-group" id="waktu">
             <label for="" class="col-sm-3 control-label">Waktu</label>
             <div class="col-sm-2">
               <input type="text" class="col-sm-10 form-control" style="text-align: center;" name="waktu" value="<?php echo $value->waktu; ?>" required>
             </div>
             <label class="control-label">menit</label>
           </div>
           <?php }else{ ?>
            <div class="form-group" id="waktu" hidden>
             <label for="" class="col-sm-3 control-label">Waktu</label>
             <div class="col-sm-2">
               <input type="text" class="col-sm-10 form-control" style="text-align: center;" name="waktu" value="0" required>
             </div>
             <label class="control-label">menit</label>
           </div>
           <?php } ?>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Status</label>
          <div class="col-sm-8">
            <select name="status_tugas" class="form-control required" required>
              <?php
              $status_tugas=$value->status_tugas;
              if ($status_tugas== "Aktif") echo "<option value='Aktif' selected>Aktif</option>";
              else echo "<option value='Aktif'>Aktif</option>";
              if ($status_tugas== "Tidak Aktif") echo "<option value='Tidak Aktif' selected>Tidak Aktif</option>";
              else echo "<option value='Tidak Aktif'>Tidak Aktif</option>";                      
              ?>
            </select>
          </div>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form> 
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

<?php foreach ($tugas as $value) { ?>
<!-- modal untuk tambah pengumuman -->
<div class="modal fade" id="modal-delete-<?php echo $value->id_tugas;?>">
  <div class="modal-dialog" style="width: 400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Hapus Tugas</center></h4>
        </div>
      <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/hapusTugas/'.$value->id_tugas); ?>">
      <div class="modal-body text-center" style="padding-top: 20px; padding-bottom: 20px;">
          <input type="hidden" name="id_kelas" value="<?php echo $kelas['id_kelas'];?>">
          <input type="hidden" name="id_pengumuman" value="<?php echo $value->id_tugas;?>">
          <h5 class="modal-title"><b>Apakah Anda yakin untuk menghapus tugas ini?</b></h5>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <input class="btn btn-primary" type="submit" value="Ya" style="width: 50px;">
      </div>
  </form> 
</div>
  <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

<!-- modal untuk tambah pengumuman -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Tambah Pengumuman</center></h4>
        </div>

        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/tambahPengumuman') ?>">
          <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $kelas['id_kelas']?>">
          <div class="form-group">           
           <div class="col-sm-12">
             <textarea type="text" class="form-control" rows="4" name="pengumuman" placeholder="Tulis sesuatu..." required></textarea>
           </div> 
         </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  </div>
  <!-- /.modal-content -->
</form>  
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($pengumuman as $value) { ?>
<!-- modal untuk tambah pengumuman -->
<div class="modal fade" id="modal-delete-<?php echo $value->id_pengumuman;?>">
  <div class="modal-dialog" style="width: 400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Hapus Pengumuman</center></h4>
        </div>
      <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/hapusPengumuman/'.$value->id_pengumuman); ?>">
      <div class="modal-body text-center" style="padding-top: 20px; padding-bottom: 20px;">
          <input type="hidden" name="id_kelas" value="<?php echo $kelas['id_kelas'];?>">
          <input type="hidden" name="id_pengumuman" value="<?php echo $value->id_pengumuman;?>">
          <h5 class="modal-title"><b>Apakah Anda yakin untuk menghapus pengumuman ini?</b></h5>
      </div>
     <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <input class="btn btn-primary" type="submit" value="Ya" style="width: 50px;">
      </div>
  </form> 
</div>
  <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

<!-- modal untuk tambah materi -->
<div class="modal fade" id="modal-add-materi"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Tambah Materi</center></h4>
        </div>
        <div class="modal-body">
          <div class="callout callout-warning">
              <h4><i class="fa fa-info-circle"></i> PERHATIAN!</h4>
              <p>File yang diunggah hanya dapat file dengan format <b>.pdf</b>.</p>
            </div>
          <div class="form-horizontal">
         <?php echo form_open_multipart('DosenC/tambahMateri/') ?>
          <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $kelas['id_kelas']?>">
          <div class="form-group">
           <label for="" class="col-sm-3 control-label">Nama Materi</label>
           <div class="col-sm-8">
             <input type="text" class="col-sm-10 form-control" name="nama_materi" placeholder="Masukkan Nama Materi" required>
           </div>
         </div>
          <div class="form-group">
              <label for="upload_soal" class="col-sm-3 control-label">Unggah File</label>
              <div class="col-sm-8">
                <input type="file" name="file_materi" id="file_materi" class="col-sm-10" required>
              </div>
              <p class="help-block col-sm-8"><i>Ukuran maksimal 10MB.</i></p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <input class="btn btn-primary" id="" type="submit" value="Simpan" >
      </div>
    </div>
    <!-- /.modal-content -->
  <?php echo form_close(); ?>  
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->




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
    //Initialize Select2 Elements
    $('.select2').select2();

    $("#email1").click(function() {
      $("#tambah1").show();
      $("#tambah_email1").hide();
      $("#tambah_email2").show();
    });

    $("#email2").click(function() {
      $("#tambah2").show();
      $("#tambah_email2").hide();
      $("#tambah_email3").show();
    });

    $("#email3").click(function() {
      $("#tambah3").show();
      $("#tambah_email3").hide();
      $("#tambah_email4").show();
    });

    $("#email4").click(function() {
      $("#tambah4").show();
      $("#tambah_email4").hide();
      $("#tambah_email5").show();
    });

    $("#email5").click(function() {
      $("#tambah4").show();
    });

    $("#tgl_selesai").datepicker({ minDate: 0 });
    $('#tgl_selesai').datepicker({dateFormat: 'yyyy-mm-dd'});
  })
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
  <div class="container text-center">
    Copyright &copy; 2018 <b><a class="text-black">Tugas Kuliah</a></b><br>
    All rights reserved
  </div>
  <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->