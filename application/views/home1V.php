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
	<link rel="stylesheet" href="<?php echo base_url('assets1/css/animate.min.css');?>">
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
<section class="navbar top-nav-collapse navbar-fixed-top custom-navbar" role="navigation">
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
 
<!-- section cari materi -->
<section id="home">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Cari Materi</h1>
				<hr>
			</div>
				<!-- form cari materi -->
				<form action="<?php echo site_url('HomeC/cariMateri');?>" method="get" class="wow fadeInUp" data-wow-delay="0.6s">
					<center>
						<div style="width: 600px">
						<input type="text" name="cari" class="form-control" style="height: 50px" placeholder="Masukkan materi yang ingin dicari" required>
						<button type="submit" class="btn btn-danger">Cari</button>
						</div>
					</center>
				</form>
				<!-- /form cari materi -->
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
					<h1 class="heading bold">KEUNTUNGAN</h1>
					<hr>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<i class="icon-laptop medium-icon"></i>
					<h3>PRAKTIS &amp; MUDAH</h3>
					<hr>
					<p>Dapat diakses dimana saja dan kapan saja serta sangat mudah digunakan oleh semua orang.</p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
				<i class="icon-mobile medium-icon"></i>
					<h3>MATERI</h3>
					<hr>
					<p>Tersedia banyak materi pembelajaran yang mudah didapatkan.</p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="1s">
				<i class="icon-laptop medium-icon"></i>
					<h3>KELAS</h3>
					<hr>
					<p>Terdapat berbagai macam kelas yang dapat diikuti sesuai bidangnya masing-masing.</p>
			</div>
		</div>
	</div>
</section>


<!-- contact section -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-center">
				<div class="section-title">
					<!-- <strong>06</strong> -->
					<h1 class="heading bold">KONTAK KAMI</h1>
					<hr>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 contact-info">
				<h2 class="heading bold">INFO KONTAK</h2>
				<p>Untuk pertanyaan, kritik dan saran, serta pengaduan permasalahan dapat hubungi kontak kami disamping ini.</p>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="col-md-6 col-sm-4">
					<h3><i class="icon-envelope medium-icon wow bounceIn" data-wow-delay="0.6s"></i> EMAIL</h3>
					<p>tugaskuliah473@gmail.com</p>
				</div>
				<div class="col-md-6 col-sm-4">
					<h3><i class="icon-phone medium-icon wow bounceIn" data-wow-delay="0.6s"></i> TELP.</h3>
					<p>010-020-0340 | 090-080-0760</p>
				</div>
			</div>
		</div>
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