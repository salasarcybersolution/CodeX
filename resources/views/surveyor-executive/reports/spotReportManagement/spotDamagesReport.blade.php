@extends('template_main') @section('content')
<style type="text/css">
.form-label {
	float: left !important;
}

.mb-3 p {
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
	    </h4> @if(Session::has('msg'))
	<div class="row flasMsg">
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible" role="alert"> {{ Session::get('msg') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	</div> @endif
	<div class="authentication-wrapper authentication-cover">
		<div class="authentication-inner row m-0">
			<div class="d-flex col-lg-12 align-items-center authentication-bg p-sm-5 p-3" style="padding: 0px !important;">
				<div class="col-lg-12">
					<!-- Logo -->@if(Session::has('msg'))
					<p class="error" style="text-align: center;color: red;">{{ Session::get('msg') }}</p> @endif
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
	                           <a class="nav-link-tab active" id="damages_tab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-within-card-active" aria-controls="navs-pills-within-card-active" aria-selected="true" href="{{url('SpotReport/damages-report')}}/{{Request::segment(3)}}">Damages</a>
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
									<form class="needs-validation" novalidate id="registrationFormFinal" action="{{url('SpotReport/save-damages-report')}}" method="POST">
                              			@csrf
										<div class="row mt-4">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-12 col-lg-12">
														<div class="mb-3">
															<h5>Accidental Details:</h5>
															<hr> </div>
													</div>
													<div class="accidental-add-more" id="accidental-add-more">
														<?php 
														if(!empty($damageDetails)){
															$parts_array = json_decode($damageDetails->parts);
															$description = json_decode($damageDetails->description);
															$count = count($parts_array); 
															for ($i=0; $i < $count; $i++) { 
														?>
														<div class="row">
															<div class="col-md-12 col-lg-2">
																<div class="mb-3 mySelect">
																	<label for="part" class="form-label">Part:</label>
																	<select id="part" class="form-select" name="part[]" onchange="subParts(this,{{$i}})">   
																		 <option value="">Select</option>
																		<?php foreach($parts as $row){ ?>
																         <option value="<?php echo $row->part_id;?>" <?php if($parts_array[$i] == $row->part_id){echo 'selected';} ?>><?php echo $row->part_name;?></option>
																        <?php } ?>
																 	</select>
																	<p class="error" id="err_part"></p>
																</div>
															</div>
															<div class="col-md-12 col-lg-4">
																   <div class="selectdiv">
																   	<label for="part" class="form-label"></label>
																	   	<ul class="subparts-{{$i}}"></ul>
																   </div>
															</div>
															<div class="col-md-12 col-lg-5">
																<div class="pb-3">
																	<label for="description" class="form-label">Description of Damages:</label>
																	<textarea id="description-{{$i}}" name="description[]" class="form-control"><?php echo $description[$i]; ?></textarea>
																</div>
															</div>
															<div class="col-md-12 col-lg-1">
																<div class="mb-3">
																	<button type="button" class="btn rounded-pill btn-icon btn-outline-primary addCF" > <span class="tf-icons bx bx-plus"></span></button>
																</div>
															</div>
														</div>
														<?php } }else{?>
															<div class="row">
															<div class="col-md-12 col-lg-2">
																<div class="mb-3 mySelect">
																	<label for="part" class="form-label">Part:</label>
																	<select id="part" class="form-select" name="part[]" onchange="subParts(this,1)">   
																		 <option value="">Select</option>
																		<?php foreach($parts as $row){ ?>
																         <option value="<?php echo $row->part_id;?>"><?php echo $row->part_name;?></option>
																        <?php } ?>
																 	</select>
																	<p class="error" id="err_part"></p>
																</div>
															</div>
															<div class="col-md-12 col-lg-4">
																   <div class="selectdiv">
																   	<label for="part" class="form-label"></label>
																	   	<ul class="subparts-1"></ul>
																   </div>
															</div>
															<div class="col-md-12 col-lg-5">
																<div class="pb-3">
																	<label for="description" class="form-label">Description of Damages:</label>
																	<textarea id="description-1" name="description[]" class="form-control"></textarea>
																</div>
															</div>
															<!-- <div class="col-md-12 col-lg-1">
																<div class="mb-3">
																	<button type="button" class="btn rounded-pill btn-icon btn-outline-primary addCF" > <span class="tf-icons bx bx-plus"></span></button>
																</div>
															</div> -->
														</div>
														<?php } ?>	

														<button type="button" class="btn rounded-pill btn-icon btn-outline-primary addCF add-more" > <span class="tf-icons bx bx-plus"></span></button>
													</div>

													<div class="row mt-5">
														<div class="col-md-12 col-lg-12" style="text-align: right;">
															<input type="hidden" id="report_id" name="report_id" value="{{Request::segment(3)}}">
															<button type="submit" class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Save & Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i> </button>
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
					<!-- /Login -->
				</div>
			</div>
		</div>
	</div>



<style type="text/css">
	.selectdiv ul {
    list-style: none;
    padding: 0;
    height: 64px;
    overflow-y: scroll;
    clear: both;
}
#accidental-add-more {
  position: relative;
}
.btn.rounded-pill.btn-icon.btn-outline-primary.addCF.add-more {
	position: absolute;
	right: 59px;
	bottom: 0px;
}
</style>


<script type="text/javascript">
	// $(document).ready(function(){
	// 	$('.selectdiv li').click(function(){
	// 		let text = $(this).text();
	// 		console.log(text);

	// 		let val = $('#description').val();	
	// 		console.log(val);

	// 		let sting = val+text+ ', '

	// 		$('#description').val(sting);	

	// 	});
	// });

	function appendData(text, id){
		let val = $("#description-"+id+"").val();	
		console.log(val);
		let sting = val+text+ ', '
		$("#description-"+id+"").val(sting);
	}
</script>


		<!--/ Content -->
@endsection
