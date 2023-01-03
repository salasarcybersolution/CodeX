var urls  = $('#base_urls').val();



jQuery(document).ready(function($) {
	//Div Hide Ofter 7 Second
	jQuery('.flasMsg').fadeOut(7000);
    $(".onlyNumericKey").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                   jQuery('.onlynumeric').html('only numeric value are insert');    
                   return false;
        }else{
             jQuery('.onlynumeric').html('');    
        }
   });
});


$('#commercialVehicle').click(function() { 
	    $("#commercialVehicle_div").toggle(this.checked);
 });
$('#PrivousPolicy').click(function() {
	    $("#PrivousPolicy_div").toggle(this.checked);
 });
$('#ThirdpartyPolicy').click(function() {
	    $("#ThirdpartyPolicy_div").toggle(this.checked);
 });
 

 // State City selct inn droipdown

   $('#stateID').on('change', function () {
    var stateID = this.value;
    $("#cityID").html('');

              $.ajax({
                    url: urls+'Master/fetch-citys',
                    type: "POST",
                    data: {
				         _token: $('#_token').val(),
				         stateID : stateID 
				    	 },
                    success: function (response) {
                     // console.log(response.cities); return false;
                       $('#cityID').html('<option value="">Select</option>');
                        $.each(response.citiesName, function (key, value) {
                        	//$('#cityID').html('<option value="">Select</option>');
                            $("#cityID").append('<option value="' + value
                                .id + '">' + value.city + '</option>');
                        });
                        $("#cityID").append('<option value="' + value
                                .id + '">' + value.city + '</option>');
                    }
                });
          });



$("#check_all").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadedAvatar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
} 

$("#upload").change(function(){
    readURL(this);
});

function resetImage(){
	 new_src = urls+'/public/profile_img/'+jQuery('#upload_old').val();
	 $('#uploadedAvatar').attr('src', new_src); 
}


function setvalidation(strId,strT,strMsg){
   if(strT=='S'){
	       jQuery('#'+strId).css('border','');
		   jQuery('#err_'+strId).html('');
	   }else if(strT=='F'){			      
		      jQuery('#'+strId).css('border','1px solid #F00');
		      jQuery('#err_'+strId).html(strMsg);
	  }
} 
// For Login
function adminLogin(){
   var submircheak = 0 ;
   var email = jQuery('#email').val();    
    if (email==null || email==""){		     
        submircheak =1; 
		setvalidation('email','F',"Please insert user name");
     }else{			  
		 setvalidation('email','S',''); 
	 }
	var password = jQuery('#password').val();    
    if (password==null || password==""){		     
        submircheak =1; 
		setvalidation('password','F',"Please insert password");
     }else{			  
		 setvalidation('password','S',''); 
    }	 
	if(submircheak ==1){  
			   return false;
			}else{
				$("#submiteAdminButtons").hide();
				$("#waiteAdminButtons").show();
				$("#adminLoginForm").submit();
			}	 
}

function updateProfile(){
	$("#submiteAdminButtons").hide();
	$("#c_submiteAdminButtons").hide();
	$("#waiteAdminButtons").show();
	$("#formAccountSettings").submit();	
}  
 
function updatePassword(){
   var submircheak = 0 ;
   var old_password = jQuery('#old_password').val();    
    if (old_password==null || old_password==""){		     
        submircheak =1; 
		setvalidation('old_password','F',"Please insert old Password");
     }else{			  
		 setvalidation('old_password','S',''); 
	 }
	var new_password = jQuery('#new_password').val();    
    if (new_password==null || new_password==""){		     
        submircheak =1; 
		setvalidation('new_password','F',"Please insert New Password");
     }else{			  
		 setvalidation('new_password','S',''); 
    }
 	
    var confirm_password = jQuery('#confirm_password').val();    
    if (confirm_password==null || confirm_password==""){		     
        submircheak =1; 
		setvalidation('confirm_password','F',"Please insert Confirm Password");
     }else{			  
		 setvalidation('confirm_password','S',''); 
    }
    
    if(new_password != '' && confirm_password != ''){
        if (new_password != confirm_password){             
            submircheak =1; 
            setvalidation('confirm_password','F',"Old Password &  Confirm Password not match");
         }else{           
             setvalidation('confirm_password','S',''); 
        }   
    }
	if(submircheak ==1){  
			   return false;
	}else{
		$("#submiteAdminButtons").hide();
		$("#c_submiteAdminButtons").hide();
		$("#waiteAdminButtons").show();
		$("#formAccountSettings").submit();	
	}	 
} 

function addNewSubscriptionPlans(){
	$("#subscription_type").val('');
	$("#subscription_titles").val('');
	$("#subscription_price").val('');
	$("#subscription_description").val('');
	$("#subscription_id").val('');
	$("#process_type").val('add');
	$('#offcanvasBackdrop').offcanvas('toggle');
}
  
function saveSubscriptionPlansInfo(){
    var submircheak = 0 ;
	var subscription_titles = jQuery('#subscription_titles').val();    
    if (subscription_titles==null || subscription_titles==""){		     
        submircheak =1; 
		setvalidation('subscription_titles','F',"Please insert subscription title");
     }else{			  
		 setvalidation('subscription_titles','S',''); 
	}


    var users_allowed = jQuery('#users_allowed').val();    
    if (users_allowed==null || users_allowed==""){		     
        submircheak =1; 
		setvalidation('users_allowed','F',"Please insert users count");
     }else{			  
		 setvalidation('users_allowed','S',''); 
	}

	var reports_allowed = jQuery('#reports_allowed').val();    
    if (reports_allowed==null || reports_allowed==""){		     
        submircheak =1; 
		setvalidation('reports_allowed','F',"Please insert report count");
     }else{			  
		 setvalidation('reports_allowed','S',''); 
	}

	var validity_allowed = jQuery('#validity_allowed').val();    
    if (validity_allowed==null || validity_allowed==""){		     
        submircheak =1; 
		setvalidation('validity_allowed','F',"Please insert validity days");
     }else{			  
		 setvalidation('validity_allowed','S',''); 
	}


	var subscription_price = jQuery('#subscription_price').val();    
    if (subscription_price==null || subscription_price==""){		     
        submircheak =1; 
		setvalidation('subscription_price','F',"Please insert price");
     }else{			  
		 setvalidation('subscription_price','S',''); 
	}

    if ($('#spot_priv').prop('checked') || $('#final_priv').prop('checked')  || $('#re_priv').prop('checked') 
     || $('#val_priv').prop('checked')  || $('#bill_priv').prop('checked') || $('#album_priv').prop('checked') || $('#nonmotor_priv').prop('checked')){		     

    	var privileges_val = [];
		$("input:checkbox[name=chk]:checked").each(function() {
          privileges_val.push($(this).val());
            });
		$('#privileges_val').val(privileges_val);

       setvalidation('spot_priv','S','');
       setvalidation('final_priv','S','');
       setvalidation('re_priv','S','');
       setvalidation('val_priv','S','');
       setvalidation('bill_priv','S','');
       setvalidation('album_priv','S','');
       setvalidation('nonmotor_priv','S','');
     }else{			  
		   submircheak =1; 
		setvalidation('spot_priv','F',"Please select atleast a privilege");
		setvalidation('final_priv','F',"Please select atleast a privilege");
		setvalidation('re_priv','F',"Please select atleast a privilege");
		setvalidation('val_priv','F',"Please select atleast a privilege");
		setvalidation('bill_priv','F',"Please select atleast a privilege");
		setvalidation('album_priv','F',"Please select atleast a privilege");
		setvalidation('nonmotor_priv','F',"Please select atleast a privilege");
	}


	var subscription_description = jQuery('#subscription_description').val();    
    if (subscription_description==null || subscription_description==""){		     
        submircheak =1; 
		setvalidation('subscription_description','F',"Please insert subscription description");
     }else{			  
		 setvalidation('subscription_description','S',''); 
	}	
	if(submircheak ==1){  
			   return false;
	}else{
		$("#submiteAdminButtons").hide();
		$("#c_submiteAdminButtons").hide();
		$("#waiteAdminButtons").show();
		$("#form-add-new-record").submit();	
	}
} 

function viewSubscriptionPlanInfo(srt){
	$.ajax({
	    type: "POST",
        url: urls+"Home/getSubscriptionPlanInfo",
        data: {
         _token: $('#_token').val(),
         subscription_id : srt 
    	 },
        dataType:"html",
        success: function(msg)
        { 
          var obj = jQuery.parseJSON(msg);
          jQuery('#v_subscription_titles').html(obj.subscription_titles);
          jQuery('#v_subscription_price').html(obj.subscription_price+' INR');
          jQuery('#v_subscription_type').html(' /'+obj.subscription_type);
          jQuery('#v_subscription_description').html(obj.subscription_description);
          jQuery('#v_users_allowed').html(obj.users_allowed+" Users Allowed");
          $('#viewSubscriptionPlanInfoModal').modal('show');
        }  
    });
}


function editSubscriptionPlanInfo(srt){
	$.ajax({
	    type: "POST",
        url: urls+"Home/getSubscriptionPlanInfo",
        data: {
         _token: $('#_token').val(),
         subscription_id : srt 
    	 },
        dataType:"html",
        success: function(msg)
        { 
            var obj = jQuery.parseJSON(msg);
            $("#subscription_type").val(obj.subscription_type);
			$("#subscription_titles").val(obj.subscription_titles);
			$("#subscription_price").val(obj.subscription_price);
			$("#subscription_description").val(obj.subscription_description);
			$("#subscription_id").val(obj.subscription_id);
			$("#users_allowed").val(obj.users_allowed);
			$("#process_type").val('edit');
			$('#offcanvasBackdrop').offcanvas('toggle'); 
        }  
    });
}

function subscriptionActiveProcess(srt1,srt2){
	var titles  = srt1 == "1" ? 'Are you sure you want active this Plans?' : 'Are you sure you want deactive this Plans?';
	Swal.fire({title: titles,confirmButtonText: 'Yes',cancelButtonText: 'No',showCancelButton: true,showCloseButton: true }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = urls+'Components/subscriptionActiveProcess/'+srt1+'/'+srt2;
          }  
        });
}

function generatedURLProcess(){
	var submircheak = 0 ;
    var name = jQuery('#name').val();    
    if (name==null || name==""){		     
        submircheak =1; 
		setvalidation('name','F',"Please insert name");
     }else{			  
		 setvalidation('name','S',''); 
	}
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var email = jQuery('#email').val();
    if (!regex.test(email)){         
        submircheak =1; 
        setvalidation('email','F',"Please enter valid Email");
    }else{       
        setvalidation('email','S',''); 
    }
	 	
	if(submircheak ==1){  
			   return false;
	}else{
		$("#submiteAdminButtons_g").hide();
		$("#c_submiteAdminButtons_g").hide();
		$("#waiteAdminButtons").show();
		$("#form-add-new-record").submit();	
	}
}


function deleteGeneratedURL(srt1){
	Swal.fire({title: 'Are you sure you want delete this ?',confirmButtonText: 'Yes',cancelButtonText: 'No',showCancelButton: true,showCloseButton: true }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = urls+'Components/deleteGeneratedURL/'+srt1;
          }  
        });
}

function deleteImageGenerateURL(srt1){
	Swal.fire({title: 'Are you sure you want delete this ?',confirmButtonText: 'Yes',cancelButtonText: 'No',showCancelButton: true,showCloseButton: true }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = urls+'serveyor/deleteGeneratedURL/'+srt1;
          }  
        });
}

function viewGeneratedURL(srt){
	$("#v_generated_url").val(urls+'registration/'+srt);
	$('#viewGeneratedURLModal').modal('show');
}

function SurveryorViewGeneratedURL(srt){
	var texturl = urls+'surveyor/imageGenerateurl/'+srt;
	$("#v_generated_url").val(urls+'surveyor/imageGenerateurl/'+srt);
	$('#viewServeyorImageurl').modal('show');
}


function copyToClipboard() {
   var textBox = document.getElementById("v_generated_url");
   textBox.select();
   document.execCommand("copy");
}
 
function registrationProcess(srt){
	var next = parseInt(srt)+1;
	$("#list_tab_content_"+srt).hide();
	$("#list_tab_"+next).addClass("active");
	$("#list_tab_content_"+next).show();
} 

function registrationProcessBack(srt){
	var next = parseInt(srt)-1;
	$("#list_tab_"+srt).removeClass("active");
	$("#list_tab_content_"+srt).hide();
	$("#list_tab_content_"+next).show();
} 

function saveSurveyBasicInfo(){
	var submircheak = 0 ;
    var first_name = jQuery('#first_name').val();    
    if (first_name==null || first_name==""){		     
        submircheak =1; 
		setvalidation('first_name','F',"Please insert first name");
     }else{			  
		 setvalidation('first_name','S',''); 
	}
	var last_name = jQuery('#last_name').val();    
    if (last_name==null || last_name==""){		     
        submircheak =1; 
		setvalidation('last_name','F',"Please insert last name");
     }else{			  
		 setvalidation('last_name','S',''); 
	}
	var phone_no = jQuery('#phone_no').val();    
    if (phone_no==null || phone_no==""){		     
        submircheak =1; 
		setvalidation('phone_no','F',"Please insert phone no");
     }else{			  
		 setvalidation('phone_no','S',''); 
	}
	var city_id = jQuery('#city_id').val();    
    if (city_id==null || city_id==""){		     
        submircheak =1; 
		setvalidation('city_id','F',"Please select city");
     }else{			  
		 setvalidation('city_id','S',''); 
	}
	var user_name = jQuery('#user_name').val();    
    if (user_name==null || user_name==""){		     
        submircheak =1; 
		setvalidation('user_name','F',"Please insert User Name");
     }else{	
     	 // 
     		$.ajax({
		    method:'POST',
	        url: urls+"checkUsername",
	        async: false,     
	        data: {
	         _token: $('#_token').val(),
	         user_name : user_name,
	         },
	        success: function(response)
	        { 
	        	var obj = jQuery.parseJSON(response);
				if (obj == 1)
				{
					submircheak=1;
					setvalidation('user_name','F',"User Name already exists");
				}	        	

				else{
					setvalidation('user_name','S',''); 
				}	
		    }  
	    });
	}
	
	if(submircheak ==1){  
			   return false;
	}else{
	   registrationProcess('1');
	}
}

function saveSurveyCompanyInfo(){
	var submircheak = 0 ;
    var company_name = jQuery('#company_name').val();    
    if (company_name==null || company_name==""){		     
        submircheak =1; 
		setvalidation('company_name','F',"Please insert company name");
     }else{			  
		 setvalidation('company_name','S',''); 
	}
	var company_gst_no = jQuery('#company_gst_no').val();    
    if (company_gst_no==null || company_gst_no==""){		     
        submircheak =1; 
		setvalidation('company_gst_no','F',"Please insert GST No.");
     }else{			  
		 setvalidation('company_gst_no','S',''); 
	}
	
	var company_address = jQuery('#company_address').val();    
    if (company_address==null || company_address==""){		     
        submircheak =1; 
		setvalidation('company_address','F',"Please insert company address");
     }else{			  
		 setvalidation('company_address','S',''); 
	}

	if(submircheak ==1){  
			   return false;
	}else{
	   registrationProcess('2');
	}
}

function paymentProcess(){

       var submircheak = 0 ;
 if($('input[type=radio][name=plan_select]:checked').length == 0)
      {
         submircheak =1;
         setvalidation('plan_select','F',"Please select a plan");
      }
      else
      {	  
          setvalidation('plan_select','S',''); 
      }    

	if(submircheak ==1){  
			   return false;
	}else{
        var subs_id = $('input[type=radio][name=plan_select]:checked').val();	
	    $('#subscription_new_id').val(subs_id);
	  	$("#previous_3").prop('disabled', true);
		$("#next_3").hide();
	    $("#waiteAdminButtons").show();
		$("#registrationForm").submit();
	}

}


function saveSpotPolicyDetails(){ 

	var submircheak = 0;
    var policy = jQuery('#policy').val();    
    if (policy==null || policy==""){		     
        submircheak =1; 
		setvalidation('policy','F',"Please insert policy details");
     }else{			  
		 setvalidation('policy','S',''); 
	}
	var idv = jQuery('#idv').val();    
    if (idv==null || idv==""){		     
        submircheak =1; 
		setvalidation('idv','F',"Please insert I.D.V");
     }else{			  
		 setvalidation('idv','S',''); 
	}
	
	var policy_type = jQuery('#policy_type').val();    
 //    if (policy_type==null || policy_type==""){		     
 //        submircheak =1; 
	// 	setvalidation('policy_type','F',"Please insert policy type");
 //     }else{			  
	// 	 setvalidation('policy_type','S',''); 
	// }

	var insurance_from_date = jQuery('#insurance_from_date').val();    
 //    if (insurance_from_date==null || insurance_from_date==""){		     
 //        submircheak =1; 
	// 	setvalidation('insurance_from_date','F',"Please insert insurance from date");
 //     }else{			  
	// 	 setvalidation('insurance_from_date','S',''); 
	// }

	var insurance_to_date = jQuery('#insurance_to_date').val();    
 //    if (insurance_to_date==null || insurance_to_date==""){		     
 //        submircheak =1; 
	// 	setvalidation('insurance_to_date','F',"Please insert insurance To date");
 //     }else{			  
	// 	 setvalidation('insurance_to_date','S',''); 
	// }

	var insurers = jQuery('#insurers').val();    
 //    if (insurers==null || insurers==""){		     
 //        submircheak =1; 
	// 	setvalidation('insurers','F',"Please select insurer");
 //     }else{			  
	// 	 setvalidation('insurers','S',''); 
	// }

	var insurer_branch = jQuery('#insurer_branch').val();    
 //    if (insurer_branch==null || insurer_branch==""){		     
 //        submircheak =1; 
	// 	setvalidation('insurer_branch','F',"Please select insurer branch");
 //     }else{			  
	// 	 setvalidation('insurer_branch','S',''); 
	// }

	var appointing_office = jQuery('#appointing_office').val();    
 //    if (appointing_office==null || appointing_office==""){		     
 //        submircheak =1; 
	// 	setvalidation('appointing_office','F',"Please insert appointing office");
 //     }else{			  
	// 	 setvalidation('appointing_office','S',''); 
	// }

	var insured = jQuery('#appointing_office').val();    
 //    if (insured==null || insured==""){		     
 //        submircheak =1; 
	// 	setvalidation('insured','F',"Please insert insured");
 //     }else{			  
	// 	 setvalidation('insured','S',''); 
	// }

	var address = jQuery('#address').val();    
 //    if (address==null || address==""){		     
 //        submircheak =1; 
	// 	setvalidation('address','F',"Please insert address");
 //     }else{			  
	// 	 setvalidation('address','S',''); 
	// }

	var hpa = jQuery('#hpa').val();    
 //    if (hpa==null || hpa==""){		     
 //        submircheak =1; 
	// 	setvalidation('hpa','F',"Please insert H.P.A");
 //     }else{			  
	// 	 setvalidation('hpa','S',''); 
	// }

	var claim = jQuery('#claim').val();    
 //    if (claim==null || claim==""){		     
 //        submircheak =1; 
	// 	setvalidation('claim','F',"Please insert claim");
 //     }else{			  
	// 	 setvalidation('claim','S',''); 
	// }
	 	
	if(submircheak ==1){  
			  return false;
	}else{

		var report_id = jQuery('#report_id').val();    
	    $.ajax({
		    method:'POST',
	        url: urls+"SpotReport/addPolicyDetails",
	        data: {
	         _token: $('#_token').val(),
	         report_id : report_id,
	         policy : policy,
	         idv : idv,
	         policy_type : policy_type,
	         insurance_from_date : insurance_from_date,
	         insurance_to_date : insurance_to_date,
	         insurer_id : insurers,
	         insurer_branch_id : insurer_branch,
	         appointing_office : appointing_office,
	         insured : insured,
	         address : address,
	         hpa : hpa,
	         claim : claim, 
	         report_type : 1,
	         report_status : 0,
	         reference_number:'HA/S/0001',
	    	 },
	        success: function(response)
	        { 
	        	var obj = jQuery.parseJSON(response);
	        	
	        	console.log(obj.msg);
	        	console.log(obj.policy_id);
	        	console.log(obj.report_id);
	        	console.log('data inserted');

	        	$("#report_id").val(obj.report_id);
	        	registrationProcess('1');
		    }  
	    });



	   
	}
} 


function insurerBranch(insurer){
 var insurerID = insurer.value;
 $("#insurer_branch").html(''); 

              $.ajax({
                    url: urls+'Master/fetch-insurer-branch',
                    type: "POST",
                    data: {
				         _token: $('#_token').val(),
				         id : insurerID 
				    	 },
                    success: function (response) {
                     // console.log(response.cities); return false;
                      $('#insurer_branch').html('<option value="">Select</option>');
                        $.each(response.branch_list, function (key, value) {
                            $("#insurer_branch").append('<option value="' + value
                                .branch_id + '">' + value.branch_name + '</option>');
                        });
                        $("#insurer_branch").append('<option value="' + value
                                .branch_id + '">' + value.branch_name + '</option>');
                    }
                });

}

function surveyorInsurerBranch(insurer){
 var insurerID = insurer.value;
 $("#insurer_branch").html(''); 

              $.ajax({
                    url: urls+'Master/fetch-surveyor-insurer-branch',
                    type: "POST",
                    data: {
				         _token: $('#_token').val(),
				         id : insurerID 
				    	 },
                    success: function (response) {
                     // console.log(response.cities); return false;
                      $('#insurer_branch').html('<option value="">Select</option>');
                        $.each(response.branch_list, function (key, value) {
                            $("#insurer_branch").append('<option value="' + value
                                .branch_id + '">' + value.branch_name + '</option>');
                        });
                        $("#insurer_branch").append('<option value="' + value
                                .branch_id + '">' + value.branch_name + '</option>');
                         checkInputFields();
                    }
                });

}

function surveyorInsurerBranchSpot(insurer){
 var insurerID = insurer.value;
 $("#insurer_branch_id").html(''); 
 $("#appointing_office").html(''); 

              $.ajax({
                    url: urls+'Master/fetch-surveyor-insurer-branch',
                    type: "POST",
                    data: {
				         _token: $('#_token').val(),
				         id : insurerID 
				    	 },
                    success: function (response) {
                     // console.log(response.branch_list); return false;
                      $('#insurer_branch_id').html('<option value="">Select</option>');
                      $('#appointing_office').html('<option value="">Select</option>');
                        $.each(response.branch_list, function (key, value) {
                       // console.log(value.insurer_branch_id);
                            $("#insurer_branch_id").append('<option value="' + value
                                .insurer_branch_id + '">' + value.branch_name + '</option>');

                            $("#appointing_office").append('<option value="' + value
                                .insurer_branch_id + '">' + value.branch_name + '</option>');
                        });
                        

                        checkInputFields();
                    }
                });

}



function subParts(part,partKey){
 var part_id = part.value;
 $(".subparts-"+partKey).html(''); 
              $.ajax({
                    url: urls+'Master/fetch-subpart',
                    type: "POST",
                    data: {
				         _token: $('#_token').val(),
				         id : part_id 
				    	 },
                    success: function (response) {
                        //$('.subparts-'+partKey).html('<option value="">Select</option>');
                        $.each(response.subpart_list, function (key, value) {
                        	$(".subparts-"+partKey).append('<li onclick="appendData(\''+value.subpart_name+'\','+partKey+')">'+value.subpart_name+'</li>');
                        });

                    }
                });
}


function vehicleData(srt){
	 var vehicleID = srt.value;
	$.ajax({
	    type: "POST",
        url: urls+"Master/fetch-vehicle-details",
        data: {
         _token: $('#_token').val(),
         id : vehicleID 
    	 },
        dataType:"html",
        success: function(msg)
        { 
            var obj = jQuery.parseJSON(msg);
            var vehicle_details = obj.vehicle_details;
			
			$("#fuel_used").val(vehicle_details.Fuel_used);
			$("#make_variant_mod").val(vehicle_details.make_and_model);
			$("#type_fo_body").val(vehicle_details.body_type);
			$("#cubic_capacity").val(vehicle_details.cubic_capacity);
			$("#accident_condition").val(vehicle_details.pre_accident_con);
			
			$("#reg_laden_wt").val(vehicle_details.reg_laden_wt);
			$("#seating_capacity").val(vehicle_details.seating_capacity);
			$("#tax_particulars").val(vehicle_details.tax_particulers);
			$("#unladen_wt").val(vehicle_details.unladen_wt);
			$("#class_of_vehicle").val(vehicle_details.vehicle_class);

			checkInputFields();

		}  
    });
}


$(document).ready(function(){
    $(".addCF").click(function(){
		var rowCount = $('#accidental-add-more .row').length + 1;
    	//var selectClone = $('.mySelect:last').clone();
    	var selectClone = $('#accidental-add-more #part').clone().html();
    	//console.log(selectClone);
    	$("#accidental-add-more").append('<div class="row"><div class="col-md-12 col-lg-2"><div class="mb-3"><label for="part" class="form-label">Part:</label><select id="part" class="form-select" name="part[]" onchange="subParts(this,'+rowCount+')">'+selectClone+'</select><p class="error" id="err_part"></p></div></div><div class="col-md-12 col-lg-4"><div class="selectdiv"><label for="part" class="form-label"></label><ul class="subparts-'+rowCount+'"></ul></div></div><div class="col-md-12 col-lg-5"><div class="py-3"><label for="description" class="form-label">Description of Damages:</label><textarea id="description-'+rowCount+'" name="description[]" class="form-select"></textarea></div></div><div class="col-md-12 col-lg-1"><div class="mb-3 mt-3"><button type="button" class="btn rounded-pill btn-icon btn-outline-primary remCF"> <span class="tf-icons bx bx-minus"></span></button></div></div></div>');
    });
    $("#accidental-add-more").on('click','.remCF',function(){
        $(this).parent().parent().parent().remove();
    });
});


function editSubscriptionsPlanInfo(srt){
    $.ajax({
        type: "POST",
        url: urls+"Home/subscriptionsPlanInfo", 
        data: {
         _token: $('#_token').val(),
         subscription_id : srt 
         },
        dataType:"html", 
        success: function(msg)
        { 
            var obj = jQuery.parseJSON(msg);
            $("#subscription_plan_id").val(obj.subscription_plans.subscription_plan_id);
            $("#subscription_title").val(obj.subscription_plans.subscription_titles);
            $("#subscription_price").val(obj.subscription_plans_info.subscription_price);
            $("#number_of_surey").val(obj.subscription_plans_info.number_of_surey);
            $("#number_of_days").val(obj.subscription_plans_info.number_of_days);
            $('#editSubecriptionsPlanInfo').modal('show');
        }  
    });
}


function updateSubscriptionsPlanInfo(){ 
   var submircheak = 0 ;
    
    var subscription_title = jQuery('#subscription_title').val();   
    if (subscription_title==null || subscription_title==""){           
        submircheak =1; 
        setvalidation('subscription_title','F',"Please insert Subscription title");
     }else{           
         setvalidation('subscription_title','S',''); 
    }
    var subscription_price = jQuery('#subscription_price').val();  
    if (subscription_price==null || subscription_price==""){           
        submircheak =1; 
        setvalidation('subscription_price','F',"Please insert Subscription Price");
     }else{           
         setvalidation('subscription_price','S',''); 
    }
    
    var number_of_surey = jQuery('#number_of_surey').val();  
    if (number_of_surey==null || number_of_surey==""){           
        submircheak =1; 
        setvalidation('number_of_surey','F',"Please insert number of surey");
     }else{           
        setvalidation('number_of_surey','S',''); 
    }

    if(submircheak ==1){  
       	return false;
    }else{
        $('#updatePlan').hide();
        $('#waiteAdminButtons').show();
        $('#updatePlanInfo').submit();

    }  
}


//Surveyor Admin Add User
function addNewUserSurveyor(surv_info_id){
     	
	$.ajax({
	    method:'POST',
	    url: urls+"checkUserCreated",
	    data: {
	     _token: $('#_token').val(),
	     surv_info_id : surv_info_id,
	    },
	    success: function(response){ 

	    	var obj = jQuery.parseJSON(response);

			if (obj == 1){

			    $("#first_name").attr("disabled", "disabled");					
			    $("#last_name").attr("disabled", "disabled");					
			    $("#user_name").attr("disabled", "disabled");					
			    $("#email").attr("disabled", "disabled");					
			    $("#phone_no").attr("disabled", "disabled");					
			    $("input[name='chk']").prop("disabled", true);					
			    $("#submiteAdminButtons").attr("disabled", "disabled");
			    $("#c_submiteAdminButtons").attr("disabled", "disabled");
			    setvalidation('user_chk','F',"User creation limit already reached as per Plan");
				$('#addNewUserSurveyor').offcanvas('toggle');
				
			}else{
				setvalidation('user_chk','S',''); 
				$("#first_name").val('');
				$("#last_name").val('');
				$("#user_name").val('');
				$("#email").val('');
				$("#phone_no").val('');
				$("#first_name").removeAttr('disabled');
				$("#last_name").removeAttr('disabled');
				$("#user_name").removeAttr('disabled');
				$("#email").removeAttr('disabled');
				$("#phone_no").removeAttr('disabled');
				$("#submiteAdminButtons").removeAttr('disabled');
				$("#c_submiteAdminButtons").removeAttr('disabled');
				$("input[name='chk']").prop("disabled", false);					
				$('#addNewUserSurveyor').offcanvas('toggle');
			}	
	    }  
	});
}
   

function saveSurveyorBasicInfo(priv_ids){
	var submircheak = 0 ;
    var first_name = jQuery('#first_name').val();    
    if (first_name==null || first_name==""){		     
        submircheak =1; 
		setvalidation('first_name','F',"Please insert first name");
     }else{			  
		 setvalidation('first_name','S',''); 
	}
	var last_name = jQuery('#last_name').val();    
    if (last_name==null || last_name==""){		     
        submircheak =1; 
		setvalidation('last_name','F',"Please insert last name");
     }else{			  
		 setvalidation('last_name','S',''); 
	}
	var phone_no = jQuery('#phone_no').val();    
    if (phone_no==null || phone_no==""){		     
        submircheak =1; 
		setvalidation('phone_no','F',"Please insert phone no");
     }else{			  
		 setvalidation('phone_no','S',''); 
	}
	var email = jQuery('#email').val();    
    if (email==null || email==""){		     
        submircheak =1; 
		setvalidation('email','F',"Please insert email");
     }else{			  
		 setvalidation('email','S',''); 
	}
	var user_name = jQuery('#user_name').val();    
    if (user_name==null || user_name==""){		     
        submircheak =1; 
		setvalidation('user_name','F',"Please insert User Name");
     }else{	
     	 // 
     		$.ajax({
		    method:'POST',
	        url: urls+"checkUsername",
	        async: false,     
	        data: {
	         _token: $('#_token').val(),
	         user_name : user_name,
	         },
	        success: function(response)
	        { 
	        	var obj = jQuery.parseJSON(response);
				if (obj == 1)
				{
					submircheak=1;
					setvalidation('user_name','F',"User Name already exists");
				}	        	

				else{
					setvalidation('user_name','S',''); 
				}	
		    }  
	    });
	}

var priv_array = priv_ids.split(',');
var flag = 0;

jQuery.each( priv_array, function( i, val ) {
if($('#priv_'+val).prop('checked') ){ flag =1; } 	
});
if(flag==0) {
	submircheak=1; 
	setvalidation('priv_msg','F',"Please select atleast a privilege"); 
}	
else{
	setvalidation('priv_msg','S','');
	var privileges_val = [];	
	$("input:checkbox[name=chk]:checked").each(function() {
	privileges_val.push($(this).val());
	});
	$('#surv_privileges').val(privileges_val);
}

	if(submircheak ==1){ 
			   return false;
	}else{
	    $("#submiteAdminButtons").hide();
		$("#c_submiteAdminButtons").hide();
		$("#waiteAdminButtons").show();
		$("#saveSurveyorBasicInfo").submit();	
	}
}

function viewUserInfo(srt){
	// $.ajax({
	//     type: "POST",
 //        url: urls+"SuperAdmin/getUserInfo",
 //        data: {
 //         _token: $('#_token').val(),
 //         subscription_id : srt 
 //    	 },
 //        dataType:"html",
 //        success: function(msg)
 //        { 
 //          var obj = jQuery.parseJSON(msg);
 //          jQuery('#v_subscription_titles').html(obj.subscription_titles);
 //          jQuery('#v_subscription_price').html(obj.subscription_price+' INR');
 //          jQuery('#v_subscription_type').html(' /'+obj.subscription_type);
 //          jQuery('#v_subscription_description').html(obj.subscription_description);
 //          jQuery('#v_users_allowed').html(obj.users_allowed+" Users Allowed");
 //        }  
 //    });
          $('#viewUserInfoInfoModal').modal('show');
}
$(".agreegate-nos").click(function(){
  $("#agreegate-sec").toggle();
});


$(document).ready(function(){
    $(".addCF").click(function(){
		var rowCount = $('#agreegate-sec #addRow tr').length + 1;
    	
    	$("#addRow").append('<tr><td>'+rowCount+'</td><td><input type="text" class="form-control" id="nos_item_name" name="nos_item_name[]"></td><td><input type="text" class="form-control" id="nos_remark" name="nos_remark[]"></td><td><button type="button" class="btn rounded-pill btn-icon btn-outline-primary remCF"> <span class="tf-icons bx bx-minus"></span></button></td></tr>');
    });
    $("#addRow").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});


$('#insurerName').on('change', function() {
  var insurerId = this.value;

  $.ajax({
        type: "POST",
        url: urls+"Home/getBranchByInsurerId",
        data: {
         _token: $('#_token').val(),
         insurer_id: insurerId
        },
        dataType:"html",
        success: function(msg){ 
            var obj = jQuery.parseJSON(msg);
            $("#insurerBranch").html(obj.branch_list);
        }  
    });

});



function addNewFeesSlab(){
	$('#addNewFeesSlab').offcanvas('toggle');
}

function createFeesSlab(){
	var submircheak = 0 ;
    var slab_from = jQuery('#slab_from').val();    
    if (slab_from==null || slab_from==""){		     
        submircheak =1; 
		setvalidation('slab_from','F',"Please insert from value");
     }else{			  
		 setvalidation('slab_from','S',''); 
	}
	var slab_to = jQuery('#slab_to').val();    
    if (slab_to==null || slab_to==""){		     
        submircheak =1; 
		setvalidation('slab_to','F',"Please insert to value");
     }else{			  
		 setvalidation('slab_to','S',''); 
	}
	
	if(submircheak ==1){  
			   return false;
	}else{
	   $('#addNewFeesSlabForm').submit();
	}
}

$(document).ready(function(){

    $(".addSlav").click(function(){
        var rowCount = $('#addSlavMain >tbody >tr').length + 1;
       
        $('.addCF').removeAttr('disabled');
          $("#addSlavMain").append('<tr><td>'+rowCount+'</td><td><input type="text" name="slab_from" class="form-control" value="" style="width:80px;" required=""></td><td><input type="text" name="slab_to" class="form-control" value="" style="width:80px;" required=""></td><td><input type="text" class="form-control" value="" style="width:80px;" required=""></td><td><div class="finalNewParts_add"><button type="button" class="btn rounded-pill btn-icon btn-outline-primary remSlav"> <span class="tf-icons bx bx-minus"></span></button></div> </td></tr>');
    });

    $("#addSlavMain").on('click','.remSlav',function(){
        $(this).parent().parent().parent().remove();
    });

});
