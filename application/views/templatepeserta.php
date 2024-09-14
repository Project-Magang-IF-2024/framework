<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Skripsi IoT ITATS">
    <meta name="keywords" content="Skripsi">
    <meta name="author" content="pixelstrap">
   <link rel="icon" href="<?php echo base_url() ?>gambar/unusida.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url() ?>gambar/unusida.png" type="image/x-icon">
    <title>SIBEA - UNUSIDA</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url() ?>assets/css/color-1.css" media="screen">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/datatables.css">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/responsive.css">
    <script>
        // Add the following into your HEAD section
var timer = 0;
function set_interval() {
  // the interval 'timer' is set as soon as the page loads
  timer = setInterval("auto_logout()", 600000);
  // the figure '10000' above indicates how many milliseconds the timer be set to.
  // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
  // So set it to 300000
}

function reset_interval() {
  //resets the timer. The timer is reset on each of the below events:
  // 1. mousemove   2. mouseclick   3. key press 4. scroliing
  //first step: clear the existing timer

  if (timer != 0) {
    clearInterval(timer);
    timer = 0;
    // second step: implement the timer again
    timer = setInterval("auto_logout()", 600000);
    // completed the reset of the timer
  }
}

function auto_logout() {
  // this function will redirect the user to the logout script
  window.location = "<?php echo base_url() ?>auth/logout";
}
    </script>
  </head>
  <body onload="set_interval()">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          
          <div class="header-logo-wrapper">
            <div class="logo-wrapper"><a href="<?php echo base_url() ?>dashboard"><img class="img-fluid" src="<?php echo base_url() ?>gambar/logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="sliders"></i></div>
          </div>
          
          <div class="nav-right col-12 pull-right right-header p-0">
            <ul class="nav-menus">
              
             
                <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
              
              <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="profile-nav onhover-dropdown p-0 mr-0">
                <div class="media profile-media"><img class="b-r-10" src="<?php echo base_url() ?>gambar/logoajakecil.png" alt="">
                  <div class="media-body"><span><?php echo ucwords($this->session->userdata('nama'), ' ') ?></span>
                    <p class="mb-0 font-roboto"><?php echo ucwords($this->session->userdata('login_status'), ' ') ?></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  
                </ul>
              </li>
            </ul>
          </div>
          
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div class="logo-wrapper"><a href="<?php echo base_url() ?>dashboard"><img class="img-fluid for-light" src="<?php echo base_url() ?>gambar/logofix.png" width="80%" alt=""><img class="img-fluid for-dark" src="<?php echo base_url() ?>gambar/logofix.png" width="80%" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="<?php echo base_url() ?>dashboard"><img class="img-fluid" src="<?php echo base_url() ?>gambar/logoajakecil.png" alt=""></a></div>
          <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
              <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn"><a href="<?php echo base_url() ?>dashboard"><img class="img-fluid" src="<?php echo base_url() ?>gambar/logoajakecil.png" alt=""></a>
                  <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                </li>
                <!--<li class="sidebar-main-title">
                  <div>
                    <h6 class="lan-18">Menu Umum</h6>
                    <p class="lan-19">Dashboards.</p>
                  </div>
                </li> !-->
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="<?php echo base_url() ?>dashboard"><i data-feather="home"></i><span class="lan-3">Dashboard</span></a>
                </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="<?php echo base_url() ?>auth/logout"><i data-feather="log-out"></i><span class="lan-10">Logout</span></a>
                </li>
              </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
          </nav>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body" onmousemove="reset_interval()">
          

<?php
echo $contents;
?>
</div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2022 © IT-TRUST
  </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo base_url() ?>assets/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?php echo base_url() ?>assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo base_url() ?>assets/js/sidebar-menu.js"></script>
    <script src="<?php echo base_url() ?>assets/js/chart/chartist/chartist.js"></script>
    <script src="<?php echo base_url() ?>assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="<?php echo base_url() ?>assets/js/chart/knob/knob.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/chart/knob/knob-chart.js"></script>
    <script src="<?php echo base_url() ?>assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?php echo base_url() ?>assets/js/chart/apex-chart/stock-prices.js"></script>
	<script src="<?php echo base_url() ?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="<?php echo base_url() ?>assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?php echo base_url() ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="<?php echo base_url() ?>assets/js/typeahead/handlebars.js"></script>
    <script src="<?php echo base_url() ?>assets/js/typeahead/typeahead.bundle.js"></script>
    <script src="<?php echo base_url() ?>assets/js/typeahead/typeahead.custom.js"></script>
    <script src="<?php echo base_url() ?>assets/js/typeahead-search/handlebars.js"></script>
    <script src="<?php echo base_url() ?>assets/js/typeahead-search/typeahead-custom.js"></script>
    <script src="<?php echo base_url() ?>assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo base_url() ?>assets/js/script.js"></script>
    
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>