<!DOCTYPE html>
 
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{url('public')}}/" data-template="horizontal-menu-template">
 
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
    <link rel="stylesheet" href="{{asset('public/assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendor/libs/select2/select2.css')}}" />
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

 <style>
   .custom_css{
    float: right;
    padding-top: 5px;
   }
 </style>
</head>

<body>

  <!-- Content -->

<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
   <!--  <div class="d-none d-lg-flex col-lg-3 align-items-center justify-content-end p-5 pe-0">
      <div class="w-px-400">
        <img src="{{asset('public/assets/img/illustrations/create-account-light.png')}}" class="img-fluid" alt="Login image" width="600" >
      </div>
    </div> -->
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-lg-12 align-items-center authentication-bg p-sm-5 p-3">
      <div class="w-100">
        <!-- Logo -->
        <div class="mb-5" style="text-align: center;">
          <a href="{{url('/')}}" class="gap-2">
           <img src="{{asset('public/assets/img/logo2.png')}}"  style="width: 300px;">
          </a>
        </div>
         
        @if(Session::has('msg'))
            <p class="error" style="text-align: center;color: red;">{{ Session::get('msg') }}</p>
        @endif

         <div class="list-group list-group-horizontal-md text-md-center">
            <a class="list-group-item list-group-item-action active" id="list_tab_1">Basic Info <i class="fa fa-arrow-circle-right custom_css" aria-hidden="true"></i></a>
            <a class="list-group-item list-group-item-action" id="list_tab_2">Company Info <i class="fa fa-arrow-circle-right custom_css" aria-hidden="true"></i></a>
            <a class="list-group-item list-group-item-action" id="list_tab_3">Subscription <i class="fa fa-arrow-circle-right custom_css" aria-hidden="true"></i></a>
          </div>
        <form id="registrationForm" class="mb-3" action="{{url('registrationProcess')}}" method="POST">
            <div class="row mt-4" id="list_tab_content_1">
                <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-12 col-lg-6">
                              <div class="mb-3">
                                <label for="first_name" class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" value="{{$name[0]}}">
                                <p class="error" id="err_first_name"></p>
                              </div>
                          </div>
                          <div class="col-md-12 col-lg-6">
                              <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" value="">
                                <p class="error" id="err_last_name"></p>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 col-lg-6">
                              <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{$email}}" disabled>
                                <p class="error" id="err_email"></p>
                              </div>
                          </div>

                          <div class="col-md-12 col-lg-6">
                              <div class="mb-3">
                                <label for="address" class="form-label">User Name(for Login)</label>
                                <input type="text" class="form-control" id="user_name" placeholder="Enter User Name" name="user_name">
                                <p class="error" id="err_user_name"></p>
                              </div>
                          </div>
                          
                          
                      </div>
                      <div class="row">
                          <div class="col-md-12 col-lg-6">
                              <div class="mb-3">
                                <label for="email" class="form-label">City:</label>
                                <select id="city_id" class="select2 form-select" name="city_id">
                                    <option value="">Select</option>
                                    <?php foreach ($cities as $value) { ?>
                                    <option value="{{$value->id}}">{{$value->city}}</option>
                                    <?php } ?>
                                </select>
                                <p class="error" id="err_city_id"></p>
                              </div>
                          </div>
                          <div class="col-md-12 col-lg-6">
                              <div class="mb-3">
                                <label for="phone_no" class="form-label">Contact No:</label>
                                <input type="text" class="form-control" id="phone_no" placeholder="Enter Contact No" name="phone_no">
                                <p class="error" id="err_phone_no"></p>
                              </div>
                          </div>
                      </div>

                      <!-- Buttons -->
                      <div class="row mt-5">
                          <div class="col-md-12 col-lg-6"> 
                              <button class="btn btn-label-secondary btn-prev" disabled=""> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span>  </button>
                          </div>
                          <div class="col-md-12 col-lg-6" style="text-align: right;"> 
                              <button type="button" class="btn btn-primary btn-next" onclick="saveSurveyBasicInfo()"> 
                                <!-- onclick="" -->
                                  <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                              </button>
                          </div>
                      </div>
                </div>
            </div>

            <div class="row mt-4" id="list_tab_content_2" style="display: none;">
                <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-12 col-lg-6">
                              <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name:</label>
                                <input type="text" class="form-control" id="company_name" placeholder="Enter Company Name" name="company_name">
                                <p class="error" id="err_company_name"></p>
                              </div>
                          </div>
                          <div class="col-md-12 col-lg-6">
                              <div class="mb-3">
                                <label for="last_name" class="form-label">GST No:</label>
                                <input type="text" class="form-control" id="company_gst_no" placeholder="Enter Company GST No" name="company_gst_no">
                                <p class="error" id="err_company_gst_no"></p>
                              </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 col-lg-12">
                              <div class="mb-3">
                                <label for="company_name" class="form-label">Company Address:</label>
                                <textarea class="form-control" id="company_address" name="company_address" placeholder="Enter Company Address" ></textarea>
                                <p class="error" id="err_company_address"></p>
                              </div>
                          </div>
                           
                        </div>

                        <div class="row mt-5">
                          <div class="col-md-12 col-lg-6"> 
                              <button type="button" class="btn btn-primary btn-prev" onclick="registrationProcessBack('2')"> 
                                <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
                              </button>
                          </div>
                          <div class="col-md-12 col-lg-6" style="text-align: right;"> 
                              <button type="button" class="btn btn-primary btn-next"  onclick="saveSurveyCompanyInfo()"> 
                                  <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                              </button>
                          </div>
                      </div>
                </div>
            </div>

            <div class="row mt-4" id="list_tab_content_3" style="display: none;">
                <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row gap-md-0 gap-3 mb-4">
                                    <div class="row mx-0 gy-3">
                                       <?php foreach ($subscription_list as $value) { ?>
                                   <div class="col-lg mb-md-0 mb-4">
                                      <div class="card mb-4">
                                        <div class="card-body">
                                          <div class="d-flex justify-content-between align-items-start">
                                            <span class="badge bg-label-primary">{{$value->subscription_titles}}</span>
                                            <div class="d-flex justify-content-center">
                                              <sup class="h5 pricing-currency mt-3 mb-0 me-1 text-primary">₹</sup>
                                              <h1 class="display-5 mb-0 text-primary"> {{$value->subscription_price}}</h1>
                                              <!-- <sub class="fs-6 pricing-duration mt-auto mb-3">/month</sub> -->
                                            </div>
                                          </div>
                                          <ul class="ps-3 g-2 my-4">
                                            <li class="mb-2">{{$value->users_allowed}} Users</li>
                                            <li class="mb-2">Up to {{$value->survey_allowed_count}} reports</li>
                                            <li class="mb-2">Validity Days: {{$value->sub_validity_days}} Validity Days</li>
                                            <!-- <li class="mb-2">Description: {{$value->subscription_description}}</li> -->
                                            <li class="mb-2">Privileges: {{ getSubscriptionPlanPriviliges($value->subs_privileges)}}</li>
                                          </ul>
                                          
                                          <div class="progress mb-1" style="height: 8px;">
                                            <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                          <span>Selected By 70%</span>
                                          <div class="d-grid w-100 mt-4 pt-2">
                                              <input class="form-check-input" type="radio" name="plan_select" id="plan_select_{{$value->subscription_id}}" value="{{$value->subscription_id}}" />
                                              <label class="form-check-label" for="inlineRadio1">{{$value->subscription_titles}}</label>
                                          </div>
                                        </div>
                                              <p class="error" id="err_plan_select"></p>
                                      </div>
                                    </div>
                                      
                                      <?php  } ?>  
                                  </div>
                                 </div>
                            </div>
                        </div>
                                          <input type="hidden" class="form-control" id="subscription_new_id" value="" name="subscription_new_id">
                        
                        <div class="row mt-5">
                          <div class="col-md-12 col-lg-6"> 
                              <button type="button" class="btn btn-primary btn-prev" onclick="registrationProcessBack('3')" id="previous_3"> 
                                <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
                              </button>
                          </div>
                          <div class="col-md-12 col-lg-6" style="text-align: right;" > 
                              <button type="button" class="btn btn-primary btn-next" onclick="paymentProcess()" id="next_3"> 
                                  <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                              </button>

                              <button type="button" class="btn btn-primary" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
                             <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
                          </div>
                      </div>
                </div>
            </div> 
            <input type="hidden" name="generator_token" id="generator_token" value="{{$generator_token}}">
            <input type="hidden" name="g_email" id="g_email" value="{{$email}}">
            <input type="hidden" name="generated_url_id" id="generated_url_id" value="{{$generated_url_id}}">
        </form>
 
       
      </div>
    </div>
    
  </div>
</div>



 


  <script src="{{asset('public/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('public/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('public/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  
  <script src="{{asset('public/assets/vendor/libs/hammer/hammer.js')}}"></script>
  <script src="{{asset('public/assets/vendor/libs/i18n/i18n.js')}}"></script>
  <script src="{{asset('public/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>

  <script src="{{asset('public/assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
  
  <script src="{{asset('public/assets/vendor/js/menu.js')}}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
<!--   <script src="{{asset('public/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script> -->
  <script src="{{asset('public/assets/vendor/libs/select2/select2.js')}}"></script>
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
