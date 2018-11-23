<?php
$this->load->view('head_dosen');
?>

        <div class="col-md-9">
          
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
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="font-size: 25px"><i class="fa fa-list"></i> Daftar Mata Kuliah</h3>
            </div>
            <div class="box-body">
            <div style="padding-bottom: 20px;">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus-square"></i>  Tambah</button>
            </div>
            <table id="datakelas" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Mata Kuliah</center></th>
                  <th><center>Status</center></th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
               <!-- <?php $no=0; foreach ($kelas as $value): $no++; ?> -->
                <tr>
                  <td><center><?php echo $no; ?></center></td>
                  <td><center></center></td>
                  <td><center></center></td>
                  <td><center>
                    <a class="btn btn-primary btn-xs tooltips" data-toggle="modal" data-target="#modal-<?php echo $value->id_kelas; ?>">
                      <span data-toggle="tooltip" data-original-title="Ubah Kelas" <i class="fa fa-edit"></i></span>
                    </a>
                    <a class="btn btn-success btn-xs tooltips" href="<?php echo site_url('DosenC/kelolaKelas') ?>">
                      <span data-toggle="tooltip" data-original-title="Detail Kelas" <i class="fa fa-search"></i></span>
                    </a></center>
                  </td>
                </tr>

                <!-- <?php  endforeach; ?> -->
              </tbody>
            </table>
            </div>
          </div> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<!-- modal untuk tambah manual -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Tambah Tugas</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('DosenC/tambahKelas') ?>">
           <div class="form-group">
           <label for="" class="col-sm-2 control-label">Nama Tugas</label>
           <div class="col-sm-10">
               <input type="text" class="col-sm-10 form-control" name="nama_kelas" placeholder="Nama Kelas" required oninvalid="this.setCustomValidity('Isi nama kelas.')" oninput="setCustomValidity('')">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Kelas</label>
            <div class="col-sm-10">
              <select name="status_kelas" class="form-control required" required="">
                <option value="" disabled selected><i>---Pilih Kelas---</i></option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Mata Kuliah</label>
            <div class="col-sm-10">
              <select name="status_kelas" class="form-control required" required="">
                <option value="" disabled selected><i>---Pilih Mata Kuliah---</i></option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
          </div>
          <!-- <div class="form-group">
            <label for="" class="col-sm-2 control-label">Tanggal Pembuatan</label>
            <div class="col-sm-10">
              <input type="date" class="col-sm-10 form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
            </div> date(y-m-d)
          </div> -->
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Batas Waktu</label>
            <div class="col-sm-10">
              <input type="date" class="col-sm-10 form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
            </div>
          </div>
          <!-- <div class="form-group">
           <label for="" class="col-sm-2 control-label">Waktu</label>
           <div class="col-sm-8">
               <input type="text" class="col-sm-10 form-control" name="waktu" placeholder="Nama Waktu" required oninvalid="this.setCustomValidity('Isi waktu.')" oninput="setCustomValidity('')">
           </div>
           <label for="" class="control-label"><small>(*dalam menit)</small></label>
          </div> -->
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
              <select name="status_kelas" class="form-control required" required="">
                <option value="" disabled selected><i>---Pilih Status---</i></option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
          </div>
          <input type="hidden" class="col-sm-10 form-control" name="id_user" value="<?php echo $id_user['id_user']; ?>">
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
           <label for="" class="col-sm-2 control-label">Nama Kelas</label>
           <div class="col-sm-10">
               <input type="text" class="col-sm-10 form-control" id="nama_kelas" name="nama_kelas" value="<?php echo $value->nama_kelas; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
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

  <script>
  $(function () {
    $('#datakelas').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  })
</script>

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
</div>
<!-- ./wrapper -->