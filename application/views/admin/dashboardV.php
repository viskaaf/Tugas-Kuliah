<?php
$this->load->view('head_admin');
?>

<script src="<?php echo base_url('AdminLTE/bower_components/chart.js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/chart.js/Chart.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/chartjs.js')?>"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) --> 
  <section class="content-header">
    <div class="box box-info col-xs-12" style="border-top-color: #fff">
      <!-- <section class="content-header"> -->
        <h1>
          Dashboard
        </h1>
        <!-- </section> -->
        <!-- <div style="margin-left: 15px; margin-right: 15px; margin-top: 10px;"> -->
          <ol class="breadcrumb">
            <li class="active"><a href="<?php echo base_url('AdminC/')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          </ol>
          <!-- </div> -->
        </div>
      </section>
    </section>

    <!-- Main Content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?php
                $q= $this->db->query("SELECT id_user FROM user_role ur, user u WHERE ur.id_userrole=u.id_userrole")->num_rows();
                echo $q;
                ?>
              </h3>

              <p>Data Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo site_url('AdminC/daftarDosen')?>" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php
                $q= $this->db->query("SELECT id_kelas FROM user u, dosen d, kelas k WHERE u.id_user=d.id_user AND d.id_dosen=k.id_dosen")->num_rows();
                echo $q;
                ?>
              </h3>

              <p>Data Kelas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo site_url('AdminC/daftarKelas')?>" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php
                $q= $this->db->query("SELECT id_tugas FROM user u, dosen d, kelas k, tugas t WHERE u.id_user=d.id_user AND d.id_dosen=k.id_dosen AND k.id_kelas=t.id_kelas")->num_rows();
                echo $q;
                ?> 
              </h3>

              <p>Tugas</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo site_url('AdminC/daftarTugas')?>"" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
                <?php
                $q= $this->db->query("SELECT id_materi FROM user u, dosen d, kelas k, materi m WHERE u.id_user=d.id_user AND d.id_dosen=k.id_dosen AND k.id_kelas=m.id_kelas")->num_rows();
                echo $q;
                ?> 
              </h3>

              <p>Materi</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="<?php echo site_url('AdminC/daftarMateri')?>" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
      <div class="row">
        <!-- Grafik Jumlah Pengguna Berdasarkan Jenis Pengguna -->
        <div class="col-md-6">
         <div class="box box-primary" style="border-top-color: #fff;">
          <div class="box-header with-border">
            <h3 class="box-title">Grafik Pengguna Berdasarkan Jenis Pengguna</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <canvas id="pengguna" width="150" height="100"></canvas>
          </div>
          <!-- /.box-body -->
        </div> 
      </div>
      <!-- Grafik Jumlah Pengguna Berdasarkan Jenis Pengguna -->
<!--       <div class="col-md-6">
       <div class="box box-primary" style="border-top-color: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Universitas</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <canvas id="univ" width="150" height="100"></canvas>
        </div>
      </div> 
    </div> -->
  </div>
</div>
</section>
</div>
<!-- /.content-wrapper -->
<script>
  // $(function () {
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

  <script>
    var ctx = document.getElementById("pengguna");
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Dosen", "Mahasiswa"],
        datasets: [{
          label: 'Jumlah layanan',
          data: [<?php echo $dosen; ?>, <?php echo $mahasiswa; ?>],
          backgroundColor: [
          'rgba(255, 206, 86, 1)', 
          'rgba(75, 192, 192, 1)'
          ],
          borderColor: [
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>

  <script>
    var ctx = document.getElementById("univ");
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: [explode(",",$univ)],
        datasets: [{
          label: 'Jumlah layanan',
          data: [<?php echo $b; ?>],
          backgroundColor: [
          'rgba(255, 206, 86, 1)', 
          'rgba(75, 192, 192, 1)'
          ],
          borderColor: [
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
</body>
<footer class="main-footer">
  <strong><center>Copyright &copy; Tugas Kuliah.com</center></strong>
</footer>
</html>