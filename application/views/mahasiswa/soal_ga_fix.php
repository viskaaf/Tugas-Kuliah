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
  <li><a href="<?php echo base_url('MahasiswaC') ?>"><i class="fa fa-home"></i> Beranda</a></li>
  <li><a href="#">Buat Soal</a></li>
  <li class="active">Soal Pilihan Ganda</li>
</ol>
<!-- /.content-header -->

<!-- Main content -->
<div class="box box-primary">

  <?php foreach($soal as $value) { $nomor=$nomor+1; ?>
   <!-- form start -->
   <table class="table">
     <form role="form" action="" method="POST">
      <!-- <div class="box-body"> -->
        <input type="hidden" name="id_soal_pilgan" value="<?php echo $value->id_soal_pilgan; ?>">
        <tr>
          <td width="50" style="border: none;"><font><?php echo $nomor; ?>.</font></td>
          <td width="1500" style="border: none;"><font><?php echo $value->soal_pilgan; ?></font></td>
        </tr>
        <?php 
        if(!empty($value->gambar)){
          echo "<tr><td style='border: none;'></td><td><img src='".base_url('gambar/gambar_pilgan/'.$value->gambar)."' width='200' hight='200'></td></tr>";
        }
        ?>
        <tr>
          <td style="border: none;"></td>
          <td width="1500" style="border: none;">
            <font>A.
              <input name="pil_a" type="radio" value="A"> <?php echo "$value->pil_a";?>
            </font>
          </td>
        </tr>
        <tr>
          <td style="border: none;"></td>
          <td width="1500" style="border: none;">
            <font>B.
              <input name="pil_b" type="radio" value="B"> <?php echo "$value->pil_b";?>
            </font>
          </td>
        </tr>
        <?php if(!empty($value->pil_c)){ ?>
          <tr>
            <td style="border: none;"></td>
            <td width="1500" style="border: none;">
              <font>C.
                <input name="pil_c" type="radio" value="C"> <?php echo "$value->pil_c";?>
              </font>
            </td>
          </tr>
        <?php } ?>
        <?php if(!empty($value->pil_d)){ ?>
          <tr>
            <td style="border: none;"></td>
            <td width="1500" style="border: none;">
              <font>D.
                <input name="pil_d" type="radio" value="D"> <?php echo "$value->pil_d";?>
              </font>
            </td>
          </tr>
        <?php } ?>
        <?php if(!empty($value->pil_e)){ ?>
          <tr>
            <td style="border: none;"></td>
            <td width="1500" style="border: none;">
              <font>E.
                <input name="pil_e" type="radio" value="E"> <?php echo "$value->pil_e";?>
              </font>
            </td>
          </tr>
        <?php } ?>
      </table>
      <!-- /.box-body -->
      <?php
    }
    ?>
    <div class="box-footer">
          <center>
            <button type="submit" class="btn btn-success">Selesai</button>
          </center>
        </div>
  <!-- </div> -->
</form>
</div>
<!-- /.content -->

</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(function () {


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