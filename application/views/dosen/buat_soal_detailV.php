<?php
$this->load->view('head_dosen');
?>

        
        <div class="col-md-9">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Buat Soal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label>Tulis Sesuatu</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <!-- <p class="help-block">Max. 32MB</p> -->
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <a href="<?php echo base_url().'index.php/DosenC/daftarsoal' ?>">
                  <button type="button" class="btn btn-default">Batal</button>
                </a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Kirim</button>
              </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
      </div>
      <!-- /.row -->
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

    //Initialize Select2 Elements
    $('.select2').select2()
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