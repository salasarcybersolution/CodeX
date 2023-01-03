<!DOCTYPE html>
 
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="./public/" data-template="horizontal-menu-template">
 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo @$title? @$title : 'Codex Survey Solutions' ?></title>
     
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('public/assets/img/fivicon.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('public/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('public/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <!-- Vendor -->
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="{{asset('public/assets/vendor/css/pages/page-auth.css')}}">
    <!-- Helpers -->
    <script src="{{asset('public/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('public/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('public/assets/js/config.js')}}"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

  <input type="hidden" name="base_urls" id="base_urls" value="{{url('/')}}/">
 <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
</head>

<body>

  <!-- Content -->

<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
   <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
      <div class="w-100 d-flex justify-content-center">
        <img src="{{asset('public/assets/img/illustrations/boy-with-rocket-light.png')}}" class="img-fluid" alt="Login image" width="700" >
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
        <div class="app-brand mb-5">
          <img src="{{asset('public/assets/img/logo2.png')}}" style="width: 100%;">
        </div>

        <h4 class="mb-2">Forgot Password? 🔒 </h4>
        <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
          </a>
                            @if (count($errors) > 0)   
                            @foreach ($errors->all() as $error)
                            @endforeach
                            @endif
         
       
        <form id="adminLoginForm" class="mb-3" action="{{url('forgot-password-check')}}" method="POST" >
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus >
                      @error('email')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
          </div>
           
           <button class="btn btn-primary w-100" id="submiteAdminButtons">  Send Reset Link  </button>
           <button type="button" class="btn btn-primary w-100" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
           <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
        </form>

        <div class="text-center">
          <a href="{{url('/')}}" class="d-flex align-items-center justify-content-center">
            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
            Back to login
          </a>
        </div>

      </div>
    </div>
    <!-- /Login -->
  </div>
</div>

<!-- / Content -->

 
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{asset('public/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('public/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('public/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  
  <script src="{{asset('public/assets/vendor/libs/hammer/hammer.js')}}"></script>
  <script src="{{asset('public/assets/vendor/libs/i18n/i18n.js')}}"></script>
  <script src="{{asset('public/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
  
  <script src="{{asset('public/assets/vendor/js/menu.js')}}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{asset('public/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>

  <!-- Main JS -->
  <script src="{{asset('public/assets/js/main.js')}}"></script>

  <!-- Page JS -->
  <script src="{{asset('public/assets/js/pages-auth.js')}}"></script>
  <script src="{{asset('public/myCustomJs.js')}}"></script>
</body>
 
</html>
