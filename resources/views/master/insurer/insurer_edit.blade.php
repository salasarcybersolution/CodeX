@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row mb-2">
    <div class="col-md-6">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1">
             <li class="breadcrumb-item">
                <a href="#">Insurer</a>
             </li>
             <li class="breadcrumb-item active">Update</li>
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
   <div class="col-12">
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-lg-8 mx-auto">
                <?php //print_r($getOne); die; ?> 
                  <!-- 1. Delivery Address -->
                            @if (count($errors) > 0)   
                            @foreach ($errors->all() as $error)
                            @endforeach
                            @endif
                   <form class="needs-validation" novalidate name="addVehile" id="addVehile" action="{{url('Master/updateInsurerData')}}" method="post" > 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                 <!--  <h5 class="mb-4">Update Insurer</h5> -->
                  <div class="row g-3">
                     <div class="col-md-6">
                         <label for="insurer132" class="form-label">Insurer</label>
                        <input type="text"  id="insurer" name="insurer" required class="form-control" require value="{{$getOne->insurer_name}}" placeholder="Enter Insurer Name">
                        <div class="invalid-feedback"> Please Enter Insurer Name. </div>
                        @error('insurer')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>
                
                 
                     <div class="col-md-6">
                         <label for="initial" class="form-label">Initial</label>
                          <input type="text" id="initial" name="initial" required class="form-control" value="{{$getOne->initial}}" placeholder="Initial">
                             <div class="invalid-feedback"> Please Enter Initial .</div>
                          @error('initial')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>
                    
                   <input type="hidden" name="id" value="{{ $getOne->insurer_master_id }}"> 
                
                      <div class="col mb-6">
                         
                          <label for="remark" class="form-label">Remark</label>
                          <textarea name="remark" required class="form-control">{{$getOne->remark}}</textarea>
                           <div class="invalid-feedback"> Please Enter Remark .</div>
                          @error('remark')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                      </div> 
                    <div class="col-md-6"> 
                       <label for="ac_no" class="form-label">Status</label>
                            <select class="form-select" data-allow-clear="true" name="status" id="status" required>
                             <option {{$getOne->status == 1 ?'selected':''}} value="{{$getOne->status== 1 ?'1':'1'}}">Active</option>
                            <option {{$getOne->status=='0'?'selected':''}} value="{{$getOne->status=='0'?'0':'0'}}">Inactive</option>
                        </select>
                     </div>
                    
                   </div> <br>             
                 
                       <div class="modal-footer">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </form>
   </div>

<!--/ Content -->
@endsection