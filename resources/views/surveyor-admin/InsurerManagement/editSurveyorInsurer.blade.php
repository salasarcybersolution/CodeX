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
                           <li class="breadcrumb-item active">update</li>
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
                            
                   <form class="needs-validation" novalidate class="add-new-record pt-0 row g-2" id="form-add-new-record" action="{{url('surveyor/serveyorInsurerUpdate')}}" method="POST">
                  {{ csrf_field() }}
              <?php// print_r($insureSurveyor); ?>
                <div class="row g-3">
                      <div class="col-md-6">
                        <label for="insurer" class="form-label">Insurer Name</label>
                        <select class="form-select" data-allow-clear="true" name="insurer" onchange="insurerBranch(this)" required>
                          <option value="">Select</option>                               
                          @foreach ($insurer_list as $row)
                        <option value="{{ $row->id }}"{{ ( $row->id == $insureSurveyor->insurer_id) ? 'selected' : '' }}>{{ $row->insurer }}</option>
                          @endforeach
                        </select>
                        <div class="invalid-feedback"> Please Select Insurer Name. </div>
                        @error('insurer')
                        <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="insurer" class="form-label">Branch</label>
                        <select class=" form-select" data-allow-clear="true" name="insurer_branch_id" id="insurer_branch" required>
                          <option value="">Select</option>
                            @foreach($branch_list as $row) 
                          <option value="{{ $row->branch_id }}"{{ ( $row->branch_id == $insureSurveyor->insurer_id) ? 'selected' : '' }}>{{ $row->branch_name }}</option>
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
                          <option value="{{ $row->id }}"{{ ( $row->id == $insureSurveyor->insurer_id) ? 'selected' : '' }}>{{ $row->bank_name }} ({{ $row->ac_no }})</option>
                          @endforeach
                        </select>
                        <div class="invalid-feedback"> Please Select Bank Name. </div>
                        @error('insurer')
                        <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="party_code" class="form-label">Party Code</label>
                        <input type="text" class="form-control" id="party_code" name="party_code" value="{{$insureSurveyor->party_code}}" placeholder="Enter Party Code" required>
                        <div class="invalid-feedback"> Please Enter Party Code. </div>
                         @error('party_code')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="tat" class="form-label">TAT</label>
                        <input type="text" class="form-control" id="tat" name="tat"  placeholder="Enter TAT" value="{{$insureSurveyor->tat}}" required>
                         <div class="invalid-feedback"> Please Enter TAT. </div>
                          @error('tat')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    
                      <div class="col-md-6">
                        <label for="tds" class="form-label">TDS</label>
                        <input type="text" class="form-control" id="tds" name="tds" placeholder="Enter TDS" value="{{$insureSurveyor->tds}}" required>
                         <div class="invalid-feedback"> Please Enter TDS. </div>
                          @error('tds')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                  
                      <input type="hidden" name="serveyor_insurer_id" value="{{$insureSurveyor->id}}">
                      <div class="col-md-6">
                        <label for="tcs" class="form-label">TCS</label>
                        <input type="text" class="form-control" id="tcs" name="tcs" placeholder="Enter TCS" value="{{$insureSurveyor->tcs}}" required>
                         <div class="invalid-feedback"> Please Enter TCS. </div>
                          @error('tcs')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                   
                      <div class="col-md-6">
                        <label for="bank" class="form-label">Status</label>
                        <select class="form-select" data-allow-clear="true" name="status" id="status">
                          <option value="1">Active</option>
                          <option value="0">InActive</option>  
                        </select>
                      </div>
                    </div>
                      
                     <?php $rowAm12  = '' ?>
                      @foreach($rowamontData  as $rowAm12) <?php // echo "<pre>"; print_r($rowAm12->id);  ?>
                    <div class="row">
                     <div class="col-md-10 dynamic-field" id="dynamic-field-1">
                       <input type="hidden" name="amountSurveyorID[]" value="{{$rowAm12->id}}">
                        <div class="row" >
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="field" class="hidden-md">From</label>
                                 <input type="text" id="field" class="form-control" name="from[]" value="{{$rowAm12->from}}" placeholder="Enter From" required>
                                  <div class="invalid-feedback"> Please Enter From. </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>To</label>
                                 <input type="text" class="form-control" name="to[]" placeholder="Enter To" value="{{$rowAm12->to}}" required>
                                  <div class="invalid-feedback"> Please Enter TO. </div>
                              </div>
                           </div>

                             <div class="col-md-4">
                              <div class="form-group">
                                 <label>Amount</label>
                                 <input type="text" class="form-control" name="amount[]" placeholder="Enter Amount" value="{{$rowAm12->amount}}" required>
                                  <div class="invalid-feedback"> Please Enter Amount. </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach 
                         <?php  if ($rowAm12 != '')  { ?>   
                        <div class="col-md-2 mt-30 append-buttons">
                          <div class="clearfix">
                           <button type="button" class="btn rounded-pill btn-icon btn-outline-primary" id="add-button" ><i class="tf-icons bx bx-plus"></i>
                           </button>
                           <br>
                         <button type="button" class="btn rounded-pill btn-icon btn-outline-primary" id="remove-button" disabled="disabled"><i class="tf-icons bx bx-minus"></i>
                           </button>
                        </div>

                     </div>
                    <?php  }   ?>
                  </div>
                  
                    <div class="col-md-8 mx-auto text-end mt-4">
                      <button type="submit" class="btn btn-primary">Update</button>
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