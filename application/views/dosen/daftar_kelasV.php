<?php
$this->load->view('head_dosen');
?>

<div class="col-md-9">
  <div class="box-header with-border">
    <h3 class="box-title" style="font-size: 25px"><i class="fa fa-user"></i> Profil</h3>
  </div><br>

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

    <?php 
                      $length = 6;
                      $data = 'abcdefghijklmnopqrstuvwxyz1234567890';
                      $string = '';
                      for($i = 0; $i < $length; $i++) {
                        $pos = rand(0, strlen($data)-1);
                        $string .= $data{$pos};
                      } 
                      ?>

  <div class="col-md-6">
    <div class="box box-widget widget-user-2">
      <div class="widget-user-header bg-primary" > 
        <h4 style="padding-left: 10px;">Kelas Aktif
        <a class="btn btn-primary btn-xs tooltips pull-right" style="margin-right: 10px;" data-toggle="modal" data-target="#modal-add-<?php echo $string; ?>-<?php echo $id_dosen['id_dosen']?>-<?php echo $id_univ['id_univ']?>">
        <span data-toggle="tooltip" data-original-title="Buat Kelas" <i class="fa fa-plus"></i></span></a></h4>
      </div>
      <div class="box-footer no-padding">
        <?php if(empty($kelasaktif)) { ?> 
          <ul class="nav nav-stacked text-center">
            <li><a><i>-Tidak ada-</i></a></li>
          </ul>
        <?php }else{ ?>
          <?php foreach ($kelasaktif as $value) { ?>
            <div class="mailbox-messages">
                <table class="table table-hover">
                  <tbody> 
                    <tr>
                      <td>
                        <a href="<?php echo site_url('DosenC/detailKelas/'.$value->id_kelas); ?>"style="padding-left: 20px;"><?php echo $value->nama_kelas; ?></a>
                      </td>
                      <td>
                        <div class="box-tools pull-right" style="margin-right: 20px;">
                          <div class="btn-group">
                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-toggle-down"></i></button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a data-toggle="modal" data-target="#modal-edit-<?php echo $value->id_kelas; ?>">Ubah Kelas</a></li>
                              <li><a data-toggle="modal" data-target="#modal-nonaktif-<?php echo $value->id_kelas;?>">Non-aktifkan</a></li>
                              <li><a data-toggle="modal" data-target="#modal-delete-<?php echo $value->id_kelas;?>">Hapus</a></li>
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

  <div class="col-md-6">
    <div class="box box-widget widget-user-2">
      <div class="widget-user-header bg-primary" > 
        <h4 style="padding-left: 10px;">Kelas Tidak Aktif
      </div>
      <div class="box-footer no-padding">
        <?php if(empty($kelasnonaktif)) { ?>
          <ul class="nav nav-stacked text-center"> 
            <li><a><i>-Tidak ada-</i></a></li>
          </ul>
        <?php }else{ ?>
          <?php foreach ($kelasnonaktif as $value) { ?>
            <div class="mailbox-messages">
                <table class="table table-hover">
                  <tbody> 
                    <tr>
                      <td>
                        <a href="<?php echo site_url('DosenC/detailKelas/'.$value->id_kelas); ?>"style="padding-left: 20px;"><?php echo $value->nama_kelas; ?></a>
                      </td>
                      <td>
                        <div class="box-tools pull-right" style="margin-right: 20px;">
                          <div class="btn-group">
                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-toggle-down"></i></button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a data-toggle="modal" data-target="#modal-edit">Ubah Kelas</a></li>
                              <li><a data-toggle="modal" data-target="#modal-aktif-<?php echo $value->id_kelas;?>">Aktifkan</a></li>
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

  <!-- modal untuk tambah manual -->
<div class="modal fade" id="modal-add-<?php echo $string; ?>-<?php echo $id_dosen['id_dosen']?>-<?php echo $id_univ['id_univ']?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Tambah Kelas</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/tambahKelas')?>">
          <input type="hidden" name="id_dosen" value="<?php echo $id_dosen['id_dosen']?>">
          <input type="hidden" name="id_univ" value="<?php echo $id_univ['id_univ']?>">
          <div class="form-group">
           <label for="" class="col-sm-3 control-label">Nama Kelas</label>
           <div class="col-sm-8">
             <input type="text" class="col-sm-10 form-control" name="nama_kelas" placeholder="Nama Kelas" required oninvalid="this.setCustomValidity('Isi nama kelas.')" oninput="setCustomValidity('')">
           </div>
         </div>
         <div class="form-group">
          <label class="col-sm-3 control-label">Fakultas</label> 
          <div class="col-sm-8">
            <select name="nama_fakultas" id="nama_fakultas" class="form-control select2" style="width: 100%;">
              <option disabled selected><i>---Pilih Fakultas---</i></option>
              <?php foreach ($fakultas as $data) {  ?> 
                <option value="<?php echo $data->id_det_univfakultas;?>"><?php echo $data->nama_fakultas;?></option>
              <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Program Studi</label>
          <div class="col-sm-8">
            <select name="nama_prodi" id="nama_prodi" class="form-control select2" style="width: 100%;">
              <option disabled selected><i>---Pilih Program Studi---</i></option>
              <?php if(count($prodi->result())>0) { ?>

                <?php foreach ($prodi->result() as $row) {  ?>
                  <option value="<?php echo $row->id_prodi;?>"><?php echo $row->nama_prodi;?></option>
                <?php } ?>
              <?php  } else { ?>
                <option value="0">- Data Belum Tersedia -</option> 

              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
         <label class="col-sm-3 control-label">Kode</label>
         <div class="col-sm-3">
          <span class="label label-primary" style="font-size: 23px"><b><?php echo $string; ?></b></span>
          <input type="hidden" name="kode" value="<?php echo $string; ?>"></input>
        </div>
        <div class="col-sm-5">
         <span>Bagikan kode kepada mahasiswa untuk dapat bergabung di kelas Anda.</span>
       </div>

     </div>
     <div class="form-group">
      <label for="" class="col-sm-3 control-label">Status</label>
      <div class="col-sm-8">
        <select name="status_kelas" class="form-control required" required="">
          <option value="Aktif">Aktif</option>
          <option value="Tidak Aktif">Tidak Aktif</option>
        </select>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</div>
<!-- /.modal-content -->
</form>  
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- /.modal -->

<?php foreach ($kelasaktif as $value) { ?>
<!-- modal untuk tambah pengumuman -->
<div class="modal fade" id="modal-delete-<?php echo $value->id_kelas;?>">
  <div class="modal-dialog" style="width: 400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Hapus Kelas</center></h4>
        </div>
      <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/hapusKelas/'.$value->id_kelas); ?>">
      <div class="modal-body text-center" style="padding-top: 20px; padding-bottom: 20px;">
          <input type="hidden" name="id_kelas" value="<?php echo $value->id_kelas;?>">
          <h5 class="modal-title"><b>Apakah Anda yakin untuk menghapus kelas ini?</b></h5>
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

<?php foreach ($kelasaktif as $value) { ?>
<!-- modal untuk tambah pengumuman -->
<div class="modal fade" id="modal-nonaktif-<?php echo $value->id_kelas;?>">
  <div class="modal-dialog" style="width: 400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Non-Aktifkan Kelas</center></h4>
        </div>
      <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/nonAktifKelas/'.$value->id_kelas); ?>">
      <div class="modal-body text-center" style="padding-top: 20px; padding-bottom: 20px;">
          <input type="hidden" name="id_kelas" value="<?php echo $value->id_kelas;?>">
          <h5 class="modal-title"><b>Apakah Anda yakin untuk menonaktifkan kelas ini?</b></h5>
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

<?php foreach ($kelasnonaktif as $value) { ?>
<!-- modal untuk tambah pengumuman -->
<div class="modal fade" id="modal-aktif-<?php echo $value->id_kelas;?>">
  <div class="modal-dialog" style="width: 400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Aktifkan Kelas</center></h4>
        </div>
      <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/aktifkanKelas/'.$value->id_kelas); ?>">
      <div class="modal-body text-center" style="padding-top: 20px; padding-bottom: 20px;">
          <input type="text" name="id_kelas" value="<?php echo $value->id_kelas;?>">
          <h5 class="modal-title"><b>Apakah Anda yakin untuk mengaktifkan kelas ini?</b></h5>
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

                      <?php foreach ($kelasaktif as $value) { ?>
<!-- modal untuk ubah manual -->
<div class="modal fade" id="modal-edit-<?php echo $value->id_kelas; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Ubah Kelas</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/ubahKelas') ?>">
          <input type="hidden" class="col-sm-10 form-control" id="id_kelas" name="id_kelas" value="<?php echo $value->id_kelas; ?>">
          <div class="form-group">
           <label for="" class="col-sm-3 control-label">Nama Kelas</label>
           <div class="col-sm-8">
             <input type="text" class="col-sm-8 form-control" id="nama_kelas" name="nama_kelas" value="<?php echo $value->nama_kelas; ?>">
           </div>
         </div>
         <div class="form-group">
          <label class="col-sm-3 control-label">Fakultas</label> 
          <div class="col-sm-8">
            <select name="nama_fakultas" id="nama_fakultas" class="form-control select2" style="width: 100%;">
              <?php
              foreach ($fakultas_kelas as $data1);
              foreach ($fakultas as $data) {
                if ($data->id_det_fakultasprodi == $data1->id_det_fakultasprodi) {
                  echo "<option value=".$data->id_det_fakultasprodi." selected >".$data->nama_fakultas."</option>";
                }else
                echo "<option value=".$data->id_det_fakultasprodi.">".$data->nama_fakultas."</option>";
              } ?>
            </select>
          </div>
        </div> 
        <div class="form-group">
          <label class="col-sm-3 control-label">Program Studi</label>
          <div class="col-sm-8">
            <select name="nama_prodi" id="nama_prodi" class="form-control select2" style="width: 100%;">
              <option disabled selected><i>---Pilih Program Studi---</i></option>
              <?php if(count($prodi->result())>0) { ?>

                <?php foreach ($prodi->result() as $row) {  ?>
                  <option value="<?php echo $row->id_prodi;?>"><?php echo $row->nama_prodi;?></option>
                <?php } ?>
              <?php  } else { ?>
                <option value="">- Data Belum Tersedia -</option> 

              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
         <label class="col-sm-3 control-label">Kode</label>
         <div class="col-sm-3">
          <span class="label label-primary" style="font-size: 23px"><b><?php echo $value->kode; ?></b></span>
        </div>
        <div class="col-sm-5">
         <span>Bagikan kode kepada mahasiswa untuk dapat bergabung di kelas Anda.</span>
       </div>
     </div>
     <div class="form-group">
      <label for="" class="col-sm-3 control-label">Status</label>
      <div class="col-sm-8">
        <select name="status_kelas" class="form-control required" required="">
          <!-- <option value="" disabled selected><i>---Pilih Status---</i></option> -->
          <?php
          $status_kelas=$value->status_kelas;
          if ($status_kelas== "Aktif") echo "<option value='Aktif' selected>Aktif</option>";
          else echo "<option value='Aktif'>Aktif</option>";
          if ($status_kelas== "Tidak Aktif") echo "<option value='Tidak Aktif' selected>Tidak Aktif</option>";
          else echo "<option value='Tidak Aktif'>Tidak Aktif</option>";
          ?>
        </select>
      </div>
    </div> 
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
    <input class="btn btn-primary" id="" type="submit" value="Simpan" >
  </div>
</div>
</form>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

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