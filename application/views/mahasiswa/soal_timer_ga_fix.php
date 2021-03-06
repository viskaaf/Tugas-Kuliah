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

<?php
    $sql = mysql_query("SELECT * FROM tugas WHERE id_tugas=$id_tugas");
     
    /* Apabila data di database kosong, maka waktu awal di set 0 jam, 10 menit dan 0 detik */
    if(mysql_num_rows($sql) == 0){
        $jam    = 0;
        $menit  = 10;
    }else{
        $data   = mysql_fetch_array($sql);
         
         if($data['waktu'] < 60){ 
             /* Apabila waktu yang diiputkan kurang dari 60 menit, maka waktu dijadikan menit dan 0 jam */
             $menit = $data['waktu']; 
             $jam = 0; 
        }else{ 
             /* Apabila waktu yang diiputkan lebih dari 60 menit, maka waktu/60 dan sisa bagi dijadikan menit serta hasil bagi dijadikan jam */
             $menit = $data['waktu']%60;
 
             //awalnya seperti ini 
            //$jam = substr(($data['waktu']/60),0,1); //substr berfungsi untuk mengambil string, 0 dimulai dari string ke-0 dan 1 jumlah string yang akan diambil
            //saya ganti menjadi
            $jam = (int)($data['waktu']/60); //dijadikan integer
        } 
    }
?>

<!-- Main content -->
<div class="box box-primary">

  <?php foreach($soal as $value) { $nomor=$nomor+1; ?>
   
   <div id='timer'></div>
   <table class="table-responsive" style="margin: 10px 10px 10px 10px">
    <!-- form start -->
     <form id="form_soal" action="" method="POST">
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
              <input name="pilihan<?php echo $value->id_soal_pilgan;?>" type="radio" value="A"> <?php echo "$value->pil_a";?>
            </font>
          </td>
        </tr>
        <tr>
          <td style="border: none;"></td>
          <td width="1500" style="border: none;">
            <font>B.
              <input name="pilihan<?php echo $value->id_soal_pilgan;?>" type="radio" value="B"> <?php echo "$value->pil_b";?>
            </font>
          </td>
        </tr>
        <?php if(!empty($value->pil_c)){ ?>
          <tr>
            <td style="border: none;"></td>
            <td width="1500" style="border: none;">
              <font>C.
                <input name="pilihan<?php echo $value->id_soal_pilgan;?>" type="radio" value="C"> <?php echo "$value->pil_c";?>
              </font>
            </td>
          </tr>
        <?php } ?>
        <?php if(!empty($value->pil_d)){ ?>
          <tr>
            <td style="border: none;"></td>
            <td width="1500" style="border: none;">
              <font>D.
                <input name="pilihan<?php echo $value->id_soal_pilgan;?>" type="radio" value="D"> <?php echo "$value->pil_d";?>
              </font>
            </td>
          </tr>
        <?php } ?>
        <?php if(!empty($value->pil_e)){ ?>
          <tr>
            <td style="border: none;"></td>
            <td width="1500" style="border: none;">
              <font>E.
                <input name="pilihan<?php echo $value->id_soal_pilgan;?>" type="radio" value="E"> <?php echo "$value->pil_e";?>
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

    <!-- Script Timer -->
    <script type="text/javascript">
        $(document).ready(function() {
            /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik = 0,
                * var menit = 1,
                * var jam = 1
            */
            var detik = 0;
            var menit = <?php echo $menit; ?>;
            var jam     = <?php echo $jam; ?>;
            var hari    = 2;
                  
            /**
               * Membuat function hitung() sebagai Penghitungan Waktu
            */
            function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                     * mengulang atau merefresh halaman selama 1000 (1 detik) 
                */
                setTimeout(hitung,1000);
  
                /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
                if(menit < 10 && jam == 0){
                    var peringatan = 'style="color:red"';
                };
  
                /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                $('#timer').html(
                    '<h1 align="center"'+peringatan+'>Sisa waktu anda <br />' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h1><hr>'
                );
  
                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;
  
                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    menit --;
  
                   /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                        menit = 59;
                        jam --;
  
                        /** Jika var jam < 0
                            * clearInterval() Memberhentikan Interval dan submit secara otomatis
                        */
                             
                        if(jam < 0) { 
                            clearInterval(); 
                            /** Variable yang digunakan untuk submit secara otomatis di Form */
                            var frmSoal = document.getElementById("form_soal"); 
                            alert('Waktu Anda telah habis, Terima kasih sudah berkunjung.');
                            frmSoal.submit(); 
                        } 
                    } 
                } 
            }           
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();
      }); 
      // ]]>
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