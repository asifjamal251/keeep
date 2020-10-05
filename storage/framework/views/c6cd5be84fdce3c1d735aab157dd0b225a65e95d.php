<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
  <meta charset="utf-8">
  <title>Sanix | Home</title>
   <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo e(\App\Model\SiteSetting::latest()->value('favicon')); ?>" rel="icon">
  <link href="<?php echo e(\App\Model\SiteSetting::latest()->value('favicon')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/web/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/web/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/web/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/web/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/web/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/web/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/web/css/style.css" rel="stylesheet">
  <link href="/css/app.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

    <body>
        
       <div id="app"></div>

 <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="/web/lib/jquery/jquery.min.js"></script>
  <script src="/web/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/web/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/web/lib/easing/easing.min.js"></script>
  <script src="/web/lib/superfish/hoverIntent.js"></script>
  <script src="/web/lib/superfish/superfish.min.js"></script>
  <script src="/web/lib/wow/wow.min.js"></script>
  <script src="/web/lib/waypoints/waypoints.min.js"></script>
  <script src="/web/lib/counterup/counterup.min.js"></script>
  <script src="/web/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/web/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="/web/lib/lightbox/js/lightbox.min.js"></script>
  <script src="/web/lib/touchSwipe/jquery.touchSwipe.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="/web/js/main.js"></script>

     <script type="text/javascript" src="/js/app.js"></script>

     
    

    </body>
</html>
<?php /**PATH D:\sanix\ios\resources\views/master.blade.php ENDPATH**/ ?>