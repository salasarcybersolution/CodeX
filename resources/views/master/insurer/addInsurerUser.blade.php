@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

      <div class="row mb-2">
    <div class="col-md-6">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1">
             <li class="breadcrumb-item">
                <a href="#">Add</a>
             </li>
             <li class="breadcrumb-item active"> Insurer User</li>
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
                   <form class="needs-validation" novalidate name="addVehile" id="addVehile" action="{{url('Master/saveInsurerUserData')}}" method="post" > 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                 <!--  <h5 class="mb-4">Add Insurer</h5> -->
                  <div class="row g-3">

                     <div class="col-md-6 field">
                         <label for="insurer_name" class="form-label">Insurer </label>
                           <select name="insurer_name" id="insurerName" class="form-select" required>
                              <option value=""> Select Insurer </option>
                              <?php foreach ($insurer_list as $insurerVal) { ?>
                                    <option value="{{$insurerVal->insurer_master_id}}"> {{$insurerVal->insurer_name}}</option>
                              <?php }  ?>
                           </select>
                           <div class="invalid-feedback"> Please select Insurer .</div>
                           @error('insurer_name')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>

                     <div class="col-md-6 field">
                         <label for="insurer_branch" class="form-label">Insurer Branch </label>
                           <select name="insurer_branch" id="insurerBranch" class="form-select" required>
                              <option value=""> Select Insurer Branch </option>
                             
                           </select>
                           <div class="invalid-feedback"> Please select Insurer Branch .</div>
                           @error('insurer_branch')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>



                     <div class="col-md-6 field">
                         <label for="first_name" class="form-label">First Name</label>
                        <input type="text"  id="first_name" name="first_name" class="form-control" required>
                         <div class="invalid-feedback"> Please Enter Insurer First Name. </div>
                        @error('first_name')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6 field">
                         <label for="last_name" class="form-label">Last Name</label>
                          <input type="text" id="last_name" name="last_name" class="form-control"  required>
                           <div class="invalid-feedback"> Please Enter Last Name .</div>
                           @error('last_name')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6 field">
                         <label for="user_name" class="form-label">User Name</label>
                          <input type="text" id="user_name" name="user_name" class="form-control"  required>
                           <div class="invalid-feedback"> Please Enter User Name .</div>
                           @error('user_name')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>

                     <div class="col-md-6 field">
                         <label for="insurer_email" class="form-label">Email</label>
                          <input type="text" id="insurer_email" name="insurer_email" class="form-control"  required>
                           <div class="invalid-feedback"> Please Enter Email .</div>
                           @error('insurer_email')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>

                     <div class="col-md-6 field">
                         <label for="mobile_number" class="form-label">Mobile Number</label>
                          <input type="text" id="mobile_number" name="mobile_number" class="form-control"  required>
                           <div class="invalid-feedback"> Please Enter mobile number .</div>
                           @error('mobile_number')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>

                     <div class="col-md-6 field">
                         <label for="city" class="form-label">City </label>
                           <select name="city" class="form-select" required>
                              <option value=""> Select City </option>
                              <?php foreach ($city as $cityValue) { ?>
                                    <option value="{{$cityValue->id}}"> {{$cityValue->city}}</option>
                              <?php }  ?>
                           </select>
                           <div class="invalid-feedback"> Please select city .</div>
                           @error('city')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>

                    
                     </div>
                               
                
                 
                       <div class="modal-footer">
                        <button type="submit" name="submit" value="submit"  class="btn btn-primary">Save</button>
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