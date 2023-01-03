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
             <li class="breadcrumb-item active">Add</li>
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
                            @if (count($errors) > 0)   
                            @foreach ($errors->all() as $error)
                            @endforeach
                            @endif
                   <form class="needs-validation" novalidate name="brachMaster" id="brachMaster" action="{{url('Master/registerBranchMaster')}}" method="post" > 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                 <!--  <h5 class="mb-4">Add Insurer Branch</h5> -->
                  <div class="row g-3">
                     <div class="col-md-6 field">
                        <label for="bank" class="form-label">Insurer Name</label>
                        <select class="form-select" data-allow-clear="true" name="insurer_name" required id="insurer_name" >
                            <option value=""></option>
                           <?php  
                             foreach ($insurers as $row) { ?>
                                <option value="<?php echo $row->insurer_master_id ; ?>"><?php echo $row->insurer_name; ?></option>
                             <?php } ?>
                        </select>
                        <div class="invalid-feedback"> Please Select Insurer Name </div>
                          @error('insurer_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                          
                       <div class="col-md-6 field">
                        <label for="ac_no" class="form-label">Branch Name</label>
                         <input type="text" name="branch_name" id="branch_name" required class="form-control" >
                          <div class="invalid-feedback"> Please Enter Branch Name </div>
                          @error('branch_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>    

                     <div class="col-md-6 field">
                        <label for="ac_no" class="form-label">State</label>
                            <select class="form-select" data-allow-clear="true" name="state" required  id="stateID" >
                           <option value=""></option>
                           <?php  
                             foreach ($state as $row1) {  ?>
                              <option value="<?php echo $row1->id; ?>"><?php echo $row1->name; ?></option>
                             <?php } ?>
                        </select>
                         <div class="invalid-feedback"> Please Select State Name </div>
                           @error('state')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="col-md-6 field">
                       <label for="ac_no" class="form-label">City</label>
                            <select required class="form-select" data-allow-clear="true" name="city" id="cityID" >
                           <option value=""></option>
                           <?php  
                             foreach ($cities as $row2) {  ?>
                              <option value="<?php echo  $row2->id;?>"><?php echo $row2->city; ?></option>
                             <?php } ?>
                        </select>
                         <div class="invalid-feedback"> Please Select City Name </div>
                             @error('city')
                        <div class="text-danger">{{ $message }}</div>
                           @enderror
                     </div>
                   </div>
                     <?php echo "<pre>"; ?>
                       <div class="modal-footer">
                        <button type="submit" name="submit" value="submit" onclick="brachValidate()"  class="btn btn-primary">Save</button>
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