@extends('template_main')
@section('content')
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
		<!-- <h4 class="fw-bold py-3 mb-4">
		<span class="text-muted fw-light"> </span> 
	      <div style="float: right;margin-top: -10px;">
	      	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BankModal">Add New Record</button>
	      </div> 
	    </h4> -->
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

	    <div class="authentication-wrapper authentication-cover">
	    	<div class="authentication-inner row m-0">
	    		<div class="d-flex col-lg-12 align-items-center authentication-bg p-0">
	    			<div class="col-lg-12">
	    				<!-- Logo -->
	    				@if(Session::has('msg'))
	    				<p class="error" style="text-align: center;color: red;">{{ Session::get('msg') }}</p>
	    				@endif

	    				<div class="row mb-2">
	    					<div class="col-md-6">
	    						<nav aria-label="breadcrumb">
							      <ol class="breadcrumb breadcrumb-style1">
							        <li class="breadcrumb-item">
							          <a href="#">Reports</a>
							        </li>
							        <li class="breadcrumb-item active">Final</li>
							      </ol>
							    </nav>		
	    					</div>
	    					<div class="col-md-6 text-end">
	    						<button type="button" class="btn btn-primary btn-next">Add New</button>
	    					</div>
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
										<a class="nav-link-tab" id="survey_tab_ID" href="{{url('final/survey-report')}}">Survey</a></li>
									<li class="nav-item">
										<span class="tab-number btn-warning">80%</span>
										<a class="nav-link-tab" id="New_part_tab" href="{{url('final/new-parts')}}">New Parts</a></li>
									<li class="nav-item">
										<span class="tab-number btn-success">80%</span>
										<a class="nav-link-tab" id="labour_tab" href="{{url('final/labour')}}">Labour</a></li>
									<li class="nav-item">
										<span class="tab-number btn-danger">0%</span>
										<a class="nav-link-tab" id="summery_remark_tab" href="{{url('final/summery-remark')}}">Summery & Remark</a></li>
								</ul>  	
	    					</div>
	    					<div class="card-body">
	    						<div class="tab-content p-0">
	    							<div class="tab-pane fade show active" id="navs-pills-within-card-active" role="tabpanel">
	    								<?php /*
	    								<div class="list-group list-group-horizontal-md text-md-center">
	    									<span class="list-group-item list-group-item-action active" id="list_tab_1">Policy Details <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i></span>
	    									<span class="list-group-item list-group-item-action" id="list_tab_2">Vehicle Details <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i></span>
	    									<span class="list-group-item list-group-item-action" id="list_tab_3">Driver & License Details <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i></span>
	    								</div>

                                     
	    								<form id="registrationFormFinal" action="#" method="POST">
	    									<div class="row mt-4" id="list_tab_content_1">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="policy" class="form-label">Policy:</label>
	    														<input type="text" class="form-control" id="policy" name="policy" value="@if(isset($policyDetails->policy)) {{$policyDetails->policy}} @endif">
	    														<p class="error" id="err_policy"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="idv" class="form-label">Endorsement:</label>
	    														<input type="text" class="form-control" id="endorsement" name="endorsement" value="@if(isset($policyDetails->endorsement)) {{$policyDetails->endorsement}} @endif">
	    														<p class="error" id="err_endorsement"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="idv" class="form-label">I. D. V.:</label>
	    														<input type="text" class="form-control" id="idv" name="idv" value="@if(isset($policyDetails->idv)) {{$policyDetails->idv}} @endif">
	    														<p class="error" id="err_idv"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="policy_type" class="form-label">Policy Type:</label>
	    														<select id="policy_type" class="form-select" name="policy_type">
	    															<option value=""></option>
	    															<option value="Regular">Regular</option>
	    															<option value="Add on policy">Add on policy</option>
	    														</select>
	    														<p class="error" id="err_policy_type"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="insurance_from_date" class="form-label">Insurance from:</label>
	    														<input type="date" class="form-control" id="insurance_from_date" name="insurance_from_date" value="<?php  if (isset($policyDetails->insurance_from_date)) echo $policyDetails->insurance_from_date?>">
	    														<p class="error" id="err_insurance_from_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="insurance_to_date" class="form-label">Insurance To Date:</label>
	    														<input type="date" class="form-control" id="insurance_to_date" value="<?php  if (isset($policyDetails->insurance_to_date)) echo $policyDetails->insurance_to_date?>" name="insurance_to_date">
	    														<p class="error" id="err_insurance_to_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    												<div class="mb-3 field">
	    														<label for="insurers" class="form-label">Insurers:</label>
	    														<select id="insurers" class="form-select" name="insurers" onchange="insurerBranch(this)">

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
	    														<label for="insurer_branch" class="form-label">Insureance Branch:</label>
	    														<select id="insurer_branch" class="form-select" name="insurer_branch">
	    															<option value=""></option>
	    														</select>

	    														<p class="error" id="err_insurer_branch"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="appointing_office" class="form-label">Appointing office:</label>
	    														<input type="text" value="<?php  if (isset($policyDetails->appointing_office)) echo $policyDetails->appointing_office?>" class="form-control" id="appointing_office" name="appointing_office"><p class="error" id="err_appointing_office"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="appointing_office" class="form-label">Insured:</label>
	    														<input type="text" class="form-control" id="insured" value="@if(isset($policyDetails->insured)) {{$policyDetails->insured}} @endif" name="insured"><p class="error"  id="err_insured"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="address" class="form-label">Address:</label>    
	    														<input type="text" class="form-control" id="address" name="address" value="<?php  if (isset($policyDetails->address)) echo $policyDetails->address?>">
	    														<p class="error" id="err_address"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="mobile_number" class="form-label">Mobile:</label>    
	    														<input type="text" class="form-control" id="mobile_number" name="mobile_number" value="<?php  if (isset($policyDetails->mobile_number)) echo $policyDetails->mobile_number?>">
	    														<p class="error" id="err_mobile_number"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="token_number" class="form-label">Token # :</label>    
	    														<input type="text" class="form-control" id="token_number" name="token_number" value="<?php  if (isset($policyDetails->token_number)) echo $policyDetails->token_number?>">
	    														<p class="error" id="err_token_number"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="hpa" class="form-label">H.P.A:</label>
	    														<input type="text" class="form-control" id="hpa" name="hpa" value="<?php  if (isset($policyDetails->hpa)) echo $policyDetails->hpa?>">
	    														<p class="error" id="err_hpa"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="claim" class="form-label">Claim #:</label>    
	    														<input type="text" class="form-control" id="claim" name="claim" value="<?php  if (isset($policyDetails->claim)) echo $policyDetails->claim?>">
	    														<p class="error" id="err_claim"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 check__list">
	    														<div class="row">
	    															<div class="col-md-4 col-12">
			    														<input class="form-check-input" type="checkbox" id="check_list" name="check_list">
			    														<label for="check_list" class="form-label">Check List</label>    
			    														<p class="error" id="err_check_list"></p>
		    														</div>	
		    														<div class="col-md-4 col-12">
		    															<input class="form-check-input" type="checkbox" id="total_loss" name="total_loss">
			    														<label for="total_loss" class="form-label">Total Loss</label>    
			    														<p class="error" id="err_total_loss"></p>
		    														</div>
		    														<div class="col-md-4 col-12">
		    															<input class="form-check-input" type="checkbox" id="attachment" name="attachment">
			    														<label for="attachment" class="form-label">Attachment</label>    
			    														<p class="error" id="err_attachment"></p>
		    														</div>	
		    													</div>	
	    													</div>
	    												</div>
	    											</div>    										



	    											<!-- Buttons -->
	    											<div class="row mt-5">
	    												<div class="col-md-12 col-lg-6" style="text-align: left;"> 
	    													
	    												</div>
	    												<div class="col-md-12 col-lg-6" style="text-align: right;">
	    									          <!--  <input type="hidden" id="report_id" value="@if(isset($policyDetails->report_id)) {{$policyDetails->report_id}} @endif" name="report_id"> -->
	    									            <?php // print_r($report_id); ?>
	    													<button class="btn btn-label-secondary btn-prev" disabled=""> <i class="bx bx-chevron-left ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span>  </button>

	    													<button type="button" class="btn btn-primary btn-next" onclick="saveFinalDetails()"> 
	    														<!-- onclick="" -->
	    														<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right me-sm-n2"></i>
	    													</button>
	    												</div>
	    											</div>
	    										</div>
	    									</div>


	    									<div class="row mt-4" id="list_tab_content_2" style="display: none;">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="registration" class="form-label">Registration #:</label>
	    														<input type="text" class="form-control" id="registration" placeholder="Enter Registration" name="registration" value="<?php if (isset($vehicleDetails->registration_no)) echo $vehicleDetails->registration_no ?>">
	    														<p class="error" id="err_registration"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="registered_owner" class="form-label">Registered Owner:</label>
	    														<input type="text" class="form-control" id="registered_owner" placeholder="Enter Registered Owner" name="registered_owner" value="<?php if (isset($vehicleDetails->registerd_owner)) echo $vehicleDetails->registerd_owner ?>">
	    														<p class="error" id="err_registered_owner"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="owner_sr" class="form-label">Owner Sr/Trs Date:</label>
	    														<input type="date" class="form-control" id="owner_sr" name="owner_sr" placeholder="Enter Owner Sr/Trs Dt" value="<?php if (isset($vehicleDetails->owner_sr_trs)) echo $vehicleDetails->owner_sr_trs ?>">
	    														<p class="error" id="err_owner_sr"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="date_of" class="form-label">Date of Purchase:</label>
	    														<input type="date" class="form-control" id="date_of_purchase" name="date_of_purchase" placeholder="Enter Owner Sr/Trs Dt">
	    														<p class="error" id="err_date_of_purchase"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="date_of_registration" class="form-label">Date of Registration:</label>
	    														<input type="date" class="form-control" id="date_of_registration" name="date_of_registration">
	    														<p class="error" id="err_date_of_registration"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="chassis" class="form-label">Chassis:</label>
	    														<input type="text" class="form-control" id="chassis" name="chassis" placeholder="Enter Chassis"  value="<?php  if (!empty($vehicleDetails->chassis)) echo $vehicleDetails->chassis; ?>">
	    														<p class="error" id="err_chassis"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2" style="margin-top: 35px;">
	    													<div class="mb-3">
	    														<label for="chassis_phy_checked" class="form-label">Phy Checked:</label>
	    														<input type="checkbox" name="chassis_phy_checked">
	    														<p class="error" id="err_chassis"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="engine" class="form-label">Engine:</label>
	    														<input type="text" class="form-control" id="engine" name="engine" placeholder="Enter Engine" value="<?php  if (!empty($vehicleDetails->engine)) echo $vehicleDetails->engine; ?>">
	    														<p class="error" id="err_engine"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2" style="margin-top: 35px;">
	    													<div class="mb-3">
	    														<label for="phy_checked" class="form-label">Phy Checked:</label>
	    														<input type="checkbox" name="chassis" id="phy_checked">
	    														<p class="error" id="err_phy_checked"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="make_varient_mod" class="form-label">Make/Variant/Mod:</label>
	    														<input type="text" class="form-control" id="make_varient_mod" name="make_varient_mod" value="<?php  if (!empty($vehicleDetails->make_variant_mod)) echo $vehicleDetails->make_variant_mod; ?>">
	    														<p class="error" id="err_make_varient_mod"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="type_of_body" class="form-label">Type of Body:</label>
	    														<input type="text" class="form-control" id="type_of_body" name="type_of_body" placeholder="Type of Body" value="<?php  if (!empty($vehicleDetails->type_fo_body)) echo $vehicleDetails->type_fo_body; ?>">
	    														<p class="error" id="err_type_of_body"></p>
	    													</div>
	    												</div>
	    											  
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="body_color" class="form-label">Color:</label>
	    														<input type="text" class="form-control" id="body_color" name="body_color" value="<?php  if (!empty($vehicleDetails->color)) echo $vehicleDetails->color; ?>">
	    														<p class="error" id="err_body_color"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="cubic_capacity" class="form-label">Cubic Capacity:</label>
	    														<input type="text" class="form-control" id="cubic_capacity" name="cubic_capacity" value="<?php  if (!empty($vehicleDetails->cubic_capacity)) echo $vehicleDetails->cubic_capacity; ?>" >
	    														<p class="error" id="err_cubic_capacity"></p>
	    													</div>
	    												</div>

	    											
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="anty_theft" class="form-label">Anty Theft:</label>
	    														<input type="text" class="form-control" id="anty_theft" name="anty_theft"  value="<?php  if (!empty($vehicleDetails->anty_theft)) echo $vehicleDetails->anty_theft; ?>">
	    														<p class="error" id="err_anty_theft"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="puc_details" class="form-label">PUC Details:</label>
	    														<input type="text" class="form-control" id="puc_details" name="puc_details" value="<?php  if (!empty($vehicleDetails->puc_details)) echo $vehicleDetails->puc_details; ?>">
	    														<p class="error" id="err_puc_details"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="puc_upto" class="form-label">PUC Upto Date:</label>
	    														<input type="date" class="form-control" id="puc_upto" name="puc_upto" value="<?php  if (!empty($vehicleDetails->puc_upto_date)) echo $vehicleDetails->puc_upto_date; ?>">
	    														<p class="error" id="err_puc_upto"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="reg_kaden_wt" class="form-label">Reg Laden Wt.(Kgs):</label>
	    														<input type="text" class="form-control" id="reg_kaden_wt" name="reg_kaden_wt" value="<?php  if (!empty($vehicleDetails->reg_kaden_wt)) echo $vehicleDetails->reg_kaden_wt; ?>">
	    														<p class="error" id="err_reg_kaden_wt"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="remark_rlw" class="form-label">Remark (if RLW N.A.):</label>
	    														<input type="text" class="form-control" id="remark_rlw" name="remark_rlw" value="<?php  if (!empty($vehicleDetails->remark_rlw)) echo $vehicleDetails->remark_rlw; ?>">
	    														<p class="error" id="err_remark_rlw"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="unladen_wt" class="form-label">Unladen wt. (Kgs):</label>
	    														<input type="text" class="form-control" id="unladen_wt" name="unladen_wt" value="<?php  if (!empty($vehicleDetails->unladen_wt)) echo $vehicleDetails->unladen_wt; ?>">
	    														<p class="error" id="err_unladen_wt"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="remark_ulw" class="form-label">Remark (if ULW N.A.):</label>
	    														<input type="text" class="form-control" id="remark_ulw" name="remark_ulw" value="<?php  if (!empty($vehicleDetails->remark_ulw)) echo $vehicleDetails->remark_ulw; ?>">
	    														<p class="error" id="err_remark_ulw"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="seating_capacity" class="form-label">Seating Capacity:</label>
	    														<input type="text" class="form-control" id="seating_capacity" name="seating_capacity" value="<?php  if (!empty($vehicleDetails->seating_capacity)) echo $vehicleDetails->seating_capacity; ?>">
	    														<p class="error" id="err_seating_capacity"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="class_of_value" class="form-label">Class of Value:</label>
	    														<input type="text" class="form-control" id="class_of_value" name="class_of_value" value="<?php  if (!empty($vehicleDetails->class_of_value)) echo $vehicleDetails->class_of_value; ?>">
	    														<p class="error" id="err_class_of_value"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="fuel_used" class="form-label">Fuel Used:</label>
	    														<input type="text" class="form-control" id="fuel_used" name="fuel_used" value="<?php  if (!empty($vehicleDetails->fuel_used)) echo $vehicleDetails->fuel_used; ?>">
	    														<p class="error" id="err_fuel_used"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="odometer_reading" class="form-label">Odometer Reading:</label>
	    														<input type="text" class="form-control" id="odometer_reading" name="odometer_reading" value="<?php  if (!empty($vehicleDetails->odometer_reading)) echo $vehicleDetails->odometer_reading; ?>">
	    														<p class="error" id="err_odometer_reading"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="pre_accident_condition" class="form-label">Pre Accident Condition:</label>
	    														<input type="text" class="form-control" id="pre_accident_condition" name="pre_accident_condition" value="<?php  if (!empty($vehicleDetails->accident_condition)) echo $vehicleDetails->accident_condition; ?>">
	    														<p class="error" id="err_pre_accident_condition"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="tax_particular" class="form-label">Tax Particular:</label>
	    														<input type="text" class="form-control" id="tax_particular" name="tax_particular" value="<?php  if (!empty($vehicleDetails->tax_particulars)) echo $vehicleDetails->tax_particulars; ?>">
	    														<p class="error" id="err_pre_tax_particular"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<label for="remark" class="form-label">Remark:</label>
	    														<textarea class="form-control" id="remark" name="remark"><?php  if (!empty($vehicleDetails->remark)) echo $vehicleDetails->remark; ?></textarea>
	    														<p class="error" id="err_remark"></p>
	    													</div>
	    												</div>
	    											</div>

	    											<div class="row">
	    												<div class="col-md-12 col-lg-3">
	    													<div class="mb-3">
	    														<div class="form-check">
														            <input class="form-check-input" name="commercialVehicle" type="checkbox" id="commercialVehicle">
														            <label class="form-check-label" for="commercialVehicle"> Commercial Vehicle Details</label>
														        </div>
	    													</div>
	    												</div>

	    											</div>

	    												<div class="row" id="commercialVehicle_div" style="display:none;">
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="fitness_certificate" class="form-label">Fitness Certificate #:</label>
	    														<input type="text" class="form-control" id="fitness_certificate" placeholder="Fitness Certificate" name="fitness_certificate">
	    														<p class="error" id="err_fitness_certificate"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="fitness_from_date" class="form-label">Fitness From:</label>
	    														<input type="date" class="form-control" id="fitness_from_date"  name="fitness_from_date" value="<?php  if (!empty($vehicleDetails->com_fitness_from_date)) echo $vehicleDetails->com_fitness_from_date; ?>">
	    														<p class="error" id="err_fitness_from_date"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="fitness_to_date" class="form-label">To:</label>
	    														<input type="date" class="form-control" id="fitness_to_date"  name="fitness_to_date" value="<?php  if (!empty($vehicleDetails->com_fitness_to_date)) echo $vehicleDetails->com_fitness_to_date; ?>">
	    														<p class="error" id="err_fitness_to_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="parmit_issued" class="form-label">Permit #/ issued by:</label>
	    														<input type="text" class="form-control" id="parmit_issued"  name="parmit_issued">
	    														<p class="error" id="err_parmit_issued"></p>
	    													</div>
	    												</div>  


	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="parmit_from_date" class="form-label">Parmit From:</label>
	    														<input type="date" class="form-control" id="parmit_from_date"  name="parmit_from_date">
	    														<p class="error" id="err_parmit_from_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="parmit_to_date" class="form-label">Parmit To:</label>
	    														<input type="date" class="form-control" id="parmit_to_date"  name="parmit_to_date">
	    														<p class="error" id="err_parmit_to_date"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="type_of_parmit" class="form-label">Type of Parmit:</label>
	    														<input type="text" class="form-control" id="type_of_parmit"  name="type_of_parmit">
	    														<p class="error" id="err_type_of_parmit"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="authorization_validity" class="form-label">Authorization  #/validity:</label>
	    														<input type="text" class="form-control" id="authorization_validity"  name="authorization_validity">
	    														<p class="error" id="err_authorization_validity"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="area_of_opration" class="form-label">Rout/Area of Opration:</label>
	    														<input type="text" class="form-control" id="area_of_opration"  name="area_of_opration">
	    														<p class="error" id="err_area_of_opration"></p>
	    													</div>
	    												</div>
	    											</div>
                                                      <input type="hidden" id="report_id" value="@if(isset($policyDetails->report_id)) {{$policyDetails->report_id}} @endif" name="report_id">

	    											<div class="row mt-5">
	    												<div class="col-md-12 col-lg-6" style="text-align: left;"> 
	    													
	    												</div>
	    												<div class="col-md-12 col-lg-6" style="text-align: right;"> 
	    													<button type="button" class="btn btn-primary btn-prev"  onclick="registrationProcessBack('2')"> 
	    														<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
	    													</button>
	    													<button type="button" class="btn btn-primary btn-next"  onclick="saveFinalVehicleDetails()"> 
	    														<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
	    													</button>
	    												</div>
	    											</div>
	    										</div>
	    									</div>

	    									<div class="row mt-4" id="list_tab_content_3" style="display: none;">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12">
	    													<div class="row gap-md-0 gap-3 mb-4">

	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="registration" class="form-label">Driving LIC #:</label>
	    														<input type="text" class="form-control" id="driving_licence" placeholder="Enter Registration" name="driving_licence" value="<?php if (!empty($driverDetails->driving_licence)) echo $driverDetails->driving_licence ?>">
	    														<p class="error" id="err_driving_licence"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="driver_name" class="form-label">Driver Name:</label>
	    														<input type="text" class="form-control" id="driver_name" placeholder="Enter Registration" name="driver_name" value="<?php if (!empty($driverDetails->driver_name)) echo $driverDetails->driver_name ?>">
	    														<p class="error" id="err_driver_name"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="driver_dob" class="form-label">Date of Birth:</label>
	    														<input type="date" class="form-control" id="driver_dob" placeholder="Enter Registration" name="driver_dob" value="<?php if (!empty($driverDetails->date_of_birth)) echo $driverDetails->date_of_birth ?>">
	    														<p class="error" id="err_driver_dob"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="issue_date" class="form-label">Issue Date:</label>
	    														<input type="date" class="form-control" id="issue_date"  name="issue_date" value="<?php if (!empty($driverDetails->issue_date)) echo $driverDetails->issue_date ?>">
	    														<p class="error" id="err_issue_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="valid_date" class="form-label">Upto(NTV):</label>
	    														<input type="date" class="form-control" id="valid_date"  name="valid_date">
	    														<p class="error" id="err_valid_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="valid_date" class="form-label">valid From:</label>
	    														<input type="date" class="form-control" id="valid_date"  name="valid_date" value="<?php if (!empty($driverDetails->valid_from)) echo $driverDetails->valid_from ?>">
	    														<p class="error" id="err_valid_date"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="valid_date" class="form-label">Upto(TV):</label>
	    														<input type="date" class="form-control" id="valid_date"  name="valid_date">
	    														<p class="error" id="err_valid_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="issuing_authority" class="form-label">Issuing Authority:</label>
	    														<input type="text" class="form-control" id="issuing_authority"  name="issuing_authority" value="<?php if (!empty($driverDetails->issuing_authority)) echo $driverDetails->issuing_authority ?>">
	    														<p class="error" id="err_issuing_authority"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="valid_date" class="form-label">Licence Type:</label>
	    														<select name="licence_type" class="form-control" id="licence_type">
	    															<?php  if (!empty($driverDetails->licence_type)) { ?>
	    															       <option value="{{ $driverDetails->licence_type }}"{{ ( $driverDetails->licence_type == $driverDetails->licence_type) ? 'selected' : '' }}>{{ $driverDetails->licence_type }}</option>
	    															<?php } ?>

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
	    													<div class="mb-3">
	    														<label for="badge" class="form-label">Badge:</label>
	    														<input type="text" class="form-control" id="badge"  name="badge" value="<?php if (!empty($driverDetails->badge)) echo $driverDetails->badge ?>" id="badge"  name="badge">
	    														<p class="error" id="err_badge"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="remark" class="form-label">Remark:</label>
	    														<input type="text" class="form-control" id="remark"  name="remark" value="<?php if (!empty($driverDetails->remark)) echo $driverDetails->remark ?>" id="driver_remark"  name="driver_remark">
	    														<p class="error" id="err_remark"></p>
	    													</div>
	    												</div>
	    											</div>

	    											<div class="row mt-5">
	    												<div class="col-md-12 col-lg-12" style="text-align: right;" > 
	    													<button type="button" class="btn btn-primary btn-prev" onclick="registrationProcessBack('3')" id="previous_3"> 
	    														<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
	    													</button>
	    													<button type="button" class="btn btn-primary btn-next" onclick="saveFinalDriverDetails()" id="next_3"> 
	    														<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
	    													</button>
	    													<button type="button" class="btn btn-primary" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
	    													
	    												</div>
	    											</div>
	    										</div>
	    									</div>


	    									<div class="row mt-4" id="list_tab_content_4" style="display: none;">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12">
	    													<div class="row gap-md-0 gap-3 mb-4">
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="fitness_certificate" class="form-label">Fitness Certificate #:</label>
	    														<input type="text" class="form-control" id="fitness_certificate" placeholder="Fitness Certificate" name="fitness_certificate">
	    														<p class="error" id="err_fitness_certificate"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="fitness_from_date" class="form-label">Fitness From:</label>
	    														<input type="date" class="form-control" id="fitness_from_date"  name="fitness_from_date">
	    														<p class="error" id="err_fitness_from_date"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="issue_date" class="form-label">Fitness To:</label>
	    														<input type="date" class="form-control" id="ffitness_to_date"  name="fitness_to_date">
	    														<p class="error" id="err_ffitness_to_date"></p>
	    													</div>
	    												</div>
	    												


	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="parmit_from_date" class="form-label">Parmit From:</label>
	    														<input type="date" class="form-control" id="parmit_from_date"  name="parmit_from_date">
	    														<p class="error" id="err_parmit_from_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="parmit_to_date" class="form-label">Parmit To:</label>
	    														<input type="date" class="form-control" id="parmit_to_date"  name="parmit_to_date">
	    														<p class="error" id="err_parmit_to_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="parmit_issued" class="form-label">Permit #/ issued by:</label>
	    														<input type="text" class="form-control" id="parmit_issued"  name="parmit_issued">
	    														<p class="error" id="err_parmit_issued"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="type_of_parmit" class="form-label">Type of Parmit:</label>
	    														<input type="text" class="form-control" id="type_of_parmit"  name="type_of_parmit">
	    														<p class="error" id="err_type_of_parmit"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="authorization_validity" class="form-label">Authorization  #/validity:</label>
	    														<input type="text" class="form-control" id="authorization_validity"  name="authorization_validity">
	    														<p class="error" id="err_authorization_validity"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="area_of_opration" class="form-label">Rout/Area of Opration:</label>
	    														<input type="text" class="form-control" id="area_of_opration"  name="area_of_opration">
	    														<p class="error" id="err_area_of_opration"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="area_of_opration" class="form-label">Remark:</label>
	    														<input type="text" class="form-control" id="area_of_opration"  name="area_of_opration">
	    														<p class="error" id="err_area_of_opration"></p>
	    													</div>
	    												</div>
	    											</div>

	    											<div class="row mt-5">
	    												
	    												<div class="col-md-12 col-lg-12" style="text-align: right;" > 
	    													<button type="button" class="btn btn-primary btn-prev" onclick="registrationProcessBack('4')" id="previous_3"> 
	    														<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
	    													</button>
	    													<button type="button" class="btn btn-primary btn-next" onclick="saveCommercialVehicleDetails()" id="next_4"> 
	    														<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
	    													</button>

	    													<button type="button" class="btn btn-primary" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
	    													
	    												</div>
	    											</div>
	    										</div>
	    									</div>
	    								</form>
 											*/ ?>


	    								
	    							    
									    


									   <form id="registrationFormFinal" action="#" method="POST"> 	
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
		    														<label for="policy" class="form-label">Policy:</label>
		    														<input type="text" class="form-control" id="policy" name="policy" value="@if(isset($policyDetails->policy)) {{$policyDetails->policy}} @endif">
		    														<p class="error" id="err_policy"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="idv" class="form-label">Endorsement:</label>
		    														<input type="text" class="form-control" id="endorsement" name="endorsement" value="@if(isset($policyDetails->endorsement)) {{$policyDetails->endorsement}} @endif">
		    														<p class="error" id="err_endorsement"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="idv" class="form-label">I. D. V.:</label>
		    														<input type="text" class="form-control" id="idv" name="idv" value="@if(isset($policyDetails->idv)) {{$policyDetails->idv}} @endif">
		    														<p class="error" id="err_idv"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="policy_type" class="form-label">Policy Type:</label>
		    														<select id="policy_type" class="form-select" name="policy_type">
		    															<!-- <option value=""></option> -->
		    															<option value="Regular">Regular</option>
		    															<option value="Add on policy">Add on policy</option>
		    														</select>
		    														<p class="error" id="err_policy_type"></p>
		    													</div>
		    												</div>
		    											
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="insurance_from_date" class="form-label">Insurance from:</label>
		    														<input type="date" class="form-control" id="insurance_from_date" name="insurance_from_date" value="<?php  if (isset($policyDetails->insurance_from_date)) echo $policyDetails->insurance_from_date?>">
		    														<p class="error" id="err_insurance_from_date"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="insurance_to_date" class="form-label">Insurance To Date:</label>
		    														<input type="date" class="form-control" id="insurance_to_date" value="<?php  if (isset($policyDetails->insurance_to_date)) echo $policyDetails->insurance_to_date?>" name="insurance_to_date">
		    														<p class="error" id="err_insurance_to_date"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    												<div class="mb-3 field">
		    														<label for="insurers" class="form-label">Insurers:</label>
		    														<select id="insurers" class="form-select" name="insurers" onchange="insurerBranch(this)">

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
		    														<label for="insurer_branch" class="form-label">Insureance Branch:</label>
		    														<select id="insurer_branch" class="form-select" name="insurer_branch">
		    															<option value=""></option>
		    														</select>

		    														<p class="error" id="err_insurer_branch"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="appointing_office" class="form-label">Appointing office:</label>
		    														<input type="text" value="<?php  if (isset($policyDetails->appointing_office)) echo $policyDetails->appointing_office?>" class="form-control" id="appointing_office" name="appointing_office"><p class="error" id="err_appointing_office"></p>
		    													</div>
		    												</div>
		    												
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="appointing_office" class="form-label">Insured:</label>
		    														<input type="text" class="form-control" id="insured" value="@if(isset($policyDetails->insured)) {{$policyDetails->insured}} @endif" name="insured"><p class="error"  id="err_insured"></p>
		    													</div>
		    												</div>
		    												
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="address" class="form-label">Address:</label>    
		    														<input type="text" class="form-control" id="address" name="address" value="<?php  if (isset($policyDetails->address)) echo $policyDetails->address?>">
		    														<p class="error" id="err_address"></p>
		    													</div>
		    												</div>

		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="mobile_number" class="form-label">Mobile:</label>    
		    														<input type="text" class="form-control" id="mobile_number" name="mobile_number" value="<?php  if (isset($policyDetails->mobile_number)) echo $policyDetails->mobile_number?>">
		    														<p class="error" id="err_mobile_number"></p>
		    													</div>
		    												</div>

		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="token_number" class="form-label">Token # :</label>    
		    														<input type="text" class="form-control" id="token_number" name="token_number" value="<?php  if (isset($policyDetails->token_number)) echo $policyDetails->token_number?>">
		    														<p class="error" id="err_token_number"></p>
		    													</div>
		    												</div>
		    											
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="hpa" class="form-label">H.P.A:</label>
		    														<input type="text" class="form-control" id="hpa" name="hpa" value="<?php  if (isset($policyDetails->hpa)) echo $policyDetails->hpa?>">
		    														<p class="error" id="err_hpa"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="claim" class="form-label">Claim #:</label>    
		    														<input type="text" class="form-control" id="claim" name="claim" value="<?php  if (isset($policyDetails->claim)) echo $policyDetails->claim?>">
		    														<p class="error" id="err_claim"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 check__list">
		    														<div class="row">
		    															<div class="col-md-4 col-12">
				    														<input class="form-check-input" type="checkbox" id="check_list" name="check_list">
				    														<label for="check_list" class="form-label">Check List</label>    
				    														<p class="error" id="err_check_list"></p>
			    														</div>	
			    														<div class="col-md-4 col-12">
			    															<input class="form-check-input" type="checkbox" id="total_loss" name="total_loss">
				    														<label for="total_loss" class="form-label">Total Loss</label>    
				    														<p class="error" id="err_total_loss"></p>
			    														</div>
			    														<div class="col-md-4 col-12">
			    															<input class="form-check-input" type="checkbox" id="attachment" name="attachment">
				    														<label for="attachment" class="form-label">Attachment</label>    
				    														<p class="error" id="err_attachment"></p>
			    														</div>	
			    													</div>	
		    													</div>
		    												</div>
		    											</div>    										



		    											<!-- Buttons -->
		    											<!-- <div class="row mt-5">
		    												<div class="col-md-12 col-lg-6" style="text-align: left;"> 
		    													
		    												</div>
		    												<div class="col-md-12 col-lg-6" style="text-align: right;"> -->

		    									          <!--  <input type="hidden" id="report_id" value="@if(isset($policyDetails->report_id)) {{$policyDetails->report_id}} @endif" name="report_id"> -->
		    									            <?php // print_r($report_id); ?>
		    													<!-- <button class="btn btn-label-secondary btn-prev" disabled=""> <i class="bx bx-chevron-left ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span>  </button>

		    													<button type="button" class="btn btn-primary btn-next" onclick="saveFinalDetails()"> 
		    														
		    														<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right me-sm-n2"></i>
		    													</button>
		    												</div>
		    											</div> -->

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
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="registration" class="form-label">Registration #:</label>
	    														<input type="text" class="form-control" id="registration" name="registration" value="<?php if (isset($vehicleDetails->registration_no)) echo $vehicleDetails->registration_no ?>">
	    														<p class="error" id="err_registration"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="registered_owner" class="form-label">Registered Owner:</label>
	    														<input type="text" class="form-control" id="registered_owner" name="registered_owner" value="<?php if (isset($vehicleDetails->registerd_owner)) echo $vehicleDetails->registerd_owner ?>">
	    														<p class="error" id="err_registered_owner"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="owner_sr" class="form-label">Owner Sr/Trs Date:</label>
	    														<input type="date" class="form-control" id="owner_sr" name="owner_sr" value="<?php if (isset($vehicleDetails->owner_sr_trs)) echo $vehicleDetails->owner_sr_trs ?>">
	    														<p class="error" id="err_owner_sr"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="date_of" class="form-label">Date of Purchase:</label>
	    														<input type="date" class="form-control" id="date_of_purchase" name="date_of_purchase">
	    														<p class="error" id="err_date_of_purchase"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="date_of_registration" class="form-label">Date of Registration:</label>
	    														<input type="date" class="form-control" id="date_of_registration" name="date_of_registration">
	    														<p class="error" id="err_date_of_registration"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3 field">
	    														<label for="chassis" class="form-label">Chassis:</label>
	    														<input type="text" class="form-control" id="chassis" name="chassis" value="<?php  if (!empty($vehicleDetails->chassis)) echo $vehicleDetails->chassis; ?>">
	    														<p class="error" id="err_chassis"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2" style="margin-top: 10px;">
	    													<div class="mb-3">
	    														<label for="chassis_phy_checked" class="form-label">Phy Checked:</label>
	    														<input type="checkbox" name="chassis_phy_checked" class="form-check-input" id="chassis_phy_checked">
	    														<p class="error" id="err_chassis"></p>
		  													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3 field">
	    														<label for="engine" class="form-label">Engine:</label>
	    														<input type="text" class="form-control" id="engine" name="engine" value="<?php  if (!empty($vehicleDetails->engine)) echo $vehicleDetails->engine; ?>">
	    														<p class="error" id="err_engine"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2" style="margin-top: 10px;">
	    													<div class="mb-3">
	    														<label for="phy_checked" class="form-label">Phy Checked:</label>
	    														<input type="checkbox" name="chassis" class="form-check-input" id="phy_checked">
	    														<p class="error" id="err_phy_checked"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="make_varient_mod" class="form-label">Make/Variant/Mod:</label>
	    														<input type="text" class="form-control" id="make_varient_mod" name="make_varient_mod" value="<?php  if (!empty($vehicleDetails->make_variant_mod)) echo $vehicleDetails->make_variant_mod; ?>">
	    														<p class="error" id="err_make_varient_mod"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="type_of_body" class="form-label">Type of Body:</label>
	    														<input type="text" class="form-control" id="type_of_body" name="type_of_body"  value="<?php  if (!empty($vehicleDetails->type_fo_body)) echo $vehicleDetails->type_fo_body; ?>">
	    														<p class="error" id="err_type_of_body"></p>
	    													</div>
	    												</div>
	    											  
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="body_color" class="form-label">Color:</label>
	    														<input type="text" class="form-control" id="body_color" name="body_color" value="<?php  if (!empty($vehicleDetails->color)) echo $vehicleDetails->color; ?>">
	    														<p class="error" id="err_body_color"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="cubic_capacity" class="form-label">Cubic Capacity:</label>
	    														<input type="text" class="form-control" id="cubic_capacity" name="cubic_capacity" value="<?php  if (!empty($vehicleDetails->cubic_capacity)) echo $vehicleDetails->cubic_capacity; ?>" >
	    														<p class="error" id="err_cubic_capacity"></p>
	    													</div>
	    												</div>

	    											
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="anty_theft" class="form-label">Anty Theft:</label>
	    														<input type="text" class="form-control" id="anty_theft" name="anty_theft"  value="<?php  if (!empty($vehicleDetails->anty_theft)) echo $vehicleDetails->anty_theft; ?>">
	    														<p class="error" id="err_anty_theft"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="puc_details" class="form-label">PUC Details:</label>
	    														<input type="text" class="form-control" id="puc_details" name="puc_details" value="<?php  if (!empty($vehicleDetails->puc_details)) echo $vehicleDetails->puc_details; ?>">
	    														<p class="error" id="err_puc_details"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="puc_upto" class="form-label">PUC Upto Date:</label>
	    														<input type="date" class="form-control" id="puc_upto" name="puc_upto" value="<?php  if (!empty($vehicleDetails->puc_upto_date)) echo $vehicleDetails->puc_upto_date; ?>">
	    														<p class="error" id="err_puc_upto"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="reg_kaden_wt" class="form-label">Reg Laden Wt.(Kgs):</label>
	    														<input type="text" class="form-control" id="reg_kaden_wt" name="reg_kaden_wt" value="<?php  if (!empty($vehicleDetails->reg_kaden_wt)) echo $vehicleDetails->reg_kaden_wt; ?>">
	    														<p class="error" id="err_reg_kaden_wt"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="remark_rlw" class="form-label">Remark (if RLW N.A.):</label>
	    														<input type="text" class="form-control" id="remark_rlw" name="remark_rlw" value="<?php  if (!empty($vehicleDetails->remark_rlw)) echo $vehicleDetails->remark_rlw; ?>">
	    														<p class="error" id="err_remark_rlw"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="unladen_wt" class="form-label">Unladen wt. (Kgs):</label>
	    														<input type="text" class="form-control" id="unladen_wt" name="unladen_wt" value="<?php  if (!empty($vehicleDetails->unladen_wt)) echo $vehicleDetails->unladen_wt; ?>">
	    														<p class="error" id="err_unladen_wt"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="remark_ulw" class="form-label">Remark (if ULW N.A.):</label>
	    														<input type="text" class="form-control" id="remark_ulw" name="remark_ulw" value="<?php  if (!empty($vehicleDetails->remark_ulw)) echo $vehicleDetails->remark_ulw; ?>">
	    														<p class="error" id="err_remark_ulw"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="seating_capacity" class="form-label">Seating Capacity:</label>
	    														<input type="text" class="form-control" id="seating_capacity" name="seating_capacity" value="<?php  if (!empty($vehicleDetails->seating_capacity)) echo $vehicleDetails->seating_capacity; ?>">
	    														<p class="error" id="err_seating_capacity"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="class_of_value" class="form-label">Class of Value:</label>
	    														<input type="text" class="form-control" id="class_of_value" name="class_of_value" value="<?php  if (!empty($vehicleDetails->class_of_value)) echo $vehicleDetails->class_of_value; ?>">
	    														<p class="error" id="err_class_of_value"></p>
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
	    														<label for="odometer_reading" class="form-label">Odometer Reading:</label>
	    														<input type="text" class="form-control" id="odometer_reading" name="odometer_reading" value="<?php  if (!empty($vehicleDetails->odometer_reading)) echo $vehicleDetails->odometer_reading; ?>">
	    														<p class="error" id="err_odometer_reading"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="pre_accident_condition" class="form-label">Pre Accident Condition:</label>
	    														<input type="text" class="form-control" id="pre_accident_condition" name="pre_accident_condition" value="<?php  if (!empty($vehicleDetails->accident_condition)) echo $vehicleDetails->accident_condition; ?>">
	    														<p class="error" id="err_pre_accident_condition"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="tax_particular" class="form-label">Tax Particular:</label>
	    														<input type="text" class="form-control" id="tax_particular" name="tax_particular" value="<?php  if (!empty($vehicleDetails->tax_particulars)) echo $vehicleDetails->tax_particulars; ?>">
	    														<p class="error" id="err_pre_tax_particular"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3 field">
	    														<label for="remark" class="form-label">Remark:</label>
	    														<textarea class="form-control" id="remark" name="remark"><?php  if (!empty($vehicleDetails->remark)) echo $vehicleDetails->remark; ?></textarea>
	    														<p class="error" id="err_remark"></p>
	    													</div>
	    												</div>
	    											</div>

	    											<div class="row">
	    												<div class="col-md-12 col-lg-3">
	    													<div class="mb-3 text-start">
	    														<div class="form-check">
														            <input class="form-check-input" name="commercialVehicle" type="checkbox" id="commercialVehicle">
														            <label class="form-check-label" for="commercialVehicle"> Commercial Vehicle Details</label>
														        </div>
	    													</div>
	    												</div>

	    											</div>

	    											<div class="row" id="commercialVehicle_div" style="display:none;">
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="fitness_certificate" class="form-label">Fitness Certificate #:</label>
	    														<input type="text" class="form-control" id="fitness_certificate" name="fitness_certificate">
	    														<p class="error" id="err_fitness_certificate"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="fitness_from_date" class="form-label">Fitness From:</label>
	    														<input type="date" class="form-control" id="fitness_from_date"  name="fitness_from_date" value="<?php  if (!empty($vehicleDetails->com_fitness_from_date)) echo $vehicleDetails->com_fitness_from_date; ?>">
	    														<p class="error" id="err_fitness_from_date"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="fitness_to_date" class="form-label">To:</label>
	    														<input type="date" class="form-control" id="fitness_to_date"  name="fitness_to_date" value="<?php  if (!empty($vehicleDetails->com_fitness_to_date)) echo $vehicleDetails->com_fitness_to_date; ?>">
	    														<p class="error" id="err_fitness_to_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="parmit_issued" class="form-label">Permit #/ issued by:</label>
	    														<input type="text" class="form-control" id="parmit_issued"  name="parmit_issued">
	    														<p class="error" id="err_parmit_issued"></p>
	    													</div>
	    												</div>  


	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="parmit_from_date" class="form-label">Parmit From:</label>
	    														<input type="date" class="form-control" id="parmit_from_date"  name="parmit_from_date">
	    														<p class="error" id="err_parmit_from_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="parmit_to_date" class="form-label">Parmit To:</label>
	    														<input type="date" class="form-control" id="parmit_to_date"  name="parmit_to_date">
	    														<p class="error" id="err_parmit_to_date"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="type_of_parmit" class="form-label">Type of Parmit:</label>
	    														<input type="text" class="form-control" id="type_of_parmit"  name="type_of_parmit">
	    														<p class="error" id="err_type_of_parmit"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="authorization_validity" class="form-label">Authorization  #/validity:</label>
	    														<input type="text" class="form-control" id="authorization_validity"  name="authorization_validity">
	    														<p class="error" id="err_authorization_validity"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="area_of_opration" class="form-label">Rout/Area of Opration:</label>
	    														<input type="text" class="form-control" id="area_of_opration"  name="area_of_opration">
	    														<p class="error" id="err_area_of_opration"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3 field">
	    														<label for="remark" class="form-label">Remark:</label>
	    														<textarea class="form-control" id="remark" name="remark"><?php  if (!empty($vehicleDetails->remark)) echo $vehicleDetails->remark; ?></textarea>
	    														<p class="error" id="err_remark"></p>
	    													</div>
	    												</div>
	    											</div>
                                                      <input type="hidden" id="report_id" value="@if(isset($policyDetails->report_id)) {{$policyDetails->report_id}} @endif" name="report_id">

	    											<!-- <div class="row mt-5">
	    												<div class="col-md-12 col-lg-6" style="text-align: left;"> 
	    													
	    												</div>
	    												<div class="col-md-12 col-lg-6" style="text-align: right;"> 
	    													<button type="button" class="btn btn-primary btn-prev"  onclick="registrationProcessBack('2')"> 
	    														<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
	    													</button>
	    													<button type="button" class="btn btn-primary btn-next"  onclick="saveFinalVehicleDetails()"> 
	    														<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
	    													</button>
	    												</div>
	    											</div> -->

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
	    														<label for="registration" class="form-label">Driving LIC #:</label>
	    														<input type="text" class="form-control" id="driving_licence" name="driving_licence" value="<?php if (!empty($driverDetails->driving_licence)) echo $driverDetails->driving_licence ?>">
	    														<p class="error" id="err_driving_licence"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="driver_name" class="form-label">Driver Name:</label>
	    														<input type="text" class="form-control" id="driver_name" name="driver_name" value="<?php if (!empty($driverDetails->driver_name)) echo $driverDetails->driver_name ?>">
	    														<p class="error" id="err_driver_name"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="driver_dob" class="form-label">Date of Birth:</label>
	    														<input type="date" class="form-control" id="driver_dob" name="driver_dob" value="<?php if (!empty($driverDetails->date_of_birth)) echo $driverDetails->date_of_birth ?>">
	    														<p class="error" id="err_driver_dob"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3 field">
	    														<label for="issue_date" class="form-label">Issue Date:</label>
	    														<input type="date" class="form-control" id="issue_date"  name="issue_date" value="<?php if (!empty($driverDetails->issue_date)) echo $driverDetails->issue_date ?>">
	    														<p class="error" id="err_issue_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3 field">
	    														<label for="valid_date" class="form-label">Upto(NTV):</label>
	    														<input type="date" class="form-control" id="valid_date"  name="valid_date">
	    														<p class="error" id="err_valid_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3 field">
	    														<label for="valid_date" class="form-label">valid From:</label>
	    														<input type="date" class="form-control" id="valid_date"  name="valid_date" value="<?php if (!empty($driverDetails->valid_from)) echo $driverDetails->valid_from ?>">
	    														<p class="error" id="err_valid_date"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3 field">
	    														<label for="valid_date" class="form-label">Upto(TV):</label>
	    														<input type="date" class="form-control" id="valid_date"  name="valid_date">
	    														<p class="error" id="err_valid_date"></p>
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
	    														<label for="valid_date" class="form-label">Licence Type:</label>
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
	    														<input type="text" class="form-control" id="badge"  name="badge" value="<?php if (!empty($driverDetails->badge)) echo $driverDetails->badge ?>" id="badge"  name="badge">
	    														<p class="error" id="err_badge"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="remark" class="form-label">Remark:</label>
	    														<input type="text" class="form-control" id="remark"  name="remark" value="<?php if (!empty($driverDetails->remark)) echo $driverDetails->remark ?>" id="driver_remark"  name="driver_remark">
	    														<p class="error" id="err_remark"></p>
	    													</div>
	    												</div>
	    											</div>

	    											
	    										</div>
									          </div>
									        </div>
									      </div>
									     
									    </div>
									    <div class="row mt-5">
											<div class="col-md-12 col-lg-12" style="text-align: right;" > 
												<!-- <button type="button" class="btn btn-primary btn-prev" onclick="registrationProcessBack('3')" id="previous_3"> 
													<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
												</button> -->
												<button type="button" class="btn btn-primary btn-next" onclick="saveFinalDriverDetails()" id="next_3"> 
													<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
												</button>
												<button type="button" class="btn btn-primary" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
												
											</div>
										</div>
						            </form>













































	    							</div>

	    							<div class="tab-pane fade" id="navs-pills-within-card-link" role="tabpanel">
	    								<div class="list-group list-group-horizontal-md text-md-center">
	    									<a class="list-group-item list-group-item-action active" id="list_tab_survey_1">Accident Details <i class="fa fa-arrow-circle-right custom_css" aria-hidden="true"></i></a>
	    									<a class="list-group-item list-group-item-action" id="list_tab_survey_2">Cause & Nature of Accident <i class="fa fa-arrow-circle-right custom_css" aria-hidden="true"></i></a>
	    									<a class="list-group-item list-group-item-action" id="list_tab_survey_3">Load & Challan Details <i class="fa fa-arrow-circle-right custom_css" aria-hidden="true"></i></a>
	    									<a class="list-group-item list-group-item-action" id="list_tab_survey_4">Third Party Loss & Injuries Details <i class="fa fa-arrow-circle-right custom_css" aria-hidden="true"></i></a>
	    								</div>
	    								<form id="registrationForm" class="mb-3" action="#" method="POST">
	    									<div class="row mt-4" id="list_tab_content_survey_1">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="date_of_accident" class="form-label">Date of Accident #:</label>
	    														<input type="date" class="form-control" id="date_of_accident"  name="date_of_accident">
	    														<p class="error" id="err_date_of_accident"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="time_of_accident" class="form-label">Time of accident:</label>
	    														<input type="text" class="form-control" id="time_of_accident"  name="time_of_accident">
	    														<p class="error" id="err_time_of_accident"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="place_of_accident" class="form-label">Place of Accident/Survey :</label>
	    														<input type="text" class="form-control" id="place_of_accident"  name="place_of_accident">
	    														<p class="error" id="err_place_of_accident"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="vehicle_shifted_to" class="form-label">Vehicle Shifted To:</label>
	    														<input type="text" class="form-control" id="vehicle_shifted_to"  name="vehicle_shifted_to">
	    														<p class="error" id="err_vehicle_shifted_to"></p>
	    													</div>
	    												</div>

	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="parson_available_on_spot" class="form-label">Parson Available On Spot:</label>
	    														<input type="test" class="form-control" id="parson_available_on_spot"  name="parson_available_on_spot">
	    														<p class="error" id="err_parson_available_on_spot"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="parmit_to_date" class="form-label">Parmit To:</label>
	    														<input type="date" class="form-control" id="parmit_to_date"  name="parmit_to_date">
	    														<p class="error" id="err_parmit_to_date"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="allotment_date" class="form-label">Allotment  Date:</label>
	    														<input type="date" class="form-control" id="allotment_date"  name="allotment_date">
	    														<p class="error" id="err_allotment_date"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="inspection" class="form-label">Inspection:</label>
	    														<input type="date" class="form-control" id="inspection"  name="inspection">
	    														<p class="error" id="err_inspection"></p>
	    													</div>
	    												</div>
	    												
	    											</div>
	    											
	    											<div class="row mt-5">
	    												<div class="col-md-12 col-lg-6"> 
	    													<!-- <button type="button" class="btn btn-primary btn-prev" onclick="spotProcessSurveyBack('4')" id="previous_3"> 
	    														<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
	    													</button> -->
	    												</div>
	    												<div class="col-md-12 col-lg-6" style="text-align: right;" > 
	    													<button type="button" class="btn btn-primary btn-next" onclick="saveSurveyAccidentDetails()" id="next_4"> 
	    														<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
	    													</button>

	    													<button type="button" class="btn btn-primary" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
	    													
	    												</div>
	    											</div>
	    										</div>
	    									</div>

	    									<div class="row mt-4" id="list_tab_content_survey_2" style="display: none;">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12">
	    													<div class="row gap-md-0 gap-3 mb-4">
	    														
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<label for="couse&nature" class="form-label">Couse & Nature of Accident:</label>
	    														
	    														<textarea class="ckeditor form-control" id="couse&nature"  name="couse&nature"></textarea>
	    														<p class="error" id="err_couse&nature"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<label for="police_action" class="form-label">Police Action:</label>
	    														<textarea class="form-control" id="police_action"  name="police_action"></textarea>
	    														<p class="error" id="err_police_action"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="name_of_police_satation" class="form-label">Name of Police Station:</label>
	    														<input type="text" class="form-control" id="name_of_police_satation"  name="driver_dob">
	    														<p class="error" id="err_name_of_police_satation"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="satation_dairy_no" class="form-label">Station Diary No (FIR):</label>
	    														<input type="text" class="form-control" id="satation_dairy_no"  name="satation_dairy_no">
	    														<p class="error" id="err_satation_dairy_no"></p>
	    													</div>
	    												</div>
	    											</div>
	    											
	    											<div class="row mt-5">
	    												<div class="col-md-12 col-lg-6"> 
	    													<button type="button" class="btn btn-primary btn-prev" onclick="spotProcessSurveyBack('2')" id="previous_3"> 
	    														<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
	    													</button>
	    												</div>
	    												<div class="col-md-12 col-lg-6" style="text-align: right;" > 
	    													<button type="button" class="btn btn-primary btn-next" onclick="saveSurveyCouseDetails()" id="next_3"> 
	    														<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
	    													</button>

	    													<button type="button" class="btn btn-primary" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
	    													
	    												</div>
	    											</div>
	    										</div>
	    									</div>

	    									<div class="row mt-4" id="list_tab_content_survey_3" style="display: none;">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12">
	    													<div class="row gap-md-0 gap-3 mb-4">
	    														
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="nature_of_goods" class="form-label">Nature of Goods:</label>
	    														<input type="text" class="form-control" id="nature_of_goods"  name="nature_of_goods">
	    														
	    														<p class="error" id="err_nature_of_goods"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="Goods_caried" class="form-label">Wait of Goods caried:</label>
	    														<input type="text" class="form-control" id="Goods_caried"  name="Goods_caried">
	    														
	    														<p class="error" id="err_Goods_caried"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="name_origin_destination" class="form-label">Origin Destination:</label>
	    														<input type="text" class="form-control" id="origin_destination"  name="origin_destination">
	    														<p class="error" id="err_origin_destination"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="lr_invoice_no" class="form-label">L/R Invoice No & Date:</label>
	    														<input type="text" class="form-control" id="lr_invoice_no"  name="lr_invoice_no">
	    														<p class="error" id="err_lr_invoice_no"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="transporter_no" class="form-label">Transporter's Name:</label>
	    														<input type="text" class="form-control" id="transporter_no"  name="transporter_no">
	    														<p class="error" id="err_transporter_no"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="no_of_passangers" class="form-label"> No of Passangers:</label>
	    														<input type="text" class="form-control" id="no_of_passangers"  name="no_of_passangers">
	    														<p class="error" id="err_no_of_passangers"></p>
	    													</div>
	    												</div>
	    											</div>
	    											
	    											<div class="row mt-5">
	    												<div class="col-md-12 col-lg-6"> 
	    													<button type="button" class="btn btn-primary btn-prev" onclick="spotProcessSurveyBack('3')" id="previous_3"> 
	    														<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
	    													</button>
	    												</div>
	    												<div class="col-md-12 col-lg-6" style="text-align: right;" > 
	    													<button type="button" class="btn btn-primary btn-next" onclick="saveSurveyLoadChallan()" id="next_3"> 
	    														<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
	    													</button>

	    													<button type="button" class="btn btn-primary" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
	    													
	    												</div>
	    											</div>
	    										</div>
	    									</div>


	    									<div class="row mt-4" id="list_tab_content_survey_4" style="display: none;">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3" >
	    														<label for="tp_vehicle_details" class="form-label">Details of TP Vehicle:</label>
	    														<textarea class="form-control" rows="3" name="tp_vehicle_details"></textarea>
	    														<p class="error" id="err_tp_vehicle_details"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<label for="tp_death_injuri_details" class="form-label">Death / Injuries Details of Insured Vehicle:</label>
	    														<textarea id="tp_death_injuri_details" rows="4" class="form-control" name="tp_death_injuri_details"></textarea>
	    														<p class="error" id="err_death_injuri_details"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<label for="death_tp_vehicle_details" class="form-label">Death / Injuries Details of TP Vehicle :</label>
	    														<textarea id="death_tp_vehicle_details" rows="4" class="form-control" name="death_tp_vehicle_details"></textarea>
	    														<p class="error" id="err_death_tp_vehicle_details"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<label for="third_party_property_damages" class="form-label">Third Party Porperty Damages:</label>
	    														<textarea id="third_party_property_damages" rows="4" class="form-control" name="third_party_property_damages"></textarea>
	    														<p class="error" id="err_third_party_property_damages"></p>
	    													</div>
	    												</div>
													</div>
	    											
	    											<div class="row mt-5">
	    												<div class="col-md-12 col-lg-6"> 
	    													<button type="button" class="btn btn-primary btn-prev" onclick="spotProcessSurveyBack('4')" id="previous_3"> 
	    														<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
	    													</button>
	    												</div>
	    												<div class="col-md-12 col-lg-6" style="text-align: right;" > 
	    													<button type="button" class="btn btn-primary btn-next" onclick="saveSurveyThirdParty()" id="next_4"> 
	    														<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
	    													</button>

	    													<button type="button" class="btn btn-primary" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
	    													<input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
	    												</div>
	    											</div>
	    										</div>
	    									</div>
	    								</form>

	    								

	    							</div>
	    								<div class="tab-pane fade" id="navs-pills-within-card-link-damages_tab" role="tabpanel">	
	    									<h4 class="card-title">Special link title   33333</h4>

	    								</div>
	    								<div class="tab-pane fade" id="navs-pills-within-card-link-notes" role="tabpanel">	
	    									<h4 class="card-title">Special link title   44444</h4>

	    									<form id="registrationForm" class="mb-3" action="#" method="POST">
	    									<div class="row mt-4" >
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="date_of_accident" class="form-label">Date of Accident #:</label>
	    														<input type="date" class="form-control" id="date_of_accident"  name="date_of_accident">
	    														<p class="error" id="err_date_of_accident"></p>
	    													</div>
	    												</div>
	    											</div>
	    										</div>
	    									</div>
	    									</form>			
	    								</div>
	    						</div>
	    					</div>



</div>

















	    				</div>
	    			</div>
	    			<!-- /Login -->
	    		</div>
	    	</div>


	    </div>




<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script type="text/javascript">
    	(function () {
    var $input = $("input"),
        $select = $("select"),
        $textarea = $("textarea"),
        $field = $(".field"),
        $clearButton = $(".clear-button");

		    $input
		        .on("focusin", function () {
		            var $this = $(this);
		            $this.closest($field).addClass("focus-active");
		        })
		        .on("focusout", function () {
		            var $this = $(this);
		            $this.closest($field).removeClass("focus-active");
		            if ($this.val() == "") {
		                $this.closest($field).removeClass("populated-input");
		            } else {
		                $this.closest($field).addClass("populated-input");
		            }
		        });

		    $select
		        .on("focusin", function () {
		            var $this = $(this);
		            $this.closest($field).addClass("focus-active");
		        })
		        .on("focusout", function () {
		            var $this = $(this);
		            $this.closest($field).removeClass("focus-active");
		            if ($this.val() == "") {
		                $this.closest($field).removeClass("populated-input");
		            } else {
		                $this.closest($field).addClass("populated-input");
		            }
		        });

		     $textarea
		        .on("focusin", function () {
		            var $this = $(this);
		            $this.closest($field).addClass("focus-active");
		        })
		        .on("focusout", function () {
		            var $this = $(this);
		            $this.closest($field).removeClass("focus-active");
		            if ($this.val() == "") {
		                $this.closest($field).removeClass("populated-input");
		            } else {
		                $this.closest($field).addClass("populated-input");
		            }
		        });   

		    $clearButton.on("click", function () {
		        $input.closest($field).removeClass("populated-input");
		    });
		})();

    </script> -->








	    <!--/ Content -->
	    @endsection