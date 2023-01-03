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
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold mb-4 py-3">
			<span class="text-muted fw-light"> </span> 
	    </h4>
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
	    				<div class="card">
	    					<div class="card-header">
	    						<ul class="nav nav-pills card-header-pills" role="tablist" style="margin-left: -1.28rem;">
	    							<li class="nav-item">
	    								<a class="nav-link" id="survey_tab" href="{{url('interim/policy-report')}}">Policy & Vehicle</a>
	    							</li>
	    							<li class="nav-item">
	    								<a class="nav-link" id="new_parts" href="{{url('interim/survey-report')}}">Survey</a>
	    							</li>
	    							<li class="nav-item">
	    								<button type="button" class="nav-link active" role="tab" id="survey_tab" data-bs-toggle="tab" data-bs-target="#navs-pills-within-card-link" aria-controls="navs-survey-link" aria-selected="false">New Parts</button>
	    							
	    							</li>
	    							<li class="nav-item">
	    								<a class="nav-link" id="new_parts" href="{{url('interim/summery-notes')}}">Summery Notes</a>
	    							</li>
	    						</ul>
	    					</div>
	    					<div class="card-body">
	    						<div class="tab-content p-0">
	    							<div class="tab-pane fade show active" id="navs-pills-within-card-active" role="tabpanel">    								
	    								<form id="registrationForm" action="#" method="POST">
	    									<div class="row">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<h5>Labour Details:</h5>
	    														<hr>
	    													</div>
	    												</div>
	    											</div>
	    											<form id="registrationForm" class="mb-3" action="#" method="POST">
				    									<div class="row">
				    										<div class="col-md-12">
																<div class="table-responsive text-nowrap">
																	<div class="parts-wrapper">
																    <table class="table new-parts" cellpadding="0" cellspacing="0" id="customFields">
																      <thead>
																        <tr>
																          <th style="width:30px;">#</th>
																          <th style="width:5%">Dep %</th>
																          <th style="width:230px;">Item Name</th>
																          <th style="width:80px;">HSN Code</th>
																          <th style="width:100px;">Remark</th>
																          <th style="width:60px;">Estimate</th>
																          <th style="width:60px;">Assessed</th>
																          <th style="width:50px;">QE-QA</th>
																          <th style="width:60px;">Bill Sr.</th>
																          <th style="width:50px;">GST %</th>
																          <th style="width:60px;">Total</th>
																          <th style="width:180px;">Type</th>
																          <th style="width:2px;"></th>
																        </tr>
																      </thead>
																      <tbody class="table-border-bottom-0">
																        <tr class="new-parts">
																          <td>1</td>
																          <td><input class="form-control" type="text" placeholder="Dep" name="dept_1" id="dept_1"></td>
																          <td><input class="form-control" type="text" placeholder="Name" name="item_name_1" id="item_name_1"> </td>
																          <td><input class="form-control" type="text" placeholder="HSN" name="hsn_code_1" id="hsn_code_1"></td>
																          <td><select class="form-control" name="remark_1" id="remark_1"><option value="Bent">Bent</option><option value="Needed">Needed</option><option value="Not Covered">Not Covered</option><option value="Tightned">Tightned</option><option value="Damaged">Damaged</option></select></td>
																          <td><input class="form-control" type="text" placeholder="Estimate" name="estimate_1" id="estimate_1" class="onlyNumericKey"></td>
																          <td><input class="form-control" type="text" placeholder="Assessment" name="assessed_1" id="assessed_1" class="onlyNumericKey"></td>
																          <td><input class="form-control" type="text" placeholder="QE-QA" name="qe_aq_1" id="qe_aq_1" value="01 - 01"></td>
																          <td><input class="form-control" type="text" placeholder="Bill Sr." name="bill_sr_1" id="bill_sr_1"></td>
																          <td><input class="form-control" type="text" placeholder="%" name="gst_1" id="gst_1" class="onlyNumericKey" value=""></td>
																          <td><input class="form-control" type="text" placeholder="Total" name="total_1" id="total_1"></td>
																          <td><select class="form-control" name="type_1" id="type_1"><option value=""></option><option value="Composit">Composit</option><option value="Disallowed">Disallowed</option><option value="Disposal">Disposal</option><option value="Fiber">Fiber</option><option value="Glass">Glass</option><option value="Kept Open">Kept Open</option><option value="Matel">Matel</option><option value="Plastic">Plastic</option><option value="Rubber">Rubber</option></select></td>
																          <td><button type="button" class="btn rounded-pill btn-icon btn-outline-primary addCF" > <span class="tf-icons bx bx-plus"></span> </button></td>
																        </tr>																         
																      </tbody>
																    </table>
																</div>

															     <table class="mt-3">
															        <tr>
															          	<td style="width:350px;">
															          		 	<input class="form-check-input" type="checkbox" name="wo-tax"> 
																	        	<label style="padding-left: 4px;">W/O Tax</label>
																          	<select>
																          		<option value="estimate"> Estimate</option>
																          		<option value="Assessment"> Assessment</option>
																          	</select>
															          	</td>
															          	<td></td>
															          	<td style="width:350px;">Estimated: <span id="estimate_value"> </span></td>
																        <td style="width:350px;">Assessed: <span id="assesed_value"> </span></td>
																        <td style="width:350px;">Diffrence <span id="difference_value"> </span></td>
															        </tr>
															    </table>
																  </div>

				    										</div>
				    									</div>
				    								</form>
	    											<div class="row mt-3">
	    												<div class="col-md-12 col-lg-12" style="text-align: right;"> 
	    													<button class="btn btn-label-secondary btn-prev" disabled=""><i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span>  </button>
	    													<button type="button" class="btn btn-primary btn-next" onclick="saveFinalDetails()"> 
	    													<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save </span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
	    													</button>
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
	    			<!-- /Login -->
	    		</div>
	    	</div>


	    </div>













	    <!--/ Content -->
	    @endsection