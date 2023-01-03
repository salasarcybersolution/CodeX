@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<div class="row mb-2">
                  <div class="col-md-6">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1">
                           <li class="breadcrumb-item">
                              <a href="#">Surveyor Insurer</a>
                           </li>
                           <li class="breadcrumb-item active">View</li>
                        </ol>
                     </nav>
                  </div>
               </div> 
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
<div class="row">

<div class="" id="viewSubscriptionPlanInfoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Serveyar Insurer view Details</h5> </div> <div class="modal-body">
          <div class="row">
            <div class="col-lg mb-md-0 mb-4">

          <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Insurer Name:</span> <span>{{$insurers->insurer_name}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Branch:</span> <span>{{$insurers->branch_name}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">Bank Account:</span> <span>{{$insurers->bank_name}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-semibold mx-2">Party Code:</span> <span>{{$insureSurveyor->party_code}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">TAT:</span> <span>{{$insureSurveyor->tat}}</span></li>
           <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">TDS:</span> <span>{{$insureSurveyor->tds}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">TCS:</span> <span>{{$insureSurveyor->tcs}}</span></li>
        </ul>
        
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!--    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button> -->
        </div>
      </div>

  </div>
</div>
</div>
</div>
<!--/ Content -->
@endsection