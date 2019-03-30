<?php
$this->load->view('head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Mahasiswa
    </h1>  
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Mahasiswa</li>
    </ol>
  </section>

  <!-- Main Content --> 
  <section class="content">
    <div class="row">
      <!-- Alert -->
      <?php
      $data=$this->session->flashdata('sukses');
      if($data!=""){ ?>
        <div class="alert alert-success" id="success-alert"><strong>Sukses! </strong> <?=$data;?></div>
      <?php } ?>
      <?php 
      $data2=$this->session->flashdata('error');
      if($data2!=""){ ?>
        <div class="alert alert-danger" id="success-alert"><strong> Error! </strong> <?=$data2;?></div>
      <?php } ?>
      <!-- sampai sini -->
      <div class="col-xs-12">
        <div style="padding-bottom: 20px;">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus-square"></i>  Tambah</button>
        </div>
        <div class="box box-primary">
          <!-- Box Header -->
          <div class="box-body">
            <div class="row" style="padding-bottom: 10px;">

            </div>
            <table id="universitas" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>NIM</center></th>
                  <th><center>Nama Depan</center></th>
                  <th><center>Nama Belakang</center></th>
                  <th><center>Jenis Kelamin</center></th>
                  <th><center>Status</center></th>
                  <th><center>Opsi</center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0; foreach ($mahasiswa as $value): $no++; ?> 
                <tr>
                  <td><center><?php echo $no; ?></center></td>
                  <td><center><?php echo $value->nim; ?></center></td>
                  <td><center><?php echo $value->nama_depan; ?></center></td>
                  <td><center><?php echo $value->nama_belakang; ?></center></td>
                  <td><center><?php echo $value->jenis_kelamin; ?></center></td>
                  <td><center>
                    <?php if($value->status == 'Aktif') { ?>
                      <span class="label label-success"><?php echo $value->status; ?></span>
                    <?php }else { ?>
                      <span class="label label-danger"><?php echo $value->status; ?></span>
                    <?php } ?>
                  </center></td>
                  <td><center>
                    <a class="btn btn-danger btn-xs tooltips" data-toggle="modal" data-target="#modal">
                      <span data-toggle="tooltip" data-original-title="Non-aktifkan Pengguna" <i class="fa fa-close"></i></span>
                    </a>
                    <!-- <a class="btn btn-success btn-xs tooltips" data-toggle="modal" data-target="#modal">
                      <span data-toggle="tooltip" data-original-title="Aktifkan Pengguna" <i class="fa fa-check"></i></span>
                    </a> -->
                    <a class="btn btn-info btn-xs tooltips" href="">
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

    <!-- modal untuk tambah manual -->
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><center>Tambah Mahasiswa</center></h4>
            </div>
            <div class="modal-body">

              <?php echo form_open_multipart('AdminC/tambahMahasiswa','id="form" class="form-horizontal"');?>
              <div class="form-group">
               <label for="" class="col-sm-3 control-label">Nama Depan</label>
               <div class="col-sm-8">
                 <input type="text" class="col-sm-8 form-control" name="nama_depan" placeholder="Nama Depan">
               </div>
             </div> 
             <div class="form-group">
               <label for="" class="col-sm-3 control-label">Nama Belakang</label>
               <div class="col-sm-8">
                 <input type="text" class="col-sm-8 form-control" name="nama_belakang" placeholder="Nama Belakang">
               </div>
             </div> 
             <div class="form-group">
               <label class="col-sm-3 control-label">Jenis Kelamin</label>
               <div class="col-sm-8">
                 <label>
                  <input type="radio" name="jenis_kelamin" value="Laki-laki" class="minimal">
                  Laki-laki
                </label>
                <label> 
                  <input type="radio" name="jenis_kelamin" value="Perempuan" class="minimal">
                  Perempuan
                </label>
              </div>
            </div> 
            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Universitas</label>
              <div class="col-sm-8">
               <select class="form-control select2" name="nama_univ" id="nama_univ" style="width: 100%;" required>
               <option></option>
               <?php foreach ($universitas as $data) {  ?> 
                <option value="<?php echo $data->id_univ;?>"><?php echo $data->nama_univ;?></option>
              <?php  } ?>
              </select>
              </div>
              </div> 
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="col-sm-8 form-control" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Wajib diisi')" oninput="setCustomValidity('')">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Kata Sandi</label>
                <div class="col-sm-8">
                  <input type="password" class="col-sm-8 form-control" name="password" placeholder="Kata Sandi" required oninvalid="this.setCustomValidity('Wajib diisi')" oninput="setCustomValidity('')">
                </div>
              </div>
<!--               <div class="form-group">
                <label for="upload" class="col-sm-3 control-label">Foto Profil</label>
                <div class="col-sm-8">
                  <input type="file" name="foto_profil" id="foto_profil">
                  <p class="help-block"><i>Ukuran maksimal 3MB.</i></p>
                </div>
              </div> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
              <input class="btn btn-primary" type="submit">
            </div>
          </div>
          <!-- </form> -->
          <?php echo form_close();?>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
  </section>

</div>

<script>
  $(function () {
    $('#universitas').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });

    //Initialize Select2 Elements
    $('.select2').select2({
      placeholder : "Pilih Universitas",
      allowClear : true
    })
  });
</script>
</body>
  <footer class="main-footer">
  <strong><center>Copyright &copy; Tugas Kuliah.com</center></strong>
  </footer>
</html>