var urls  = $('#base_urls').val();


function saveFinalDetails(){ 
 
    var submircheak = 0 ;
    var policy = jQuery('#policy').val();    
    if (policy==null || policy==""){             
        submircheak =1; 
        setvalidation('policy','F',"Please insert policy details");
     }else{           
         setvalidation('policy','S',''); 
    }

    var endorsement = jQuery('#endorsement').val();    
    if (endorsement==null || endorsement==""){           
        submircheak =1; 
        setvalidation('endorsement','F',"Please insert Endorsement");
     }else{           
         setvalidation('endorsement','S',''); 
    }    

    var idv = jQuery('#idv').val();    
    // if (idv==null || idv==""){           
    //     submircheak =1; 
    //     setvalidation('idv','F',"Please insert I.D.V");
    //  }else{           
    //      setvalidation('idv','S',''); 
    // }
    
    var policy_type = jQuery('#policy_type').val();    
    // if (policy_type==null || policy_type==""){           
    //     submircheak =1; 
    //     setvalidation('policy_type','F',"Please insert policy type");
    //  }else{           
    //      setvalidation('policy_type','S',''); 
    // }

    var insurance_from_date = jQuery('#insurance_from_date').val();    
    // if (insurance_from_date==null || insurance_from_date==""){           
    //     submircheak =1; 
    //     setvalidation('insurance_from_date','F',"Please insert insurance from date");
    //  }else{           
    //      setvalidation('insurance_from_date','S',''); 
    // }

    var insurance_to_date = jQuery('#insurance_to_date').val();    
    // if (insurance_to_date==null || insurance_to_date==""){           
    //     submircheak =1; 
    //     setvalidation('insurance_to_date','F',"Please insert insurance To date");
    //  }else{           
    //      setvalidation('insurance_to_date','S',''); 
    // }    

   
    var insurers = jQuery('#insurers').val();    
    // if (insurers==null || insurers==""){             
    //     submircheak =1; 
    //     setvalidation('insurers','F',"Please select insurer");
    //  }else{           
    //      setvalidation('insurers','S',''); 
    // }

    var insurer_branch = jQuery('#insurer_branch').val();    
    // if (insurer_branch==null || insurer_branch==""){             
    //     submircheak =1; 
    //     setvalidation('insurer_branch','F',"Please select insurer branch");
    //  }else{           
    //      setvalidation('insurer_branch','S',''); 
    // }

    var appointing_office = jQuery('#appointing_office').val();    
    // if (appointing_office==null || appointing_office==""){           
    //     submircheak =1; 
    //     setvalidation('appointing_office','F',"Please insert appointing office");
    //  }else{           
    //      setvalidation('appointing_office','S',''); 
    // }

    var insured = jQuery('#appointing_office').val();    
    // if (insured==null || insured==""){           
    //     submircheak =1; 
    //     setvalidation('insured','F',"Please insert insured");
    //  }else{           
    //      setvalidation('insured','S',''); 
    // }

    var address = jQuery('#address').val();    
    // if (address==null || address==""){           
    //     submircheak =1; 
    //     setvalidation('address','F',"Please insert address");
    //  }else{           
    //      setvalidation('address','S',''); 
    // }    

    var mobile_number = jQuery('#mobile_number').val();    
    // if (mobile_number==null || mobile_number==""){           
    //     submircheak =1; 
    //     setvalidation('mobile_number','F',"Please insert Mobile Number");
    //  }else{           
    //      setvalidation('mobile_number','S',''); 
    // }    

    var token_number = jQuery('#token_number').val();    
    // if (token_number==null || token_number==""){           
    //     submircheak =1; 
    //     setvalidation('token_number','F',"Please insert Token Number");
    //  }else{           
    //      setvalidation('token_number','S',''); 
    // }

    var hpa = jQuery('#hpa').val();    
    // if (hpa==null || hpa==""){           
    //     submircheak =1; 
    //     setvalidation('hpa','F',"Please insert H.P.A");
    //  }else{           
    //      setvalidation('hpa','S',''); 
    // }

    var claim = jQuery('#claim').val();    
    // if (claim==null || claim==""){           
    //     submircheak =1; 
    //     setvalidation('claim','F',"Please insert claim");
    //  }else{           
    //      setvalidation('claim','S',''); 
    // }
        
    if(submircheak ==1){  
               return false;
    }else{

        var report_id = jQuery('#report_id').val();    
        $.ajax({
            method:'POST',
            url: urls+"final/storePolicyDetails",
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
               //s window.location.href = redirect_url;
                var redirect_url = urls+"final/survey-report/"+obj.report_id;
                $('#survey_tab_ID').attr("href", redirect_url);

                var redirect_url = urls+"final/new-parts/"+obj.report_id;
                $('#New_part_tab').attr("href", redirect_url);

                 var redirect_url = urls+"final/labour/"+obj.report_id;
                $('#labour_tab').attr("href", redirect_url);

                 var redirect_url = urls+"final/summery-remark/"+obj.report_id;
                $('#summery_remark_tab').attr("href", redirect_url);

                registrationProcess('1');
            }  
        });
    }
}
 

function policyRegistrationProcess(srt){

   
    var next = parseInt(srt)+1;
    $("#list_tab_content_"+srt).hide();
    $("#list_tab_"+next).addClass("active");
    $("#list_tab_content_"+next).show();
} 



function saveFinalVehicleDetails(){

    var submircheak = 0;
    
    var registration = jQuery('#registration').val();   
    if (registration==null || registration==""){             
        submircheak =1; 
        setvalidation('registration','F',"Please insert registration number details");
     }else{           
         setvalidation('registration','S',''); 
    }
    var registered_owner = jQuery('#registered_owner').val();  
    if (registered_owner==null || registered_owner==""){             
        submircheak =1; 
        setvalidation('registered_owner','F',"Please insert registered owner details");
     }else{           
         setvalidation('registered_owner','S',''); 
    }

  // console.log(registered_owner);  return false;
    var owner_sr = jQuery('#owner_sr').val();  
    // if (owner_sr==null || owner_sr==""){             
    //     submircheak =1; 
    //     setvalidation('owner_sr','F',"Please insert owner Sr/Tr Date");
    //  }else{           
    //      setvalidation('owner_sr','S',''); 
    // }
    var date_of_purchase = jQuery('#date_of_purchase').val();  
    // if (date_of_purchase==null || date_of_purchase==""){             
    //     submircheak =1; 
    //     setvalidation('date_of_purchase','F',"Please select purchase Date");
    //  }else{           
    //      setvalidation('date_of_purchase','S',''); 
    // }
    var date_of_registration = jQuery('#date_of_registration').val();  
    // if (date_of_registration==null || date_of_registration==""){             
    //     submircheak =1; 
    //     setvalidation('date_of_registration','F',"Please select Purchase Date");
    //  }else{           
    //      setvalidation('date_of_registration','S',''); 
    // }
    var chassis = jQuery('#chassis').val();  
    // if (chassis==null || chassis==""){           
    //     submircheak =1; 
    //     setvalidation('chassis','F',"Please insert chassis details");
    //  }else{           
    //      setvalidation('chassis','S',''); 
    // }
    var engine = jQuery('#engine').val();  
    // if (engine==null || engine==""){             
    //     submircheak =1; 
    //     setvalidation('engine','F',"Please insert engine details");
    //  }else{           
    //      setvalidation('engine','S',''); 
    // }
    var phy_checked = jQuery('#phy_checked').val();  
    // if (phy_checked==null || phy_checked==""){             
    //     submircheak =1; 
    //     setvalidation('phy_checked','F',"Please check phy checked");
    //  }else{           
    //      setvalidation('phy_checked','S',''); 
    // }
    var make_varient_mod = jQuery('#make_varient_mod').val();  
    // if (make_varient_mod==null || make_varient_mod==""){           
    //     submircheak =1; 
    //     setvalidation('make_varient_mod','F',"Please insert make varient mod");
    //  }else{           
    //      setvalidation('make_varient_mod','S',''); 
    // }
    var type_of_body = jQuery('#type_of_body').val();  
    // if (type_of_body==null || type_of_body==""){             
    //     submircheak =1; 
    //     setvalidation('type_of_body','F',"Please insert body type");
    //  }else{           
    //      setvalidation('type_of_body','S',''); 
    // }
    var body_color = jQuery('#body_color').val();  
    // if (body_color==null || body_color==""){           
    //     submircheak =1; 
    //     setvalidation('body_color','F',"Please insert color details");
    //  }else{           
    //      setvalidation('body_color','S',''); 
    // }
    var cubic_capacity = jQuery('#cubic_capacity').val();  
    // if (cubic_capacity==null || cubic_capacity==""){             
    //     submircheak =1; 
    //     setvalidation('cubic_capacity','F',"Please insert cubic capacity");
    //  }else{           
    //      setvalidation('cubic_capacity','S',''); 
    // }
    var anty_theft = jQuery('#anty_theft').val();  
    // if (anty_theft==null || anty_theft==""){             
    //     submircheak =1; 
    //     setvalidation('anty_theft','F',"Please insert anty theft");
    //  }else{           
    //      setvalidation('anty_theft','S',''); 
    // }

    var puc_details = jQuery('#puc_details').val();  
    // if (puc_details==null || puc_details==""){             
    //     submircheak =1; 
    //     setvalidation('puc_details','F',"Please insert puc details");
    //  }else{           
    //      setvalidation('puc_details','S',''); 
    // }
    var puc_upto = jQuery('#puc_upto').val();  
    // if (puc_upto==null || puc_upto==""){             
    //     submircheak =1; 
    //     setvalidation('puc_upto','F',"Please insert puc UpTo date");
    //  }else{           
    //      setvalidation('puc_upto','S',''); 
    // }
    var reg_kaden_wt = jQuery('#reg_kaden_wt').val();  
    // if (reg_kaden_wt==null || reg_kaden_wt==""){           
    //     submircheak =1; 
    //     setvalidation('reg_kaden_wt','F',"Please insert reg kaden wt");
    //  }else{           
    //      setvalidation('reg_kaden_wt','S',''); 
    // }

    var remark_rlw = jQuery('#remark_rlw').val();  
    // if (remark_rlw==null || remark_rlw==""){           
    //     submircheak =1; 
    //     setvalidation('remark_rlw','F',"Please insert Remark (if ULW N.A.)");
    //  }else{           
    //      setvalidation('remark_rlw','S',''); 
    // }
    var vehicle_remark = jQuery('#vehicle_remark').val();  
    // if (vehicle_remark==null || vehicle_remark==""){             
    //     submircheak =1; 
    //     setvalidation('vehicle_remark','F',"Please insert remark");
    //  }else{           
    //      setvalidation('vehicle_remark','S',''); 
    // }

    var reg_laden_wt = jQuery('#reg_laden_wt').val();  
    // if (reg_laden_wt==null || reg_laden_wt==""){             
    //     submircheak =1; 
    //     setvalidation('reg_laden_wt','F',"Please insert Reg Laden Wt");
    //  }else{           
    //      setvalidation('reg_laden_wt','S',''); 
    // }

    var unladen_wt = jQuery('#unladen_wt').val();  
    // if (unladen_wt==null || unladen_wt==""){             
    //     submircheak =1; 
    //     setvalidation('unladen_wt','F',"Please insert Unladen Wt.");
    //  }else{           
    //      setvalidation('unladen_wt','S',''); 
    // }

    var seating_capacity = jQuery('#seating_capacity').val();  
    // if (seating_capacity==null || seating_capacity==""){             
    //     submircheak =1; 
    //     setvalidation('seating_capacity','F',"Please insert seating capacity");
    //  }else{           
    //      setvalidation('seating_capacity','S',''); 
    // }

    var remark_ulw = jQuery('#remark_ulw').val();  
    // if (remark_ulw==null || remark_ulw==""){             
    //     submircheak =1; 
    //     setvalidation('remark_ulw','F',"Please insert remark ulw");
    //  }else{           
    //      setvalidation('remark_ulw','S',''); 
    // }

    var class_of_value = jQuery('#class_of_value').val();  
    // if (class_of_value==null || class_of_value==""){             
    //     submircheak =1; 
    //     setvalidation('class_of_value','F',"Please insert Class Of Value");
    //  }else{           
    //      setvalidation('class_of_value','S',''); 
    // }

    var fuel_used = jQuery('#fuel_used').val();  
    // if (fuel_used==null || fuel_used==""){           
    //     submircheak =1; 
    //     setvalidation('fuel_used','F',"Please insert Fuel");
    //  }else{           
    //      setvalidation('fuel_used','S',''); 
    // }

    var odometer_reading = jQuery('#odometer_reading').val();  
    // if (odometer_reading==null || odometer_reading==""){           
    //     submircheak =1; 
    //     setvalidation('odometer_reading','F',"Please insert odometer reading");
    //  }else{           
    //      setvalidation('odometer_reading','S',''); 
    // }

    var pre_accident_condition = jQuery('#pre_accident_condition').val();  
    // if (pre_accident_condition==null || pre_accident_condition==""){             
    //     submircheak =1; 
    //     setvalidation('pre_accident_condition','F',"Please insert pre accident condition");
    //  }else{           
    //      setvalidation('pre_accident_condition','S',''); 
    // }

    var tax_particular = jQuery('#tax_particular').val();  
    // if (tax_particular==null || tax_particular==""){           
    //     submircheak =1; 
    //     setvalidation('tax_particular','F',"Please insert tax particular");
    //  }else{           
    //      setvalidation('tax_particular','S',''); 
    // }

    var remark = jQuery('#remark').val();  
    // if (remark==null || remark==""){           
    //     submircheak =1; 
    //     setvalidation('remark','F',"Please insert remark");
    //  }else{           
    //      setvalidation('remark','S',''); 
    // }

    var commercialVehicle = $('input:checkbox[name=commercialVehicle]').is(':checked');  
    if(commercialVehicle == true){
        var fitness_certificate = jQuery('#fitness_certificate').val();  
        if (fitness_certificate==null || fitness_certificate==""){           
            submircheak =1; 
            setvalidation('fitness_certificate','F',"Please insert fitness certificate");
         }else{           
             setvalidation('fitness_certificate','S',''); 
        }

        var fitness_from_date = jQuery('#fitness_from_date').val();  
        if (fitness_from_date==null || fitness_from_date==""){           
            submircheak =1; 
            setvalidation('fitness_from_date','F',"Please insert fitness date");
         }else{           
             setvalidation('fitness_from_date','S',''); 
        }

        var parmit_to_date = jQuery('#parmit_to_date').val();  
        // if (parmit_to_date==null || parmit_to_date==""){             
        //     submircheak =1; 
        //     setvalidation('parmit_to_date','F',"Please insert fitness date");
        //  }else{           
        //      setvalidation('parmit_to_date','S',''); 
        // }

        var fitness_to_date = jQuery('#fitness_to_date').val();  
        // if (fitness_to_date==null || fitness_to_date==""){           
        //     submircheak =1; 
        //     setvalidation('fitness_to_date','F',"Please insert fitness date");
        //  }else{           
        //      setvalidation('fitness_to_date','S',''); 
        // }

        var parmit_issued = jQuery('#parmit_issued').val();  
        // if (parmit_issued==null || parmit_issued==""){           
        //     submircheak =1; 
        //     setvalidation('parmit_issued','F',"Please insert parmit");
        //  }else{           
        //      setvalidation('parmit_issued','S',''); 
        // }

        var parmit_from_date = jQuery('#parmit_from_date').val();  
        // if (parmit_from_date==null || parmit_from_date==""){             
        //     submircheak =1; 
        //     setvalidation('parmit_from_date','F',"Please insert parmit date");
        //  }else{           
        //      setvalidation('parmit_from_date','S',''); 
        // }

        var parmit_to_date = jQuery('#parmit_to_date').val();  
        // if (parmit_to_date==null || parmit_to_date==""){             
        //     submircheak =1; 
        //     setvalidation('parmit_to_date','F',"Please insert parmit date");
        //  }else{           
        //      setvalidation('parmit_to_date','S',''); 
        // }


        var type_of_parmit = jQuery('#type_of_parmit').val();  
        // if (type_of_parmit==null || type_of_parmit==""){             
        //     submircheak =1; 
        //     setvalidation('type_of_parmit','F',"Please insert parmit type");
        //  }else{           
        //      setvalidation('type_of_parmit','S',''); 
        // }

        var authorization_validity = jQuery('#authorization_validity').val();  
        // if (authorization_validity==null || authorization_validity==""){             
        //     submircheak =1; 
        //     setvalidation('authorization_validity','F',"Please insert authorization validity");
        //  }else{           
        //      setvalidation('authorization_validity','S',''); 
        // }
        var area_of_opration = jQuery('#area_of_opration').val();  
        // if (area_of_opration==null || area_of_opration==""){             
        //     submircheak =1; 
        //     setvalidation('area_of_opration','F',"Please insert area of opration");
        //  }else{           
        //      setvalidation('area_of_opration','S',''); 
        // }

    }

    var remark_rlw = jQuery('#remark_rlw').val();  
    var remark_ulw = jQuery('#remark_ulw').val();
    var chassis_phy_checked = jQuery('#chassis_phy_checked').val();  
    var engine_phy_engine = jQuery('#engine_phy_engine').val();
    var master_vehicle_id = jQuery('#vehicle').val();  
        
        if(submircheak ==1){  
               return false;
    }else{
        var report_vehicle_id = jQuery('#report_vehicle_id').val();   
        var report_id = jQuery('#report_id').val();
        //alert(report_vehicle_id); 
        $.ajax({
            method:'POST',
            url: urls+"final/storeVehicleDetails",
            data: {
             _token: $('#_token').val(),
            report_id : report_id,
            vehicle_type : 1,
            registration : registration,
            registered_owner : registered_owner,
            owner_sr : owner_sr,
            date_of_purchase : date_of_purchase,
            date_of_registration : date_of_registration,
            chassis : chassis,
            engine : engine,
            phy_checked : phy_checked,
            make_varient_mod : make_varient_mod,
            type_of_body : type_of_body,
            body_color : body_color,
            cubic_capacity : cubic_capacity,
            anty_theft : anty_theft,
            puc_details : puc_details,
            puc_upto : puc_upto,
            reg_kaden_wt : reg_kaden_wt,
            remark_rlw : remark_rlw,
            vehicle_remark : vehicle_remark,
            reg_laden_wt : reg_laden_wt,
            unladen_wt : unladen_wt,
            seating_capacity : seating_capacity,
            remark_ulw : remark_ulw,
            class_of_value : class_of_value,
            fuel_used : fuel_used,
            odometer_reading : odometer_reading,
            pre_accident_condition : pre_accident_condition,
            tax_particular : tax_particular,
            remark : remark,
            commercialVehicle : commercialVehicle,
            fitness_from_date : fitness_from_date,
            parmit_to_date : parmit_to_date,
            fitness_to_date : fitness_to_date,
            parmit_issued : parmit_issued,
            parmit_from_date : parmit_from_date,
            parmit_to_date : parmit_to_date,
            type_of_parmit : type_of_parmit,
            authorization_validity : authorization_validity,
            area_of_opration : area_of_opration,
            remark_rlw : remark_rlw,
            remark_ulw : remark_ulw,
            chassis_phy_checked : chassis_phy_checked,
            engine_phy_engine : engine_phy_engine,
            master_vehicle_id : master_vehicle_id, 
             report_type : 1,
             report_status : 0,
             reference_number:'HA/S/0001',
             },
            success: function(response)
            { 
                var obj = jQuery.parseJSON(response);
                console.log('vehicle data inserted');
                $("#report_vehicle_id").val(obj.report_vehicle_id);
                registrationProcess('2');
            }  
        });
    }
}

// $(document).ready(function(){
//     $(".addCF").click(function(){
//         $("#customFields >tbody >tr:last >td:last").append("<button type='button' class='btn rounded-pill btn-icon btn-outline-primary addCF' ><span class='tf-icons bx bx-plus'></span></button>");
//     });
// });

function saveFinalDriverDetails(){

    var submircheak = 0 ;
    
    var driving_licence = jQuery('#driving_licence').val();   
    if (driving_licence==null || driving_licence==""){           
        submircheak =1; 
        setvalidation('driving_licence','F',"Please insert Driving license details");
     }else{           
         setvalidation('driving_licence','S',''); 
    }
    var driver_name = jQuery('#driver_name').val();  
    if (driver_name==null || driver_name==""){           
        submircheak =1; 
        setvalidation('driver_name','F',"Please insert driver name");
     }else{           
         setvalidation('driver_name','S',''); 
    }
    var driver_dob = jQuery('#driver_dob').val();  
    // if (driver_dob==null || driver_dob==""){          
 //        submircheak =1; 
    //  setvalidation('driver_dob','F',"Please insert driver date of birth");
 //     }else{            
    //   setvalidation('driver_dob','S',''); 
    // }
    var issue_date = jQuery('#issue_date').val();  
    // if (issue_date==null || issue_date==""){          
 //        submircheak =1; 
    //  setvalidation('issue_date','F',"Please select issue date");
 //     }else{            
    //   setvalidation('issue_date','S',''); 
    // }
    var valid_date = jQuery('#valid_date').val();  
    // if (valid_date==null || valid_date==""){          
 //        submircheak =1; 
    //  setvalidation('valid_date','F',"Please select valid date");
 //     }else{            
    //   setvalidation('valid_date','S',''); 
    // }
    var issuing_authority = jQuery('#issuing_authority').val();  
    // if (issuing_authority==null || issuing_authority==""){            
 //        submircheak =1; 
    //  setvalidation('issuing_authority','F',"Please insert issuing authority details");
 //     }else{            
    //   setvalidation('issuing_authority','S',''); 
    // }
    var licence_type = jQuery('#licence_type').val();  
    // if (licence_type==null || licence_type==""){          
 //        submircheak =1; 
    //  setvalidation('licence_type','F',"Please select license type");
 //     }else{            
    //   setvalidation('licence_type','S',''); 
    // }
    var badge = jQuery('#badge').val();  
    // if (badge==null || badge==""){            
 //        submircheak =1; 
    //  setvalidation('badge','F',"Please insert badge details");
 //     }else{            
    //   setvalidation('badge','S',''); 
    // }
    
    var driver_remark = jQuery('#driver_remark').val();  
    // if (driver_remark==null || driver_remark==""){            
 //        submircheak =1; 
    //  setvalidation('driver_remark','F',"Please insert remark details");
 //     }else{            
    //   setvalidation('driver_remark','S',''); 
    // }

    if(submircheak ==1){  
               return false;
    }else{

        var report_driver_id = jQuery('#report_driver_id').val();   
        var report_id = jQuery('#report_id').val();
        
        $.ajax({
            method:'POST',
            url: urls+"final/storeDriverLicenseDetails",
            data: {
             _token: $('#_token').val(),
             report_id : report_id,
             report_driver_id : report_driver_id,
             driving_licence : driving_licence,
             driver_name : driver_name,
             date_of_birth : driver_dob,
             issue_date : issue_date,
             valid_from : valid_date,
             issuing_authority : issuing_authority,
             licence_type : licence_type,
             badge : badge,
             remark : driver_remark
             },
            success: function(response)
            { 
                var obj = jQuery.parseJSON(response);
                
                console.log('driver data inserted');

                $("#report_driver_id").val(obj.report_driver_id);

                var redirect_url = urls+"final/survey-report/"+report_id;

                $('#survey_tab').attr("href", redirect_url);
                //alert(redirect_url);

                window.location.href = redirect_url;
                registrationProcess('3');
            }  
        });
    }   
}

function saveCommercialVehicleDetails(){
    //alert('fdsfd'); 
    // $("#policy_tab").removeClass('active');
    // $("#survey_tab").addClass('active');
    


    $('.nav-pills .active').parent().next('li').find('button').trigger('click');


// $('.btnPrevious').click(function() {
//     $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
// });
    //$("#list_tab_"+next).addClass("active");

}

function saveFinalSurveyReport(report_id){
 
// alert('vikas'); return false;

    var submircheak = 0 ;

    var date_of_accident = jQuery('#date_of_accident').val();  
    if (date_of_accident==null || date_of_accident==""){             
        submircheak =1; 
        setvalidation('date_of_accident','F',"Please insert Date of Accident ");
     }else{           
         setvalidation('date_of_accident','S',''); 
    }
        
 var time_of_accident = jQuery('#time_of_accident').val();  
    if (time_of_accident==null || time_of_accident==""){             
        submircheak =1; 
        setvalidation('time_of_accident','F',"Please insert Time of Accident");
     }else{           
         setvalidation('time_of_accident','S',''); 
    }



var place_of_accident = jQuery('#place_of_accident').val(); 
var pin_number = jQuery('#pin_number').val(); 
var place_of_survey = jQuery('#place_of_survey').val(); 
var allotment_date = jQuery('#allotment_date').val();  
var inspection_date = jQuery('#inspection_date').val();
var spot_survey_recived = jQuery('#spot_survey_recived').val(); 
var police_action = jQuery('#police_action').val(); 
var detailsOFloadPanssanger = jQuery('#detailsOFloadPanssanger').val(); 
var thirdPartiLossInjurios = jQuery('#thirdPartiLossInjurios').val(); 
var assisment = jQuery('#assisment').val(); 

var third_party_property_damages = jQuery('#third_party_property_damages').val();  
var cousenature = jQuery('textarea#cousenature').val(); 
var survey_id = jQuery('#survey_id').val();  


    if(submircheak ==1){  
               return false;
    }else{

   
        $.ajax({
            method:'POST',
            url: urls+"final/save-survey-report",
            data: {
             _token: $('#_token').val(),
             survey_id : survey_id,
             report_id : report_id,
            
            //  vehicle_shifted_to : vehicle_shifted_to,
            // parson_available_on_spot : parson_available_on_spot,
            // parmit_to_date : parmit_to_date,
             // inspection     : inspection,
             //police_action : police_action,
             // name_of_police_satation : name_of_police_satation,
             // satation_dairy_no : satation_dairy_no,
             // nature_of_goods : nature_of_goods,
             // Goods_caried : Goods_caried, 

             date_of_accident : date_of_accident, 
             time_of_accident : time_of_accident, 
             place_of_accident : place_of_accident,
             pin_number : pin_number,
             place_of_survey : place_of_survey,
             allotment_date : allotment_date,
             inspection_date : inspection_date,
             spot_survey_recived : spot_survey_recived,
             police_action : police_action,
             detailsOFloadPanssanger : detailsOFloadPanssanger,
             thirdPartiLossInjurios : thirdPartiLossInjurios,
             assisment : assisment,
             third_party_property_damages : third_party_property_damages,
             cousenature : cousenature,


             // origin_destination : origin_destination,
             // lr_invoice_no : lr_invoice_no,
             // transporter_no : transporter_no,
            
             // no_of_passangers : no_of_passangers,
             // tp_vehicle_details : tp_vehicle_details,
             // tp_death_injuri_details : tp_death_injuri_details,
             // death_tp_vehicle_details : death_tp_vehicle_details,
            
             },
            success: function(response)
            {  
                //registrationProcess('5');
                //console.log(response); return false;
                var obj = jQuery.parseJSON(response);
                $("#survey_id").val(obj.survey_id);
                var redirect_url = urls+"final/new-parts/"+report_id;
                window.location.href = redirect_url;
            }  
        });








      // var redirect_url = urls+"SpotReport/damages-report/"+report_id;
        //$('#survey_tab').attr("href", redirect_url);
        //alert(redirect_url);

        //window.location.href = redirect_url;
    }   
}
$(document).ready(function(){

    $(".addCF").click(function(){
        var rowCount = $('#customFields >tbody >tr').length + 1;
       
        $('.addCF').removeAttr('disabled');
          $("#customFields").append('<tr class="new-parts"><td>'+rowCount+'</td><td><input class="form-control" type="text" name="dept[]" id="dept'+rowCount+'" placeholder="Dep"></td><td><input class="form-control" type="text" name="item_name[]" id="item_name_'+rowCount+'" placeholder="Name"> </td><td><input class="form-control" type="text" name="hsn_code[]" id="hsn_code_'+rowCount+'" placeholder="HSN"></td><td><select class="form-control" name="remark[]" id="remark"><option value=""></option><option value="Bent">Bent</option><option value="Needed">Needed</option><option value="Not Covered">Not Covered</option><option value="Tightned">Tightned</option><option value="Damaged">Damaged</option></select></td><td><input class="form-control" type="text" onblur="calculateEstimate()" name="estimate[]" id="estimate_'+rowCount+'" class="onlyNumericKey" placeholder="Estimate"><input class="form-control" type="hidden" name="total_estimate[]" id="total_estimate_'+rowCount+'" ></td><td><input class="form-control" type="text" onblur="calculateAssesed()" name="assessed[]" id="assessed_'+rowCount+'" class="onlyNumericKey" placeholder="Assessed"></td><td><input class="form-control" type="text" name="qe_aq[]" id="qe_aq_'+rowCount+'" value="01 - 01"></td><td><input class="form-control" type="text" name="bill_sr[]" id="bill_sr_'+rowCount+'" placeholder="Bill Sr."></td><td><input class="form-control" type="text" onblur="calculateGst()" name="gst[]" id="gst_'+rowCount+'" class="onlyNumericKey" placeholder="%"></td><td><input class="form-control" type="text" name="total[]" id="total_'+rowCount+'" placeholder="Total"></td><td><select class="form-control" name="type[]" id="type_'+rowCount+'"><option value=""></option><option value="Composit">Composit</option><option value="Disallowed">Disallowed</option><option value="Disposal">Disposal</option><option value="Fiber">Fiber</option><option value="Glass">Glass</option><option value="Kept Open">Kept Open</option><option value="Matel">Matel</option><option value="Plastic">Plastic</option><option value="Rubber">Rubber</option></select></td><td><button type="button" class="btn rounded-pill btn-icon btn-outline-primary remCF"> <span class="tf-icons bx bx-minus"></span></button></td></tr>');
    });

    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });

});






$(document).ready(function(){

    $(".addkf").click(function(){
        var rowCount = $('#addMoreTr >tbody >tr').length + 1;
        //alert(rowCount);
        $('.addkf').removeAttr('disabled');
          $("#addMoreTr").append('<tr ><td><strong>'+rowCount+'</strong></td><td><div class="dropdown bootstrap-select w-100"><select id="imagesNo_'+rowCount+'" name="imagesNo[]" class="selectpicker w-100" data-style="btn-default" tabindex="null"><option value="3">3</option><option value="4">4</option><option value="6">6</option><option value="8">8</option><option value="9">9</option></select></div></td><td><button type="button" class="btn rounded-pill btn-icon btn-outline-primary remCF"> <span class="tf-icons bx bx-minus"></span></button></td></tr>');
    
});

    $("#addMoreTr").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

function calculateEstimate() {
    var rCount = $('#customFields >tbody >tr').length + 1;
    var estimate_each = 0;
    for(var i = 1; i < rCount; i++){
         //estimate_each  += parseFloat($('#estimate_'+i).val()) || 0;
         var estimate   = parseFloat($('#estimate_'+i).val()) || 0;
         var gst        = parseFloat($('#gst_'+i).val()) || '';
         var perVal     = estimate * gst / 100;
         $('#total_estimate_'+i).val(perVal + estimate);
         estimate_each  += perVal + estimate;

        var estVal      = parseFloat($('#estimate_'+i).val());
        var assVal      = parseFloat($('#assessed_'+i).val());

        if(assVal >  estVal ){
            $("#estimate_"+i).css("background-color", "red");
            $("#assessed_"+i).css("background-color", "red");
        }else{
            $("#estimate_"+i).css("background-color", "white");
            $("#assessed_"+i).css("background-color", "white");
        }
    } 
     $('#estimate_value').html(estimate_each.toFixed(2));
     $('#estimate_0').val(estimate_each.toFixed(2));

 
}

function calculateAssesed() {
    var rCount = $('#customFields >tbody >tr').length + 1;
    var assesed_each = 0;
    for(var i = 1; i < rCount; i++){
         //assesed_each += parseFloat($('#assessed_'+i).val()) || 0;
         var assesed  = parseFloat($('#assessed_'+i).val()) || 0;
         var gst      = parseFloat($('#gst_'+i).val()) || '';
         perVal   = assesed * gst / 100;
         $('#total_'+i).val(perVal + assesed);

         assesed_each += perVal + assesed;

        var estVal  = parseFloat($('#estimate_'+i).val());
        var assVal  = parseFloat($('#assessed_'+i).val());
        if(assVal >  estVal ){
            $("#estimate_"+i).css("background-color", "red");
            $("#assessed_"+i).css("background-color", "red");
        }else{
            $("#estimate_"+i).css("background-color", "white");
            $("#assessed_"+i).css("background-color", "white");
        }
    } 
    $('#assesed_value').html(assesed_each.toFixed(2));
   
}

function calculateGst() {
    var rCount = $('#customFields >tbody >tr').length + 1;
    var assesed_each = 0;
    var estimate_each = 0;
    for(var i = 1; i < rCount; i++){
         var assesed  = parseFloat($('#assessed_'+i).val()) || 0;
         var gst      = parseFloat($('#gst_'+i).val()) || '';
         perVal   = assesed * gst / 100;
         $('#total_'+i).val(perVal + assesed);
        assesed_each += parseFloat($('#total_'+i).val()) || 0;


        var estimate  = parseFloat($('#estimate_'+i).val()) || 0;
        var gst      = parseFloat($('#gst_'+i).val()) || '';
        perVal   = estimate * gst / 100;
        $('#total_estimate_'+i).val(perVal + estimate);
        estimate_each += parseFloat($('#total_estimate_'+i).val()) || 0;
    } 
    $('#assesed_value').html(assesed_each.toFixed(2));
    $('#assesed_1').val(assesed_each.toFixed(2));
  
}

$("body").click(function(e){ 
    var estimateTotal   = parseFloat($('#estimate_value').html()) || 0;
    var assesedTotal    = parseFloat($('#assesed_value').html()) || 0;
    var difference = estimateTotal - assesedTotal;
    $('#difference_value').html(difference.toFixed(2));
    $('#difference_2').val(difference.toFixed(2));
});



/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////


function saveInterimPolicyDetails(){ 

    var submircheak = 0 ;
    var policy = jQuery('#policy').val();    
    if (policy==null || policy==""){             
        submircheak =1; 
        setvalidation('policy','F',"Please insert policy details");
     }else{           
         setvalidation('policy','S',''); 
    }
    var endorsement = jQuery('#endorsement').val();    
    if (endorsement==null || endorsement==""){           
        submircheak =1; 
        setvalidation('endorsement','F',"Please insert Endorsement");
     }else{           
         setvalidation('endorsement','S',''); 
    }    

    var idv = jQuery('#idv').val();    
    if (idv==null || idv==""){           
        submircheak =1; 
        setvalidation('idv','F',"Please insert I.D.V");
     }else{           
         setvalidation('idv','S',''); 
    }
    
    var policy_type = jQuery('#policy_type').val();    
    if (policy_type==null || policy_type==""){           
        submircheak =1; 
        setvalidation('policy_type','F',"Please insert policy type");
     }else{           
         setvalidation('policy_type','S',''); 
    }

    var insurance_from_date = jQuery('#insurance_from_date').val();    
    if (insurance_from_date==null || insurance_from_date==""){           
        submircheak =1; 
        setvalidation('insurance_from_date','F',"Please insert insurance from date");
     }else{           
         setvalidation('insurance_from_date','S',''); 
    }

    var insurance_to_date = jQuery('#insurance_to_date').val();    
    if (insurance_to_date==null || insurance_to_date==""){           
        submircheak =1; 
        setvalidation('insurance_to_date','F',"Please insert insurance To date");
     }else{           
         setvalidation('insurance_to_date','S',''); 
    }    

   
    var insurers = jQuery('#insurers').val();    
    if (insurers==null || insurers==""){             
        submircheak =1; 
        setvalidation('insurers','F',"Please select insurer");
     }else{           
         setvalidation('insurers','S',''); 
    }

    var insurer_branch = jQuery('#insurer_branch').val();    
    if (insurer_branch==null || insurer_branch==""){             
        submircheak =1; 
        setvalidation('insurer_branch','F',"Please select insurer branch");
     }else{           
         setvalidation('insurer_branch','S',''); 
    }

    var appointing_office = jQuery('#appointing_office').val();    
    if (appointing_office==null || appointing_office==""){           
        submircheak =1; 
        setvalidation('appointing_office','F',"Please insert appointing office");
     }else{           
         setvalidation('appointing_office','S',''); 
    }

    var insured = jQuery('#appointing_office').val();    
    if (insured==null || insured==""){           
        submircheak =1; 
        setvalidation('insured','F',"Please insert insured");
     }else{           
         setvalidation('insured','S',''); 
    }

    var address = jQuery('#address').val();    
    if (address==null || address==""){           
        submircheak =1; 
        setvalidation('address','F',"Please insert address");
     }else{           
         setvalidation('address','S',''); 
    }    

    var mobile_number = jQuery('#mobile_number').val();    
    if (mobile_number==null || mobile_number==""){           
        submircheak =1; 
        setvalidation('mobile_number','F',"Please insert Mobile Number");
     }else{           
         setvalidation('mobile_number','S',''); 
    }    

    var token_number = jQuery('#token_number').val();    
    if (token_number==null || token_number==""){           
        submircheak =1; 
        setvalidation('token_number','F',"Please insert Token Number");
     }else{           
         setvalidation('token_number','S',''); 
    }

    var hpa = jQuery('#hpa').val();    
    if (hpa==null || hpa==""){           
        submircheak =1; 
        setvalidation('hpa','F',"Please insert H.P.A");
     }else{           
         setvalidation('hpa','S',''); 
    }

    var claim = jQuery('#claim').val();    
    if (claim==null || claim==""){           
        submircheak =1; 
        setvalidation('claim','F',"Please insert claim");
     }else{           
         setvalidation('claim','S',''); 
    }
        
    if(submircheak ==1){  
               return false;
    }else{
        inTerimPolicyRegistration('1');
    }
} 

function inTerimPolicyRegistration(srt){
    var next = parseInt(srt)+1;
    alert(next);
    $("#list_tab_content_"+srt).hide();
    $("#list_tab_"+next).addClass("active");
    $("#list_tab_content_"+next).show();
} 

function inTrimRegistrationProcessBack(srt){
    var next = parseInt(srt)-1;
    $("#list_tab_"+srt).removeClass("active");
    $("#list_tab_content_"+srt).hide();
    $("#list_tab_content_"+next).show();
} 




function saveInterimVehicleDetails(){
    var submircheak = 0 ;
    
    var registration = jQuery('#registration').val();   
    if (registration==null || registration==""){             
        submircheak =1; 
        setvalidation('registration','F',"Please insert registration number details");
     }else{           
         setvalidation('registration','S',''); 
    }
    var registered_owner = jQuery('#registered_owner').val();  
    if (registered_owner==null || registered_owner==""){             
        submircheak =1; 
        setvalidation('registered_owner','F',"Please insert registered owner details");
     }else{           
         setvalidation('registered_owner','S',''); 
    }
    var owner_sr = jQuery('#owner_sr').val();  
    if (owner_sr==null || owner_sr==""){             
        submircheak =1; 
        setvalidation('owner_sr','F',"Please insert owner Sr/Tr Date");
     }else{           
         setvalidation('owner_sr','S',''); 
    }
    var date_of_purchase = jQuery('#date_of_purchase').val();  
    if (date_of_purchase==null || date_of_purchase==""){             
        submircheak =1; 
        setvalidation('date_of_purchase','F',"Please select purchase Date");
     }else{           
         setvalidation('date_of_purchase','S',''); 
    }
    var date_of_registration = jQuery('#date_of_registration').val();  
    if (date_of_registration==null || date_of_registration==""){             
        submircheak =1; 
        setvalidation('date_of_registration','F',"Please select Purchase Date");
     }else{           
         setvalidation('date_of_registration','S',''); 
    }
    var chassis = jQuery('#chassis').val();  
    if (chassis==null || chassis==""){           
        submircheak =1; 
        setvalidation('chassis','F',"Please insert chassis details");
     }else{           
         setvalidation('chassis','S',''); 
    }
    var engine = jQuery('#engine').val();  
    if (engine==null || engine==""){             
        submircheak =1; 
        setvalidation('engine','F',"Please insert engine details");
     }else{           
         setvalidation('engine','S',''); 
    }
    var engine_phy_checked = jQuery('#engine_phy_checked').val();  
    if (engine_phy_checked==null || engine_phy_checked==""){             
        submircheak =1; 
        setvalidation('engine_phy_checked','F',"Please check engine phy checked");
     }else{           
         setvalidation('engine_phy_checked','S',''); 
    }
    var make_varient_mod = jQuery('#make_varient_mod').val();  
    if (make_varient_mod==null || make_varient_mod==""){           
        submircheak =1; 
        setvalidation('make_varient_mod','F',"Please insert make varient mod");
     }else{           
         setvalidation('make_varient_mod','S',''); 
    }
    var type_of_body = jQuery('#type_of_body').val();  
    if (type_of_body==null || type_of_body==""){             
        submircheak =1; 
        setvalidation('type_of_body','F',"Please insert body type");
     }else{           
         setvalidation('type_of_body','S',''); 
    }
    var body_color = jQuery('#body_color').val();  
    if (body_color==null || body_color==""){           
        submircheak =1; 
        setvalidation('body_color','F',"Please insert color details");
     }else{           
         setvalidation('body_color','S',''); 
    }
    var cubic_capacity = jQuery('#cubic_capacity').val();  
    if (cubic_capacity==null || cubic_capacity==""){             
        submircheak =1; 
        setvalidation('cubic_capacity','F',"Please insert cubic capacity");
     }else{           
         setvalidation('cubic_capacity','S',''); 
    }
    var anty_theft = jQuery('#anty_theft').val();  
    if (anty_theft==null || anty_theft==""){             
        submircheak =1; 
        setvalidation('anty_theft','F',"Please insert anty theft");
     }else{           
         setvalidation('anty_theft','S',''); 
    }

    var puc_details = jQuery('#puc_details').val();  
    if (puc_details==null || puc_details==""){             
        submircheak =1; 
        setvalidation('puc_details','F',"Please insert puc details");
     }else{           
         setvalidation('puc_details','S',''); 
    }
    var puc_upto = jQuery('#puc_upto').val();  
    if (puc_upto==null || puc_upto==""){             
        submircheak =1; 
        setvalidation('puc_upto','F',"Please insert puc UpTo date");
     }else{           
         setvalidation('puc_upto','S',''); 
    }
    var reg_kaden_wt = jQuery('#reg_kaden_wt').val();  
    if (reg_kaden_wt==null || reg_kaden_wt==""){           
        submircheak =1; 
        setvalidation('reg_kaden_wt','F',"Please insert reg kaden wt");
     }else{           
         setvalidation('reg_kaden_wt','S',''); 
    }

    var remark_rlw = jQuery('#remark_rlw').val();  
    if (remark_rlw==null || remark_rlw==""){           
        submircheak =1; 
        setvalidation('remark_rlw','F',"Please insert Remark (if ULW N.A.)");
     }else{           
         setvalidation('remark_rlw','S',''); 
    }


    var unladen_wt = jQuery('#unladen_wt').val();  
    if (unladen_wt==null || unladen_wt==""){             
        submircheak =1; 
        setvalidation('unladen_wt','F',"Please insert Unladen Wt.");
     }else{           
         setvalidation('unladen_wt','S',''); 
    }

    var seating_capacity = jQuery('#seating_capacity').val();  
    if (seating_capacity==null || seating_capacity==""){             
        submircheak =1; 
        setvalidation('seating_capacity','F',"Please insert seating capacity");
     }else{           
         setvalidation('seating_capacity','S',''); 
    }

    var remark_ulw = jQuery('#remark_ulw').val();  
    if (remark_ulw==null || remark_ulw==""){             
        submircheak =1; 
        setvalidation('remark_ulw','F',"Please insert remark ulw");
     }else{           
         setvalidation('remark_ulw','S',''); 
    }

    var class_of_value = jQuery('#class_of_value').val();  
    if (class_of_value==null || class_of_value==""){             
        submircheak =1; 
        setvalidation('class_of_value','F',"Please insert Class Of Value");
     }else{           
         setvalidation('class_of_value','S',''); 
    }

    var fuel_used = jQuery('#fuel_used').val();  
    if (fuel_used==null || fuel_used==""){           
        submircheak =1; 
        setvalidation('fuel_used','F',"Please insert Fuel");
     }else{           
         setvalidation('fuel_used','S',''); 
    }

    var odometer_reading = jQuery('#odometer_reading').val();  
    if (odometer_reading==null || odometer_reading==""){           
        submircheak =1; 
        setvalidation('odometer_reading','F',"Please insert odometer reading");
     }else{           
         setvalidation('odometer_reading','S',''); 
    }

    var pre_accident_condition = jQuery('#pre_accident_condition').val();  
    if (pre_accident_condition==null || pre_accident_condition==""){             
        submircheak =1; 
        setvalidation('pre_accident_condition','F',"Please insert pre accident condition");
     }else{           
         setvalidation('pre_accident_condition','S',''); 
    }

    var tax_particular = jQuery('#tax_particular').val();  
    if (tax_particular==null || tax_particular==""){           
        submircheak =1; 
        setvalidation('tax_particular','F',"Please insert tax particular");
     }else{           
         setvalidation('tax_particular','S',''); 
    }

    var remark = jQuery('#remark').val();  
    if (remark==null || remark==""){           
        submircheak =1; 
        setvalidation('remark','F',"Please insert remark");
     }else{           
         setvalidation('remark','S',''); 
    }
    if(submircheak ==1){  
           return false;
    }else{
        inTerimPolicyRegistration('2');
    
    }
}



function saveIntrimDriverDetails(){
    var submircheak = 0 ;
    
    var driving_licence = jQuery('#driving_licence').val();   
    if (driving_licence==null || driving_licence==""){           
        submircheak =1; 
        setvalidation('driving_licence','F',"Please insert Driving license details");
     }else{           
         setvalidation('driving_licence','S',''); 
    }
    var driver_name = jQuery('#driver_name').val();  
    if (driver_name==null || driver_name==""){           
        submircheak =1; 
        setvalidation('driver_name','F',"Please insert driver name");
     }else{           
         setvalidation('driver_name','S',''); 
    }
    var driver_dob = jQuery('#driver_dob').val();  
    if (driver_dob==null || driver_dob==""){             
        submircheak =1; 
        setvalidation('driver_dob','F',"Please insert driver date of birth");
     }else{           
         setvalidation('driver_dob','S',''); 
    }
    var issue_date = jQuery('#issue_date').val();  
    if (issue_date==null || issue_date==""){             
        submircheak =1; 
        setvalidation('issue_date','F',"Please select issue date");
     }else{           
         setvalidation('issue_date','S',''); 
    }
    var valid_date = jQuery('#valid_date').val();  
    if (valid_date==null || valid_date==""){             
        submircheak =1; 
        setvalidation('valid_date','F',"Please select valid date");
     }else{           
         setvalidation('valid_date','S',''); 
    }
    var issuing_authority = jQuery('#issuing_authority').val();  
    if (issuing_authority==null || issuing_authority==""){           
        submircheak =1; 
        setvalidation('issuing_authority','F',"Please insert issuing authority details");
     }else{           
         setvalidation('issuing_authority','S',''); 
    }
    var licence_type = jQuery('#licence_type').val();  
    if (licence_type==null || licence_type==""){             
        submircheak =1; 
        setvalidation('licence_type','F',"Please select license type");
     }else{           
         setvalidation('licence_type','S',''); 
    }
    var badge = jQuery('#badge').val();  
    if (badge==null || badge==""){           
        submircheak =1; 
        setvalidation('badge','F',"Please insert badge details");
     }else{           
         setvalidation('badge','S',''); 
    }
    
    var driver_remark = jQuery('#driver_remark').val();  
    if (driver_remark==null || driver_remark==""){           
        submircheak =1; 
        setvalidation('driver_remark','F',"Please insert remark details");
     }else{           
         setvalidation('driver_remark','S',''); 
    }

    if(submircheak ==1){  
               return false;
    }else{

              
       
    }   
}