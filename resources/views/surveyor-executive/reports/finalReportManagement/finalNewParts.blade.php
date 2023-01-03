	@extends('template_main')
	@section('content')
	<style type="text/css">
		.form-label{
			float: left !important;
		}
		.mb-3 p{
			float: left !important;
		}
		.finalNewParts_add {
		    max-width: 29px;
		    padding: 0 3px;
		    margin: 0 0 0 auto;
		}
		.finalNewParts_add .btn {
			width: 23px;
			height: 23px;
		}

	</style>
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<!-- <h4 class="fw-bold mb-4 py-3">
			<span class="text-muted fw-light"> </span> 
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

	    				<div class="card">
	    					<div class="card-header">
	    						<ul class="nav nav-pills card-header-pills" role="tablist" style="margin-left: -1.28rem;">
	    							
	    							<li class="nav-item">
	    								<span class="tab-number btn-success">80%</span>
	    								<a class="nav-link-tab" id="survey_tab" href="{{url('final/policy-report')}}">Policy & Vehicle</a>
	    							</li>
	    							<li class="nav-item">
	    								<span class="tab-number btn-danger">0%</span>
	    								<a class="nav-link-tab" id="survey_tab" href="{{url('final/survey-report')}}">Survey</a>
	    							</li>

	    							<li class="nav-item">
	    								<span class="tab-number btn-warning">80%</span>
	    								<a class="nav-link-tab active" id="policy_tab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-within-card-active" aria-controls="navs-pills-within-card-active" aria-selected="true">New Parts</a>
	    							
	    							</li>
	    							<li class="nav-item">
	    								<span class="tab-number btn-success">80%</span>
	    								<a class="nav-link-tab" id="survey_tab" href="{{url('final/labour')}}">Labour</a>
	    							</li>
	    							<li class="nav-item">
	    								<span class="tab-number btn-danger">0%</span>
	    								<a class="nav-link-tab" id="survey_tab" href="{{url('final/summery-remark')}}">Summery & Remark</a>
	    							</li>


	    						</ul>
	    					</div>
	    					<div class="card-body">
	    						<div class="tab-content p-0">
	    							<div class="tab-pane fade show active" id="navs-pills-within-card-active" role="tabpanel">    								
	    								<form id="registrationForm" action="{{url('final/storePartDetails')}}" method="POST">
	    									<input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
	    									<div class="row">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<h5>New Parts</h5>
	    														<hr>
	    													</div>
	    												</div>
	    											</div>
	    										
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
																          <td><input class="form-control" type="text" placeholder="Dep" name="dept[]" id="dept_1"></td>
																          <td><input class="form-control" type="text" placeholder="Name" name="item_name[]" id="item_name_1"> </td>
																          <td><input class="form-control" type="text" placeholder="HSN" name="hsn_code[]" id="hsn_code_1"></td>
																          <td><select class="form-control" name="remark[]" id="remark_1"><option value=""></option><option value="Bent">Bent</option><option value="Needed">Needed</option><option value="Not Covered">Not Covered</option><option value="Tightned">Tightned</option><option value="Damaged">Damaged</option></select></td>
																          <td><input class="form-control" type="text" placeholder="Estimate" onblur="calculateEstimate()" name="estimate[]" id="estimate_1" class="onlyNumericKey"><input type="hidden" name="total_estimate[]" id="total_estimate_1"></td>
																          <td><input class="form-control" type="text" placeholder="Assessed" onblur="calculateAssesed()" name="assessed[]" id="assessed_1" class="onlyNumericKey"></td>
																          <td><input class="form-control" type="text" placeholder="QE-QA" name="qe_aq[]" id="qe_aq_1" value="01 - 01"></td>
																          <td><input class="form-control" type="text" placeholder="Bill Sr." name="bill_sr[]" id="bill_sr_1"></td>
																          <td><input class="form-control" type="text" placeholder="%" onblur="calculateGst()" name="gst[]" id="gst_1" class="onlyNumericKey" value=""></td>
																          <td><input class="form-control" type="text" placeholder="Total" name="total[]" id="total_1"></td>
																          <td><select class="form-control" name="type[]" id="type_1"><option value=""></option><option value="Composit">Composit</option><option value="Disallowed">Disallowed</option><option value="Disposal">Disposal</option><option value="Fiber">Fiber</option><option value="Glass">Glass</option><option value="Kept Open">Kept Open</option><option value="Matel">Matel</option><option value="Plastic">Plastic</option><option value="Rubber">Rubber</option></select></td>
																          <td><button type="button" class="btn rounded-pill btn-icon btn-outline-primary addCF" > <span class="tf-icons bx bx-plus"></span> </button></td>
																        </tr>	

																      </tbody>
																    </table>
																    <div class="finalNewParts_add">
																    	<button type="button" class="btn rounded-pill btn-icon btn-outline-primary addCF" > <span class="tf-icons bx bx-plus"></span> </button>
																	</div>
																</div>

															     <table class="mt-3">
															        <tr>
															          	<td style="width:350px;">
																          	<input class="form-check-input" for="wo-tax" type="checkbox" name="wo_tax"> 
																          	<label for="wo-tax" style="padding-left: 4px;">W/O Tax</label>
																          	<select name="wo_tax">
																          		<option value="estimate"> Estimate</option>
																          		<option value="Assessment"> Assessment</option>
																          	</select>
															          	</td>
															          	<td></td>
															          	<td style="width:350px;">Estimated: <span id="estimate_value"> </span></td>
																        <td style="width:350px;">Assessed: <span id="assesed_value"> </span></td>
																        <td style="width:350px;">Diffrence <span id="difference_value"> </span></td>
																        <input type="hidden" name="estimate_value" value=""   id="estimate_0" >
																        <input type="hidden" name="assesed_value" value=""    id="assesed_1" >
																        <input type="hidden" name="difference_value" value="" id="difference_2" >
															        </tr>
															    </table>
																  </div>

				    										</div>
				    									</div>
				    								 <input type="hidden" name="report_id" value="{{$report_id}}" id="report_id" >	
	    											<div class="row mt-3">
	    												<div class="col-md-12 col-lg-12" style="text-align: right;"> 
	    													<!-- <button class="btn btn-label-secondary btn-prev" disabled=""><i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span>  </button> -->
	    													<input type="submit" value="Save & Next" name="submit" type="button" class="btn btn-primary btn-next"> 
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













	    <!--/ Content -->
	    @endsection