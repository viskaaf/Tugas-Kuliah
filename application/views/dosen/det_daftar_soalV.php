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
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#daftarmahasiswa" data-toggle="tab">Daftar Mahasiswa</a></li>
              <li><a href="#ubahpassword" data-toggle="tab">Daftar Soal</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="daftarmahasiswa">
                <table id="datakelas" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Mahasiswa</center></th>
                  <!-- <th><center>Status</center></th> -->
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
               <!-- <?php $no=0; foreach ($kelas as $value): $no++; ?> -->
                <tr>
                  <td><center><?php echo $no; ?></center></td>
                  <td><center></center></td>
                  <!-- <td><center><?php echo $value->status_kelas; ?></center></td> -->
                  <td><center>
                    <a class="btn btn-success btn-xs tooltips">
                      <span data-toggle="tooltip" data-original-title="Detail Kelas" <i class="fa fa-search"></i></span>
                    </a></center>
                  </td>
                </tr>

                <!-- <?php  endforeach; ?> -->
              </tbody>
            </table>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="ubahpassword">
                                      <!-- form start -->
            <form role="form" action="<?php echo site_url('DosenC/resetPassword') ?>" method="POST">
              <div class="box-body">
              <input type="hidden" class="form-control" name="id_user" value="<?php echo $nama['id_user']; ?>">
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
    $('#datakelas').DataTable()
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