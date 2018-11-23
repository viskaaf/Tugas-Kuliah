<?php
$this->load->view('head_dosen');
?>

<div class="col-md-9">
  <div class="box-header with-border">
    <h3 class="box-title" style="font-size: 25px"><i class="fa fa-list"></i> Daftar Kelas</h3>
  </div>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('DosenC') ?>"><i class="fa fa-home"></i> Beranda</a></li>
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
          Tidak ada kelas yang dibuat.
        </h4>
        <h5 style="padding-top: 30px; text-align: center;">
          <b>Langkah berikutnya: Membuat Kelas</b>
        </h5>
        <h5 style="text-align: center;">
          Anda dapat membuat kelas dengan klik tombol <b>Buat Kelas</b> 
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
        <!-- <?php 
        $length = 6;
        $data = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $string = '';
        for($i = 0; $i < $length; $i++) {
          $pos = rand(0, strlen($data)-1);
          $string .= $data{$pos};
        } 
        ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-<?php echo $string; ?>-<?php echo $getdosen['id_dosen']?>-<?php echo $getuniv['id_univ']?>"><i class="fa fa-plus-square"></i>  Tambah</button> -->
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
            <a class="btn btn-primary btn-xs tooltips" data-toggle="modal" data-target="#modal-<?php echo $value->id_kelas; ?>">
              <span data-toggle="tooltip" data-original-title="Ubah Kelas" <i class="fa fa-edit"></i></span>
            </a>
            <a class="btn btn-primary btn-xs tooltips" href="<?php echo site_url('DosenC/detailKelas/'.$value->id_kelas) ?>">
              <span data-toggle="tooltip" data-original-title="Detail Kelas" <i class="fa fa-eye"></i></span>
            </a>
            <a class="btn btn-danger btn-xs tooltips" href="<?php echo site_url('DosenC/hapusKelas/'.$value->id_kelas) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus kelas?')">
              <span data-toggle="tooltip" data-original-title="Hapus Kelas" <i class="fa fa-remove"></i></span>
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

<!-- modal untuk tambah manual -->
<div class="modal fade" id="modal-add-<?php echo $string; ?>-<?php echo $getdosen['id_dosen']?>-<?php echo $getuniv['id_univ']?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Tambah Kelas</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/tambahKelas')?>">
          <input type="text" name="id_dosen" id="id_dosen" value="<?php echo $getdosen['id_dosen']?>">
          <input type="text" name="id_univ" id="id_univ" value="<?php echo $getuniv['id_univ']?>">
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
<!-- /.modal -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $no=0; foreach ($kelas as $value): $no++; ?>
<!-- modal untuk ubah manual -->
<div class="modal fade" id="modal-<?php echo $value->id_kelas; ?>">
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
<?php  endforeach; ?>
<!-- /.modal -->
<?php } ?>

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