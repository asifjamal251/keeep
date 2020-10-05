<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Login Page - Stack Responsive Bootstrap 4 Admin Template</title>
  <link rel="apple-touch-icon" href="<?php echo e(asset('admin-assets/app-assets/images/ico/apple-icon-120.png')); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('admin-assets/app-assets/images/ico/favicon.ico')); ?>">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/css/vendors.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/vendors/css/forms/icheck/icheck.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/vendors/css/forms/icheck/custom.css')); ?>">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/css/app.css')); ?>">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/css/core/menu/menu-types/vertical-menu.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/css/pages/login-register.css')); ?>">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/assets/css/style.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('admin-assets/app-assets/css/animate-css/animate.min.css')); ?>">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="Admin" src="<?php echo e(asset('admin-assets/app-assets/images/logo/stack-logo-light.png')); ?>">
              <h2 class="brand-text">Admin</h2>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container">
        <div class="collapse navbar-toggleable-sm justify-content-end" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="index.html"><i class="ficon ft-arrow-left"></i></a></li>
            <li class="dropdown nav-item">
              <a class="nav-link mr-2 nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-settings"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content login-main">
    <div class="content-wrapper login-div">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="col-md-4 col-8 m-auto box-shadow-2 p-0">
          <div class="card border-grey border-lighten-3 px-2 py-2 row mb-0">

            <div class="right-top">
                     <?php if(isset($errors)&&count($errors) > 0): ?>
                            <div class="animated shake alert alert-dismissable alert-danger">
                                 <ul class=" list-unstyled clearfix d-flex" style="margin: 0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <li><strong><?php echo $error; ?></strong></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            </div>
                        <?php endif; ?>
                   
                </div>
                
            <div class="card-header border-0">
              <div class="card-title text-center">
                <img src="<?php echo e(asset('admin-assets/app-assets/images/logo/stack-logo-dark.png')); ?>" alt="branding logo">
              </div>
              <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                <span>Login with Admin</span>
              </h6>
            </div>
            <div class="card-content">
              <div class="card-body">

                



                <form class="form-horizontal" method="post" action="<?php echo e(route('admin.login.post')); ?>" novalidate autocomplete="off">
                  <?php echo e(csrf_field()); ?>

                  <fieldset class="form-group position-relative has-icon-left">
                    <input autocomplete="false" type="text" class="form-control form-control-lg" id="user-name" placeholder="Your Username"
                    tabindex="1" required data-validation-required-message="Please enter your username." name="email">
                    <div class="form-control-position">
                      <i class="ft-user"></i>
                    </div>
                    <div class="form-text font-small-3"></div>
                  </fieldset>
                  <fieldset class="form-group position-relative has-icon-left">
                    <input autocomplete="false" type="password" class="form-control form-control-lg" id="password" placeholder="Enter Password"
                    tabindex="2" required data-validation-required-message="Please enter valid passwords." name="password">
                    <div class="form-control-position">
                      <i class="fa fa-key"></i>
                    </div>
                    <div class="form-text font-small-3"></div>
                  </fieldset>
                  <div class="form-group row">
                    <div class="col-md-6 col-12 text-center text-md-left">
                      <fieldset>
                        <input type="checkbox" id="remember-me" class="chk-remember">
                        <label for="remember-me"> Remember Me</label>
                      </fieldset>
                    </div>
                    <div class="col-md-6 col-12 text-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                  </div>
                  <button type="submit" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> Login</button>
                </form>
              </div>
            </div>
            
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer fixed-bottom footer-dark navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
        target="_blank">PIXINVENT </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo e(asset('admin-assets/app-assets/vendors/js/vendors.min.js')); ?>" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo e(asset('admin-assets/app-assets/vendors/js/forms/va')); ?>lidation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <script src="<?php echo e(asset('admin-assets/app-assets/vendors/js/forms/icheck/icheck.min.js')); ?>" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="<?php echo e(asset('admin-assets/app-assets/js/core/app-menu.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('admin-assets/app-assets/js/core/app.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('admin-assets/app-assets/js/scripts/customizer.js')); ?>" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo e(asset('admin-assets/app-assets/js/scripts/forms/form-login-register.js')); ?>" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html><?php /**PATH D:\laravel\react\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>