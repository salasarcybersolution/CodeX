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
	    						<ul class="nav nav-pills card-header-pills" role="tablist" style="margin-left: -1.28rem;">
	    							<li class="nav-item">
	    								<span class="tab-number btn-success">80%</span>
	    								<a class="nav-link-tab" id="survey_tab" href="{{url('final/policy-report')}}/{{ $report_id }}">Policy & Vehicle</a>
	    							</li>
	    							<li class="nav-item">
	    								<span class="tab-number btn-danger">0%</span>
	    								<a class="nav-link-tab active" role="tab" id="survey_tab" data-bs-toggle="tab" data-bs-target="#navs-pills-within-card-link" aria-controls="navs-survey-link" aria-selected="false">Survey</a>
	    							</li>

	    							<li class="nav-item">
	    								<span class="tab-number btn-warning">80%</span>
	    								<a class="nav-link-tab" id="survey_tab" href="{{url('final/new-parts')}}">New Parts</a>
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
	    								<form id="registrationForm" action="#" method="POST">
	    									<div class="row">
	    										<div class="col-md-12">
	    											<div class="row">


	    												<!-- <div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<h5>Accidental Details:</h5>
	    														<hr>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="date_of_accident" class="form-label">Date of Accident:</label>
	    														<input type="date" class="form-control" id="date_of_accident" name="date_of_accident" value="">
	    														<p class="error" id="err_date_of_accident"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="time_of_accident" class="form-label">Time of Accident:</label>
	    														<input type="text" class="form-control" id="time_of_accident" placeholder="Time of Accident" name="time_of_accident" value="">
	    														<p class="error" id="err_time_of_accident"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="insurance_from_date" class="form-label">Place of Accident:</label>
	    														<input type="text" class="form-control" id="place_of_accident" placeholder="Place of Accident" name="place_of_accident" value="">
	    														<p class="error" id="err_place_of_accident"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="pin_number" class="form-label">Pin Number:</label>
	    														<input type="text" class="form-control" id="pin_number" placeholder="Pin Number" name="pin_number">
	    														<p class="error" id="err_pin_number"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="insurers" class="form-label">Place of Survey:</label>
	    														<input type="text" class="form-control" id="place_of_survey" placeholder="Place of Survey" name="place_of_survey">
	    														<p class="error" id="err_place_of_survey"></p>
	    													</div>
	    												</div>
											
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<h5 class="after-design"><span>Survey Details:</span></h5>
	    														<hr>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="insured" class="form-label">Allotment Date:</label>
	    														<input type="date" class="form-control" id="allotment_date"  name="allotment_date">
	    														<p class="error" id="err_allotment_date"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2">
	    													<div class="mb-3">
	    														<label for="inspection_date" class="form-label">Inspection Date:</label>
	    														<input type="date" class="form-control" id="inspection_date" name="inspection_date"><p class="error" id="err_inspection_date"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="spot_survey_recived" class="form-label">Spot Survey Recived:</label>
	    														<textarea class="form-control" name="spot_survey_recived" id="spot_survey_recived"></textarea>  
	    														<p class="error" id="err_insured"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3">
	    														<label for="police_action" class="form-label">Polic_action :</label>
	    														<textarea class="form-control" name="police_action" id="police_action"></textarea>
	    														<p class="error" id="err_police_action"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<label for="mobile_number" class="form-label">Details of Load / Passanger:</label>    
	    														<textarea class="form-control" name="detailsOFloadPanssanger" id="detailsOFloadPanssanger"></textarea>
	    														<p class="error" id="err_detailsOFloadPanssanger"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<label for="mobile_number" class="form-label">Third Party Loss/ Injuries:</label>    
	    														<textarea class="form-control" name="thirdPartiLossInjurios" id="thirdPartiLossInjurios"></textarea>
	    														<p class="error" id="err_thirdPartiLossInjurios"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3">
	    														<label for="mobile_number" class="form-label">Asisment:</label>    
	    														<textarea class="form-control ckeditor" name="assisment" id="assisment"></textarea>
	    														<p class="error" id="err_assisment"></p>
	    													</div>
	    												</div>
	    												
	    											</div> -->


	    											<div class="accordion mt-3" id="accordionExample">
												      <div class="card accordion-item">
												        <h2 class="accordion-header d-flex align-items-center" id="headingOne">
												        	<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
												            Accidental Details: <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
												          </button>

												          <!-- <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-1" aria-expanded="true">
												            <i class="bx bx-bar-chart-alt-2 me-2"></i>
												            Accidental Details:
												          </button> -->
												        </h2>

												        <div id="accordionOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
												          <div class="accordion-body">
												          	<div class="row">
												          	<div class="col-md-12 col-lg-2">
		    													<div class="mb-3 field">
		    														<label for="date_of_accident" class="form-label">Date of Accident:</label>
		    														<input type="date" class="form-control" id="date_of_accident" name="date_of_accident" value="">
		    														<p class="error" id="err_date_of_accident"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-2">
		    													<div class="mb-3 field">
		    														<label for="time_of_accident" class="form-label">Time of Accident:</label>
		    														<input type="text" class="form-control" id="time_of_accident" name="time_of_accident" value="">
		    														<p class="error" id="err_time_of_accident"></p>
		    													</div>
		    												</div>
		    											
		    												<div class="col-md-12 col-lg-2">
		    													<div class="mb-3 field">
		    														<label for="insurance_from_date" class="form-label">Place of Accident:</label>
		    														<input type="text" class="form-control" id="place_of_accident" name="place_of_accident" value="">
		    														<p class="error" id="err_place_of_accident"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-2">
		    													<div class="mb-3 field">
		    														<label for="pin_number" class="form-label">Pin Number:</label>
		    														<input type="text" class="form-control" id="pin_number" name="pin_number">
		    														<p class="error" id="err_pin_number"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="insurers" class="form-label">Place of Survey:</label>
		    														<input type="text" class="form-control" id="place_of_survey" name="place_of_survey">
		    														<p class="error" id="err_place_of_survey"></p>
		    													</div>
		    												</div>
		    												</div>
												          </div>
												        </div>
												      </div>

												      <div class="accordion-item card">
												        <h2 class="accordion-header d-flex align-items-center" id="headingTwo">
												          <!-- <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-2" aria-expanded="false">
												            <i class="bx bx-briefcase me-2"></i>
												            Survey Details:
												          </button> -->
												          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
												            Survey Details: <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
												          </button>
												        </h2>
												        <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" >
												          <div class="accordion-body">
												          	<div class="row">
												            <div class="col-md-12 col-lg-2">
		    													<div class="mb-3 field">
		    														<label for="insured" class="form-label">Allotment Date:</label>
		    														<input type="date" class="form-control" id="allotment_date"  name="allotment_date">
		    														<p class="error" id="err_allotment_date"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-2">
		    													<div class="mb-3 field">
		    														<label for="inspection_date" class="form-label">Inspection Date:</label>
		    														<input type="date" class="form-control" id="inspection_date" name="inspection_date"><p class="error" id="err_inspection_date"></p>
		    													</div>
		    												</div>
		    												
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="spot_survey_recived" class="form-label">Spot Survey Recived:</label>
		    														<textarea class="form-control" name="spot_survey_recived" id="spot_survey_recived"></textarea>  
		    														<p class="error" id="err_insured"></p>
		    													</div>
		    												</div>
		    												
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="police_action" class="form-label">Police Action :</label>
		    														<textarea class="form-control" name="police_action" id="police_action"></textarea>
		    														<p class="error" id="err_police_action"></p>
		    													</div>
		    												</div>

		    												<div class="col-md-12 col-lg-12">
		    													<div class="mb-3 field">
		    														<label for="mobile_number" class="form-label">Cause and Nature of Accident :</label>    
		    														<textarea class="form-control" name="detailsOFloadPanssanger" id="detailsOFloadPanssanger"></textarea>
		    														<p class="error" id="err_detailsOFloadPanssanger"></p>
		    													</div>
		    												</div>

		    												<div class="col-md-12 col-lg-12">
		    													<div class="mb-3 field">
		    														<label for="mobile_number" class="form-label">Details of Load / Passanger:</label>    
		    														<textarea class="form-control" name="detailsOFloadPanssanger" id="detailsOFloadPanssanger"></textarea>
		    														<p class="error" id="err_detailsOFloadPanssanger"></p>
		    													</div>
		    												</div>

		    												<div class="col-md-12 col-lg-12">
		    													<div class="mb-3 field">
		    														<label for="mobile_number" class="form-label">Third Party Loss/ Injuries:</label>    
		    														<textarea class="form-control" name="thirdPartiLossInjurios" id="thirdPartiLossInjurios"></textarea>
		    														<p class="error" id="err_thirdPartiLossInjurios"></p>
		    													</div>
		    												</div>
		    											
		    												<div class="col-md-12 col-lg-12">
		    													<div class="mb-3 field">
		    														<label for="mobile_number" class="form-label">Asisment:</label>    
		    														<textarea class="form-control ckeditor" name="assisment" id="assisment"></textarea>
		    														<p class="error" id="err_assisment"></p>
		    													</div>
		    												</div>
		    												</div>
												          </div>
												        </div>
												      </div>
												    </div>
























	    											<input type="hidden" id="survey_id" name="survey_id" value="@if(isset($surveyDetails->survey_id)) {{$surveyDetails->survey_id}} @endif"> 
	    											<div class="row mt-5">
	    												<div class="col-md-12 col-lg-12" style="text-align: right;"> 
	    													<!-- <button class="btn btn-label-secondary btn-prev" disabled=""><i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span>  </button> -->
	    													<!-- <button type="button" class="btn btn-primary btn-prev"> 
	    														<a style="color: #fff;" href="{{url('SpotReport/policy-report')}}/{{ $report_id; }}"><i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </a>
	    													</button> -->
	    													<button type="button" class="btn btn-primary btn-next" onclick="saveFinalSurveyReport('{{$report_id}}')"> 
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

</div>
	    <!--/ Content -->
	    @endsection