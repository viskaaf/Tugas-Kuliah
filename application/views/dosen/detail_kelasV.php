<?php
$this->load->view('head_dosen');
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
  <div class="box box-default">
    <div class="box-header">
      <div class="pull-left">
        <a type="button" class="btn btn-default" href="<?php echo site_url('DosenC/daftarKelas/'.$nama['id_user']);?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-<?php echo $getuniv['id_univ']?>"><i class="fa fa-plus-square"></i>  Tambah Tugas</button>
      </div>
      <h5 class="pull-right" style="font-size: 15px">
        Kode: <span class="label label-default" style="font-size: 17px"><?php echo $kelas['kode'];?></span>
        <a class="btn btn-default btn-xs" href="">
          <span data-toggle="tooltip" data-original-title="Ulangi kode" <i class="fa fa-refresh pull-right"></i></span>
        </a>
        
      </h5>
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

    <?php if(empty($tugas)){ ?>
    <div class="box box-primary" style="padding-bottom: 30px; padding-top: 30px;">
      <div class="box-body" style="color: #525252">
        <center>
          <img class="img" style="width: 70px;" src="<?php echo base_url('gambar/checked.png')?>">
        </center>
        <h4 style="padding-top: 10px; text-align: center;">
          Anda telah berhasil membuat kelas
        </h4>
        <h5 style="padding-top: 30px; text-align: center;">
          Anda juga dapat memberikan penugasan di kelas ini
        </h5>
        <h5 style="text-align: center;">
          dengan klik tombol <b>Tambah Tugas</b>.
        </h5>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /. box -->
    <?php
  } else { ?>

  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#daftarmahasiswa" data-toggle="tab">Daftar Mahasiswa</a></li>
      <li><a href="#daftartugas" data-toggle="tab">Daftar Tugas</a></li>
    </ul>
    <div class="tab-content">
      <div class="active tab-pane" id="daftarmahasiswa">
        <table id="datakelas" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Nama Mahasiswa</center></th>
              <th><center>Status</center></th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=0; foreach ($tugas as $value): $no++; ?>
            <tr>
              <td><center><?php echo $no; ?></center></td>
              <td><center></center></td>
              <td><center></center></td>
              <td><center>
                <a class="btn btn-success btn-xs tooltips">
                  <span data-toggle="tooltip" data-original-title="Detail Kelas" <i class="fa fa-search"></i></span>
                </a></center>
              </td>
            </tr> 
          <?php  endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.tab-pane -->

    <div class="tab-pane" id="daftartugas">
      <table id="datatugas" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Nama Tugas</center></th>
            <th><center>Tanggal Mulai</center></th>
            <th><center>Tanggal Selesai</center></th>
            <th><center>Jenis Tugas</center></th>
            <th><center>Status</center></th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
         <?php $no=0; foreach ($tugas as $value): $no++; ?>
         <tr>
          <td><center><?php echo $no; ?></center></td>
          <td><center><?php echo $value->nama_tugas; ?></center></td>
          <td><center><?php echo tgl_indo($value->tgl_mulai); ?></center></td>
          <td><center><?php echo tgl_indo($value->tgl_selesai); ?></center></td>
          <td><center><?php echo $value->jenis_tugas; ?></center></td>
          <td><center><?php echo $value->status_tugas; ?></center></td>
          <td><center>
            <a class="btn btn-primary btn-xs tooltips" data-toggle="modal" data-target="#modal-<?php echo $value->id_tugas; ?>">
              <span data-toggle="tooltip" data-original-title="Ubah Tugas" <i class="fa fa-edit"></i></span>
            </a>
            <a class="btn btn-success btn-xs tooltips" href="<?php echo site_url('DosenC/tampilSoalPilgan/'.$value->id_tugas); ?>">
              <span data-toggle="tooltip" data-original-title="Lihat Tugas" <i class="fa fa-search"></i></span>
            </a>
            <a class="btn btn-warning btn-xs tooltips" href="#">
              <span data-toggle="tooltip" data-original-title="Lihat Koreksi" <i class="fa fa-file-text-o"></i></span>
            </a>
            <a class="btn btn-danger btn-xs tooltips" href="<?php echo site_url('DosenC/hapusTugas/'.$value->id_tugas.'/'.$getuniv['id_univ']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus tugas?')">
              <span data-toggle="tooltip" data-original-title="Hapus Tugas" <i class="fa fa-remove"></i></span>
            </a></center>
          </td>
        </tr>
      <?php  endforeach; ?>
      <?php } ?>
    </tbody>
  </table>
</div>
<!-- /.tab-pane -->

<!-- modal untuk tambah manual -->
<div class="modal fade" id="modal-add-<?php echo $getuniv['id_univ']?>">
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
          <input type="hidden" name="id_univ" id="id_univ" value="<?php echo $getuniv['id_univ']?>">
          <div class="form-group">
           <label for="" class="col-sm-3 control-label">Nama Tugas</label>
           <div class="col-sm-8">
             <input type="text" class="col-sm-10 form-control" name="nama_tugas" placeholder="Nama Tugas" required oninvalid="this.setCustomValidity('Isi nama tugas.')" oninput="setCustomValidity('')">
           </div>
         </div>
         <input type="hidden" class="col-sm-10 form-control" name="tgl_mulai" id="tgl_mulai" value="<?php echo date('Y-m-d');?>" required>
         <div class="form-group">
          <label for="" class="col-sm-3 control-label">Tanggal Selesai</label>
          <div class="col-sm-8">
            <input type="date" class="col-sm-10 form-control" name="tgl_selesai" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask min="<?php echo date('Y-m-d');?>" required oninvalid="this.setCustomValidity('Isi tanggal selesai.')" oninput="setCustomValidity('')">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Jenis Tugas</label>
          <div class="col-sm-8">
            <select name="jenis_tugas" id="jenis_tugas" class="form-control required" required oninvalid="this.setCustomValidity('Isi jenis tugas.')" oninput="setCustomValidity('')">
              <option value="" disabled selected><i>---Pilih Jenis Tugas---</i></option>
              <option value="Pilihan Ganda">Pilihan Ganda</option>
              <option value="Essay">Essay</option>
            </select>
          </div>
        </div>
        <div class="form-group" id="waktu" hidden>
           <label for="" class="col-sm-3 control-label">Waktu</label>
           <div class="col-sm-2">
             <input type="text" class="col-sm-10 form-control" style="text-align: center;" name="waktu" value="0" required oninvalid="this.setCustomValidity('Isi waktu.')" oninput="setCustomValidity('')">
           </div>
           <label class="control-label">menit</label>
         </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Status</label>
          <div class="col-sm-8">
            <select name="status_tugas" class="form-control required" required oninvalid="this.setCustomValidity('Isi status tugas.')" oninput="setCustomValidity('')">
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

<?php $no=0; foreach ($tugas as $value): $no++; ?>
<!-- modal untuk ubah manual -->
<div class="modal fade" id="modal-<?php echo $value->id_tugas; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Ubah Tugas</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/ubahTugas') ?>">
          <input type="hidden" class="col-sm-10 form-control" id="id_tugas" name="id_tugas" value="<?php echo $value->id_tugas; ?>">
          <input type="hidden" name="id_univ" id="id_univ" value="<?php echo $getuniv['id_univ']?>">
          <div class="form-group">
           <label for="" class="col-sm-3 control-label">Nama Tugas</label>
           <div class="col-sm-8">
             <input type="text" class="col-sm-10 form-control" id="nama_tugas" name="nama_tugas" value="<?php echo $value->nama_tugas; ?>">
           </div>
         </div> 
         <!-- <div class="form-group">
          <label for="" class="col-sm-3 control-label">Tanggal Mulai</label>
          <div class="col-sm-8"> -->
            <input type="hidden" class="col-sm-10 form-control" name="tgl_mulai" value="<?php echo $value->tgl_mulai; ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
          <!-- </div>
          </div> -->
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Tanggal Selesai</label>
            <div class="col-sm-8">
              <input type="date" class="col-sm-10 form-control" name="tgl_selesai" value="<?php echo $value->tgl_selesai; ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Jenis Tugas</label>
            <div class="col-sm-8">
              <input type="text" class="col-sm-10 form-control" id="jenis_tugas" name="jenis_tugas" value="<?php echo $value->jenis_tugas; ?>" readonly>
            <!-- <select name="jenis_tugas" class="form-control required" required="">
              <?php
              $jenis_tugas=$value->jenis_tugas;
              if ($jenis_tugas== "Pilihan Ganda") echo "<option value='Pilihan Ganda' selected>Pilihan Ganda</option>";
              else echo "<option value='Pilihan Ganda'>Pilihan Ganda</option>";
              if ($jenis_tugas== "Essay") echo "<option value='Essay' selected>Essay</option>";
              else echo "<option value='Essay'>Essay</option>";                      
              ?>
            </select> -->
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Status</label>
          <div class="col-sm-8">
            <select name="status_tugas" class="form-control required" required="">
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
        <input class="btn btn-primary" id="" type="submit" value="Simpan" >
      </div>
    </div>
  </form>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<?php  endforeach; ?>
<!-- /.modal -->

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