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
<?php 
// echo '<pre>';
// print_r($sql);
// echo '</pre>';

?>
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
    						<!-- <button type="button" class="btn btn-primary btn-next">Add New</button> -->
    					</div>
    				</div>	
    				<div class="row">
    					<div class="col-md-6">
    						<div class="card mb-3">
    							<div class="card-body">
    								<div class="row">
    									<div class="col-md-12 col-lg-6">
											<div class="mb-3 field focus-active">
												<label for="billid" class="form-label">Bill # :</label>
												<input type="text" class="form-control" id="billid" name="policy" value="80857">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field focus-active">
												<label for="bill_date" class="form-label">Date :</label>
												<input type="date" class="form-control" id="bill_date" name="bill_date" value="{{$sql->allotment_date}}">
												<p class="error" id="err_bill_date"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field focus-active">
												<label for="insurer" class="form-label">Insurer :</label>
												<input type="text" class="form-control" id="insurer" name="policy" value="{{getInsurerInfo($sql->insurer_id)->insurer_name}}">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field focus-active">
												<label for="insurer" class="form-label">Insurar Branch :</label>
												<input type="text" class="form-control" id="insurer" name="policy" value="{{getBranchInfo($sql->insurer_branch_id)->branch_name}}">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
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
												<textarea class="form-control" id="others" name="others" style="height:48px;"></textarea>
												<p class="error" id="err_others"></p>
											</div>
										</div>
    								</div>
    							</div>
    						</div>	

    						<div class="card mb-3">
    							<div class="card-body">	
    								<h6 class="mb-b fw-semibold">Details :</h6>
    								<div class="row">
    									<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="estimate_amount" class="form-label">Estimate Amount :</label>
												<input type="text" class="form-control" id="estimate_amount" name="estimate amount" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="km_rate" class="form-label">KM Rate :</label>
												<input type="number" class="form-control" id="km_rate" name="km_rate" value="10">
												<p class="error" id="err_km_rate"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-3 field">
												<label for="assessed_amount" class="form-label">Assessed Amount :</label>
												<input type="text" class="form-control" id="assessed_amount" name="assessed_amount" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="photo_rate" class="form-label">Photo's Rate :</label>
												<input type="text" class="form-control" id="photo_rate" name="photo_rate" value="10">
											</div>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mb-3 field">
												<label for="insurer_branch" class="form-label">Fee Based on :</label>
												<select id="insurer_branch" class="form-select" name="insurer_branch">
													<option value="assessed">Assessed</option>
													<option value="estimate">Estimate</option>
													<option value="idv">IDV</option>
												</select>
												<p class="error" id="err_insurer_branch"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<div class="mb-3 field">
												<label for="remark" class="form-label">Remark :</label>
												<textarea class="form-control" id="remark" name="remark" style="height:33px;"></textarea>
												<p class="error" id="err_remark"></p>
											</div>
										</div>
    								</div>
    							</div>
    						</div>


    						<div class="card mb-3">
    							<div class="card-body">	
    								
    								<div class="row">
    									<div class="table-responsive text-nowrap">
										    <table class="table">
										      <thead>
										        <tr>
										          <th></th>
										          <th>Report</th>
										          <th>Name</th>
										          <th>Reg. No</th>
										          <th>S. No</th>
										        </tr>
										      </thead>
										      <tbody class="table-border-bottom-0">
										      	<?php if($allBill){ 
										      		foreach($allBill as $billData){ 
										      	?> 
								      			<tr>
										          <td><input type="checkbox" class="form-check-input" <?php if($sql->report_type == $billData->report_type) echo 'checked';?>></td>
										          <td> 
										          	<?php
									                   if($billData->report_type == 1){
									                   echo 'Spot';
									                   }elseif($billData->report_type == 2){
									                    echo 'ReInspection';
									                   }elseif($billData->report_type == 3){
									                    echo 'Final';
									                   }
									                ?>
										          </td>
										          <td> {{$billData->appointed_by}}</td>
										          <td> {{$billData->vehicle_registration_no}}</td>
										          <td> {{$billData->reference_number}}</td>
										        </tr>

										      	<?php }
										      	 }else{
										      		echo '<tr><td colspan="4">---</td></tr>';
										      	}?>

										        

				       					      </tbody>
										    </table>
										  </div>
										</div>
									</div>
								</div>
							</div>
    					<div class="col-md-6">

    						<div class="card mb-2">
    							<div class="card-body check-out <?php if($sql->report_type == '3') echo 'checked';?>">
    								<h6 class="mb-2 fw-semibold"><input class="form-check-input" type="checkbox" id="check_final" name="check_final" <?php if($sql->report_type == '3') echo 'checked';?>> Final</h6>
    								<div class="row">
    									
										<div class="col-md-12 col-lg-12">
											<div class="mb-2 field">
												<label for="professional_fees" class="form-label">Professional Fees :</label>
												<input type="text" class="form-control onlyNumericKey" id="professional_fees" name="professional_fees" value="">
												<p class="error" id="err_professional_fees"></p>
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-2 field">
												<label for="total_km" class="form-label">Total KM :</label>
												<input type="text" class="form-control onlyNumericKey" id="total_km" name="total_km" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-2 field">
												<label for="visits" class="form-label">Visits :</label>
												<input type="text" class="form-control onlyNumericKey" id="visits" name="visits" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-2 field">
												<label for="visits" class="form-label">Conveyance :</label>
												<input type="text" class="form-control onlyNumericKey" id="visits" name="visits" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-2 field">
												<label for="photos" class="form-label">Photos :</label>
												<input type="text" class="form-control onlyNumericKey" id="photos" name="photos" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-2 field">
												<label for="charge" class="form-label">Charge :</label>
												<input type="text" class="form-control onlyNumericKey" id="charge" name="charge" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-4">
											<div class="mb-2 field">
												<label for="photos/cd" class="form-label">Photos/CD :</label>
												<input type="text" class="form-control onlyNumericKey" id="photos/cd" name="photos CD" value="">
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<div class="mb-2 field">
												<label for="final_remark" class="form-label">Remark :</label>
												<textarea class="form-control" id="final_remark" name="final_remark" style="height: 17px;"></textarea>
												<p class="error" id="err_final_remark"></p>
											</div>
										</div>
    								</div>
    							</div>
    						</div>




    						<div class="card mb-2">
    							<div class="card-body check-out <?php if($sql->report_type == '2') echo 'checked';?>">
    								<h6 class="mb-b fw-semibold"><input class="form-check-input" type="checkbox" id="check_reins" name="check_reins" <?php if($sql->report_type == '2') echo 'checked';?>> Reinspection</h6>
    								<div class="row">
    									
										<div class="col-md-12 col-lg-12">
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
												<textarea class="form-control" id="final_remark" name="final_remark" style="height: 17px;"></textarea>
												<p class="error" id="err_final_remark"></p>
											</div>
										</div>
    								</div>
    							</div>
    						</div>





    						<div class="card mb-2">
    							<div class="card-body check-out <?php if($sql->report_type == '1') echo 'checked';?>">
    								<h6 class="mb-b fw-semibold"> <input class="form-check-input" type="checkbox" id="check_final" name="check_final" <?php if($sql->report_type == '1') echo 'checked';?>> Spot</h6>
    								<div class="row">
    									
										<div class="col-md-12 col-lg-12">
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
												<textarea class="form-control" id="final_remark" name="final_remark" style="height: 17px;"></textarea>
												<p class="error" id="err_final_remark"></p>
											</div>
										</div>
    								</div>
    							</div>
    						</div>		




    						<div class="card">
    							<div class="card-body">
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

    								<div class="row">
    									<div class="col-12 mt-3">
    										<div class="text-end">
    											<button type="button" class="btn btn-primary btn-next">Submit</button>
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