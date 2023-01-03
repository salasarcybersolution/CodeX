@extends('template_main')
@section('content')

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
   .albumPage_img {
    padding-bottom: 26px;
    height: 320px;
} 
    .albumPage_img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

</style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<!-- <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Add Album</span>
</h4> -->
@if(Session::has('msg'))
<div class="row flasMsg">
   <div class="col-md-12">
      <div class="alert alert-success alert-dismissible" role="alert">
         {{ Session::get('msg') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
 </div>
</div>
@endif  
<!-- Vehicle update form here  -->


<div class="album-page">
  <div class="container">
    <div class="row">
      <div class="col-12 ">
        <div class="card">
          <div class="card-body">
             <div class="row">
              <div class="col-4 card">
                  <button type="button" class="btn btn-primary col-4" data-bs-toggle="modal" data-bs-target="#addImages" style="margin: auto;"> Add Images </button>

                  <div class="albumPage_pageno">
                    <div class="table-responsive text-nowrap">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Page #</th>
                            <th># of Photos</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><strong>1</strong></td>
                            <td>
                                <div class="dropdown bootstrap-select w-100">
                                  <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default" tabindex="null">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                  </select>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td><strong>1</strong></td>
                            <td>
                                <div class="dropdown bootstrap-select w-100">
                                  <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default" tabindex="null">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                  </select>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td><strong>1</strong></td>
                            <td>
                                <div class="dropdown bootstrap-select w-100">
                                  <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default" tabindex="null">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                  </select>
                                </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>  

                  <div class="albumPage_buttons">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-secondary"><i class="tf-icons bx bx-save"></i> Save Album</button>
                      <button type="button" class="btn btn-secondary"><i class="tf-icons bx bx-edit"></i> Draw Album</button>
                      <button type="button" class="btn btn-secondary"><i class="tf-icons bx bx-folder-open"></i> Open Album</button>
                    </div>
                  </div>  


                </div>
               <div class="col-8 card">
                 <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="albumPage_img">
                      <img src="{{url('/public/images/16621154153763.JPG')}}" alt="" class="img-fluid">   
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="albumPage_img">
                      <img src="{{url('/public/images/16621154153763.JPG')}}" alt="" class="img-fluid">   
                    </div>  
                  </div>

                  <!-- select 3 -->
                  <div class="col-md-12 col-12">
                    <div class="albumPage_img">
                      <img src="{{url('/public/images/16621154153763.JPG')}}" alt="" class="img-fluid">   
                    </div>
                  </div>


                  <div class="col-md-6 col-12">
                    <div class="albumPage_img">
                      <img src="{{url('/public/images/16621154153763.JPG')}}" alt="" class="img-fluid">   
                    </div>  
                  </div>
                  
                 </div>
               </div>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<?php //print_r($reportList); ?>
<!-- <div class="col-12">
    <div class="card">
      <div class="card-body">
       <div class="row">
           <div class="col-8 card">
               <div id="tui-image-editor-container" style="height:500px;"></div>
           </div>
           <div class="col-4 card">
                <button type="button" class="btn btn-primary col-4" data-bs-toggle="modal" data-bs-target="#addImages" style="margin: auto;"> Add Images </button>
                
           </div>


    </div>
   
    

</div>
</div>
</div>
</div> -->

 

<!-- Edit User Modal -->
<div class="modal fade" id="addImages" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>Upload Images</h3>
          <!-- <p>Updating user details will receive a privacy audit.</p> -->
        </div>
        <div class="col-12 col-md-12" style="margin-bottom: 20px;">
            <label class="form-label" for="report">Report</label>
            <select id="report" name="report" class="form-select" data-allow-clear="true" onchange="setValue(this)">
              <option value="">Select Report</option>
             
            </select>
          </div>
          <div class="col-12 col-md-12">
        <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" class="dropzone needsclick" id="dropzone">
            <div class="dz-message needsclick">
                Drop files here or click to upload
            </div>
            <input type="hidden" id="report_id" name="report_id" value="">
            @csrf
        </form>
    </div>
        <div class="col-12 text-center" style="margin-top: 20px;">
            <a href="#" id="sub_url"><button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Edit User Modal -->

@endsection