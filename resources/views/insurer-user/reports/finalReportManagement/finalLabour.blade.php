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
		<!-- <h4 class="fw-bold py-3 mb-4">
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
	    						<ul class="nav nav-pills card-header-pills" role="tablist">
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
	    								<a class="nav-link-tab" id="survey_tab" href="{{url('final/new-parts')}}">New Parts</a>
	    							</li>
	    							<li class="nav-item">
	    								<span class="tab-number btn-success">80%</span>
	    								<a class="nav-link-tab active" id="policy_tab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-within-card-active" aria-controls="navs-pills-within-card-active" aria-selected="true">Labour</a>
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
				    										<div class="col-md-9">
																<div class="table-responsive text-lab-wrap">
																	<div class="lab-wrapper">
																    <table class="table lb-new-parts" cellpadding="0" cellspacing="0" id="customFields">
																      <thead>
																        <tr>
																          <th style="width:30px;">#</th>
																          <th style="width:30px">Sub %</th>
																          <th style="width:230px;">Description</th>
																          <th style="width:50px;">SAC</th>
																          <th style="width:50px;">Estimate</th>
																          <th style="width:50px;">Assessed</th>
																          <th style="width:50px;">GST %</th>
																        </tr>
																      </thead>
																      <tbody class="table-border-bottom-0">
																        <tr class="lb-new-parts">
																          <td>1</td>
																          <td>1</td>
																          <td>Denting :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>

																        <tr class="lb-new-parts">
																          <td>2</td>
																          <td>1</td>
																          <td>Painting :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>


																        <tr class="lb-new-parts">
																          <td>3</td>
																          <td>1</td>
																          <td>Opening & Refitting : For Repairs/replacement allowed :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>

																         <tr class="lb-new-parts">
																          <td>4</td>
																          <td>1</td>
																          <td>Other W/s Glass Cutting : Cutting/new pasting allowed :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>

																        <tr class="lb-new-parts">
																          <td>5</td>
																          <td>1</td>
																          <td>Wheel Alignment:  Needed :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>


																        <tr class="lb-new-parts">
																          <td>6</td>
																          <td>1</td>
																          <td>A.C. Gas  Charging : Needed after replacement :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>

																        <tr class="lb-new-parts">
																          <td>7</td>
																          <td>1</td>
																          <td>Car-O-Liner / CRS Pulling:  Allowed  charges for the same:</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>

																        <tr class="lb-new-parts">
																          <td>8</td>
																          <td>1</td>
																          <td>Wheel Rim Change  : Labour allowed :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>


																        <tr class="lb-new-parts">
																          <td>9</td>
																          <td>1</td>
																          <td>Towing Charges:  Allowed charges for the same :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>

																        <tr class="lb-new-parts">
																          <td>10</td>
																          <td>1</td>
																          <td>Body Alignment : Caroliner charges allowed :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>

																        <tr class="lb-new-parts">
																          <td>11</td>
																          <td>1</td>
																          <td>Back Glass Pasting : Pasting charges allowed :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>

																        <tr class="lb-new-parts">
																          <td>12</td>
																          <td>1</td>
																          <td>GFF Functions : Needed :</td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="SAC"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ESTIMATE"></td>
																          <td><input class="form-control" type="text" name="qe_aq_1" id="" placeholder="ASSESSED"></td>
																          <td><input class="form-check-input" type="checkbox" name="qe_aq_1" id=""></td>
																        </tr>





																      </tbody>
																    </table>
																</div>
														  	</div>

				    										</div>
				    										<div class="col-md-3">
				    											<table>
				    												<tr>
				    													<td><input class="form-check-input" type="checkbox" name=""> : Estimate w/o Tax</td>
				    													<td>[ Assessed ]</td>
				    												</tr>
				    												<tr>
				    													<td><span id="lb_est_value"> 67.00</span></td>
				    													<td><span id="lb-assess-value">17.00</span></td>
				    												</tr>
				    												<tr><td colspan="2"><hr></td></tr>
				    												<tr>
				    													<td>Labour W/O Point: </td>
				    													<td><span id="labout_wo_points">17.00</span></td>
				    												</tr>
				    											</table>


				    										</div>
				    									</div>
				    								</form>
	    											<div class="row mt-3">
	    												<div class="col-md-12 col-lg-12" style="text-align: right;"> 
	    													<!-- <button class="btn btn-label-secondary btn-prev" disabled=""><i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span>  </button> -->
	    													<button type="button" class="btn btn-primary btn-next" onclick="saveFinalDetails()"> 
	    													<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
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
	    			</div>
	    			<!-- /Login -->
	    		</div>
	    	</div>


	    </div>













	    <!--/ Content -->
	    @endsection