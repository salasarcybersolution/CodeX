@extends('template_main')
@section('content')

<style type="text/css">
    .tui-image-editor-header-logo{

        display: none !important;
    }
    .tui-image-editor-help-menu{
        display: none !important;
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
           <div class="col-8">
               <div id="tui-image-editor-container" style="height:500px;"></div>
           </div>
           <div class="col-4">
                
                <a href="{{ url('reports/add-album') }}/{{$report_id}}"> <button type="button"  class="btn btn-primary col-4 mb-2" style="margin: auto;"> Back </button> </a>
                @if($AlbumImages)
                @foreach($AlbumImages as $row)
                <div class="col-lg-12 border-bottom m-2 mb-0 pb-2" style="text-align: center;">
                    <img src="{{url('/public/images/albumImages')}}/{{$row->album_filename}}" onclick="editImage('{{$row->album_filename}}');" height="100%" width="100%">
                </div>
               @endforeach
               @endif 
           </div>


    </div>

         <link type="text/css" href="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.css" rel="stylesheet">
        <link rel="stylesheet" href="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.css">
<!--        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.0/fabric.js"></script>-->
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
                     path: urls+'/public/images/albumImages/'+str,
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
                $(".pageloader").fadeIn();
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
                         $(".pageloader").fadeOut();
                        //alert('UPLOADED SUCCESSFULLY, PLEASE TRY AGAIN...');
                    },
                    error: function(xhr, status, error) {
                        alert('UPLOAD FAILED, PLEASE TRY AGAIN...');
                    }
                });
                return false;
            });
             
         }

         
         // window.onresize = function() {
         //     imageEditor.ui.resizeEditor();
         // }

        function dataURLtoBlob(dataurl) {
            var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
                bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
            while(n--){
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new Blob([u8arr], {type:mime});
        }

        
        </script>
</div>
</div>
</div>
</div>
@endsection