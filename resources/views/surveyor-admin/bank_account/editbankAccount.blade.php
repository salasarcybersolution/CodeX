
@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row mb-2">
      <div class="col-md-6">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
               <li class="breadcrumb-item">
                  <a href="#">Banck Account</a>
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
                
                            @if (count($errors) > 0)   
                            @foreach ($errors->all() as $error)
                            @endforeach
                            @endif
                   <form class="needs-validation" novalidate name="bankMaster" id="bankMaster" action="{{url('surveyor/updateServeyorBankDetils')}}" method="post" > 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <div class="row g-3">
                     <div class="col-md-6">
                        <label for="bank" class="form-label">Bank Name</label>
                        <select class="form-select" data-allow-clear="true" name="bank_name" id="bank_name" required>
                           <option value="">Select Bank Name</option>
                           <?php  
                             foreach ($BankList as $row) { ?>
                                <option value="<?php echo $row->bank; ?>"><?php echo $row->bank; ?></option>
                           <?php } ?>
                        </select>
                        <div class="invalid-feedback"> Please Select Bank Name. </div>
                          @error('bank_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                          
                        <input type="hidden" name="bank_ID" value="{{$getOne->id}}">  
                       <div class="col-md-6">
                        <label for="ac_no" class="form-label">Account Holder Name</label>
                         <input type="text" name="account_holder_name" id="account_holder_name" value="{{$getOne->account_holder_name}}" class="form-control" placeholder="Enter Account Holder Name" required>
                          <div class="invalid-feedback"> Please Enter Account Holder Name. </div>
                          @error('account_holder_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>    

                     <div class="col-md-6">
                        <label for="ac_no" class="form-label">Account No.</label>
                            <input type="text" name="account_no" id="account_no" class="form-control" value="{{$getOne->ac_no}}"  placeholder="Enter Account Number" required>
                             <div class="invalid-feedback"> Please Enter Account No. </div>
                          @error('account_no')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>

                     <div class="col-md-6">
                        <label for="ifsc" class="form-label">IFSC</label>
                            <input type="text" name="ifsc" id="ifsc" class="form-control" value="{{$getOne->ifsc}}"  placeholder="Enter IFSC" required>
                            <div class="invalid-feedback"> Please Enter IFSC. </div>
                          @error('ifsc')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>

                     <div class="col-md-6">
                        <label for="micr" class="form-label">MICR</label>
                            <input type="text" name="micr" id="micr" class="form-control" value="{{$getOne->micr}}"  placeholder="Enter MICR" required>
                            <div class="invalid-feedback"> Please Enter MICR. </div>
                          @error('micr')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     
                     <div class="col-md-6">
                        <label for="ifsc" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{$getOne->address}}"  placeholder="Enter Address" required>
                            <div class="invalid-feedback"> Please Enter Address. </div>
                          @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>

                     <div class="col-md-6">
                        <label for="micr" class="form-label">Phone No</label>
                            <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{$getOne->phone_no}}"  placeholder="Enter Phone No" required>
                            <div class="invalid-feedback"> Please Enter Phone No. </div>
                          @error('phone_no')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>

                        <div class="col-md-6">
                        <label for="ifsc" class="form-label">Email</label>
                            <input type="email" name="bank_email" id="bank_email" class="form-control" value="{{$getOne->bank_email}}"  placeholder="Enter Email" required>
                            <div class="invalid-feedback"> Please Enter Email. </div>
                          @error('bank_email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>

                     <div class="col-md-6">
                        <label for="micr" class="form-label">Contact Person</label>
                            <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{$getOne->contact_person}}"  placeholder="Enter Contact Person" required>
                            <div class="invalid-feedback"> Please Enter Contect Person Name. </div>
                          @error('contact_person')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>


                       <div class="col-md-6">
                        <label for="ifsc" class="form-label">Mobile No</label>
                            <input type="text" name="contact_person_mobile" id="contact_person_mobile" class="form-control" value="{{$getOne->contact_person_mobile}}"  placeholder="Enter Mobile No " required>
                             <div class="invalid-feedback"> Please Enter Mobile No. </div>
                          @error('contact_person_mobile')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>

                     <div class="col-md-6">
                        <label for="micr" class="form-label">Contact Person Designation</label>
                            <input type="text" name="contact_person_designation" id="contact_person_designation" class="form-control" value="{{$getOne->contact_person_designation}}"  placeholder="Enter Contact Person Designation" required>
                            <div class="invalid-feedback"> Please Enter Contact Person Designation. </div>
                          @error('contact_person_designation')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     
                        <div class="col-md-6">
                       <label for="ac_no" class="form-label">Status</label>
                            <select class="form-select" data-allow-clear="true" name="status" id="status" required>
                             <option {{$getOne->status == 1 ?'selected':''}} value="{{$getOne->status== 1 ?'1':'1'}}">Active</option>
                            <option {{$getOne->status=='0'?'selected':''}} value="{{$getOne->status=='0'?'0':'0'}}">Inactive</option>
                        </select>
                     </div>

                    
                </div>
                 
                       <div class="col-md-12 mx-auto text-end mt-4">
                        <button type="submit" name="submit" value="submit"  class="btn btn-primary">Update</button>
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