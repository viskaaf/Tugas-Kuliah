<?php
$this->load->view('head_home');
?>
    <!-- Full Width Column -->
    <div class="content-wrapper"> 
      <div class="container">

        <!-- Main content -->
        <section class="content" style="margin-top: 30px;"> 
          <div class="row">
            <div class="box box-solid" style="border-radius: 10px; height: 400px;">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 400px;">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                </ol>

                <div class="carousel-inner" style="border-radius: 10px;">
                  <div class="item active">
                    <img src="<?php echo base_url('gambar/header2.png')?>" style="height: 400px; width: 1200px;" alt="First slide">
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url('gambar/header1.jpg')?>" style="height: 400px; width: 1200px;" alt="Second slide">
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box --> 

            <div class="box box-solid" style="margin-top: 30px; border-radius: 10px; background:rgba(255,255,255,0.7); padding-bottom: 30px;">
              <div class="text-center box-header with-border">
                <h2 class="section-heading text-uppercase">Cari Materi</h2>
              </div>
              <center>
              <form action="<?php echo site_url('HomeC/cariMateri');?>" method="get">
                <div class="box-tools" style="margin-top: 20px; width: 750px;"> 
                  <div class="input-group input-group-sm">
                      <input type="text" name="cari" class="form-control pull-right" style="height: 50px; font-size: 20px;" placeholder="Masukkan materi yang ingin dicari..." required> 

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default" style="height: 50px; width: 50px;"><i class="fa fa-search"></i></button>
                      </div> 
                  </div>
                </div>
              </form>
              </center>
            </div>

            <div class="box box-solid" style="margin-top: 30px; border-radius: 10px; background:rgba(255,255,255,0.7); padding-bottom: 30px;"> 
              <div class="row">
                <div class="col-lg-12 text-center box-header with-border">
                  <h2 class="section-heading text-uppercase">Kelebihan</h2>
                </div> 
              </div> 
              <div class="row text-center">
                <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-clock-o fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">24/7</h4>
                  <p class="text-muted">Dapat membuat dan mengerjakan tugas kapan pun dan dimana pun</p>
                </div>
                <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                    <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Materi</h4>
                  <p class="text-muted">Materi mudah didapatkan sesuai bidangnya masing-masing</p>
                </div>
                <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-success"></i>
                    <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Penilaian</h4>
                  <p class="text-muted">Dapat memberikan dan melihat nilai secara langsung</p>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
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

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js')?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('AdminLTE/dist/js/demo.js')?>"></script>
</body>
</html>
