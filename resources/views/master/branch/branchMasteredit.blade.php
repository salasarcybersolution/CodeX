@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row mb-2">
    <div class="col-md-6">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1">
             <li class="breadcrumb-item">
                <a href="#">Branch</a>
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
                  <!-- 1. Delivery Address -->
                            @if (count($errors) > 0)   
                            @foreach ($errors->all() as $error)
                            @endforeach
                            @endif
                   <form class="needs-validation" novalidate name="bankMaster" id="bankMaster" action="{{url('Master/updateBranchMaster')}}" method="post" > 

                    <?php //echo "<pre>"; print_r($getoneData); ?>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                 <!--  <h5 class="mb-4">Update Insurer Branch</h5> -->
                  <div class="row g-3">
                     <div class="col-md-6">
                        <label for="bank" class="form-label">Insurer Name</label>
                        <select class="form-select" data-allow-clear="true" name="insurer_name" id="insurer_name" required >
                          <option value="">selecte</option>
                           <?php  
                             foreach ($insurers as $row) {  ?> 
                             <option value="{{ $row->id }}" <?php if($row->id ==  $getoneData->insurer_id){ echo "selected";} ?>>{{$row->insurer}}</option>   

                             <?php } ?>
                        </select>
                        <div class="invalid-feedback"> Please Select Insurer Name </div>
                          @error('insurer_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                          
                       <div class="col-md-6">
                        <label for="ac_no" class="form-label">Branch Name</label>
                         <input type="text" name="branch_name" id="branch_name" class="form-control" value="{{$getoneData->branch_name}}" placeholder="Enter Branch Name" required>
                          <div class="invalid-feedback"> Please Enter Branch Name </div>
                          @error('branch_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>    
                       <?php //echo "<pre>"; print_r($getoneData); ?>
                     <div class="col-md-6">
                        <label for="ac_no" class="form-label">State</label>
                            <select required class="select2 form-select" data-allow-clear="true" name="state"  id="stateID" >
                              <option value="">select</option>
                           <?php  
                             foreach ($state as $row1) {  ?>
                              <option value="<?php echo $row1->id; ?>" <?php if($row1->id ==  $getoneData->state_id){ echo "selected";} ?>><?php echo $row1->name; ?></option>
                             <?php } ?>
                        </select>
                         <div class="invalid-feedback"> Please Select State Name </div>
                           @error('state')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="col-md-6">
                       <label for="ac_no" class="form-label">City</label>
                            <select required class="select2 form-select" data-allow-clear="true" name="city" id="cityID" >
                            <option value="">select</option>  
                           <?php  
                             foreach ($cities as $row2) {  ?>
                              <option value="<?php echo  $row2->id;?>" <?php if($row2->id ==  $getoneData->city_id){ echo "selected";} ?> ><?php echo $row2->city; ?></option>
                             <?php } ?>
                        </select>
                        <div class="invalid-feedback"> Please Select City Name </div>
                             @error('city')
                        <div class="text-danger">{{ $message }}</div>
                           @enderror
                     </div>
                     <div class="col-md-6">
                       <label for="ac_no" class="form-label">Status</label>
                            <select class="form-select" data-allow-clear="true" name="status" id="status" >
                             <option {{$getoneData->status == 1 ?'selected':''}} value="{{$getoneData->status== 1 ?'1':'1'}}">Active</option>
                            <option {{$getoneData->status=='0'?'selected':''}} value="{{$getoneData->status=='0'?'0':'0'}}">Inactive</option>
                        </select>
                          @error('status')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                     </div>
                </div><br><br> 
                           
                         <input type="hidden" name="id" value="{{$getoneData->branch_id}}">
                       <div class="modal-footer">
                        <button type="submit" name="submit" value="submit"   class="btn btn-primary">Update</button>
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