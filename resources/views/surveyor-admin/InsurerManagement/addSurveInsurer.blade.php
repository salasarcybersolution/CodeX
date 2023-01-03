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
               <div class="col-lg-10 mx-auto">
                
                            @if (count($errors) > 0)   
                            @foreach ($errors->all() as $error)
                            @endforeach
                            @endif
                            
                   <form class="needs-validation" novalidate class="add-new-record pt-0 row g-2" id="form-add-new-record" action="{{url('surveyor/addSuveyorInsurer')}}" method="POST">
                  {{ csrf_field() }}
              
                <div class="row g-3">
                      <div class="col-md-6">
                        <label for="insurer" class="form-label">Insurer Name</label>
                        <select class="form-select" data-allow-clear="true" name="insurer" id="insurerName" required>
                          <option value="">Select</option>                               
                          @foreach ($insurer_list as $row)
                        <option value="{{ $row->insurer_master_id }}">{{ $row->insurer_name }}</option>
                          @endforeach
                        </select>
                        <div class="invalid-feedback"> Please Select Insurer Name. </div>
                        @error('insurer')
                        <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="insurer" class="form-label">Branch</label>
                        <select class=" form-select" data-allow-clear="true" name="insurer_branch_id" id="insurerBranch" required>
                          <option value="">Select</option>
                            @foreach($branch_list as $row) 
                          <option value="{{ $row->branch_id }}">{{ $row->branch_name }}</option>
                          @endforeach
                        </select>
                        <div class="invalid-feedback"> Please Select Branch Name. </div>
                        @error('insurer')
                        <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="bank_account" class="form-label">Bank Account</label>
                        <select class=" form-select" data-allow-clear="true" name="bank_account" id="bank_account" required>
                            <option value="">Select</option>
                         @foreach($BankList as $row) 
                          <option value="{{ $row->id }}">{{ $row->bank_name }} ({{ $row->ac_no }})</option>
                          @endforeach
                        </select>
                        <div class="invalid-feedback"> Please Select Bank Name. </div>
                        @error('insurer')
                        <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="party_code" class="form-label">Party Code</label>
                        <input type="text" class="form-control" id="party_code" name="party_code" value="" placeholder="Enter Party Code" required>
                        <div class="invalid-feedback"> Please Enter Party Code. </div>
                         @error('party_code')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="tat" class="form-label">TAT</label>
                        <input type="text" class="form-control" id="tat" name="tat"  placeholder="Enter TAT" value="" required>
                         <div class="invalid-feedback"> Please Enter TAT. </div>
                          @error('tat')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    
                      <div class="col-md-6">
                        <label for="tds" class="form-label">TDS</label>
                        <input type="text" class="form-control onlyNumericKey" id="tds" name="tds" placeholder="Enter TDS" value="" required>
                         <div class="invalid-feedback"> Please Enter TDS. </div>
                          @error('tds')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                  
                      <input type="hidden" name="serveyor_insurer_id" value="">
                      <div class="col-md-6">
                        <label for="tcs" class="form-label">TCS</label>
                        <input type="text" class="form-control onlyNumericKey" id="tcs" name="tcs" placeholder="Enter TCS" value="" required>
                         <div class="invalid-feedback"> Please Enter TCS. </div>
                          @error('tcs')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                   
                      <div class="col-md-6">
                        <label for="bank" class="form-label onlyNumericKey">Status</label>
                        <select class="form-select" data-allow-clear="true" name="status" id="status">
                          <option value="1">Active</option>
                          <option value="0">InActive</option>  
                        </select>
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
                                  <td>0</td> 
                                  <td>10000</td>
                                  <td><input type="text" name="slab_amount" class="form-control" value="560" style="width:80px;" required=""></td>
                                  <td><div class="finalNewParts_add">
                                      <button type="button" class="btn rounded-pill btn-icon btn-outline-primary addSlav" > <span class="tf-icons bx bx-plus"></span> </button>
                                  </div> </td>
                                </tr>
                              </tbody>
                              </table>
                              <br>
                              <div class="row">

                                <div class="col-md-4 mb-4">
                                  <label for="formula_amount" class="form-label">Formula Amount</label>
                                  <input type="text" class="form-control onlyNumericKey" id="formula_amount" name="formula_amount" placeholder="Formula Amount" value="" required>
                                </div>

                                 <div class="col-md-4 mb-4">
                                  <label for="min_amount" class="form-label">Min Amount</label>
                                  <input type="text" class="form-control onlyNumericKey" id="min_amount" name="min_amount" placeholder="Min Amount" value="" required>
                                </div>

                                 <div class="col-md-4 mb-4">
                                  <label for="percent" class="form-label">Percent</label>
                                  <input type="text" class="form-control onlyNumericKey" id="percent" name="percent" placeholder="Percent" value="" required>
                                </div>

                                <div class="col-md-4 mb-4">
                                  <label for="conveyance" class="form-label">Conveyance</label>
                                  <input type="text" class="form-control onlyNumericKey" id="conveyance" name="conveyance" placeholder="Enter TDS" value="" required>
                                </div>

                                 <div class="col-md-4 mb-4">
                                  <label for="photos_rate" class="form-label">Photo`s Rate</label>
                                  <input type="text" class="form-control onlyNumericKey" id="photos_rate" name="photos_rate" placeholder="Photo`s Rate" value="" required>
                                </div>

                                 <div class="col-md-4 mb-4">
                                  <label for="km_rate" class="form-label">KM Rate</label>
                                  <input type="text" class="form-control onlyNumericKey" id="km_rate" name="km_rate" placeholder="KM Rate" value="" required>
                                </div>
                              </div>

                            </div>
                            <div class="tab-pane fade" id="navs-top-inspection" role="tabpanel">
                              <br>
                              <H5>Spot</H5>
                              <div class="row">

                                <div class="col-md-6 mb-4">
                                  <label for="spot_proof_fee" class="form-label">Prof Fee</label>
                                  <input type="text" class="form-control onlyNumericKey" id="spot_proof_fee" name="spot_proof_fee" placeholder="Prof Fee" value="" required>
                                </div>

                                 <div class="col-md-6 mb-4">
                                  <label for="spot_coveyance" class="form-label">Conveyance</label>
                                  <input type="text" class="form-control onlyNumericKey" id="spot_coveyance" name="spot_coveyance" placeholder="Conveyance" required>
                                </div>
                              </div>
                              <br>
                              <br>
                               <H5>ReInspection</H5>
                              <div class="row">

                                <div class="col-md-6 mb-4">
                                  <label for="reins_prof_fees" class="form-label">Prof Fee</label>
                                  <input type="text" class="form-control onlyNumericKey" id="reins_prof_fees" name="reins_prof_fees" placeholder="Prof Fee" value="" required>
                                </div>

                                 <div class="col-md-6 mb-4">
                                  <label for="reins_conveyance" class="form-label">Conveyance</label>
                                  <input type="text" class="form-control onlyNumericKey" id="reins_conveyance" name="reins_conveyance" placeholder="Conveyance" required>
                                </div>

                                
                              </div>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                     </div>
                    </div>
                  <div class="col-md-12 mx-auto text-end mt-4">
                      <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                </form>
                  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--/ Content -->
@endsection