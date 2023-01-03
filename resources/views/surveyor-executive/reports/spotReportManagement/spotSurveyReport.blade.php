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
                           <a class="nav-link-tab" id="policy_tab" href="{{url('SpotReport/policy-report')}}/{{Request::segment(3)}}">Policy & Vehicle</a>
                        </li>
                        <li class="nav-item">
                           <span class="tab-number btn-danger">0%</span>
                           <a class="nav-link-tab active" id="survey_tab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-within-card-active" aria-controls="navs-pills-within-card-active" aria-selected="true">Survey</a>
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
                           <form class="needs-validation" novalidate id="registrationFormFinal" action="{{url('SpotReport/saveSurveyInfo')}}" method="POST">
                           	@csrf
                              <div class="accordion mt-3" id="accordionExample">
                                 <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                       <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
                                       Accidental Details<i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
                                       </button>
                                    </h2>
                                    <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                       <div class="accordion-body">
                                          <div class="row mt-4" id="list_tab_content_1">
                                              <div class="col-md-12 col-lg-3">
	    													<div class="mb-3 field">
	    														<label for="date_of_accident" class="form-label">Date of Accident #:</label>
	    														<input type="date" class="form-control" id="date_of_accident"  name="date_of_accident" value="@if(isset($surveyDetails->date_of_accident)) {{$surveyDetails->date_of_accident}} @endif" required>
	    														<p class="error" id="err_date_of_accident"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-3">
	    													<div class="mb-3 field">
	    														<label for="time_of_accident" class="form-label">Time of accident:</label>
	    														<input type="text" class="form-control" id="time_of_accident"  name="time_of_accident" value="@if(isset($surveyDetails->time_of_accident)) {{$surveyDetails->time_of_accident}} @endif">
	    														<p class="error" id="err_time_of_accident"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-3">
	    													<div class="mb-3 field">
	    														<label for="place_of_accident" class="form-label">Place of Accident/Survey :</label>
	    														<input type="text" class="form-control" id="place_of_accident"  name="place_of_accident" value="@if(isset($surveyDetails->place_of_accident)) {{$surveyDetails->place_of_accident}} @endif">
	    														<p class="error" id="err_place_of_accident"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-3">
	    													<div class="mb-3 field">
	    														<label for="vehicle_shifted_to" class="form-label">Vehicle Shifted To:</label>
	    														<input type="text" class="form-control" id="vehicle_shifted_to"  name="vehicle_shifted_to" value="@if(isset($surveyDetails->vehicle_shifted_to)) {{$surveyDetails->vehicle_shifted_to}} @endif">
	    														<p class="error" id="err_vehicle_shifted_to"></p>
	    													</div>
	    												</div>

	    												
	    												<div class="col-md-12 col-lg-3">
	    													<div class="mb-3 field">
	    														<label for="parson_available_on_spot" class="form-label">Parson Available On Spot:</label>
	    														<input type="test" class="form-control" id="parson_available_on_spot"  name="parson_available_on_spot" value="@if(isset($surveyDetails->parson_available_on_spot)) {{$surveyDetails->parson_available_on_spot}} @endif">
	    														<p class="error" id="err_parson_available_on_spot"></p>
	    													</div>
	    												</div>
	    												<!-- <div class="col-md-12 col-lg-3">
	    													<div class="mb-3 field">
	    														<label for="parmit_to_date" class="form-label">Parmit To:</label>
	    														<input type="date" class="form-control" id="parmit_to_date"  name="parmit_to_date" value="@if(isset($surveyDetails->parmit_to_date)) {{$surveyDetails->parmit_to_date}} @endif">
	    														<p class="error" id="err_parmit_to_date"></p>
	    													</div>
	    												</div> -->

	    												<div class="col-md-12 col-lg-3">
	    													<div class="mb-3 field">
	    														<label for="allotment_date" class="form-label">Allotment  Date:</label>
	    														<input type="date" class="form-control" id="allotment_date"  name="allotment_date" value="@if(isset($surveyDetails->allotment_date)) {{$surveyDetails->allotment_date}} @endif">
	    														<p class="error" id="err_allotment_date"></p>
	    													</div>
	    												</div>
	    												
	    												<div class="col-md-12 col-lg-3">
	    													<div class="mb-3 field">
	    														<label for="inspection" class="form-label">Inspection:</label>
	    														<input type="date" class="form-control" id="inspection"  name="inspection" value="@if(isset($surveyDetails->inspection_date)) {{$surveyDetails->inspection_date}} @endif">
	    														<p class="error" id="err_inspection"></p>
	    													</div>
	    												</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                       <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                                       Couse & Nature of Accident <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
                                       </button>
                                    </h2>
                                    <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                       <div class="accordion-body">
                                          <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														
	    														<label for="cousenature" class="form-label">Couse & Nature of Accident:</label>
	    														<textarea class="ckeditor form-control" id="cousenature"  name="cousenature">@if(isset($surveyDetails->cousenature)) {{$surveyDetails->cousenature}} @endif</textarea>
	    														<p class="error" id="err_cousenature"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="police_action" class="form-label">Police Action:</label>
	    														<textarea class="form-control" id="police_action"  name="police_action">@if(isset($surveyDetails->police_action)) {{$surveyDetails->police_action}} @endif</textarea>
	    														<p class="error" id="err_police_action"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="name_of_police_satation" class="form-label">Name of Police Station:</label>
	    														<input type="text" class="form-control" id="name_of_police_satation"  name="driver_dob" value="@if(isset($surveyDetails->name_of_police_satation)) {{$surveyDetails->name_of_police_satation}} @endif">
	    														<p class="error" id="err_name_of_police_satation"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="satation_dairy_no" class="form-label">Station Diary No (FIR):</label>
	    														<input type="text" class="form-control" id="satation_dairy_no"  name="satation_dairy_no" value="@if(isset($surveyDetails->satation_dairy_no)) {{$surveyDetails->satation_dairy_no}} @endif">
	    														<p class="error" id="err_satation_dairy_no"></p>
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
                                       Load & Challan Details <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
                                       </button>
                                    </h2>
                                    <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="accordionThree" data-bs-parent="#accordionExample" style="">
                                       <div class="accordion-body">
                                          <div class="col-md-12">
                                             <div class="row">
                                             	<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="nature_of_goods" class="form-label">Nature of Goods:</label>
	    														<input type="text" class="form-control" id="nature_of_goods"  name="nature_of_goods" value="@if(isset($surveyDetails->nature_of_goods)) {{$surveyDetails->nature_of_goods}} @endif">
	    														
	    														<p class="error" id="err_nature_of_goods"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="Goods_caried" class="form-label">Weight of Goods caried:</label>
	    														<input type="text" class="form-control" id="Goods_caried"  name="Goods_caried" name="nature_of_goods" value="@if(isset($surveyDetails->Goods_caried)) {{$surveyDetails->Goods_caried}} @endif">
	    														
	    														<p class="error" id="err_Goods_caried"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="name_origin_destination" class="form-label">Origin Destination:</label>
	    														<input type="text" class="form-control" id="origin_destination"  name="origin_destination" value="@if(isset($surveyDetails->origin_destination)) {{$surveyDetails->origin_destination}} @endif">
	    														<p class="error" id="err_origin_destination"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="lr_invoice_no" class="form-label">L/R Invoice No & Date:</label>
	    														<input type="text" class="form-control" id="lr_invoice_no"  name="lr_invoice_no" value="@if(isset($surveyDetails->lr_invoice_no)) {{$surveyDetails->lr_invoice_no}} @endif">
	    														<p class="error" id="err_lr_invoice_no"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="transporter_no" class="form-label">Transporter's Name:</label>
	    														<input type="text" class="form-control" id="transporter_no"  name="transporter_no" value="@if(isset($surveyDetails->transporter_no)) {{$surveyDetails->transporter_no}} @endif">
	    														<p class="error" id="err_transporter_no"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-4">
	    													<div class="mb-3 field">
	    														<label for="no_of_passangers" class="form-label"> No of Passangers:</label>
	    														<input type="text" class="form-control" id="no_of_passangers"  name="no_of_passangers" value="@if(isset($surveyDetails->no_of_passangers)) {{$surveyDetails->no_of_passangers}} @endif">
	    														<p class="error" id="err_no_of_passangers"></p>
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
                                       Third Party Loss & Injuries Details <i class="fa fa-check-circle custom_css mx-1" aria-hidden="true"></i>
                                       </button>
                                    </h2>
                                    <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="accordionFour" data-bs-parent="#accordionExample" style="">
                                       <div class="accordion-body">
                                          <div class="col-md-12">
                                             <div class="row">
                                             	<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field" >
	    														<label for="tp_vehicle_details" class="form-label">Details of TP Vehicle:</label>
	    														<textarea class="form-control" rows="3" id="tp_vehicle_details" name="tp_vehicle_details">@if(isset($surveyDetails->tp_vehicle_details)) {{$surveyDetails->tp_vehicle_details}} @endif</textarea>
	    														<p class="error" id="err_tp_vehicle_details"></p>
	    													</div>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="tp_death_injuri_details" class="form-label">Death / Injuries Details of Insured Vehicle:</label>
	    														<textarea id="tp_death_injuri_details" rows="3" class="form-control" name="tp_death_injuri_details">
	    														@if(isset($surveyDetails->tp_death_injuri_details)) {{$surveyDetails->tp_death_injuri_details}} @endif</textarea>
	    														<p class="error" id="err_death_injuri_details"></p>
	    													</div>
	    												</div>

	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="death_tp_vehicle_details" class="form-label">Death / Injuries Details of TP Vehicle :</label>
	    														<textarea id="death_tp_vehicle_details" rows="3" class="form-control" name="death_tp_vehicle_details">@if(isset($surveyDetails->death_tp_vehicle_details)) {{$surveyDetails->death_tp_vehicle_details}} @endif</textarea>
	    														<p class="error" id="err_death_tp_vehicle_details"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="third_party_property_damages" class="form-label">Third Party Porperty Damages:</label>
	    														<textarea id="third_party_property_damages" rows="3" class="form-control" name="third_party_property_damages">@if(isset($surveyDetails->third_party_property_damages)) {{$surveyDetails->third_party_property_damages}} @endif</textarea>
	    														<p class="error" id="err_third_party_property_damages"></p>
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
                                                   <div class="col-md-12 col-lg-6" style="text-align: right;"> 
                                                      <!-- <button type="button" class="btn btn-primary btn-prev" onclick="registrationProcessBack('2')"> 
                                                      <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> 
                                                      </button> -->
                                                      <button type="submit" class="btn btn-primary btn-next"> 
                                                      <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                                      </button>
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
