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
		<h4 class="fw-bold py-3 mb-4">
			<span class="text-muted fw-light"> </span> 
	   <!--    <div style="float: right;margin-top: -10px;">
	      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BankModal">
	      Add New Record
	            </button>
	        </div> -->
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
	    <div class="alert alert-success alert-dismissible" id="showMsg" role="alert" style="display: none;">
	    	         Notes remark report Suucessfully save
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
        </div>

	    <div class="authentication-wrapper authentication-cover">
	    	<div class="authentication-inner row m-0">

	    		<div class="d-flex col-lg-12 align-items-center authentication-bg p-sm-5 p-3" style="padding: 0px !important;">
	    			<div class="col-lg-12">
	    				<!-- Logo -->


	    				@if(Session::has('msg'))
	    				<p class="error" style="text-align: center;color: red;">{{ Session::get('msg') }}</p>
	    				@endif

	    				<div class="card">
	    					<div class="card-header">
		                     <ul class="nav nav-pills" role="tablist" >
		                        <li class="nav-item">
		                           <span class="tab-number btn-success">80%</span>
		                           <a class="nav-link-tab" id="policy_tab" href="{{url('SpotReport/policy-report')}}/{{Request::segment(3)}}">Policy & Vehicle</a>
		                        </li>
		                        <li class="nav-item">
		                           <span class="tab-number btn-danger">0%</span>
		                           <a class="nav-link-tab" id="survey_tab" href="{{url('SpotReport/survey-report')}}/{{Request::segment(3)}}">Survey</a>
		                        </li>
		                        <li class="nav-item active">
		                           <span class="tab-number btn-warning">80%</span>
		                           <a class="nav-link-tab" id="damages_tab" href="{{url('SpotReport/damages-report')}}/{{Request::segment(3)}}">Damages</a>
		                        </li>
		                        <li class="nav-item">
		                           <span class="tab-number btn-success">80%</span>
		                           <a class="nav-link-tab active" id="notes_tab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-within-card-active" aria-controls="navs-pills-within-card-active" aria-selected="true" href="{{url('SpotReport/notes-remark-report')}}/{{Request::segment(3)}}">Notes & Remark</a>
		                        </li>
		                     </ul>
		                  </div>
	    					<div class="card-body">
	    						<div class="tab-content p-0">
	    							<div class="tab-pane fade show active" id="navs-pills-within-card-active" role="tabpanel">    								
	    								<form class="needs-validation" novalidate id="registrationFormFinal" action="{{url('SpotReport/save-notes-remark-report')}}" method="POST">	
	    									@csrf
	    									<div class="row mt-4">
	    										<div class="col-md-12">
	    											<div class="row">
	    												<div class="col-md-12 col-lg-12">
	    													<div class="mb-3 field">
	    														<h5>Remark / Damages:</h5>
	    														<hr>
	    													</div>
	    												</div>
	    												<input type="hidden" name="report_id" id="report_id" value="{{$report_id}}"> 

	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    												<label for="time_of_accident" class="form-label">Damages:</label>
	    														<textarea class=" form-control" id="remark_damages"  name="damages" id="damages">@if(isset($ReportRemarkDetails->damages)){{$ReportRemarkDetails->damages}}@endif</textarea>
	    														<p class="error" id="err_remark_damages"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="time_of_accident" class="form-label">Notes:</label>
	    														<textarea class=" form-control" id="notes"  name="notes">@if(isset($ReportRemarkDetails->notes)){{$ReportRemarkDetails->notes}}@endif</textarea>
	    														<p class="error" id="err_notes"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="endclosers" class="form-label">Endclosers:</label>
	    														<input type="text" class="form-control" id="endclosers" name="endclosers" value="@if(isset($ReportRemarkDetails->endclosers)){{$ReportRemarkDetails->endclosers}}@endif">
	    														<p class="error" id="err_endclosers"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="remarks" class="form-label">Remarks:</label>
	    														<input type="text" class="form-control" id="remarks" value="@if(isset($ReportRemarkDetails->remarks)){{$ReportRemarkDetails->remarks}}@endif" name="remarks">
	    														<p class="error" id="err_remarks"></p>
	    													</div>
	    												</div>
	    											</div>

	    											<div class="row mt-3">
	    												<div class="col-md-12 col-lg-10 submit-form" style="text-align: right;"> 
	    													<div class="sub-btn">
	    														<input type="checkbox" value="1" <?php if(isset($reportData->is_submitted) && $reportData->is_submitted == 1){echo 'checked';} ?>  name="is_submitted" id="submit-form">
		    													<label for="submit-form" class="form-labels">Submitted</label> 
		    												</div>
	    												</div>
	    												<div class="col-md-12 col-lg-2" style="text-align: right;"> 
	    													<button type="button" class="btn btn-outline-secondary agreegate-nos">
												                 Agreegate Nos. &nbsp; <i class="bx bx-chevron-down bx-sm me-sm-n2"></i>
												              </button>
	    												</div>
	    											</div>

	    											<div class="row mt-3 mb-3 designed-class" id="agreegate-sec" style="display: <?php if(!empty($ReportAgreegateNos)){echo "content";}else{echo "none";} ?>;">
															<table>
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Item Name</th>
																			<th>Nos / Remark</th>
																			<th></th>
																		</tr>
																	</thead>
																	<tbody id="addRow">

																	<?php if(!empty($ReportAgreegateNos)){ 
																		$nos_item_name = json_decode($ReportAgreegateNos->nos_item_name); 
																		$nos_remark = json_decode($ReportAgreegateNos->nos_remark); 
																		for ($i=0; $i < count($nos_item_name); $i++) { 
																	?>
																		<tr>
																			<td><?php echo $i+1; ?></td>
																			<td><input type="text" value="<?php echo $nos_item_name[$i]; ?>" class="form-control" id="nos_item_name" name="nos_item_name[]" required></td>
																			<td><input type="text" value="<?php echo $nos_remark[$i]; ?>" class="form-control" id="nos_remark" name="nos_remark[]" required></td>
																			<td><button type="button" class="btn rounded-pill btn-icon btn-outline-primary remCF"> <span class="tf-icons bx bx-minus"></span></button></td>
																		</tr>
																	<?php }}else{?>
																		<tr>
																			<td>1</td>
																			<td><input type="text" class="form-control" id="nos_item_name" name="nos_item_name[]" required></td>
																			<td><input type="text" class="form-control" id="nos_remark" name="nos_remark[]" required></td>
																			<td><button type="button" class="btn rounded-pill btn-icon btn-outline-primary remCF"> <span class="tf-icons bx bx-minus"></span></button></td>
																		</tr>
																	<?php } ?>	
																	</tbody>
															</table>
															<table>
																<tr><td style="border:none; text-align: right;">
																	<button type="button" class="btn rounded-pill btn-icon btn-outline-primary addCF add-more" > <span class="tf-icons bx bx-plus"></span></button>

																</td></tr>
															</table>
														</div>

	    											<div class="row mt-5">
	    												<div class="col-md-12 col-lg-12" style="text-align: right;"> 
	    													<input type="hidden" id="report_id" name="report_id" value="{{Request::segment(3)}}">
	    													<button type="submit" class="btn btn-primary btn-next"> 
	    													<span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Submit</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
	    													</button>
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
   </div>
</div>
	    @endsection

<style type="text/css">
.btn.btn-outline-secondary.agreegate-nos {
padding: 2px 15px;
}
.designed-class {
  background: #fbfafa;
  padding: 10px;
}
.designed-class thead th {
  padding: 8px 6px;
}
.designed-class tbody td {
  padding: 8px 6px;
  border-bottom: 1px solid #ccc;
}
.designed-class thead {
  background: #eae9e9;
}
.sub-btn {
  border: 1px solid;
  width: 100px;
  float: right;
  text-align: center;
  padding: 2px;
  border-radius: 6px;
}
.remCF {
  float: right;
}
</style>