<?php
$this->load->view('head_soal');
?>

      <div class="box box-info col-xs-12" style="border-top-color: #fff; margin-top: 20px">
    <!-- <h3 class="box-title" style="font-size: 25px"><i class="fa fa-list"></i> Buat Soal</h3> -->
      <!-- <section class="content-header"> -->
    <h1>
      Hasil Soal Pilihan Ganda
    </h1>
  <!-- </section> -->
  <!-- <div style="margin-left: 15px; margin-right: 15px; margin-top: 10px;"> -->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('MahasiswaC') ?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url('MahasiswaC/detailKelas/'.$ket_soal['id_kelas']) ?>">Detail Kelas</a></li>
        <li class="active">Hasil Soal Pilihan Ganda</li>
    </ol>
  <!-- </div> -->
    <div class="callout callout-info">
    <h4><i class="fa fa-info-circle"></i> INFORMASI</h4>
    <ul>
    <li>Warna Hijau = Jawaban Benar</li>
    <li>Warna Merah = Jawaban Salah</li>
    </ul>
  </div>
<div class="col-xs-9">
  <!-- Main content --> 
  <div class="box box-default" style="margin-top: 10px">
    <div class="box-header with-border">
      <center>
        <h1 class="box-title" style="font-size: 25px;"><b> <?php echo $ket_soal['nama_tugas'];?></b></h1>
        <p style="padding-top: 10px;"><i class="fa fa-calendar" ></i> Batas Pengerjaan: <?php echo tgl_indo(date("Y-m-d",strtotime($ket_soal['tgl_selesai']))); ?></p>
        <p><i class="fa fa-clock-o" ></i> Waktu: <?php echo $ket_soal['waktu'];?> menit</p>
        </center> 
    </div>
 
    <?php $nomor=0; ?>
    <?php foreach($jawaban as $value) { $nomor=$nomor+1; ?>

     <table class="table-responsive" style="margin: 10px 10px 10px 10px;">
      <!-- form start -->
      <form id="form_soal" action="<?php echo site_url('MahasiswaC/jawabSoal') ?>" method="POST">
        <input type="hidden" name="id_tugas" value="<?php echo $value->id_tugas; ?>">
        <input type="hidden" name="pilihan[<?php echo $nomor;?>][id_soal_pilgan]" value="<?php echo $value->id_soal_pilgan; ?>">
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
            <font <?php if($value->statusJawaban == 'S'){ ?> 
              <?php if($value->jawaban == 'A'){ ?> 
                style="color: #FF0000; font-weight: bold;"

              <?php }elseif($value->kunci == 'A'){ ?>
                style="color: #008000; font-weight: bold;" 

              <?php } ?>

            <?php }elseif($value->jawaban == 'A' && $value->statusJawaban == 'B'){ ?> 
              style="color: #008000; font-weight: bold;" 

              <?php } ?> >A.
              <?php echo "$value->pil_a";?>
            </font>
          </td>
        </tr>

        <tr>
          <td style="border: none;"></td>
          <td width="1500" style="border: none;">
            <font <?php if($value->statusJawaban == 'S'){ ?> 
              <?php if($value->jawaban == 'B'){ ?> 
                style="color: #FF0000; font-weight: bold;"

              <?php }elseif($value->kunci == 'B'){ ?>
                style="color: #008000; font-weight: bold;" 

              <?php } ?>

            <?php }elseif($value->jawaban == 'B' && $value->statusJawaban == 'B'){ ?> 
              style="color: #008000; font-weight: bold;" 

              <?php } ?> >B.
              <?php echo "$value->pil_b";?>
            </font>
          </td>
        </tr>
        <?php if(!empty($value->pil_c)){ ?>
          <tr>
            <td style="border: none;"></td>
            <td width="1500" style="border: none;">
              <font <?php if($value->statusJawaban == 'S'){ ?> 
                <?php if($value->jawaban == 'C'){ ?> 
                  style="color: #FF0000; font-weight: bold;"

                <?php }elseif($value->kunci == 'C'){ ?>
                  style="color: #008000; font-weight: bold;" 

                <?php } ?>

              <?php } elseif($value->jawaban == 'C' && $value->statusJawaban == 'B' ){ ?> 
                style="color: #008000; font-weight: bold;" 

                <?php } ?> >C.
                <?php echo "$value->pil_c";?>
              </font>
            </td>
          </tr>
        <?php } ?>
        <?php if(!empty($value->pil_d)){ ?>
          <tr>
            <td style="border: none;"></td>
            <td width="1500" style="border: none;">
              <font <?php if($value->statusJawaban == 'S'){ ?> 
                <?php if($value->jawaban == 'D'){ ?> 
                  style="color: #FF0000; font-weight: bold;"

                <?php }elseif($value->kunci == 'D'){ ?>
                  style="color: #008000; font-weight: bold;" 

                <?php } ?>

              <?php } elseif($value->jawaban == 'D' && $value->statusJawaban == 'B' ){ ?> 
                style="color: #008000; font-weight: bold;" 

                <?php } ?> >D.
                <?php echo "$value->pil_d";?>
              </font>
            </td>
          </tr>
        <?php } ?>
        <?php if(!empty($value->pil_e)){ ?>
          <tr>
            <td style="border: none;"></td> 
            <td width="1500" style="border: none;">
              <font <?php if($value->statusJawaban == 'S'){ ?> 
                <?php if($value->jawaban == 'E'){ ?> 
                  style="color: #FF0000; font-weight: bold;"

                <?php }elseif($value->kunci == 'E'){ ?>
                  style="color: #008000; font-weight: bold;" 

                <?php } ?>

              <?php } elseif($value->jawaban == 'E' && $value->statusJawaban == 'B' ){ ?> 
                style="color: #008000; font-weight: bold;" 

                <?php } ?> >E.
                <?php echo "$value->pil_e";?>
              </font>
            </td>
          </tr>
        <?php } ?>
      </table>
      <!-- /.box-body -->
      <?php
    }
    ?>
  </form>
</div>
<!-- /.content -->
</div>

<div class="col-xs-3">
  <div class="box box-default" style="margin-top: 10px">
    <div class="box-header with-border">
      <center>
        <p>Nilai:</p>
        <h1 class="box-title" style="font-size: 25px;"><b> <?php echo $nilai['nilai']; ?></b></h1>
      </center>
    </div>
    <div class="box-header with-border">
      <p style="font-size: 12px;">Ditugaskan Oleh:</p>
      <div class="user-block">
        <?php if($ket_soal['foto_profil']) { ?>
          <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/'.$ket_soal['foto_profil'])?>" alt="user image">
          <?php
        }else { ?> 
          <img class="img-circle img-bordered-sm" src="<?php echo base_url('gambar/blankphoto.png')?>" alt="user image">
        <?php } ?>
        <span class="username" style="font-size: 11px;">
          <a href="#"><?php echo $ket_soal['nama_depan'].' '; echo $ket_soal['nama_belakang'];?></a>
        </span>
        <span class="description" style="font-size: 11px;">Dosen</span>
      </div>
      <!-- /.user-block -->
    </div>
    
  </div>
</div>

</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="container text-center">
    Copyright &copy; 2018 <b><a class="text-black">Tugas Kuliah</a></b><br>
    All rights reserved
  </div>
  <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->