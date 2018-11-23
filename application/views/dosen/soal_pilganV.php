<?php
$this->load->view('head_soal');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Top Navigation
  </h1>
</section><br>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('DosenC') ?>"><i class="fa fa-home"></i> Beranda</a></li>
  <li><a href="#">Buat Soal</a></li>
  <li class="active">Soal Pilihan Ganda</li>
</ol>
<!-- /.content-header -->

<!-- Main content -->
<div class="box box-primary">

  <?php foreach($soal as $value) { $nomor=$nomor+1; ?>
   <!-- form start -->
   <table width="100%" class="table table-striped">
     <!-- <form role="form" action="" method="POST"> -->
      <!-- <div class="box-body" style="margin-top: 10px; margin-left: 10px"> -->
        <input type="hidden" name="id_soal_pilgan" value="<?php echo $value->id_soal_pilgan; ?>">
        <tr>
          <td style="width: 150px;">Soal (<?php echo $nomor; ?>)</td>
          <td>Pertanyaan</td>
          <td style="width: 90px;">:</td>
          <td><?php echo $value->soal_pilgan; ?></td>
        </tr>
        <?php 
        if(!empty($value->gambar)){
          echo "<tr><td></td><td>Gambar</td><td>:</td><td><img src='".base_url('gambar/gambar_pilgan/'.$value->gambar)."' width='200' hight='200'></td></tr>";
        }else{
          echo "<tr><td></td><td>Gambar</td><td>:</td><td><i>Tidak ada gambar</i></td></tr>";
        }
        ?>
        <tr>
          <td></td>
          <td style="width: 150px;">Pilihan A</td>
          <td>:</td>
          <td><?php echo $value->pil_a;?></td>
        </tr>
        <tr>
          <td></td>
          <td>Pilihan B</td>
          <td>:</td>
          <td><?php echo $value->pil_b;?></td>
        </tr>
        <?php 
        if(!empty($value->pil_c)){
          echo "<tr><td></td><td>Pilihan C</td><td>:</td><td>$value->pil_c</td></tr>";
        }
        ?>
        <?php 
        if(!empty($value->pil_d)){
          echo "<tr><td></td><td>Pilihan D</td><td>:</td><td>$value->pil_d</td></tr>";
        }
        ?>
        <?php 
        if(!empty($value->pil_e)){
          echo "<tr><td></td><td>Pilihan E</td><td>:</td><td>$value->pil_e</td></tr>";
        }
        ?>
        <tr>
          <td></td>
          <td>Kunci</td>
          <td>:</td>
          <td><?php echo $value->kunci;?></td>
        </tr>
        <tr>
          <td></td>
          <td>Opsi</td>
          <td>:</td>
          <td>
            <form method="POST" action="<?php echo site_url('DosenC/editSoalPilgan/'.$value->id_soal_pilgan);?>">
              <input type="hidden" name="nomor" value="<?php echo $nomor;?>">
            <button class="btn btn-primary btn-xs tooltips pull-left" type="submit">
              <span data-toggle="tooltip" data-original-title="Ubah Soal" <i class="fa fa-edit"></i></span>
            </button></form>
            <a class="btn btn-danger btn-xs tooltips pull-left" href="<?php echo site_url('DosenC/hapusSoalPilgan/'.$value->id_soal_pilgan.'/'.$value->id_tugas); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus soal?')">
              <span data-toggle="tooltip" data-original-title="Hapus Soal" <i class="fa fa-remove"></i></span>
            </a>
          </td>

          <!-- modal untuk ubah manual -->
          <div class="modal fade" id="modal-<?php echo $value->id_soal_pilgan; ?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><center>Ubah Soal</center></h4>
                  </div>
                  <div class="modal-body">
                   <?php echo form_open_multipart('DosenC/tambahSoalPilgan/') ?>
                   <div class="box-body">
                    <input type="hidden" class="form-control" name="id_soal_pilgan" value="<?php echo $value->id_soal_pilgan; ?>">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">Pertanyaan No. [<?php echo $nomor; ?>] <span style="color: red;">*</span></label>

                      <div class="col-sm-7">
                        <textarea class="form-control" rows="3" name="soal_pilgan" id="soal_pilgan" required><?php echo $value->soal_pilgan; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Gambar <sup>(optional)</sup></label>

                      <div class="col-sm-7">
                        <input type="file" class="form-control" name="gambar" id="gambar">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Pilihan A <span style="color: red;">*</span></label>

                      <div class="col-sm-7">
                       <textarea class="form-control" rows="1" name="pil_a" id="pil_a" required><?php echo $value->pil_a; ?></textarea>
                     </div>
                   </div>
                   <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">Pilihan B <span style="color: red;">*</span></label>

                    <div class="col-sm-7">
                      <textarea class="form-control" rows="1" name="pil_b" id="pil_b" required><?php echo $value->pil_b; ?></textarea>
                    </div>
                    <div id="tambah_pilsoalC">
                      <a class="btn btn-primary btn-xs tooltips" name="tambah_soal1" id="tambah_pil1" style="margin-top: 6px;">
                        <span data-toggle="tooltip" data-original-title="Tambah pilihan soal" <i class="fa fa-plus-square"></i></span>
                      </a>
                    </div>
                  </div>
                  
                    <div class="form-group" id="pil_c" <?php 
                  if($value->pil_c=="-"){ ?> style="display: none;"<?php }?>>
                      <label for="inputPassword3" class="col-sm-4 control-label">Pilihan C</label>

                      <div class="col-sm-7">
                        <textarea class="form-control" rows="1" name="pil_c"><?php echo $value->pil_c; ?></textarea>
                      </div>
                      <div id="tambah_pilsoalD">
                        <a class="btn btn-primary btn-xs tooltips" name="tambah_soal2" id="tambah_pil2" style="margin-top: 6px;">
                          <span data-toggle="tooltip" data-original-title="Tambah pilihan soal" <i class="fa fa-plus-square"></i></span>
                        </a>
                        <a class="btn btn-danger btn-xs tooltips" name="hapus_pil2" id="hapus_pil2" style="margin-top: 6px;">
                          <span data-toggle="tooltip" data-original-title="Hapus pilihan soal" <i class="fa fa-remove"></i></span>
                        </a>
                      </div>
                    </div>
                  
                  <div class="form-group" id="pil_d" <?php 
                  if($value->pil_d == "-"){ ?> style="display: none;"<?php }?>>
                    <label for="inputPassword3" class="col-sm-4 control-label">Pilihan D</label>

                    <div class="col-sm-7">
                      <textarea class="form-control" rows="1" name="pil_d"><?php echo $value->pil_d; ?></textarea>
                    </div>
                    <div id="tambah_pilsoalE">
                      <a class="btn btn-primary btn-xs tooltips" name="tambah_soal3" id="tambah_pil3" style="margin-top: 6px;">
                        <span data-toggle="tooltip" data-original-title="Tambah pilihan soal" <i class="fa fa-plus-square"></i></span>
                      </a>
                      <a class="btn btn-danger btn-xs tooltips" name="hapus_pil3" id="hapus_pil3" style="margin-top: 6px;">
                        <span data-toggle="tooltip" data-original-title="Hapus pilihan soal" <i class="fa fa-remove"></i></span>
                      </a>
                    </div>
                  </div>
                  
                  <div class="form-group" id="pil_e" <?php 
                  if($value->pil_e == "-"){ ?> style="display: none;"<?php }?>>
                    <label for="inputPassword3" class="col-sm-4 control-label">Pilihan E</label>

                    <div class="col-sm-7">
                      <textarea class="form-control" rows="1" name="pil_e"><?php echo $value->pil_e; ?></textarea>
                    </div>
                    <div id="tambah_pilsoal">
                      <a class="btn btn-danger btn-xs tooltips" name="hapus_pil4" id="hapus_pil4" style="margin-top: 6px;">
                        <span data-toggle="tooltip" data-original-title="Hapus pilihan soal" <i class="fa fa-remove"></i></span>
                      </a>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">Kunci <span style="color: red;">*</span></label>

                    <div class="col-sm-7">
                      <input type="radio" name="kunci" id="kunciA" value="1" <?php if($value->kunci=='A'){echo "checked";}?> class="minimal"/> A
                      <span><input type="radio" name="kunci" id="kunciB" value="1" <?php if($value->kunci=='B'){echo "checked";}?> class="minimal"/> B </span>
                      <span id="kunciC" hidden><input type="radio" name="kunci" value="C" class="minimal"> C</span>
                      <span id="kunciD" hidden><input type="radio" name="kunci" value="D" class="minimal"> D</span>
                      <span id="kunciE" hidden><input type="radio" name="kunci" value="E" class="minimal"> E</span>

                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">        
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  <div class="pull-left">        
                    <button class="btn btn-default" data-dismiss="modal" >Batal</button>
                  </div>
                </div>
                <!-- /.box-footer -->
              </div>
              <?php echo form_close(); ?>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <!-- /.modal -->
        </tr>
        <!-- </div> -->
      </table>
      <!-- /.box-body -->
      <?php
    }
    ?>
  </div>
  <!-- /.content -->

</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(function () {

    $("#tambah_pil1").click(function() {
      $("#pil_c").show();
      $("#tambah_pilsoalC").hide();
      $("#tambah_pilsoalD").show();
      $("#kunciC").show();
    });

    $("#tambah_pil2").click(function() {
      $("#pil_d").show();
      $("#tambah_pilsoalD").hide();
      $("#tambah_pilsoalE").show();
      $("#kunciD").show();
    });

    $("#tambah_pil3").click(function() {
      $("#pil_e").show();
      $("#tambah_pilsoalE").hide();
      $("#kunciE").show();
    });

    $("#hapus_pil2").click(function() {
      $("#pil_c").hide();
      $("#tambah_pilsoalC").show();
      $("#kunciC").hide();
    });

    $("#hapus_pil3").click(function() {
      $("#pil_d").hide();
      $("#tambah_pilsoalD").show();
      $("#kunciD").hide();
    });

    $("#hapus_pil4").click(function() {
      $("#pil_e").hide();
      $("#tambah_pilsoalE").show();
      $("#kunciE").hide();
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
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