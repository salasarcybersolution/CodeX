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
	    														<textarea class=" form-control" id="remark_damages"  name="couse&remark_damages" id="remark_damages"></textarea>
	    														<p class="error" id="err_remark_damages"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="time_of_accident" class="form-label">Notes:</label>
	    														<textarea class=" form-control" id="notes"  name="notes"></textarea>
	    														<p class="error" id="err_notes"></p>
	    													</div>
	    												</div>
	    											
	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="endclosers" class="form-label">Endclosers:</label>
	    														<input type="text" class="form-control" id="endclosers" name="endclosers" value="">
	    														<p class="error" id="err_endclosers"></p>
	    													</div>
	    												</div>
	    												<div class="col-md-12 col-lg-6">
	    													<div class="mb-3 field">
	    														<label for="remarks" class="form-label">Remarks:</label>
	    														<input type="text" class="form-control" id="remarks" name="remarks">
	    														<p class="error" id="err_remarks"></p>
	    													</div>
	    												</div>
	    											</div>
	    											<div class="row mt-5">
	    												<div class="col-md-12 col-lg-12" style="text-align: right;"> 
	    													<!-- <button style="color: #fff;" class="btn btn-primary btn-prev" ><a href="{{url('SpotReport/damages-report')}}/{{ $report_id; }}"><i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span>  </a></button> -->.
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