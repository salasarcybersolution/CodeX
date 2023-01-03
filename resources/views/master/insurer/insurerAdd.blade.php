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
                   <form class="needs-validation" novalidate name="addVehile" id="addVehile" action="{{url('Master/saveInsurerData')}}" method="post" > 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                 <!--  <h5 class="mb-4">Add Insurer</h5> -->
                  <div class="row g-3">

                     <div class="col-md-6 mb-4 field">
                         <label for="insurer" class="form-label">Insurer</label>
                        <input type="text"  id="insurer" name="insurer" class="form-control" required>
                         <div class="invalid-feedback"> Please Enter Insurer Name. </div>
                        @error('insurer')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>

                     <div class="col-md-6 mb-4 field">
                         <label for="initial" class="form-label">Initial</label>
                          <input type="text" id="initial" name="initial" class="form-control"  required>
                           <div class="invalid-feedback"> Please Enter Initial .</div>
                           @error('initial')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                     </div>
                     </div>
                     <div class="row g-3">
                     
                      <div class="col-md-6 mb-4 field">
                        <label for="party_code" class="form-label">Party Code</label>
                        <input type="text" class="form-control" id="party_code" name="party_code" value="" required>
                        <div class="invalid-feedback"> Please Enter Party Code. </div>
                         @error('party_code')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-4 field">
                        <label for="tat" class="form-label">TAT</label>
                        <input type="text" class="form-control" id="tat" name="tat"  value="" required>
                         <div class="invalid-feedback"> Please Enter TAT. </div>
                          @error('tat')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    

                      <div class="col-md-6 mb-4 field">
                        <label for="tds" class="form-label">Fee Based On</label>
                        <input type="text" class="form-control" id="fee_base_on" name="fee_base_on" value="" required>
                        <select class="form-select" name="fee_base_on" id="fee_base_on">
                          <option value=""></option>
                          <option value="1">Assessed</option>
                          <option value="2">Estimate</option>
                          <option value="3">IDV</option>
                        </select>
                         <div class="fee_base_on"> Select Fee Based On. </div>
                          @error('fee_base_on')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>


                      <div class="col-md-6 mb-4 field">
                        <label for="party_code" class="form-label">Party Code</label>
                        <input type="text" class="form-control onlyNumericKey" id="party_code" name="party_code" required>
                         <div class="invalid-feedback"> Please Enter Party Code. </div>
                          @error('party_code')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>


                      <div class="col-md-6 mb-4 field">
                        <label for="tds" class="form-label">TDS</label>
                        <input type="text" class="form-control onlyNumericKey" id="tds" name="tds" value="" required>
                         <div class="invalid-feedback"> Please Enter TDS. </div>
                          @error('tds')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                  
                        <input type="hidden" name="serveyor_insurer_id" value="">
                        <div class="col-md-6 mb-3 field">
                           <label for="tcs" class="form-label">TCS</label>
                           <input type="text" class="form-control onlyNumericKey" id="tcs" name="tcs" value="" required>
                           <div class="invalid-feedback"> Please Enter TCS. </div>
                              @error('tcs')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                        </div>

                        <div class="col-mb-12 field">
                          <label for="remark" class="form-label">Remark</label>
                          <textarea name="remark" class="form-control" required style="height: 17px;"></textarea>
                          <div class="invalid-feedback"> Please Enter Remark .</div>
                           @error('remark')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                      </div>
                     </div>



                      <div class="col-md-12 mx-auto mt-4">

                      <div class="row">
                        <div class="col-xl-12">
                        
                        <div class="nav-align-top mb-4">
                          <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-final" aria-controls="navs-top-final" aria-selected="true">Final</button>
                            </li>
                            <li class="nav-item">
                              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-inspection" aria-controls="navs-top-inspection" aria-selected="false">ReInspection & Spot</button>
                            </li>
                            
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-top-final" role="tabpanel">
                              <table class="table" id="addSlavMain">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Amount</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td>1</td>
                                  <td><input type="text" name="slab_amount" class="form-control" value="" style="width:80px;" required=""></td> 
                                  <td><input type="text" name="slab_amount" class="form-control" value="" style="width:80px;" required=""></td>
                                  <td><input type="text" name="slab_amount" class="form-control" value="" style="width:80px;" required=""></td>
                                  <td><div class="finalNewParts_add">
                                      <button type="button" class="btn rounded-pill btn-icon btn-outline-primary addSlav" > <span class="tf-icons bx bx-plus"></span> </button>
                                  </div> </td>
                                </tr>
                              </tbody>
                              </table>
                              <br>
                              <div class="row">

                                <div class="col-md-4 mb-4 field">
                                  <label for="formula_amount" class="form-label">Formula Amount</label>
                                  <input type="text" class="form-control onlyNumericKey" id="formula_amount" name="formula_amount" value="" required>
                                   <div class="invalid-feedback"> Please Enter Formula Amount. </div>
                                   @error('formula_amount')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="col-md-4 mb-4 field">
                                  <label for="min_amount" class="form-label">Min Amount</label>
                                  <input type="text" class="form-control onlyNumericKey" id="min_amount" name="min_amount" value="" required>
                                  <div class="invalid-feedback"> Please Enter Min Amount. </div>
                                  @error('min_amount')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="col-md-4 mb-4 field">
                                  <label for="percent" class="form-label">Percent</label>
                                  <input type="text" class="form-control onlyNumericKey" id="percent" name="percent" value="" required>
                                  <div class="invalid-feedback"> Please Enter Percent. </div>
                                   @error('percent')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-4 mb-4 field">
                                  <label for="conveyance" class="form-label">Conveyance</label>
                                  <input type="text" class="form-control onlyNumericKey" id="conveyance" name="conveyance" value="" required>
                                  <div class="invalid-feedback"> Please Enter Conveyance. </div>
                                   @error('conveyance')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="col-md-4 mb-4 field">
                                  <label for="photos_rate" class="form-label">Photo`s Rate</label>
                                  <input type="text" class="form-control onlyNumericKey" id="photos_rate" name="photos_rate" value="" required>
                                  <div class="invalid-feedback"> Please Enter Photo`s Rate. </div>
                                  @error('photos_rate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="col-md-4 mb-4 field">
                                  <label for="km_rate" class="form-label">KM Rate</label>
                                  <input type="text" class="form-control onlyNumericKey" id="km_rate" name="km_rate" value="" required>
                                  <div class="invalid-feedback"> Please Enter KM Rate. </div>
                                   @error('km_rate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>

                            </div>
                            <div class="tab-pane fade" id="navs-top-inspection" role="tabpanel">
                              <br>
                              <H5>Spot</H5>
                              <div class="row">

                                <div class="col-md-6 mb-4 field">
                                  <label for="spot_proof_fee" class="form-label">Prof Fee</label>
                                  <input type="text" class="form-control onlyNumericKey" id="spot_proof_fee" name="spot_proof_fee" value="0" required>
                                </div>

                                 <div class="col-md-6 mb-4 field">
                                  <label for="spot_coveyance" class="form-label">Conveyance</label>
                                  <input type="text" class="form-control onlyNumericKey" id="spot_coveyance" name="spot_coveyance" value="0" required>
                                </div>
                              </div>
                              <br>
                              <br> 
                               <H5>ReInspection</H5> 
                              <div class="row">

                                <div class="col-md-6 mb-4 field">
                                  <label for="reins_prof_fees" class="form-label">Prof Fee</label>
                                  <input type="text" class="form-control onlyNumericKey" id="reins_prof_fees" name="reins_prof_fees" value="0" required>
                                </div>

                                 <div class="col-md-6 mb-4 field">
                                  <label for="reins_conveyance" class="form-label">Conveyance</label>
                                  <input type="text" class="form-control onlyNumericKey" id="reins_conveyance" name="reins_conveyance" value="0" required>
                                </div>

                                
                              </div>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                     </div>      
                      
                   
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