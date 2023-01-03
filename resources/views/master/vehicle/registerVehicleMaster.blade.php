@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row mb-2">
    <div class="col-md-6">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1">
             <li class="breadcrumb-item">
                <a href="#">Vechile</a>
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
                  <!-- 1. Delivery Address -->
                            @if (count($errors) > 0)   
                            @foreach ($errors->all() as $error)
                            @endforeach
                            @endif
                   <form class="needs-validation" novalidate name="addVehile" id="addVehile" action="{{ url('Master/vehicle-master-add') }}" method="post" > 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <h5 class="mb-4">Add Vehicle</h5>
                  <div class="row g-3">
                     <div class="col-md-6">
                        <label for="name" class="form-label">Vehicle Name</label>
                        <input type="text" id="vehicle_name" name="vehicle_name" class="form-control" required placeholder="Enter Vehicle Name">
                        <div class="invalid-feedback"> Please Enter Vehicle Name </div>
                        @error('vehicle_name')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="AcNo" class="form-label">Body Type</label>
                        <input type="text" id="bodyType" name="body_type" class="form-control" required placeholder="Enter Body Type">
                        <div class="invalid-feedback"> Please Enter Body type </div>
                        @error('body_type')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="ifsc" class="form-label">Reg Laden wt</label>
                        <input type="text" id="reg_laden_wt" class="form-control" name="reg_laden_wt" required placeholder="Reg Laden wt">
                        <div class="invalid-feedback"> Please Enter Reg Leden wt </div>
                        @error('reg_laden_wt')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="micr" class="form-label">Cubic Capacity</label>
                        <input type="text" id="cubic_capacity" class="form-control"  name="cubic_capacity" required placeholder="Cubic Capacity">
                        <div class="invalid-feedback"> Please Enter Cubic Capacity </div>
                        @error('cubic_capacity')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="address" class="form-label">Tex Particulars</label>
                        <input type="text" id="tax_particulers" class="form-control" name="tax_particulers" required placeholder="Tex Particulars">
                         <div class="invalid-feedback"> Please Enter Tex Particulars</div>
                        @error('tax_particulers')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="phone" class="form-label">Vehicle Class</label>
                        <input type="text" id="vehicle_class" class="form-control" name="vehicle_class" required placeholder="Vehicle Class">
                         <div class="invalid-feedback"> Please Enter Vehicle Class</div>
                        @error('vehicle_class')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="fax" class="form-label">UnLaden wt</label>
                        <input type="text" id="fax" class="form-control" required placeholder="UnLaden wt" name="unladen_wt">
                        <div class="invalid-feedback"> Please Enter UnLaden wt</div>
                        @error('unladen_wt')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="email" class="form-label">Imposed Excess</label>
                        <input type="text" id="imposed_excess" name="imposed_excess" class="form-control" required placeholder="Imposed Excess">
                          <div class="invalid-feedback"> Please Enter Imposed Excess</div>
                        @error('imposed_excess')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="contact_person" class="form-label">Fuel Used</label>
                          <select id="Fuel_used" name="Fuel_used" class="form-select" data-allow-clear="true" required>
                           <option value="">Select</option>
                           <option value="Petrol">Petrol</option>
                           <option value="Diesel">Diesel</option>
                           <option value="CNG">CNG</option>
                        </select>
                          <div class="invalid-feedback"> Please Select Fuel Used</div>
                        @error('Fuel_used')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="mobile" class="form-label">Make & Model</label>
                        <input type="text" id="make_and_model"  name="make_and_model" class="form-control" required placeholder="Make & Model">
                         <div class="invalid-feedback"> Please Emter Make & Model</div>
                        @error('make_and_model')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="designation" class="form-label">Pre  Accident Con</label>
                        <input type="text" id="pre_accident_con" class="form-control" name="pre_accident_con" required placeholder="Pre  Accident Con">
                         <div class="invalid-feedback"> Please Emter Pre Accident Con</div>
                        @error('pre_accident_con')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-md-6">
                         <label class="form-label" for="state">Seating Capacity</label>
                        <select id="seating_capacity" name="seating_capacity" class="form-select" data-allow-clear="true" required="">
                           <option value="">Select</option>
                           <option value="4+1">4+1</option>
                           <option value="4+2">4+2</option>
                           <option value="4+3">4+3</option>
                           <option value="4+4">4+4</option>
                           <option value="5+1">5+1</option>
                           <option value="5+2">5+2</option>
                           <option value="5+3">5+3</option>
                        </select>
                          <div class="invalid-feedback"> Please Select Seating Capacity </div>
                        @error('seating_capacity')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                     <div class="col-12">
                        <label for="designation" class="form-label">Compulsory Excess</label>
                        <input type="text" id="compulsory_exccess" class="form-control" name="compulsory_exccess" required placeholder="Compulsory Excess">
                         <div class="invalid-feedback"> Please Enter Compulsory Excess </div>
                        @error('compulsory_exccess')
                        <li class="text-danger" >{{ $message }}</li>
                        @enderror
                     </div>
                       <div class="modal-footer">
                        <button type="submit" name="submit" value="submit"  class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </form>
   </div>
</div>
<!--/ Content -->
@endsection