<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>{{config('app.name')}} | Admi Login</title>
  <link href="{{asset(App\Model\SiteSetting::latest()->value('favicon'))}}" rel="icon">
  <link href="{{asset(App\Model\SiteSetting::latest()->value('favicon'))}}" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/forms/icheck/icheck.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/forms/icheck/custom.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/app.css')}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/pages/login-register.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/style.css')}}">

  <link rel="stylesheet" href="{{asset('admin-assets/app-assets/css/animate-css/animate.min.css')}}">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="1-column">

  <div class="app-content content login-main">
    <div class="content-wrapper login-div">
      <div class="content-header row">
      </div>
      <div class="content-body">


         <div class="col-md-3 col-8 m-auto p-0">
                     @if (isset($errors)&&count($errors) > 0)
                            <div class="alert alert-dismissable alert-danger">
                                 <ul class=" list-unstyled clearfix d-flex" style="margin: 0">
                                @foreach ($errors->all() as $error)
                                   <li><strong>{!! $error !!}</strong></li>
                                @endforeach
                            </ul>
                            </div>
                        @endif
                   
                </div>


        <section class="col-md-3 col-8 m-auto box-shadow-2 @if (isset($errors)&&count($errors) > 0) animated shake @endif">


          <div class="card border-grey border-lighten-3 px-2 py-2 row mb-0">

           
                
            <div class="card-header border-0" style="padding: 0">
              <div class="card-title text-center">
                <img style="max-height: 85px;" src="{{asset(\App\Model\SiteSetting::latest()->value('logo'))}}" alt="{{App\Model\SiteSetting::latest()->value('site_title')}}">
              </div>
              <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                <span>Login with Admin</span>
              </h6>
            </div>
            <div class="card-content">
              <div class="card-body">

                



                <form class="form-horizontal" method="post" action="{{ route('admin.login.post') }}" novalidate autocomplete="off">
                  {{csrf_field()}}
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
                    <div class="col-md-6 col-12 text-center text-md-right"><a href="{{ route('admin.password.request') }}" class="card-link">Forgot Password?</a></div>
                  </div>
                  <button type="submit" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> Login</button>
                </form>
              </div>
            </div>
            {{-- <div class="card-footer border-0">
              <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                <span>New to Stack ?</span>
              </p>
              <a href="register-advanced.html" class="btn btn-primary btn-block btn-lg mt-3"><i class="ft-user"></i> Register</a>
            </div> --}}
          </div>
        </section>
      </div>
    </div>
  </div>

  <script src="{{asset('admin-assets/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('admin-assets/app-assets/vendors/js/forms/va')}}lidation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{asset('admin-assets/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset('admin-assets/app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>