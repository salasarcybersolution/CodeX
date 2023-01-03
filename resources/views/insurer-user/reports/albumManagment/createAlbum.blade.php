    @extends('template_main')
    @section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
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
        padding: 3px;
        height: 320px;
    } 
    .albumPage_img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .gallery-button {
      text-align: end;
      margin-bottom: 15px;
    }
    </style>

    <div class="col-12">
        <div class="card">
          <div class="card-body">


             <div class="row m-0">

                 <div class="col-9">

                    <?php 

                  // echo '<pre>';
                  // print_r($imageNumbers);
                    $count = count($reportImages);
                    for ($i=0; $i < $count; $i++) { 
                        ?>
                        <div class="row" id="html-content-holder-{{$i}}">
                            <?php  foreach ($reportImages[$i] as $images) { ?>
                             <div class="col-md-6 col-12 p-0">
                                <div class="albumPage_img">
                                  <img src="{{url('/public/images/')}}/{{$images->filename}}" alt="" class="img-fluid">   
                              </div>  
                          </div>
                      <?php } ?>
                  </div>       
              <?php } ?>




              <div id="previewImg"></div>
          </div>
          <div class="col-3">
            <div class="row">
              <div class="col-6">  
                <button type="button"  class="btn btn-primary" id="saveImages" >Save Album</button>
              </div>
              <a href="{{ url('reports/add-album') }}/{{$report_id}}" class="col-4"> <button type="button"  class="btn btn-primary" > Back </button> </a>
             </div>
         </div>    
     </div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.esm.js"></script> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script> 
     <script>
        $(document).ready(function(){
         $("#saveImages").on('click', function () {
            var jsonArray = '<?php print_r(json_encode($imageNumbers)); ?>';
            var obj = jQuery.parseJSON(jsonArray);
            var arrayLength = obj.length;

            for (let i = 0; i < obj.length; i++) {
                screenshot(i);  
            }
            
        });

        function screenshot(strNum){
            $(".pageloader").fadeIn();
            var report_id = '<?php echo $report_id; ?>';
            html2canvas(document.getElementById("html-content-holder-"+strNum)).then(function (canvas) {
                //downloadImage(canvas.toDataURL(),"colageImage.png");
                var blob = dataURLtoBlob(canvas.toDataURL());

                var dt = new Date();
                var time = dt.getTime();

                var formData = new FormData();
                formData.append('report_id', report_id);
                formData.append('albumImage', blob, 'albumImage-'+time+'-'+report_id+'.png');
                // SEND TO SERVER
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("image/album/upload") }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $(".pageloader").fadeOut();
                       // alert('UPLOADED SUCCESSFULLY, PLEASE TRY AGAIN...');
                    },
                    error: function(xhr, status, error) {
                        //alert('UPLOAD FAILED, PLEASE TRY AGAIN...');
                    }
                });
                return false;

            });
        }

      //   function downloadImage(uri, filename){
      //       var link = document.createElement('a');
      //       if(typeof link.download !== 'string'){
      //         window.open(uri);
      //     }
      //     else{
      //         link.href = uri;
      //         link.download = filename;
      //         accountForFirefox(clickLink, link);
      //     }
      // }

    //   function clickLink(link){
    //     link.click();
    // }

    // function accountForFirefox(click){
    //     var link = arguments[1];
    //     document.body.appendChild(link);
    //     click(link);
    //     document.body.removeChild(link);
    // }
    });

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
    </div>

    @endsection