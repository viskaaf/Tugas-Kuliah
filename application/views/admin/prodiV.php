<?php
$this->load->view('head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Program Studi
      <small><?php echo $getfakultas['nama_fakultas'];?></small>
    </h1> 
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Program Studi</li>
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
        <div class="box">
          <!-- Box Header -->
          <div class="box-body">
            <div class="row" style="padding-bottom: 15px;">

            </div>
            <table id="prodi" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Program Studi</center></th>
                  <th><center>Status</center></th>
                  <th><center>Opsi</center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0; foreach ($prodi as $value): $no++; ?>
                <tr>
                  <td><center><?php echo $no; ?></center></td>
                  <td><center><?php echo $value->nama_prodi; ?></center></td>
                  <td><center><?php echo $value->status_prodi; ?></center></td>
                  <td><center>
                    <a class="btn btn-primary btn-xs tooltips" data-toggle="modal" data-target="#modal-<?php echo $value->id_prodi; ?>">
                      <span data-toggle="tooltip" data-original-title="Ubah Kelas" <i class="fa fa-edit"></i></span>
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
              <h4 class="modal-title"><center>Tambah Program Studi</center></h4>
            </div>
            <div class="modal-body">
             <!-- <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('AdminC/tambahProdi') ?>"> -->
              <!-- <input type="hidden" class="col-sm-10 form-control" name="id_fakultas" value="<?php echo $getfakultas['id_fakultas']; ?>"> -->

              <?php echo form_open_multipart('AdminC/tambahProdi','id="form" class="form-horizontal"');?>
               <div class="form-group">
                 <label for="" class="col-sm-2 control-label">Nama Program Studi</label>
                 <div class="col-sm-10">
                   <input type="text" class="col-sm-10 form-control" name="nama_prodi" placeholder="Nama Program Studi">
                 </div>
               </div> 
               <div class="form-group">
                <label for="" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                  <select name="status_prodi" class="form-control required" required="">
                    <option value="" disabled selected><i>---Pilih Status---</i></option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
                </div>
              </div>
              <input type="hidden" class="col-sm-10 form-control" id="id_fakultas" name="id_fakultas" value="<?php echo $getfakultas['id_fakultas']; ?>">
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
<?php $no=0; foreach ($prodi as $value): $no++; ?>
<!-- modal untuk ubah manual -->
<div class="modal fade" id="modal-<?php echo $value->id_prodi; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Ubah Program Studi</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('AdminC/ubahProdi') ?>">
          <input type="hidden" class="col-sm-10 form-control" id="id_prodi" name="id_prodi" value="<?php echo $value->id_prodi; ?>">
          <div class="form-group">
           <label for="" class="col-sm-2 control-label">Nama Program Studi</label>
           <div class="col-sm-10">
             <input type="text" class="col-sm-10 form-control" id="nama_prodi" name="nama_prodi" value="<?php echo $value->nama_prodi; ?>">
           </div>
         </div> 
         <div class="form-group">
          <label for="" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <select name="status_prodi" class="form-control required" required="">
              <!-- <option value="" disabled selected><i>---Pilih Status---</i></option> -->
              <?php
              $status_prodi=$value->status_prodi;
              if ($status_prodi== "Aktif") echo "<option value='Aktif' selected>Aktif</option>";
              else echo "<option value='Aktif'>Aktif</option>";
              if ($status_prodi== "Tidak Aktif") echo "<option value='Tidak Aktif' selected>Tidak Aktif</option>";
              else echo "<option value='Tidak Aktif'>Tidak Aktif</option>";                      
              ?>
            </select>
          </div>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <input class="btn btn-primary" type="submit">
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
    $('#prodi').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
<footer class="main-footer">
  <strong><center>Copyright &copy; Tugas Kuliah.com</center></strong>
</footer>
</html>