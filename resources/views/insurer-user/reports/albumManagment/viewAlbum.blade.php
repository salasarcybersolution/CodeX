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
      top: 6px;
      right: 6px;
      color: #f00 !important;
      background-color: #fff;
      font-size: 4px;
      border-radius: 4px;
    }
    .albumPage_removeImage i {
        font-size: 15px;
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

button.btn.btn-primary.customB {
    margin: 5px;
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

<div class="col-12">
    <div class="card">
      <div class="card-body">
       <div class="row">
           
           <div class="col-12">
            <div class="row m-0">   

            <div class="albumPage_saveImageGrid">
                 <p class="mb-2 border-bottom pb-1">Album Images</p>
                  <div class="row m-0">
                    
                     @if($getImages)
                     @php
                      $i = 0;
                      @endphp
                     @foreach($getImages as $row)
                    <body>
                    <div class="col-lg-2 col-md-4 p-0" id="image_div2_{{$i}}">
                       <div class="albumPage_saveImage">
                            <img src="{{url('/public/images/albumImages')}}/{{$row->album_filename}}" alt="Image {{$i}}" class="">
                            <a class="albumPage_removeImage" data-dz-remove=""><i onclick="deleteImagesData2('{{$row->album_id}}','{{$row->album_filename}}','image_div2_{{$i}}')" class="tf-icons bx bx-x"></i></a>
                       </div>
                    </div>
                  </body>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                    @endif 
                    <!-- <div class="col-lg-2 col-md-4 p-0">
                       <div class="albumPage_saveImage">
                            <img src="{{url('/public/images/16621154153763.JPG')}}" alt="" >
                       </div>
                    </div> -->
                  </div>  
               </div>     
                <!-- <div class="col-lg-2 p-0" id="image_div">
                  <div class="albumPage_uploadImage">
                      
                       @foreach($getImages as $row) 
                     


                 
                       
                            <img src="{{url('/public/images/albumImages')}}/{{$row->album_filename}}" alt="">
                           
                     
                 
                    @endforeach
                  
                   




                  
                  </div>
                </div> -->       
              </div>
           </div>
         </div>


        

       
</div>
</div>
</div>
</div>


@endsection