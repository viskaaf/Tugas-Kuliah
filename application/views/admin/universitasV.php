<?php
$this->load->view('head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
  <div class="box box-info col-xs-12" style="border-top-color: #fff">
  <!-- <section class="content-header"> -->
    <h1>
      Universitas
    </h1>
  <!-- </section> -->
  <!-- <div style="margin-left: 15px; margin-right: 15px; margin-top: 10px;"> -->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('AdminC/')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Universitas</li>
    </ol>
  <!-- </div> -->
  </div>
  </section>

  <!-- Main Content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- Alert -->
        <?php
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            <?=$data;?>
          </div>
          <!-- <div class="alert alert-success" id="success-alert"><strong>Sukses! </strong> <?=$data;?></div> -->
        <?php } ?>
        <?php 
        $data2=$this->session->flashdata('error');
        if($data2!=""){ ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Error!</h4>
            <?=$data2;?>
          </div>
          <!-- <div class="alert alert-danger" id="success-alert"><strong> Error! </strong> <?=$data2;?></div> -->
        <?php } ?>
        <!-- sampai sini -->
        <div class="box box-info" style="border-top-color: #fff">
          <!-- Box Header -->
          <div class="box-body">
            <button type="button" class="btn btn-primary pull-right" style="background-color: #002231" data-toggle="modal" data-target="#modal-add">Tambah Universitas</button>
            <div class="row" style="padding-bottom: 10px;"></div>
            <table id="universitas" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Universitas</center></th>
                  <th><center>Status</center></th>
                  <th><center>Opsi</center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0; foreach ($universitas as $value): $no++; ?>
                <tr>
                  <td><center><?php echo $no; ?></center></td>
                  <td><center><?php echo $value->nama_univ; ?></center></td>
                  <td><center><?php echo $value->status_univ; ?></center></td>
                  <td><center>
                    <a class="btn btn-primary btn-xs tooltips" data-toggle="modal" data-target="#modal-<?php echo $value->id_univ; ?>">
                      <span data-toggle="tooltip" data-original-title="Ubah Kelas" <i class="fa fa-edit"></i></span>
                    </a>
                    <a class="btn btn-info btn-xs tooltips" href="<?php echo site_url('AdminC/daftarFakultas/'.$value->id_univ) ?>">
                      <span data-toggle="tooltip" data-original-title="Detail Kelas" <i class="fa fa-search"></i></span>
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
              <h4 class="modal-title"><center>Tambah Universitas</center></h4>
            </div>
            <div class="modal-body">
             <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('AdminC/tambahUniversitas') ?>">
               <div class="form-group">
                 <label for="" class="col-sm-2 control-label">Nama Universitas</label>
                 <div class="col-sm-10">
                   <input type="text" class="col-sm-10 form-control" name="nama_univ" placeholder="Nama Universitas">
                 </div>
               </div> 
               <div class="form-group">
                <label for="" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                  <select name="status_univ" class="form-control required" required="">
                    <option value="" disabled selected><i>---Pilih Status---</i></option>
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
        </form>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


  </div>
</section>

</div>
<?php $no=0; foreach ($universitas as $value): $no++; ?>
<!-- modal untuk ubah manual -->
<div class="modal fade" id="modal-<?php echo $value->id_univ; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><center>Ubah Universitas</center></h4>
        </div>
        <div class="modal-body">
         <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('AdminC/ubahUniversitas') ?>">
          <input type="hidden" class="col-sm-10 form-control" id="id_univ" name="id_univ" value="<?php echo $value->id_univ; ?>">
          <div class="form-group">
           <label for="" class="col-sm-2 control-label">Nama Universitas</label>
           <div class="col-sm-10">
             <input type="text" class="col-sm-10 form-control" id="nama_univ" name="nama_univ" value="<?php echo $value->nama_univ; ?>">
           </div>
         </div> 
         <div class="form-group">
          <label for="" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <select name="status_univ" class="form-control required" required="">
              <!-- <option value="" disabled selected><i>---Pilih Status---</i></option> -->
              <?php
              $status_univ=$value->status_univ;
              if ($status_univ== "Aktif") echo "<option value='Aktif' selected>Aktif</option>";
              else echo "<option value='Aktif'>Aktif</option>";
              if ($status_univ== "Tidak Aktif") echo "<option value='Tidak Aktif' selected>Tidak Aktif</option>";
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
    $('#universitas').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  /** add active class and stay opened when selected */
  var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
      return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>
</body>
<footer class="main-footer">
  <strong><center>Copyright &copy; Tugas Kuliah.com</center></strong>
</footer>
</html>