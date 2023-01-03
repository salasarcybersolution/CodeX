@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">{{$title}}</span> {{$subtitle}}
    <div style="float: right;margin-top: -10px;">
     <!--  <button class="dt-button btn btn-primary" type="button"  onclick="addNewSubscriptionPlans()">
        <span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span>
      </button> -->
    </div>
  </h4>

 @if(Session::has('msg'))
   <div class="row flasMsg">
      <div class="col-md-12">
          <div class="alert alert-success alert-dismissible" role="alert">
              {{ Session::get('msg') }}
            <!--   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>
        </div>
    </div>      
  @endif  

  @if(Session::has('msg2'))
   <div class="row flasMsg">
      <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible" role="alert">
              {{ Session::get('msg2') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>      
  @endif  


  <div class="card-datatable table-responsive">
<!--   <div class="modal fade" id="addImages" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user"> -->
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
       <!--  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
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
<!-- </div>
</div> -->


</div>
<!--/ Content -->
@endsection