<?php
$this->load->view('head_dosen');
?>

<div class="col-md-9">
  <div class="box-header with-border">
    <h3 class="box-title" style="font-size: 25px"><i class="fa fa-user"></i> Ubah Profil</h3>
  </div>

  <div class="callout callout-info">
    <h4><i class="fa fa-info-circle"></i> PERHATIAN!</h4>
    Dimohon untuk mengisi profil dengan lengkap.
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
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#ubahprofil" data-toggle="tab">Ubah Profil</a></li>
      <li><a href="#ubahpassword" data-toggle="tab">Ubah Password</a></li>
    </ul>
    <div class="tab-content">
      <div class="active tab-pane" id="ubahprofil">

        <!-- form start -->
        <?php echo form_open_multipart('DosenC/ubahProfilDosen') ?>
        <div class="box-body">
         <input type="hidden" class="form-control" name="id_user" value="<?php echo $user['id_user']; ?>">
         <div class="form-group">
          <label for="exampleInputEmail1">Nama Depan</label>
          <input type="text" class="form-control" name="nama_depan" id="nama_depan" value="<?php echo $user['nama_depan']; ?>" placeholder="Masukkan Nama Depan">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Belakang</label>
          <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" value="<?php echo $user['nama_belakang']; ?>" placeholder="Masukkan Nama Belakang">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">NIP</label>
          <input type="text" class="form-control" name="nip" id="nip" value="<?php echo $user['nip']; ?>" placeholder="Masukkan NIP" required>
        </div>
        <div class="form-group">
          <label for="">Jenis Kelamin</label>
          <div>
            <select name="jenis_kelamin" class="form-control" required" required="">
              <?php
              $jenis_kelamin=$nama['jenis_kelamin'];
              if ($jenis_kelamin== "Laki-Laki") echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
              else echo "<option value='Laki-Laki'>Laki-Laki</option>";
              if ($jenis_kelamin== "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
              else echo "<option value='Perempuan'>Perempuan</option>";                      
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="">Universitas</label> 
          <div>
            <select name="nama_univ" class="form-control select2" required" required="">
              <?php
              foreach ($univ_dosen as $value);
              foreach ($univ as $data) {
                if ($data->id_univ == $value->id_univ) {
                  echo "<option value=".$data->id_univ." selected >".$data->nama_univ."</option>";
                }else
                echo "<option value=".$data->id_univ.">".$data->nama_univ."</option>";
              } ?>
            </select>
          </div>
        </div> 
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>" placeholder="Masukkan Email" readonly>
        </div>
        <div class="form-group">
          <label for="upload">Foto Profil</label>
          <input type="file" name="foto_profil" id="foto_profil">
          <p class="help-block"><i>Ukuran maksimal 3MB.</i></p>
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <center>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </center>
      </div>
      <?php echo form_close(); ?>
    </div>
    <!-- /.tab-pane -->

    <div class="tab-pane" id="ubahpassword">
      <!-- form start -->
      <form role="form" action="<?php echo site_url('DosenC/resetPassword') ?>" method="POST">
        <div class="box-body">
          <input type="hidden" class="form-control" name="id_user" value="<?php echo $user['id_user']; ?>">
          <div class="form-group">
            <label for="exampleInputPassword1">Password Lama</label>
            <input type="password" class="form-control" name="passlama" id="passbaru1" placeholder="Masukkan Password Lama">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password Baru</label>
            <input type="password" class="form-control" name="passbaru1" id="passbaru1" placeholder="Masukkan Password Baru">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Ulangi Password</label>
            <input type="password" class="form-control" name="passbaru2" id="passbaru2" placeholder="Ulangi Password">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <center>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </center>
        </div>
      </form>

    </div>
    <!-- /.tab-pane -->

  </div>
  <!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
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