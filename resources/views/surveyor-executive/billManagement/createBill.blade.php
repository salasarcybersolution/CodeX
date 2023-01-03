@extends('template_main') @section('content')
<!-- Content -->
<style type="text/css">
	/*.field label{
		padding-left: 0.875rem;
	}*/
	.bill-total {
	    display: flex;
	    align-items: flex-end;
	    justify-content: flex-end;
	}

</style>

<div class="container-xxl flex-grow-1 container-p-y">
	<div class="authentication-wrapper authentication-cover">
    	<div class="authentication-inner row m-0">
    		<div class="d-flex col-lg-12 align-items-center authentication-bg p-0">
    			<div class="col-lg-12">
    				<div class="row mb-2">
    					<div class="col-md-6">
    						<nav aria-label="breadcrumb">
						      <ol class="breadcrumb breadcrumb-style1">
						        <li class="breadcrumb-item">
						          <a href="#">Bill</a>
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
    					<div class="card-body">
    						<div class="row">
    							<div class="col-md-6">
    								<div class="row">
    									<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="billid" class="form-label">Bill # :</label>
												<input type="text" class="form-control" id="billid" name="policy" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="bill_date" class="form-label">Date :</label>
												<input type="date" class="form-control" id="bill_date" name="bill_date" value="">
												<p class="error" id="err_bill_date"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="insurer" class="form-label">Insurer :</label>
												<input type="text" class="form-control" id="insurer" name="policy" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="insurer" class="form-label">Branch :</label>
												<input type="text" class="form-control" id="insurer" name="policy" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<div class="mb-3 field">
												<label for="insurer_branch" class="form-label">Insureance Branch :</label>
												<select id="insurer_branch" class="form-select" name="insurer_branch">
													<option value=""></option>
												</select>

												<p class="error" id="err_insurer_branch"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<div class="mb-3 field">
												<label for="others" class="form-label">Others :</label>
												<textarea class="form-control" id="others" name="others"></textarea>
												<p class="error" id="err_others"></p>
											</div>
										</div>
    								</div>

    								<hr style="height: 2px;" />

    								<h6 class="mb-b fw-semibold">Details :</h6>
    								<div class="row">
    									<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="estimate_amount" class="form-label">Estimate Amount :</label>
												<input type="text" class="form-control" id="estimate_amount" name="estimate amount" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="km_rate" class="form-label">KM Rate :</label>
												<input type="number" class="form-control" id="km_rate" name="km_rate" value="">
												<p class="error" id="err_km_rate"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="assessed_amount" class="form-label">Assessed Amount :</label>
												<input type="text" class="form-control" id="assessed_amount" name="assessed_amount" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="photo_rate" class="form-label">Photo's Rate :</label>
												<input type="text" class="form-control" id="photo_rate" name="photo_rate" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<div class="mb-3 field">
												<label for="insurer_branch" class="form-label">Fee Based on :</label>
												<select id="insurer_branch" class="form-select" name="insurer_branch">
													<option value=""></option>
												</select>
												<p class="error" id="err_insurer_branch"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<div class="mb-3 field">
												<label for="remark" class="form-label">Remark :</label>
												<textarea class="form-control" id="remark" name="remark"></textarea>
												<p class="error" id="err_remark"></p>
											</div>
										</div>
    								</div>	
    							</div>
    							<div class="col-md-6">
    								<h6 class="mb-b fw-semibold">Final</h6>
    								<div class="row">
    									<div class="col-md-12 col-lg-6">
											<div class="mb-3">
												<input class="form-check-input" type="checkbox" id="check_final" name="check_final">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="professional_fees" class="form-label">Professional Fees :</label>
												<input type="text" class="form-control" id="professional_fees" name="professional_fees" value="">
												<p class="error" id="err_professional_fees"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="total_km" class="form-label">Total KM :</label>
												<input type="number" class="form-control" id="total_km" name="total_km" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="visits" class="form-label">Visits :</label>
												<input type="number" class="form-control" id="visits" name="visits" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="visits" class="form-label">Conveyance :</label>
												<input type="number" class="form-control" id="visits" name="visits" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="photos" class="form-label">Photos :</label>
												<input type="text" class="form-control" id="photos" name="photos" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="charge" class="form-label">Charge :</label>
												<input type="text" class="form-control" id="charge" name="charge" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="photos/cd" class="form-label">Photos/CD :</label>
												<input type="text" class="form-control" id="photos/cd" name="photos CD" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<div class="mb-3 field">
												<label for="final_remark" class="form-label">Remark :</label>
												<textarea class="form-control" id="final_remark" name="final_remark"></textarea>
												<p class="error" id="err_final_remark"></p>
											</div>
										</div>
    								</div>

    								<hr style="height: 2px;" />

    								<h6 class="mb-b fw-semibold">Reinspection</h6>
    								<div class="row">
    									<div class="col-md-12 col-lg-6">
											<div class="mb-3">
												<input class="form-check-input" type="checkbox" id="check_final" name="check_final">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="professional_fees" class="form-label">Professional Fees :</label>
												<input type="text" class="form-control" id="professional_fees" name="professional_fees" value="">
												<p class="error" id="err_professional_fees"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="total_km" class="form-label">Total KM :</label>
												<input type="number" class="form-control" id="total_km" name="total_km" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="visits" class="form-label">Visits :</label>
												<input type="number" class="form-control" id="visits" name="visits" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="visits" class="form-label">Conveyance :</label>
												<input type="number" class="form-control" id="visits" name="visits" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="photos" class="form-label">Photos :</label>
												<input type="text" class="form-control" id="photos" name="photos" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="charge" class="form-label">Charge :</label>
												<input type="text" class="form-control" id="charge" name="charge" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="photos/cd" class="form-label">Photos/CD :</label>
												<input type="text" class="form-control" id="photos/cd" name="photos CD" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<div class="mb-3 field">
												<label for="final_remark" class="form-label">Remark :</label>
												<textarea class="form-control" id="final_remark" name="final_remark"></textarea>
												<p class="error" id="err_final_remark"></p>
											</div>
										</div>
    								</div>

    								<hr style="height: 2px;" />
    									
    								<h6 class="mb-b fw-semibold">Spot</h6>
    								<div class="row">
    									<div class="col-md-12 col-lg-6">
											<div class="mb-3">
												<input class="form-check-input" type="checkbox" id="check_final" name="check_final">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="professional_fees" class="form-label">Professional Fees :</label>
												<input type="text" class="form-control" id="professional_fees" name="professional_fees" value="">
												<p class="error" id="err_professional_fees"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="total_km" class="form-label">Total KM :</label>
												<input type="number" class="form-control" id="total_km" name="total_km" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="visits" class="form-label">Visits :</label>
												<input type="number" class="form-control" id="visits" name="visits" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="visits" class="form-label">Conveyance :</label>
												<input type="number" class="form-control" id="visits" name="visits" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="photos" class="form-label">Photos :</label>
												<input type="text" class="form-control" id="photos" name="photos" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="charge" class="form-label">Charge :</label>
												<input type="text" class="form-control" id="charge" name="charge" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="photos/cd" class="form-label">Photos/CD :</label>
												<input type="text" class="form-control" id="photos/cd" name="photos CD" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<div class="mb-3 field">
												<label for="final_remark" class="form-label">Remark :</label>
												<textarea class="form-control" id="final_remark" name="final_remark"></textarea>
												<p class="error" id="err_final_remark"></p>
											</div>
										</div>
    								</div>

    								<hr style="height: 2px;" />
    									
    								<div class="row">
    									<div class="offset-lg-4 col-lg-8">
    										<div class="bill-total mb-3">
    											<label class="form-label m-0">Others Total :</label>
    											<input class="form-check-input mx-2" type="checkbox" id="check_others_total" name="check_final">
    											<input type="number" class="form-control w-50" id="others_total" name="Other Total" value="">
    										</div>
    										<div class="bill-total mb-3">
    											<label class="form-label m-0">C GST @ :</label>
    											<input type="number" class="form-control w-25 mx-2" id="cgst_pras" name="Other Total" value=""> %
    											<input type="number" class="form-control ms-1 w-50" id="cgst_pras" name="Other Total" value="">
    										</div>
    										<div class="bill-total mb-3">
    											<label class="form-label m-0">S GST @ :</label>
    											<input type="number" class="form-control w-25 mx-2" id="cgst_pras" name="Other Total" value=""> %
    											<input type="number" class="form-control ms-1 w-50" id="cgst_pras" name="Other Total" value="">
    										</div>
    										<div class="bill-total mb-3">
    											<label class="form-label m-0">I GST @ :</label>
    											<input type="number" class="form-control w-25 mx-2" id="cgst_pras" name="Other Total" value=""> %
    											<input type="number" class="form-control ms-1 w-50" id="cgst_pras" name="Other Total" value="">
    										</div>
    									</div>
    								</div>
    								<div class="row align-items-end">
    									<div class="col-md-4">
    										<div class="bill-total mb-3 justify-content-start">
    											<input class="form-check-input me-1" type="checkbox" id="check_cash-received" name="check_final">
    											<label class="form-label m-0" for="check_cash-received">: Cash Received</label>    				
    										</div>
    									</div>
    									<div class="col-md-8">
    										<div class="bill-total mb-3">
    											<label class="form-label m-0">Net Payable :</label>
    											<input type="number" class="form-control w-50 ms-1" id="cgst_pras" name="Other Total" value="">
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    						<div class="row mt-5">
    							<div class="col-xs-12 text-center">
    								<div class="btn-group" role="group" aria-label="Basic example">
						                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
						                  <i class="far fa-plus-square"></i> &nbsp;
 											Add </button>	
						                <button type="button" class="btn btn-primary">
    					                	<i class="far fa-edit"></i>  &nbsp;
						                 Modify</button>
						                <button type="button" class="btn btn-primary">
						                	<i class="far fa-save"></i> &nbsp;
						                Save</button>
						                <button type="button" class="btn btn-primary">
						                	<i class="far fa-window-close"></i> &nbsp;
						                Cancel</button>
						                <button type="button" class="btn btn-primary"> 
						                	<i class="fas fa-print"></i> &nbsp;
							                Print</button>
						                <button type="button" class="btn btn-primary"> 
						                	<i class="far fa-times-circle"></i> &nbsp;
						                Close</button>
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




<div class="modal fade" id="addModal" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-simple">
    <div class="modal-content p-3">
      <div class="modal-body">
        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
        <!-- Model Content -->
      	 <div id="table-scroll" class="table-scroll">
		  <table id="main-table" class="main-table">
		    <thead>
		      <tr>
		        <th scope="col">Survey Ref</th>
		        <th scope="col">Survey Type</th>
		        <th scope="col">Allotment</th>
		        <th scope="col">Insurer</th>
		        <th scope="col">Registration</th>
		        <th scope="col">Insured Name</th>
		        <th scope="col">Make Model</th>
		        <th scope="col">Garage</th>
		        <th scope="col">Claim No</th>
		        <th scope="col">Policy No</th>
		        <th scope="col">Remarks</th>
		        <th scope="col">Survey</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		      <tr>
		        <th>Left Column</th>
		        <td>Cell content</td>
		        <td>Cell content longer</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		        <td>Cell content</td>
		      </tr>
		    </tbody>
		  </table>
		</div>	

		<div class="modal_bottom">
		  	<div class="row mt-3">
		  		<div class="col-md-5">
		  			<div class="row">
		  				<div class="col-1">
		  					<input class="form-check-input me-1" type="checkbox" id="check_datefilter" name="check_filter">
		  				</div>
		  				<div class="col-5">
		  					<div class="field">
		  						<label for="modal_from-date" class="form-label">From :</label>
								<input type="date" class="form-control" id="modal_from-date" name="From Date" value="">
							</div>	
		  				</div>
		  				<div class="col-5">
		  					<div class="field">
		  						<label for="modal_to-date" class="form-label">To :</label>
								<input type="date" class="form-control" id="modal_to-date" name="To Date" value="">
							</div>	
		  				</div>
		  			</div>
		  		</div>
		  		<div class="col-md-7">
		  			<div class="row">
		  				<div class="col-5">
		  					<div class="field">
			  					<label for="insurer_branch" class="form-label">Fee Based on :</label>
								<select id="insurer_branch" class="form-select" name="insurer_branch">
									<option value=""></option>
								</select>
								<p class="error" id="err_insurer_branch"></p>		
							</div>
		  				</div>
		  				<div class="col-7">
		  					<input type="search" class="form-control" id="modal_to-date" name="To Date" value="" placeholder="Search ....">
		  				</div>
		  			</div>
		  			
		  		</div>
		  	</div>
		  </div>
        <!-- End Model Content -->
      </div>
    </div>
  </div>
</div>


<style type="text/css">
	.table-scroll {
  position: relative;
  width:100%;
  z-index: 1;
  margin: auto;
  overflow: auto;
  height: 400px;
}
.table-scroll table {
  width: 100%;
  min-width: 1280px;
  margin: auto;
  border-collapse: separate;
  border-spacing: 0;
}
.table-wrap {
  position: relative;
}
.table-scroll th,
.table-scroll td {
  	padding: 5px 10px;
	border: 1px solid #f5f5f5;
	background: #fff;
	vertical-align: top;
	font-size: 12px;
}
.table-scroll thead th {
  background: #f3f3f3; 
  position: -webkit-sticky;
  position: sticky;
  top: 0;
}
/* safari and ios need the tfoot itself to be position:sticky also */
.table-scroll tfoot,
.table-scroll tfoot th,
.table-scroll tfoot td {
  position: -webkit-sticky;
  position: sticky;
  bottom: 0;
  background: #666;
  color: #fff;
  z-index:4;
}
#addModal button.btn-close {
    right: -0.5rem !important;
    top: -0.5rem !important;
}

thead th:first-child,
tfoot th:first-child {
  z-index: 5;
}

</style>










@endsection