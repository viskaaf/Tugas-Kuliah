<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tugas Kuliah</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
<!--

Template 2075 Digital Team

http://www.tooplate.com/view/2075-digital-team

-->
	<link rel="stylesheet" href="<?php echo base_url('assets1/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets1/css/font-awesome.min.css');?>">

	<link rel="stylesheet" href="<?php echo base_url('assets1/css/et-line-font.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets1/css/nivo-lightbox.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets1/css/nivo_themes/default/default.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets1/css/style.css');?>">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- preloader section -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-circle">
       <div class="sk-circle1 sk-circle"></div>
       <div class="sk-circle2 sk-circle"></div>
       <div class="sk-circle3 sk-circle"></div>
       <div class="sk-circle4 sk-circle"></div>
       <div class="sk-circle5 sk-circle"></div>
       <div class="sk-circle6 sk-circle"></div>
       <div class="sk-circle7 sk-circle"></div>
       <div class="sk-circle8 sk-circle"></div>
       <div class="sk-circle9 sk-circle"></div>
       <div class="sk-circle10 sk-circle"></div>
       <div class="sk-circle11 sk-circle"></div>
       <div class="sk-circle12 sk-circle"></div>
    </div>
</div>

<!-- navigation section -->
<section class="navbar top-nav-collapse custom-navbar">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="<?php echo base_url('HomeC')?>" class="navbar-brand">Tugas Kuliah</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php if($this->session->userdata("masuk") == TRUE){ ?>
					<li><a href="<?php echo base_url('DosenC/')?>" class="smoothScroll">Halo, <?php echo $nama;?></a></li>
					<li><a href="<?php echo base_url('LoginC/logout')?>" title="Logout dari Tugas Kuliah" onclick="return confirm('Apakah anda yakin ingin keluar dari sistem ini?')" class="smoothScroll"><span><i class="fa fa-sign-out"></i></span></a></li>
				<?php }else{ ?>
					<li><a href="<?php echo base_url('LoginC')?>" class="smoothScroll">MASUK</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</section>

<!-- work section -->
<section id="work">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-title">
					<!-- <strong>KEUNTUNGAN</strong> -->
					<h1 class="heading bold">HASIL PENCARIAN</h1>
					<hr>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
				<?php
		         if($querymenu->num_rows() > 0){
		           foreach($querymenu->result() as $row){?>
		        <?php if($this->session->userdata("masuk") == TRUE){ ?>
		        <a target="_blank" href="<?php echo base_url()."file_upload/".$row->path_file; ?>" style="font-size: 20px;">
					<div class="col-lg-12 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">					
						<h3><?php echo $row->nama_materi;?></h3>
						<p>Viska Ayu F</p>
					</div>
				</a>
				<?php }else{ ?>
				 <a data-toggle="modal" data-target="#modal" style="font-size: 20px;">
					<div class="col-lg-12 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">					
						<h3><?php echo $row->nama_materi;?></h3>
						<p>Viska Ayu F</p>
					</div>
				</a>
				<?php } ?>

				<?php }}else{?>
					<div class="col-lg-12 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<!-- <div class="pull-left"> -->
					<h3 style="color: grey;">Ops! Materi yang Anda cari tidak tersedia.</h3>
					<!-- </div> -->
				</div>
				<?php } ?>
				<br>

   
			</div>
		</div>

		              <!-- modal untuk tambah manual -->
              <div class="modal fade" id="modal"> 
                <div class="modal-dialog"> 
                  <div class="modal-content">
                    <div class="login-box">
                      <center>
                        <div class="box box-primary" style="border-top-color: #fff; padding-left: 50px; padding-right: 50px;">
                          <h3><b>Silahkan login terlebih dahulu.</b></h3>
                          <p class="login-box-msg" style="padding-bottom: 10px;">Klik tombol dibawah ini untuk login.</p><br>

                          <div class="row">
                            <a href="<?php echo base_url().'LoginC' ?>" class="btn btn-primary center" style="margin-right: 15px; margin-bottom: 20px;">Login</a>
                          </div>


                        </div>
                        <!-- /.box-primary -->
                      </center>
                    </div>
                    <!-- /.login-box -->
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
	</div>

</section>

<!-- footer section -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>Copyright © 2018 Tugas Kuliah</p>
				<hr>
			</div>
		</div>
	</div>
</footer>


<script src="<?php echo base_url('assets1/js/jquery.js');?>"></script>
<script src="<?php echo base_url('assets1/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets1/js/smoothscroll.js');?>"></script>
<script src="<?php echo base_url('assets1/js/isotope.js');?>"></script>
<script src="<?php echo base_url('assets1/js/imagesloaded.min.js');?>"></script>
<script src="<?php echo base_url('assets1/js/nivo-lightbox.min.js');?>"></script>
<script src="<?php echo base_url('assets1/js/jquery.backstretch.min.js');?>"></script>
<script src="<?php echo base_url('assets1/js/wow.min.js');?>"></script>
<script src="<?php echo base_url('assets1/js/custom.js');?>"></script>

</body>
</html>