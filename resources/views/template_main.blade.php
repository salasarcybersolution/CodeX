<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="{{url('public')}}/" data-template="vertical-menu-template">
 @include('includes.head') 
<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">   
   <!-- / Navbar -->
      @php
        if(session('user_type_id') == 1){
      @endphp     
          @include('includes.main-menu')
      @php
        }elseif(session('user_type_id') == 3){
      @endphp    
          @include('includes.surveyor-main-menu')
      @php  
        }elseif(session('user_type_id') == 4){ 
      @endphp
          @include('includes.surveyor-exec-menu')
      @php  
        }elseif(session('user_type_id') == 5){ 
      @endphp    
          @include('includes.insurer-user-menu')
      @php }  @endphp


    <!-- Layout container -->
    <div class="layout-page">
      <!-- Content wrapper -->
      @include('includes.header')    
        <!-- Main Content -->
        @yield('content')
        @include('includes.footer') 
       <div class="content-backdrop fade"></div>
        <!--/ Content wrapper -->
      </div>
      <!--/ Layout container -->
    </div>
  </div>
  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>
  <!--/ Layout wrapper -->
  @include('includes.script') 
</body>
</html>
