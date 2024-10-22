<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SIM MBKM UNUSIDA adalah Sistem yang membantu untuk manajemen kegiatan MBKM pada Universitas NU SIDOARJO.">
    <meta name="keywords" content="UNUSIDA, unusida, Kampus Merdeka, sim, Manajemen MBKM">
    <link rel="icon" href="<?php echo base_url() ?>gambar/unusida.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url() ?>gambar/unusida.png" type="image/x-icon">
    <title>SIBEA - UNUSIDA</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url() ?>/assetslogin/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assetslogin/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assetslogin/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assetslogin/css/style.css">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    
  </head>
  <body>
  
	<style>
	[data-slides] {
    background-image: url(<?php echo base_url() ?>gambar/gambar.jpg); /* Default image. */
    background-repeat: no-repeat;
    background-position: center top;
    background-size: cover;
    transition: background 1s linear;
}
	</style>
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" data-slides='[
        "<?php echo base_url() ?>gambar/gambar.jpg",
		"<?php echo base_url() ?>gambar/gambar2.jpg",
		"<?php echo base_url() ?>gambar/gambar3.jpg",
		"<?php echo base_url() ?>gambar/gambar4.jpg",
		"<?php echo base_url() ?>gambar/gambar5.jpg"
    ]'>
	<div style="margin-top:30px; margin-left:30px;">
	<img src="<?php echo base_url() ?>gambar/kemdikbud.png" width="10%"></img>
	<img src="<?php echo base_url() ?>gambar/unusida.png" width="9%"></img>
	<img src="<?php echo base_url() ?>gambar/kampusmerdeka.png" width="15%"></img>
	</div>
	</div>
	<script>
	(function($) {

    'use strict';

    var $slides = $('[data-slides]');
    var images = $slides.data('slides');
    var count = images.length;
    var slideshow = function() {
        $slides
            .css('background-image', 'url("' + images[Math.floor(Math.random() * count)] + '")')
            .show(0, function() {
                setTimeout(slideshow, 3000);
            });
    };

    slideshow();

}(jQuery));
	</script>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <img src="<?php echo base_url() ?>gambar/logofix.png" width="100%"></img>
            <p class="mb-4" style="text-align:center; margin-top:15px;">Silahkan masukkan NIM/NIK/NID dan password untuk masuk pada SIINKA UNUSIDA.</p>
            <h3 style="color:red;"><?php echo $this->session->flashdata('error') ?></h3>
            <form action="<?php echo $action ?>" method="post">
              <div class="form-group first">
                <label for="username">NIM/NIK/NID</label>
                <input type="text" class="form-control" name="text" placeholder="Masukkan NIK" id="username" value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password" id="password" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" name="remember" <?php if(isset($_COOKIE["loginId"])) { ?> checked="checked" <?php } ?>/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="<?php echo base_url() ?>auth/forgot" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Login" class="btn btn-block btn-success">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="<?php echo base_url() ?>/assetslogin/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>/assetslogin/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assetslogin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assetslogin/js/main.js"></script>
  </body>
</html>