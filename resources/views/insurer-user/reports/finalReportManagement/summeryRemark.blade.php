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
	    		<div class="d-flex col-lg-12 align-items-center authentication-bg">
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
	    								<a class="nav-link-tab" id="survey_tab" href="{{url('final/labour')}}">Labour</a>
	    							</li>
	    							<li class="nav-item">
	    								<span class="tab-number btn-danger">0%</span>
	    								<a class="nav-link-tab active" id="policy_tab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-within-card-active" aria-controls="navs-pills-within-card-active" aria-selected="true">Summery & Remark</a>
	    							</li>
	    						</ul>
	    					</div>
	    					<div class="card-body">
	    						<div class="tab-content p-0">
	    							<div class="tab-pane fade show active" id="navs-pills-within-card-active" role="tabpanel">    								
	    								<form id="registrationForm" class="mb-3" action="#" method="POST">
	    								<div class="accordion mt-3" id="accordionExample">
									      <div class="card accordion-item">
									        <h2 class="accordion-header" id="headingOne">
									          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
									            Original Estimate <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
									          </button>
									        </h2>

									        <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
									          <div class="accordion-body">
									            <div class="row mt-4" id="list_tab_content_1">
		    										<div class="col-md-12">
		    											<div class="row">
		    												<div class="col-md-12 col-lg-3">
		    													<div class="mb-3 field">
		    														<label for="total_labour" class="form-label">Total Labour :</label>
		    														<input type="text" class="form-control" id="total_labour" name="total_labour" value="">
		    														<p class="error" id="err_total_labour"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-3">
		    													<div class="mb-3 field">
		    														<label for="total_cost_parts" class="form-label">Total Cost of Parts :</label>
		    														<input type="text" class="form-control" id="total_cost_parts" name="total_cost_parts" value="">
		    														<p class="error" id="err_total_cost_parts"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-2">
	    														<div class="mb-3 field">
		    														<label for="total_estimate" class="form-label">Total Estimate:</label>
		    														<input type="text" class="form-control" id="total_estimate" name="total_estimate" value="">
		    														<p class="error" id="err_total_estimate"></p>
		    													</div>    													
		    												</div>
		    												<div class="col-md-12 col-lg-1 mt-2 p-0">
	    														<input class="form-check-input ms-2" type="checkbox" id="igst" name="check_list">
	    														<label for="igst" class="form-label">IGST</label>
	    														<p class="error" id="err_igst"></p>
    														</div>
		    												<div class="col-md-12 col-lg-3">
		    													<div class="mb-3 field">
		    														<label for="estimate_date" class="form-label">Estimate Date :</label>
		    														<input type="date" class="form-control" id="estimate_date" name="estimate_date" value="">
		    														<p class="error" id="err_estimate_date"></p>
		    													</div>
		    												</div>
		    											</div>    										
		    										</div>
	    										</div>
									          </div>
									        </div>
									      </div> 
									      <div class="card accordion-item">
									        <h2 class="accordion-header" id="headingTwo">
									          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
									            Assessed Value <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
									          </button>
									        </h2>

									        <div id="accordionTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
									          <div class="accordion-body">
									            <div class="row mt-4" id="list_tab_content_1">
		    										<div class="col-md-12">
		    											<div class="row">
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="total_labourA" class="form-label">Total Labour [A]:</label>
		    														<input type="text" class="form-control" id="total_labourA" name="total_labourA" value="">
		    														<p class="error" id="err_total_labourA"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="total_cost_of_parts" class="form-label">Total cost of parts [B]:</label>
		    														<input type="text" class="form-control" id="total_cost_of_parts" name="total_cost_of_parts" value="">
		    														<p class="error" id="err_total_cost_of_parts"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="totle_ab" class="form-label">Total : [C] = (A+B)</label>
		    														<input type="text" class="form-control" id="totle_ab" name="totle_ab" value="">
		    														<p class="error" id="err_totle_ab"></p>
		    													</div>
		    												</div>
		    											</div>
		    											<div class="row">
		    												<div class="col-md-12 col-lg-8">
		    													<label class="form-label" style="float: unset !important; display: inherit;">Assessment percent (IDV)  : .%</label>
		    													<label class="form-label" style="float: unset !important; display: inherit;">Assessment percent (Estimate)  : .%</label>
		    												</div>
		    											
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="less_excessD" class="form-label">Less Excess [D]:</label>
		    														<input type="text" class="form-control" id="less_excessD" name="less_excessD" value="">
		    														<p class="error" id="err_less_excessD"></p>
		    													</div>
		    													<div class="mb-3 field">
		    														<label for="less_imposedE" class="form-label">Less Imposed [E]:</label>
		    														<input type="text" class="form-control" id="less_imposedE" name="less_imposedE" value="">
		    														<p class="error" id="err_less_imposedE"></p>
		    													</div>
		    												</div>
		    											</div>
		    											<div class="row"> 	
		    												<div class="col-md-12 col-lg-8">
		    													<div class="mb-3 field">
		    														<label for="other_heading" class="form-label">Other (-/+) Heading :</label>
		    														<input type="text" class="form-control" id="other_heading" value="" name="other_heading">
		    														<p class="error" id="err_other_heading"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="other_F" class="form-label">Other (-/+) [F] :</label>
		    														<input type="text" class="form-control" id="other_F" value="" name="other_F">
		    														<p class="error" id="err_other_F"></p>
		    													</div>
		    													<div class="mb-3 field">
		    														<label for="grand_total_G" class="form-label">Grand Total: [G]=(D-E+F)</label>
		    														<input type="text" class="form-control" id="grand_total_G" value="" name="grand_total_G">
		    														<p class="error" id="err_grand_total_G"></p>
		    													</div>
		    												</div>
		    											</div>
		    										</div>
	    										</div>
									          </div>
									        </div>
									      </div> 
									      <div class="card accordion-item">
									        <h2 class="accordion-header" id="headingThree">
									          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
									            Salvage & Depreciation Details <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
									          </button>
									        </h2>

									        <div id="accordionThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
									          <div class="accordion-body">
									            <div class="row mt-4" id="list_tab_content_1">
		    										<div class="col-md-12">
		    											<div class="row">
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="metal" class="form-label">Metal%:</label>
		    														<input type="number" class="form-control" id="metal" name="metal" value="">
		    														<p class="error" id="err_metal"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="expected_salvage" class="form-label">Expected Salvage:</label>
		    														<input type="text" class="form-control" id="expected_salvage" name="expected_salvage" value="">
		    														<p class="error" id="err_expected_salvage"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="remark_on_salvage" class="form-label">Remark on Salvage :</label>
		    														<input type="text" class="form-control" id="remark_on_salvage" name="remark_on_salvage" value="">
		    														<p class="error" id="err_remark_on_salvage"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-12">
		    													<div class="mb-3 field">
		    														<label for="remark" class="form-label"></label>
		    														<textarea class="form-control" id="remark" name="remark"></textarea>
		    														<p class="error" id="err_remark"></p>
		    													</div>
	    													</div>
		    											</div>  
		    											<div class="row">
		    												<div class="offset-lg-8 col-md-12 col-lg-4">
		    													<div class="mb-3">
		    														<label for="depreciation_on_parts" class="form-label mb-0">Depreciation on Parts:</label>
		    														<input type="text" class="form-control" id="depreciation_on_parts" name="depreciation_on_parts" value="">
		    														<p class="error" id="err_depreciation_on_parts"></p>
		    													</div>
		    													<div class="mb-3">
		    														<label for="net_assessed_amount" class="form-label mb-0">Net Assessed Amount:</label>
		    														<input type="text" class="form-control" id="net_assessed_amount" name="net_assessed_amount" value="">
		    														<p class="error" id="err_net_assessed_amount"></p>
		    													</div>
		    												</div>
		    											</div>  										
		    										</div>
	    										</div>
									          </div>
									        </div>
									      </div>  
									      <div class="card accordion-item">
									        <h2 class="accordion-header" id="headingFour">
									          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFour" aria-expanded="false" aria-controls="accordionFour">
									            Notes <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
									          </button>
									        </h2>

									        <div id="accordionFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
									          <div class="accordion-body">
									            <div class="row mt-4" id="list_tab_content_1">
		    										<div class="col-md-12">
		    											<div class="row">
		    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3 field">
	    														<label for="notes" class="form-label">Notes:</label>
	    														<textarea class="form-control" id="notes" name="notes"></textarea>
	    														<p class="error" id="err_notes"></p>
	    													</div>
	    												</div>
		    											</div>    										
		    										</div>
	    										</div>
									          </div>
									        </div>
									      </div> 
									      <div class="card accordion-item">
									        <h2 class="accordion-header" id="headingFifth">
									          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFifth" aria-expanded="false" aria-controls="accordionFifth">
									            Enclosures, Remarks & Other Details <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
									          </button>
									        </h2>

									        <div id="accordionFifth" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
									          <div class="accordion-body">
									            <div class="row mt-4" id="list_tab_content_1">
		    										<div class="col-md-12">
		    											<div class="row">
		    												<div class="col-md-12 col-lg-2">
	    														<input class="form-check-input ms-2" type="checkbox" id="cds" name="cds">
	    														<label for="cds" class="form-label">CD's: </label>
	    														<p class="error" id="err_cds"></p>
    														</div>
    														<div class="col-md-12 col-lg-2">
	    														<input class="form-check-input ms-2" type="checkbox" id="photos" name="photos">
	    														<label for="photos" class="form-label">Photos: </label>
	    														<p class="error" id="err_photos"></p>
    														</div>
    														<div class="col-md-12 col-lg-2">
		    													<div class="mb-3 field">
		    														<label for="policy" class="form-label"></label>
		    														<input type="text" class="form-control" id="policy" name="policy" value="">
		    														<p class="error" id="err_policy"></p>
		    													</div>
		    												</div>
    														<div class="col-md-12 col-lg-3">
	    														<input class="form-check-input ms-2" type="checkbox" id="cash_less" name="cash_less">
	    														<label for="cash_less" class="form-label">Cash Less: </label>
	    														<p class="error" id="err_cash_less"></p>
    														</div>
    														<div class="col-md-12 col-lg-3">
	    														<input class="form-check-input ms-2" type="checkbox" id="submitted" name="submitted">
	    														<label for="submitted" class="form-label">Submitted: </label>
	    														<p class="error" id="err_submitted"></p>
    														</div>
		    												<div class="col-md-12 col-lg-12">
		    													<div class="mb-3 field">
		    														<label for="enclosures" class="form-label">Enclosures :</label>
		    														<textarea class="form-control" id="enclosures" name="Enclosures"></textarea>
		    														<p class="error" id="err_Enclosures"></p>
		    													</div>
	    													</div>
		    												<div class="col-md-12 col-lg-12">
		    													<div class="mb-3 field">
		    														<label for="note_to_self" class="form-label">Note to Self :</label>
		    														<textarea class="form-control" id="note_to_self" name="note_to_self"></textarea>
		    														<p class="error" id="err_note_to_self"></p>
		    													</div>
	    													</div>
	    													<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="repair_autho_date" class="form-label">Repair Autho Date:</label>
		    														<input type="date" class="form-control" id="repair_autho_date" name="repair_autho_date" value="">
		    														<p class="error" id="err_repair_autho_date"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="repair_completn_date" class="form-label">Repair Completn Date:</label>
		    														<input type="date" class="form-control" id="repair_completn_date" name="repair_completn_date" value="">
		    														<p class="error" id="err_repair_completn_date"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="party_agreed" class="form-label">Party Agreed:</label>
		    														<select id="party_agreed" class="form-select" name="party_agreed">
		    															<!-- <option value=""></option> -->
		    															<option value="Regular">Regular</option>
		    															<option value="Add on policy">Add on policy</option>
		    														</select>
		    														<p class="error" id="err_party_agreed"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="reason_thereof_delay" class="form-label">Reason thereof delay :</label>
		    														<input type="text" class="form-control" id="reason_thereof_delay" name="reason_thereof_delay" value="">
		    														<p class="error" id="err_reason_thereof_delay"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="any_further_observations" class="form-label">Any further Observations:</label>
		    														<input type="text" class="form-control" id="any_further_observations" name="any_further_observations" value="">
		    														<p class="error" id="err_any_further_observations"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="repairing_photo_date" class="form-label">Repairing Photo Date:</label>
		    														<input type="date" class="form-control" id="repairing_photo_date" name="repairing_photo_date" value="">
		    														<p class="error" id="err_repairing_photo_date"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="reinspection_date" class="form-label">Reinspection Date:</label>
		    														<input type="date" class="form-control" id="reinspection_date" name="reinspection_date" value="">
		    														<p class="error" id="err_reinspection_date"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="salvg_destroy" class="form-label">Salvg Destroy:</label>
		    														<select id="salvg_destroy" class="form-select" name="salvg_destroy">
		    															<option value=""></option>
		    														</select>
		    														<p class="error" id="err_salvg_destroy"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="bill_no" class="form-label">Bill No. :</label>
		    														<input type="text" class="form-control" id="bill_no" name="bill_no" value="">
		    														<p class="error" id="err_bill_no"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="bill_date" class="form-label">Bill Date:</label>
		    														<input type="date" class="form-control" id="bill_date" name="bill_date" value="">
		    														<p class="error" id="err_bill_date"></p>
		    													</div>
		    												</div>
		    												<div class="col-md-12 col-lg-4">
		    													<div class="mb-3 field">
		    														<label for="bill_amount" class="form-label">Bill Amount:</label>
		    														<input type="text" class="form-control" id="bill_amount" name="bill_amount" value="">
		    														<p class="error" id="err_bill_amount"></p>
		    													</div>
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
												<button type="button" class="btn btn-primary btn-next" id="next_3"> 
													<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Submit </span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
												</button>
												<button type="button" class="btn btn-primary" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
												
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