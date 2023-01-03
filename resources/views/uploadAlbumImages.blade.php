<!DOCTYPE html>
 
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{url('public')}}/" data-template="horizontal-menu-template">
 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="_token" content="{{csrf_token()}}" />
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
 <style type="text/css">
    .tui-image-editor-header-logo{

        display: none !important;
    }
    .tui-image-editor-help-menu{
        display: none !important;
    }
    .albumPage_buttons {
      margin-top: 20px;
    }
    .albumPage_saveImageGrid {
    margin-top: 20px;
    padding-top: 6px;
    }
    .albumPage_uploadImage,
    .albumPage_saveImage {
      padding: 3px;
      position: relative; 
      cursor: pointer;
    }   

    .albumPage_saveImageGrid img,
    .albumPage_uploadImage img{
      width: 100%;
      min-height: 115px;
      object-fit: cover;
      height: 100%;
    }
    .albumPage_removeImage {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #f00 !important;
        font-weight: 600;
        opacity: 0;
        transition: all 0.3s ease;
    }
    .albumPage_saveImage:hover img,
    .albumPage_uploadImage:hover img {
        filter: blur(5px);
    }
    .albumPage_saveImage:hover .albumPage_removeImage,
    .albumPage_uploadImage:hover .albumPage_removeImage{
      opacity: 1;
    }
    .dropzone .dz-preview .dz-image {
      width: 100%;
      height: 100%;
    }
    .dropzone .dz-preview .dz-remove {
      position: absolute;
      top: 50%;
      z-index: 21;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #f00 !important;
      opacity: 0;
      background-color: #0000 !important;
      font-weight: 600;
    }
    .dropzone .dz-preview:hover .dz-remove {
      opacity: 1;
    }
    .dropzone .dz-preview .dz-progress .dz-upload {
       background: linear-gradient(to bottom, #9dd35a, #6f9342);
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
         <div class="row flasMsg"  style="display: none;">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Image successfully uploaded
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              </div>
          </div> 
         
 
        <div class="divider my-4">
          <div class="divider-text">or</div>
        </div>

        <div class="d-flex justify-content-center">
          <button type="button" style="margin:auto;" class="btn btn-primary col-6" data-bs-toggle="modal" data-bs-target="#addImages" > Upload Images </button>

          
        </div>
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>

<!-- / Content -->
<div class="modal fade" id="addImages" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>Upload Images</h3>
          <!-- <p>Updating user details will receive a privacy audit.</p> -->
        </div>
        
        <div class="col-12 col-md-12">
          <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" class="dropzone needsclick" id="dropzone">
              <div class="dz-message needsclick">
                  Click to upload
              </div>
              <input type="hidden" id="report_id" name="report_id" value="{{$urlData->report_id}}">
              @csrf
          </form>

          <!-- <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" class="needsclick">
              <input id="myFileInput" type="file" accept="image/*" capture="camera">
              <input type="hidden" id="report_id" name="report_id" value="{{$urlData->report_id}}">
              @csrf
          </form> -->

        </div>
        <div class="col-12 text-center" style="margin-top: 20px;">
            <a href="#" id="sub_url"><button type="submit" onclick="showMessage();" class="btn btn-primary me-sm-3 me-1">Submit</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
 
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
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
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/dropzone/dropzone.css')}}" />
<script src="{{asset('public/assets/vendor/libs/dropzone/dropzone-2.js')}}" ></script>

      <script type="text/javascript">
        function showMessage(){
          $('#addImages').modal('toggle');
          $('.flasMsg').show();


        }
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            createImageThumbnails: true,
            clickable: true,
            timeout: 5000,
            addRemoveLinks: true,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                var report_id = jQuery('#report_id').val();   
               
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("image/delete") }}',
                    data: {report_id: report_id,filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>
</body>
 
</html>
