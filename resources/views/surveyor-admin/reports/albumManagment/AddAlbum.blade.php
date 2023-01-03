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


<?php //print_r($reportList); ?>
<div class="col-12">
    <div class="card">
      <div class="card-body">
       <div class="row">
           
           <div class="col-9">
            <div class="row m-0"> 
               @if($reportImages)
               @php
                $i = 0;
               @endphp
                @foreach($reportImages as $row)
                <div class="col-lg-2 p-0" id="image_div_{{$i}}">
                  <div class="albumPage_uploadImage">
                   <img src="{{url('/public/images')}}/{{$row->filename}}" onclick="editImage('{{$row->filename}}');">
                   <a class="albumPage_removeImage" data-dz-remove=""><i   onclick="deleteImagesData('{{$row->id}}','{{$row->filename}}','image_div_{{$i}}')"  class="tf-icons bx bx-x"></i></a>
                  </div>
                </div>
                @php
                 $i++;
                @endphp
                @endforeach
               @endif 
               </div>

               <div class="albumPage_saveImageGrid">
                 <p class="mb-2 border-bottom pb-1">Album Images</p>
                  <div class="row m-0">
                    
                     @if($AlbumImages)
                      @php
                        $i = 0;
                      @endphp
                     @foreach($AlbumImages as $row)
                    
                    <div class="col-lg-2 col-md-4 p-0" id="image_div2_{{$i}}">
                       <div class="albumPage_saveImage">
                            <img src="{{url('/public/images/albumImages')}}/{{$row->album_filename}}" alt="">
                            <a class="albumPage_removeImage" data-dz-remove=""><i  onclick="deleteImagesData2('{{$row->album_id}}','{{$row->album_filename}}','image_div2_{{$i}}')" class="tf-icons bx bx-x"></i></a>
                       </div>
                    </div>
                    
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
           </div>
           <div class="col-3 pt-3 pb-3">
            <div class="row mb-3">
                <button type="button" style="margin:auto;" class="btn btn-primary col-6" data-bs-toggle="modal" data-bs-target="#addImages" > Load Images </button>
            </div>    
                <!-- @if($reportImages)
                @foreach($reportImages as $row)
                <div class="col-lg-12" style="margin:10px; text-align: center;">
                    <img src="{{url('/public/images')}}/{{$row->filename}}" onclick="editImage('{{$row->filename}}');" height="150" width="150">
                </div>
               @endforeach
               @endif  -->
              <form class="add-new-record pt-0 row g-2" id="form-add-new-record" action="{{url('reports/create-album')}}/{{$report_id}}" method="POST">
              {{ csrf_field() }}
               <div class="albumPage_pageno">
                    <div class="table-responsive text-nowrap">
                      <table class="table table-bordered" id="addMoreTr">
                        <thead>
                          <tr>
                            <th>Page #</th>
                            <th># of Photos</th>
                            <th style="width:2px;"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><strong>1</strong></td>
                            <td>
                                <div class="dropdown bootstrap-select w-100">
                                  <select id="imagesNo_1" name="imagesNo[]" class="selectpicker w-100" data-style="btn-default" tabindex="null">
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                  </select>
                                </div>
                            </td>
                            <td><button type="button" class="btn rounded-pill btn-icon btn-outline-primary addkf" > <span class="tf-icons bx bx-plus"></span> </button></td>
                          </tr> 
                        </tbody>
                      </table>
                    </div>
                  </div> 
                  <input type="hidden" name="album_report_ID" id="album_report_ID" value="{{$report_id}}">
                  <div class="albumPage_buttons mt-4">
                    <button type="submit" class="btn btn-primary" ><i class="tf-icons bx bx-save"></i> Save Album</button>
                    <a href="{{ url('reports/drow-album') }}/{{$report_id}}"> 
                      <button type="button" class="btn btn-primary"><i class="tf-icons bx bx-edit"></i> Draw Album</button>
                    </a><br>
                    <a href="{{ url('reports/view-album') }}/{{$report_id}}" style="display: none;" id="viewAlbumButton"> 
                      <button type="button" class="btn btn-primary customB" ><i class="tf-icons bx bx-edit"></i> View Album</button>
                    </a>
                  </div>

                  <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
          </form> 
           </div>
    </div>
   
    <script type="text/javascript">
        function setValue(report){
            var report_id = report.value;
            $('#report_id').val(report_id);
            var urls  = $('#base_urls').val();
            var redirect_url = urls+"reports/add-album/"+report_id;
            $('#sub_url').attr("href", redirect_url);
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
                var report_id = jQuery('#report').val();   
               
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

         <link type="text/css" href="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.css" rel="stylesheet">
        <link rel="stylesheet" href="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.css">
<!--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.0/fabric.js"></script>-->
        <!-- <script type="text/javascript" src="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.js"></script> -->
 
       <!--  <script type="text/javascript" src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>-->
        <!-- <script type="text/javascript" src="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.js"></script>  -->
 
        <!-- <script type="text/javascript" src="./js/theme/black-theme.js"></script>  -->

    <!--<script src="{{asset('public/assets/css/tui-color-picker.css')}}"></script>
        <script src="{{asset('public/assets/css/tui-image-editor.css')}}"></script> -->
        <script src="{{asset('public/assets/js/tui-color-picker.js')}}"></script> 
        <script src="{{asset('public/assets/js/tui-image-editor.js')}}"></script>

        <script>
         // Image editor
         
            $(document).ready(function() {
             var Alid  = $("#album_report_ID").val();
             if (Alid != ''){
              $("#viewAlbumButton").css("display", "block");
             }
      });
          function deleteImagesData(id,filename,image_div){
            $.ajax({
                    type: 'POST',
                     url: urls+'delete-image',
                     data: {
                      _token: $('#_token').val(),
                       id : id,
                       filename : filename 
                      },
                    success: function (data) {
                    $('#'+image_div).hide();

                    },
        
                });

         }


          function deleteImagesData2(album_id,album_filename,image_div2){

            $.ajax({
                    type: 'POST',
                     url: urls+'delete-album-image',
                     data: {
                      _token: $('#_token').val(),
                       album_id : album_id,
                       album_filename : album_filename 
                      },
                    success: function (data) {
                    $('#'+image_div2).hide();
                        // alert('UPLOADED SUCCESSFULLY, PLEASE TRY AGAIN...');
                    },
        
                });

         }

         // imageEditor.loadImageFromURL('http://103.15.67.180/developer_3/surveyor/public/images/1662111163804land-rover-white-model-photo-new-range-evoque-sd-alloy-wheels-tinted-windows-38481548.jpg', 'lena').then(result => {
         //     console.log('old : ' + result.oldWidth + ', ' + result.oldHeight);
         //     console.log('new : ' + result.newWidth + ', ' + result.newHeight);
         // });

         // imageEditor.addShape('circle', {
         //        fill: 'red',
         //        stroke: 'blue',
         //        strokeWidth: 3,
         //        rx: 10,
         //        ry: 100,
         //        isRegular: false
         //    }).then(objectProps => {
         //        console.log(objectProps.id);
         //    });

         function editImage(str){
             var urls  = $('#base_urls').val();
            var imageEditor = new tui.ImageEditor('#tui-image-editor-container', {
             includeUI: {
                  loadImage: {
                     path: urls+'/public/images/'+str,
                     name: 'SampleImage'
                 },
                //  theme: blackTheme, // or whiteTheme
                 menu: ['draw', 'shape', 'text'],

                 initMenu: 'shape',
                 menuBarPosition: 'bottom'
             },
             cssMaxWidth: 700,
             cssMaxHeight: 500,
             usageStatistics: false
         });


            $('#saveCanvasImage').on('click', function (e) {
                //alert('kamal');
                // GET TUI IMAGE AS A BLOB
                var blob = dataURLtoBlob(imageEditor.toDataURL());

                // PREPARE FORM DATA TO SEND VIA POST
                var formData = new FormData();
                formData.append('croppedImage', blob, str);
                // SEND TO SERVER
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("image/upload") }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        alert('UPLOADED SUCCESSFULLY, PLEASE TRY AGAIN...');
                    },
                    error: function(xhr, status, error) {
                        alert('UPLOAD FAILED, PLEASE TRY AGAIN...');
                    }
                });
                return false;
            });
             
         }

         
         window.onresize = function() {
             imageEditor.ui.resizeEditor();
         }

        function dataURLtoBlob(dataurl) {
            var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
                bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
            while(n--){
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new Blob([u8arr], {type:mime});
        }

        function saveImage(){
            alert('kjfdkjfljdlf');
        }


        </script>
</div>
</div>
</div>
</div>



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
              @foreach($reportList as $row)
              <option value="{{$row->report_id}}">{{$row->policy}}</option>
              @endforeach
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
            <a href="{{url('reports/add-album/')}}/{{$report_id}}" id="sub_url"><button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Edit User Modal -->

@endsection