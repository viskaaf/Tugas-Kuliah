<?php
$this->load->view('head_dosen');
?>

        <div class="col-md-9">
          <div style="padding-bottom: 15px; width: 20%;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Buat Soal</button>
          </div>
            <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title">Daftar Soal</h3>
            </div>
            <div class="box-body">
            <table id="datasoal1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Soal</th>
                  <th>Mata Kuliah</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                  <a href="<?php echo base_url().'index.php/LoginC' ?>">Tugas Sistem Informasi</a>
                  </td>
                  <td>Sistem Informasi</td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <a href="<?php echo base_url().'index.php/LoginC' ?>">Tugas Aljabar</a>
                  </td>
                  <td>ASD</td>
                  <td>Tidak Aktif</td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Buat Soal</h4>
              </div>
              <div class="modal-body">
                 <input type="text" class="form-control" id="inputketerangan" placeholder="Nama Soal">
              </div>
              <div class="modal-body">
              <select id="pilihsemester" name="namasmstr" class="form-control required">
                <option value="" disabled selected=""> <i>--- Pilih Bentuk Soal ---</i></option>
                <option>Pilihan Ganda</option>
                <option>Essay</option>
              </select>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
  $(function () {
    $('#datasoal1').DataTable()
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
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->