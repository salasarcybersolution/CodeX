@extends('template_main')
@section('content')
<style type="text/css">
   .form-label{
   float: left !important;
   }
   .mb-3 p{
   float: left !important;
   }
</style>
<style type="text/css">
.form-label{
   float: left !important;
}
.mb-3 p{
   float: left !important;
}

/*.form-control {
    border: 0px;
    border-radius: 0;
    border-bottom: 1px solid #d9dee3;
    padding-left: 0;
}*/

/*.form-control:focus{
   box-shadow: none;
}*/

/*.form-select {
    padding-left: 0;
    border: 0;
    border-bottom: 1px solid #d9dee3;
    border-radius: 0;
}*/

/*input[type=date]::-webkit-datetime-edit {
    color: transparent;
}
input[type=date]:focus::-webkit-datetime-edit {
    color: black !important;
}*/
.field input[type="date"] {
    color: #0000;
}
.field.populated-input input[type="date"], 
.field.focus-active input[type="date"] {
    color: #697a8d;
}


.field {
  position: relative;
}
.field label {
  position: absolute;
  left: 0;
  top: 50%;
  transform: translatey(-50%);
  transition: all 0.2s ease-in-out; 
}

.populated-input label,
.focus-active label {
  top: 0;
  font-size: 0.75em;
}
.populated-input input,
.focus-active input {
  outline: none;
}

.clear-button {
  margin: 1em;
  padding: 0.5em 1em;
  background-color: transparent;
  font-size: 1em;
}
</style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
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
   <?php //print_r($PolicyDetails); ?>
   <div class="authentication-wrapper authentication-cover">
      <div class="authentication-inner row m-0">
         <div class="d-flex col-lg-12 align-items-center authentication-bg p-sm-5 p-3" style="padding: 0px !important;">
            <div class="col-lg-12">
               <!-- Logo -->
               @if(Session::has('msg'))
               <p class="error" style="text-align: center;color: red;">{{ Session::get('msg') }}</p>
               @endif
               <div class="alert alert-danger alert-dismissible" role="alert" id="policyMsg" style="display: none;">
                  Please Put Policy Number
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
               </div>
               <div class="row mb-2">
                  <div class="col-md-6">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1">
                           <li class="breadcrumb-item">
                              <a href="#">Reports</a>
                           </li>
                           <li class="breadcrumb-item active">Spot</li>
                        </ol>
                     </nav>
                  </div>
                  <!-- <div class="col-md-6 text-end">
                     <button type="button" class="btn btn-primary btn-next">Add New</button>
                     </div> -->
               </div>
               
               <div class="card text-center">
                  <div class="card-header">
                     <ul class="nav nav-pills" role="tablist" >
                        <li class="nav-item">
                           <span class="tab-number btn-success">80%</span>
                           <a class="nav-link-tab active" id="policy_tab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-within-card-active" aria-controls="navs-pills-within-card-active" aria-selected="true">Policy & Vehicle</a>
                        </li>
                        <li class="nav-item">
                           <span class="tab-number btn-danger">0%</span>
                           <a class="nav-link-tab" id="survey_tab" href="{{url('SpotReport/survey-report')}}/{{Request::segment(3)}}">Survey</a>
                        </li>
                        <li class="nav-item">
                           <span class="tab-number btn-warning">80%</span>
                           <a class="nav-link-tab" id="damages_tab" href="{{url('SpotReport/damages-report')}}/{{Request::segment(3)}}">Damages</a>
                        </li>
                        <li class="nav-item">
                           <span class="tab-number btn-success">80%</span>
                           <a class="nav-link-tab" id="notes_tab" href="{{url('SpotReport/notes-remark-report')}}/{{Request::segment(3)}}">Notes & Remark</a>
                        </li>
                     </ul>
                  </div>
                  <div class="card-body">
                     <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-pills-within-card-active" role="tabpanel">
                           <form class="needs-validation" novalidate id="registrationFormFinal" action="{{url('SpotReport/addPolicyDetails')}}" method="POST">
                              @csrf
                              <div class="accordion mt-3" id="accordionExample">
                                 <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                       <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
                                       Policy Details <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
                                       </button>
                                    </h2>
                                    <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                       <div class="accordion-body">
                                          <div class="row mt-4" id="list_tab_content_1">
                                             <div class="col-md-12">
                                                <div class="row">
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="reference_no" class="form-label">Reference No.</label>
                                                         <input type="text" class="form-control" id="reference_no" name="reference_no" value="@if(isset($PolicyDetails->reference_no)) {{$PolicyDetails->reference_no}} @endif" required>
                                                         <div class="invalid-feedback"> Please type policy details. </div>
                                                      </div>
                                                   </div>
                                                    <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="policy" class="form-label">Policy:</label>
                                                         <input type="text" class="form-control" id="policy" name="policy" value="@if(isset($PolicyDetails->policy)) {{$PolicyDetails->policy}} @endif" required>
                                                         <div class="invalid-feedback"> Please type policy details. </div>
                                                      </div>
                                                   </div>
                                                   <!-- <div class="col-md-12 col-lg-1 track_btn">
                                                      <div class="mb-1">
                                                         <button id="Fetch" onclick="fatchpolicy()" class="btn btn-primary">Track</button>
                                                      </div>
                                                   </div> -->
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="idv_1" class="form-label">I. D. V 1 :</label>
                                                         <input type="number" class="form-control" id="idv_1" name="idv_1" value="<?php if (isset($PolicyDetails->idv_1)) echo $PolicyDetails->idv_1 ?>">
                                                         <div class="invalid-feedback"> Please policy details. </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="idv_2" class="form-label">I. D. V 2 :</label>
                                                         <input type="number" class="form-control" id="idv_2" name="idv_2" value="<?php if (isset($PolicyDetails->idv_2)) echo $PolicyDetails->idv_2 ?>">
                                                         <p class="error" id="err_idv"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="policy_type" class="form-label">Type:</label>
                                                         <select id="policy_type" class="form-select" name="policy_type">
                                                            <!-- <option value=""></option> -->
                                                            <option value="Regular" <?php if (isset($PolicyDetails->policy_type) && $PolicyDetails->policy_type == "Regular") echo 'selected'; ?>>Regular</option>
                                                            <option value="Add on policy" <?php if (isset($PolicyDetails->policy_type) && $PolicyDetails->policy_type == "Add on policy") echo 'selected'; ?>>Add on policy</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="insurance_from_date" class="form-label">Insurance from:</label>
                                                         <input type="date" class="form-control" id="insurance_from_date" name="insurance_from_date" value="<?php  if (isset($PolicyDetails->insurance_from_date)) echo $PolicyDetails->insurance_from_date?>">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="insurance_to_date" class="form-label">To:</label>
                                                         <input type="date" class="form-control" id="insurance_to_date" name="insurance_to_date" value="<?php  if (isset($PolicyDetails->insurance_to_date)) echo $PolicyDetails->insurance_to_date?>">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="insurer_id" class="form-label">Insurers:</label>
                                                         <select id="insurer_id" class="form-select" name="insurer_id" onchange="surveyorInsurerBranchSpot(this)">
                                                            <?php 
                                                               if (isset($PolicyDetails->report_id)) { ?>
                                                            <option value=""></option>
                                                            <?php foreach ($insurers as $row) { ?>
                                                            <option value="{{ $row->insurer_id }}"{{ ( $row->insurer_id == $row->insurer_id) ? 'selected' : '' }}>{{ $row->insurer }}</option>
                                                            <?php  } ?>
                                                            <?php  }else{  ?>
                                                            <option value=""></option>
                                                            <?php   foreach ($insurers as $row) { ?>
                                                            <option value="{{ $row->insurer_id }}">{{ $row->insurer }}</option>
                                                            <?php } ?>
                                                            <?php } ?>
                                                            ?>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="appointing_office" class="form-label">Appointing office:</label>
                                                         <input type="text" class="form-select" id="appointing_office" name="appointing_office" value="@if(isset($PolicyDetails->appointing_office)) {{$PolicyDetails->appointing_office}} @endif">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="appointed_officer" class="form-label">Appointed by/ officer:</label>
                                                         <input type="text" class="form-control" id="appointed_officer" name="appointed_officer" value="@if(isset($PolicyDetails->appointed_officer)) {{$PolicyDetails->appointed_officer}} @endif">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="insured" class="form-label">Insured:</label>
                                                         <input type="text" class="form-control" id="insured" name="insured" value="@if(isset($PolicyDetails->insured)) {{$PolicyDetails->insured}} @endif">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="insurer_branch_id" class="form-label">Insurer Branch:</label>
                                                         <select id="insurer_branch_id" class="form-select" name="insurer_branch_id">
                                                            <!-- <option value=""></option> -->
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="address" class="form-label">Address:</label>    
                                                         <input type="text" class="form-control" id="address" name="address" value="@if(isset($PolicyDetails->address)) {{$PolicyDetails->address}} @endif">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="hpa" class="form-label">H.P.A:</label>
                                                         <input type="text" class="form-control" id="hpa" name="hpa" value="@if(isset($PolicyDetails->hpa)) {{$PolicyDetails->hpa}} @endif">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="claim" class="form-label">Claim #:</label>    
                                                         <input type="text" class="form-control" id="claim" name="claim" value="@if(isset($PolicyDetails->claim)) {{$PolicyDetails->claim}} @endif">
                                                      </div>
                                                   </div>

                                                   <div class="row">
                                                     <div class="col-md-12 col-lg-3">
                                                        <div class="mb-3">
                                                           <div class="form-check">
                                                              <input class="form-check-input" name="PrivousPolicy" type="checkbox" id="PrivousPolicy">
                                                              <label class="form-label form-check-label" for="PrivousPolicy"> Privous Policy</label>
                                                           </div>
                                                        </div>
                                                     </div>
                                                   </div>
                                                   <div class="row" id="PrivousPolicy_div" style="display:none;">
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="privous_policy_insurer" class="form-label">Ins. Co. Name:</label>
                                                         <select id="privous_policy_insurer" class="form-select" name="privous_policy_insurer">
                                                            <?php 
                                                               if (isset($PolicyDetails->privous_policy_insurer)) { ?>
                                                            <option value=""></option>
                                                            <?php foreach ($insurers as $row) { ?>
                                                            <option value="{{ $row->insurer_id }}"{{ ( $row->insurer_id == $row->privous_policy_insurers) ? 'selected' : '' }}>{{ $row->insurer }}</option>
                                                            <?php  } ?>
                                                            <?php  }else{  ?>
                                                            <option value=""></option>
                                                            <?php   foreach ($insurers as $row) { ?>
                                                            <option value="{{ $row->insurer_id }}">{{ $row->insurer }}</option>
                                                            <?php } ?>
                                                            <?php } ?>
                                                            ?>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="privous_policy_from_date" class="form-label">Policy Period from:</label>
                                                         <input type="date" class="form-control" id="privous_policy_from_date"  name="privous_policy_from_date" value="@if(isset($PolicyDetails->privous_policy_from_date)) {{$PolicyDetails->privous_policy_from_date}} @endif">
                                                         <p class="error" id="privous_policy_from_date"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="privous_policy_to_date" class="form-label">To:</label>
                                                         <input type="date" class="form-control" id="privous_policy_to_date"  name="privous_policy_to_date" value="@if(isset($PolicyDetails->privous_policy_to_date)) {{$PolicyDetails->privous_policy_to_date}} @endif">
                                                         <p class="error" id="privous_policy_to_date"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="privous_policy_no" class="form-label">Policy No.:</label>
                                                         <input type="text" class="form-control" id="privous_policy_no"  name="privous_policy_no" value="@if(isset($PolicyDetails->privous_policy_no)) {{$PolicyDetails->privous_policy_no}} @endif">
                                                         <p class="error" id="privous_policy_no"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="no_claim_bonus" class="form-label">No Cliam Bonus (NCB)</label>
                                                         <input type="text" class="form-control" id="no_claim_bonus"  name="no_claim_bonus" value="@if(isset($PolicyDetails->no_claim_bonus)) {{$PolicyDetails->no_claim_bonus}} @endif">
                                                         <p class="error" id="no_claim_bonus"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="compliance_of_64VB" class="form-label">Compliance of 64VB:</label>
                                                         <input type="text" class="form-control" id="compliance_of_64VB"  name="compliance_of_64VB" value="@if(isset($PolicyDetails->compliance_of_64VB)) {{$PolicyDetails->compliance_of_64VB}} @endif">
                                                         <p class="error" id="compliance_of_64VB"></p>
                                                      </div>
                                                   </div>
                                                   </div>


                                                   <div class="row">
                                                     <div class="col-md-12 col-lg-3">
                                                        <div class="mb-3">
                                                           <div class="form-check">
                                                              <input class="form-check-input" name="ThirdpartyPolicy" type="checkbox" id="ThirdpartyPolicy">
                                                              <label class="form-label form-check-label" for="ThirdpartyPolicy"> Third party Policy</label>
                                                           </div>
                                                        </div>
                                                     </div>
                                                   </div>
                                                   <div class="row" id="ThirdpartyPolicy_div" style="display:none;">
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="third_party_policy_insurer" class="form-label">Ins. Co. Name:</label>
                                                         <select id="third_party_policy_insurer" class="form-select" name="third_party_policy_insurer" >
                                                            <?php 
                                                                if (isset($PolicyDetails->third_party_policy_insurer)) { ?>
                                                            <option value=""></option>
                                                            <?php foreach ($insurers as $row) { ?>
                                                            <option value="{{ $row->insurer_id }}"{{ ( $row->insurer_id == $row->third_party_policy_insurer) ? 'selected' : '' }}>{{ $row->insurer }}</option>
                                                            <?php  } ?>
                                                            <?php  }else{  ?>
                                                            <option value=""></option>
                                                            <?php   foreach ($insurers as $row) { ?>
                                                            <option value="{{ $row->insurer_id }}">{{ $row->insurer }}</option>
                                                            <?php } ?>
                                                            <?php } ?>
                                                            ?>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="third_party_from_date" class="form-label">Policy Period from:</label>
                                                         <input type="date" class="form-control" id="third_party_from_date"  name="third_party_from_date" value="@if(isset($PolicyDetails->third_party_from_date)) {{$PolicyDetails->third_party_from_date}} @endif">
                                                         <p class="error" id="err_fitness_from_date"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="third_party_to_date" class="form-label">To:</label>
                                                         <input type="date" class="form-control" id="third_party_to_date"  name="third_party_to_date" value="@if(isset($PolicyDetails->third_party_to_date)) {{$PolicyDetails->third_party_to_date}} @endif">
                                                         <p class="error" id="err_fitness_to_date"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="third_party_policy_no" class="form-label">Policy No.:</label>
                                                         <input type="text" class="form-control" id="third_party_policy_no"  name="third_party_policy_no" value="@if(isset($PolicyDetails->third_party_policy_no)) {{$PolicyDetails->third_party_policy_no}} @endif">
                                                         <p class="error" id="err_parmit_issued"></p>
                                                      </div>
                                                   </div>
                                                  </div>
                                                   <!-- Buttons -->
                                                   <!-- <div class="row mt-5 p-0">
                                                      <div class="col-md-12 col-lg-6"> 
                                                         <input type="hidden" id="report_id" value="@if(isset($PolicyDetails->report_id)) {{$PolicyDetails->report_id}} @endif" name="report_id">
                                                      </div>
                                                      <div class="col-md-12 col-lg-6 p-0" style="text-align: right;">
                                                         <button class="btn btn-label-secondary btn-prev" disabled=""> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span>  </button>
                                                         <button type="button" class="btn btn-primary btn-next" onclick="saveSpotPolicyDetails()">
                                                           
                                                            <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                                         </button>
                                                      </div>
                                                   </div> -->
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                       <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                                       Vehicle Details <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
                                       </button>
                                    </h2>
                                    <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                       <div class="accordion-body">
                                          <div class="col-md-12">
                                             <div class="row">
                                                <div class="row">
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="master_vehicle_id" class="form-label">Vehicle:</label>
                                                         <select id="master_vehicle_id" class="form-select" name="master_vehicle_id" onchange="vehicleData(this)">
                                                            <option value=""></option>
                                                            @foreach($vehicles as $row) 
                                                            <option value="{{ $row->id }}">{{ $row->vehicle_name }}</option>
                                                            @endforeach 
                                                         </select>
                                                         <p class="error" id="err_vehicle"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="registration_no" class="form-label">Registration #:</label>
                                                         <input type="text" class="form-control" id="registration_no" name="registration_no" value="<?php if (isset($vehicleDetails->registration_no)) echo $vehicleDetails->registration_no ?>">
                                                         <p class="error" id="err_vehicle_registration"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="registered_owner" class="form-label">Registered Owner:</label>
                                                         <input type="text" class="form-control" id="registered_owner"  name="registered_owner" value="<?php if (isset($vehicleDetails->registered_owner)) echo $vehicleDetails->registered_owner ?>">
                                                         <p class="error" id="err_registered_owner"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="owner_sr_trs" class="form-label">Owner Sr/Trs Dt:</label>
                                                         <input type="text" class="form-control" id="owner_sr_trs" name="owner_sr_trs" value="<?php if (isset($vehicleDetails->owner_sr_trs)) echo $vehicleDetails->owner_sr_trs ?>">
                                                         <p class="error" id="err_owner_sr_trs"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="date_of" class="form-label">Date of:</label>
                                                         <select id="date_of" class="form-select" name="date_of">
                                                            <option value=""></option>
                                                            <?php  if (isset($vehicleDetails->date_of)) { ?>
                                                            <option value="{{ $vehicleDetails->date_of }}"{{ ( $vehicleDetails->date_of == $vehicleDetails->date_of) ? 'selected' : '' }}>{{ $vehicleDetails->date_of }}</option>
                                                            <?php }else{ ?>
                                                            <option value="registration">Registration</option>
                                                            <?php }  ?>
                                                            <option value="purches">Purches</option>
                                                         </select>
                                                         <p class="error" id="err_date_of_registration"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="date_of_date" class="form-label">Date:</label>
                                                         <input type="date" class="form-control" id="date_of_date" name="date_of_date" value="<?php  if (isset($vehicleDetails->date_of_date)) echo $vehicleDetails->date_of_date ?>">
                                                         <p class="error" id="err_date_of_date"></p>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-12 col-lg-2">
                                                         <div class="mb-3 field">
                                                            <label for="chassis" class="form-label">Chassis:</label>
                                                            <input type="text" class="form-control" id="chassis" name="chassis"   value="<?php  if (!empty($vehicleDetails->chassis)) echo $vehicleDetails->chassis; ?>">
                                                            <p class="error" id="err_chassis"></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-12 col-lg-2" style="margin-top: 10px;">
                                                         <div class="mb-3">
                                                                                                                        
                                                               <input class="form-check-input" name="chassis_phy_checked" type="checkbox" value="1" id="chassis_phy_checked" checked="">
                                                              <label class="form-label" for="chassis_phy_checked"> Phy Checked:</label> 
                                                               <p class="error" id="err_chassis_phy_checked"></p>
                                                            
                                                         </div>
                                                      </div>
                                                      <div class="col-md-12 col-lg-2">
                                                         <div class="mb-3 field">
                                                            <label for="engine" class="form-label">Engine:</label>
                                                            <input type="text" class="form-control" id="engine" name="engine"  value="<?php  if (!empty($vehicleDetails->engine)) echo $vehicleDetails->engine; ?>" >
                                                            <p class="error" id="err_engine"></p>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-12 col-lg-2" style="margin-top: 10px;">
                                                         <div class="mb-3">
                                                                                                                    
                                                               <input class="form-check-input" name="engine_phy_checked" type="checkbox" value="1" id="engine_phy_checked" checked="">
                                                               <label class="form-label" for="engine_phy_checked"> Phy Checked:</label>
                                                               
                                                               <p class="error" id="err_engine_phy_checked"></p>
                                                            
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="make_variant_mod" class="form-label">Make/Variant/Mod:</label>
                                                         <input type="text" class="form-control" id="make_variant_mod" name="make_variant_mod"  value="<?php  if (!empty($vehicleDetails->make_variant_mod)) echo $vehicleDetails->make_variant_mod; ?>">
                                                         <p class="error" id="err_make_variant_mod"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="fuel_used" class="form-label">Fuel Used:</label>
                                                         <input type="text" class="form-control" id="fuel_used" name="fuel_used" value="<?php  if (!empty($vehicleDetails->fuel_used)) echo $vehicleDetails->fuel_used; ?>">
                                                         <p class="error" id="err_fuel_used"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="type_fo_body" class="form-label">Type of Body:</label>
                                                         <input type="text" class="form-control" id="type_fo_body" name="type_fo_body" value="<?php  if (!empty($vehicleDetails->type_fo_body)) echo $vehicleDetails->type_fo_body; ?>">
                                                         <p class="error" id="err_type_fo_body"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="color" class="form-label">Color:</label>
                                                         <input type="text" class="form-control" id="color" value="<?php if (!empty($vehicleDetails->color)) echo $vehicleDetails->color ?>" name="color">
                                                         <p class="error" id="err_color"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="odometer_reading" class="form-label">Odometer Reading:</label>
                                                         <input type="text" class="form-control" value="<?php if (!empty($vehicleDetails->odometer_reading)) echo $vehicleDetails->odometer_reading ?>" id="odometer_reading" name="odometer_reading">
                                                         <p class="error" id="err_odometer_reading"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="accident_condition" class="form-label">Pre accident condition:</label>
                                                         <input type="text" class="form-control" id="accident_condition" name="accident_condition" value="<?php if (!empty($vehicleDetails->accident_condition)) echo $vehicleDetails->accident_condition ?>">
                                                         <p class="error" id="err_accident_condition"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="cubic_capacity" class="form-label">Cubic Capacity:</label>
                                                         <input type="text" class="form-control" id="cubic_capacity" name="cubic_capacity" value="<?php if (!empty($vehicleDetails->cubic_capacity)) echo $vehicleDetails->cubic_capacity ?>">
                                                         <p class="error" id="err_cubic_capacity"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="engine_cubic_capacity" class="form-label">Engine Capacity:</label>
                                                         <select id="engine_cubic_capacity" class="form-select" name="engine_cubic_capacity">
                                                            <option value=""></option>
                                                            <option value="cc">CC</option>
                                                            <option value="horse-power">Horse Power</option>
                                                         </select>
                                                         <p class="error" id="err_engine_cubic_capacity"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="puc_details" class="form-label">Puc Details:</label>
                                                         <input type="text" class="form-control" value="<?php if (!empty($vehicleDetails->puc_details)) echo $vehicleDetails->puc_details ?>" id="puc_details" name="puc_details">
                                                         <p class="error" id="err_puc_details"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="puc_upto_date" class="form-label">Upto Date:</label>
                                                         <input type="date" class="form-control" value="<?php if (!empty($vehicleDetails->puc_upto_date)) echo $vehicleDetails->puc_upto_date ?>" id="puc_upto_date" name="puc_upto_date">
                                                         <p class="error" id="err_puc_upto_date"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="reg_laden_wt" class="form-label">Reg Laden Wt.(Kgs):</label>
                                                         <input type="text" class="form-control" id="reg_laden_wt" name="reg_laden_wt" value="<?php if (!empty($vehicleDetails->reg_laden_wt)) echo $vehicleDetails->reg_laden_wt ?>">
                                                         <p class="error" id="err_reg_laden_wt"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="remark_rlw" class="form-label">Remark (if RLW N.A.):</label>
                                                         <input type="text" class="form-control"  value="<?php if (!empty($vehicleDetails->remark_rlw)) echo $vehicleDetails->remark_rlw ?>" id="remark_rlw" name="remark_rlw">
                                                         <p class="error" id="err_remark_rlw"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="unladen_wt" class="form-label">Unladen Wt.(Kgs):</label>
                                                         <input type="text" class="form-control" id="unladen_wt" name="unladen_wt">
                                                         <p class="error" id="err_unladen_wt"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="remark_ulw" class="form-label">Remark (if ULW N.A.):</label>
                                                         <input type="text" class="form-control" value="<?php if (!empty($vehicleDetails->remark_ulw)) echo $vehicleDetails->remark_ulw ?>" id="remark_ulw" id="remark_ulw" name="remark_ulw">
                                                         <p class="error" id="err_remark_ulw"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="seating_capacity" class="form-label">Seating Capacity:</label>
                                                         <input type="text" class="form-control" id="seating_capacity" name="seating_capacity" value="<?php if (!empty($vehicleDetails->seating_capacity)) echo $vehicleDetails->seating_capacity ?>">
                                                         <p class="error" id="err_seating_capacity"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="class_of_vehicle" class="form-label">Class Of Vehicle:</label>
                                                         <input type="text" class="form-control" id="class_of_vehicle" name="class_of_vehicle" value="<?php if (!empty($vehicleDetails->class_of_vehicle)) echo $vehicleDetails->class_of_vehicle ?>">
                                                         <p class="error" id="err_class_of_vehicle"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="tax_particulars" class="form-label">Tex Particulars:</label>
                                                         <input type="text" class="form-control" id="tax_particulars" name="tax_particulars" value="<?php if (!empty($vehicleDetails->tax_particulars)) echo $vehicleDetails->tax_particulars ?>">
                                                         <p class="error" id="err_tax_particulars"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="vehicle_remark" class="form-label">Remark:</label>
                                                         <input type="text" class="form-control" value="<?php if (!empty($vehicleDetails->vehicle_remark)) echo $vehicleDetails->vehicle_remark ?>" id="vehicle_remark" name="vehicle_remark">
                                                         <p class="error" id="err_vehicle_remark"></p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-12 col-lg-3">
                                                      <div class="mb-3">
                                                         <div class="form-check">
                                                            <input class="form-check-input" name="commercialVehicle" type="checkbox" id="commercialVehicle">
                                                            <label class="form-label form-check-label" for="commercialVehicle"> Commercial Vehicle Details</label>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row" id="commercialVehicle_div" style="display:none;">
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="com_fitness_certificate" class="form-label">Fitness Certificate #:</label>
                                                         <input type="text" class="form-control" id="com_fitness_certificate" name="com_fitness_certificate" value="<?php if (!empty($vehicleDetails->com_fitness_certificate)) echo $vehicleDetails->com_fitness_certificate ?>">
                                                         <p class="error" id="err_fitness_certificate"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="com_fitness_from_date" class="form-label">Fitness From:</label>
                                                         <input type="date" class="form-control" id="com_fitness_from_date"  name="com_fitness_from_date" value="<?php if (!empty($vehicleDetails->com_fitness_from_date)) echo $vehicleDetails->com_fitness_from_date ?>">
                                                         <p class="error" id="err_fitness_from_date"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="com_fitness_to_date" class="form-label">To:</label>
                                                         <input type="date" class="form-control" id="com_fitness_to_date"  name="com_fitness_to_date" value="<?php if (!empty($vehicleDetails->com_fitness_to_date)) echo $vehicleDetails->com_fitness_to_date ?>">
                                                         <p class="error" id="err_fitness_to_date"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="parmit_issued" class="form-label">Permit #/ issued by:</label>
                                                         <input type="text" class="form-control" id="com_parmit_issued"  name="com_parmit_issued" value="<?php if (!empty($vehicleDetails->com_parmit_issued)) echo $vehicleDetails->com_parmit_issued ?>">
                                                         <p class="error" id="err_parmit_issued"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="com_parmit_from_date" class="form-label">Parmit From:</label>
                                                         <input type="date" class="form-control" id="com_parmit_from_date"  name="com_parmit_from_date" value="<?php if (!empty($vehicleDetails->com_parmit_from_date)) echo $vehicleDetails->com_parmit_from_date ?>">
                                                         <p class="error" id="err_parmit_from_date"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="com_parmit_to_date" class="form-label">Parmit To:</label>
                                                         <input type="date" class="form-control" id="com_parmit_to_date"  name="com_parmit_to_date" value="<?php if (!empty($vehicleDetails->com_parmit_to_date)) echo $vehicleDetails->com_parmit_to_date ?>">
                                                         <p class="error" id="err_parmit_to_date"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="com_type_of_parmit" class="form-label">Type of Parmit:</label>
                                                         <input type="text" class="form-control" id="com_type_of_parmit"  name="com_type_of_parmit" value="<?php if (!empty($vehicleDetails->com_type_of_parmit)) echo $vehicleDetails->com_type_of_parmit ?>">
                                                         <p class="error" id="err_type_of_parmit"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="com_authorization_validity" class="form-label">Authorization  #/validity:</label>
                                                         <input type="text" class="form-control" id="com_authorization_validity"  name="com_authorization_validity" value="<?php if (!empty($vehicleDetails->com_authorization_validity)) echo $vehicleDetails->com_authorization_validity ?>">
                                                         <p class="error" id="err_authorization_validity"></p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12 col-lg-4">
                                                      <div class="mb-3 field">
                                                         <label for="com_area_of_opration" class="form-label">Rout/Area of Opration:</label>
                                                         <input type="text" class="form-control" id="com_area_of_opration"  name="com_area_of_opration" value="<?php if (!empty($vehicleDetails->com_area_of_opration)) echo $vehicleDetails->com_area_of_opration ?>">
                                                         <p class="error" id="err_area_of_opration"></p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <!-- <div class="row mt-5">
                                                   <div class="col-md-12 col-lg-6"> 
                                                      <input type="hidden" id="report_vehicle_id" name="report_vehicle_id">
                                                   </div>
                                                   <div class="col-md-12 col-lg-6" style="text-align: right;"> 
                                                      <button type="button" class="btn btn-primary btn-prev" onclick="registrationProcessBack('2')"> 
                                                      <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
                                                      </button>
                                                      <button type="button" class="btn btn-primary btn-next"  onclick="saveSpotVehicleDetails()"> 
                                                      <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                                      </button>
                                                   </div>
                                                </div> -->
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                       <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                                       Driver & License Details <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
                                       </button>
                                    </h2>
                                    <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                                       <div class="accordion-body">
                                          <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <div class="row gap-md-0 gap-3 mb-4">
                                                   </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                   <div class="mb-3 field">
                                                      <label for="driving_licence" class="form-label">Driving LIC #:</label>
                                                      <input type="text" class="form-control" id="driving_licence" name="driving_licence" value="<?php if (!empty($driverDetails->driving_licence)) echo $driverDetails->driving_licence ?>">
                                                      <p class="error" id="err_driving_licence"></p>
                                                   </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                   <div class="mb-3 field">
                                                      <label for="driver_name" class="form-label">Driver Name:</label>
                                                      <input type="text" class="form-control" id="driver_name"  name="driver_name" value="<?php if (!empty($driverDetails->driver_name)) echo $driverDetails->driver_name ?>">
                                                      <p class="error" id="err_driver_name"></p>
                                                   </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                   <div class="mb-3 field">
                                                      <label for="date_of_birth" class="form-label">Date of Birth:</label>
                                                      <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php if (!empty($driverDetails->date_of_birth)) echo $driverDetails->date_of_birth ?>">
                                                      <p class="error" id="err_driver_dob"></p>
                                                   </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                   <div class="mb-3 field">
                                                      <label for="issue_date" class="form-label">Issue Date:</label>
                                                      <input type="date" class="form-control" id="issue_date"  name="issue_date" value="<?php if (!empty($driverDetails->issue_date)) echo $driverDetails->issue_date ?>">
                                                      <p class="error" id="err_issue_date"></p>
                                                   </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                   <div class="mb-3 field">
                                                      <label for="valid_from" class="form-label">valid From:</label>
                                                      <input type="date" class="form-control" id="valid_from"  name="valid_from" value="<?php if (!empty($driverDetails->valid_from)) echo $driverDetails->valid_from ?>">
                                                      <p class="error" id="err_valid_date"></p>
                                                   </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                   <div class="mb-3 field">
                                                      <label for="valid_to" class="form-label">valid To:</label>
                                                      <input type="date" class="form-control" id="valid_to"  name="valid_to" value="<?php if (!empty($driverDetails->valid_to)) echo $driverDetails->valid_to ?>">
                                                      <p class="error" id="err_valid_to"></p>
                                                   </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                   <div class="mb-3 field">
                                                      <label for="issuing_authority" class="form-label">Issuing Authority:</label>
                                                      <input type="text" class="form-control" id="issuing_authority"  name="issuing_authority" value="<?php if (!empty($driverDetails->issuing_authority)) echo $driverDetails->issuing_authority ?>">
                                                      <p class="error" id="err_issuing_authority"></p>
                                                   </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                   <div class="mb-3 field">
                                                      <label for="licence_type" class="form-label">Licence Type:</label>
                                                      <select name="licence_type" class="form-control" id="licence_type">
                                                         <?php  if (!empty($driverDetails->licence_type)) { ?>
                                                         <option value="{{ $driverDetails->licence_type }}"{{ ( $driverDetails->licence_type == $driverDetails->licence_type) ? 'selected' : '' }}>{{ $driverDetails->licence_type }}</option>
                                                         <?php } ?>
                                                         <option value=""></option>
                                                         <option value="LMV-TT">LMV-TT</option>
                                                         <option value="LMV-NT">LMV-NT</option>
                                                         <option value="HVT">HVT</option>
                                                         <option value="MCWGR">MCWGR</option>
                                                         <option value="MCWGR">TRANS</option>
                                                      </select>
                                                      <p class="error" id="err_licence_type"></p>
                                                   </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                   <div class="mb-3 field">
                                                      <label for="badge" class="form-label">Badge:</label>
                                                      <input type="text" class="form-control" value="<?php if (!empty($driverDetails->badge)) echo $driverDetails->badge ?>" id="badge"  name="badge">
                                                      <p class="error" id="err_badge"></p>
                                                   </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                   <div class="mb-3 field">
                                                      <label for="driver_remark" class="form-label">Remark:</label>
                                                      <input type="text" class="form-control" value="<?php if (!empty($driverDetails->driver_remark)) echo $driverDetails->driver_remark ?>" id="driver_remark"  name="driver_remark">
                                                      <p class="error" id="err_driver_remark"></p>
                                                   </div>
                                                </div>
                                             </div>
                                             
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-5">
                                                <div class="col-md-12 col-lg-6"> 
                                                   <input type="hidden" id="report_id" name="report_id" value="{{Request::segment(3)}}">
                                                </div>
                                                <div class="col-md-12 col-lg-6" style="text-align: right;" > 
                                                   <button type="submit" class="btn btn-primary btn-next" id="next_3"> 
                                                   <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                                   </button>
                                                   <button type="button" class="btn btn-primary" id="waiteAdminButtons" style="display: none;"><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
                                                   <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
                                                </div>
                                             </div>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
