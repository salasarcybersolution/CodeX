
// function servyorViewLoadForm(id){
// //$('#seryorInsurer').modal('show'); 
//  $.ajax({
//     url: urls+'surveyor/serveyorInsurerview',
//     type: "POST",
//     data: {
//     _token: $('#_token').val(),
//     id : id 
//     },
//  success:function (response) {
//   // var obj = JSON.parse(JSON.stringify(response));
//   // $("#bank_name").val(obj.bank_name);
//   // $('#seryorInsurer').show();

// }

//  });

// }
function setvalidation(strId,strT,strMsg){
   if(strT=='S'){
         jQuery('#'+strId).css('border','');
       jQuery('#err_'+strId).html('');
     }else if(strT=='F'){           
          jQuery('#'+strId).css('border','1px solid #F00');
          jQuery('#err_'+strId).html(strMsg);
    }
} 
  $(document).ready(function() {
        var buttonAdd = $("#add-button");
        var buttonRemove = $("#remove-button");
        var className = ".dynamic-field";
        var count = 0;
        var field = "";
        var maxFields =50;
      
        function totalFields() {
          return $(className).length;
        }
      
        function addNewField() {
          count = totalFields() + 1;
          field = $("#dynamic-field-1").clone();
          field.attr("id", "dynamic-field-" + count);
          field.children("label").text("Field " + count);
          field.find("input").val("");
          $(className + ":last").after($(field));
        }
      
        function removeLastField() {
          if (totalFields() > 1) {
            $(className + ":last").remove();
          }
        }
      
        function enableButtonRemove() {
          if (totalFields() === 2) {
            buttonRemove.removeAttr("disabled");
            buttonRemove.addClass("shadow-sm");
          }
        }
      
        function disableButtonRemove() {
          if (totalFields() === 1) {
            buttonRemove.attr("disabled", "disabled");
            buttonRemove.removeClass("shadow-sm");
          }
        }
      
        function disableButtonAdd() {
          if (totalFields() === maxFields) {
            buttonAdd.attr("disabled", "disabled");
            buttonAdd.removeClass("shadow-sm");
          }
        }
      
        function enableButtonAdd() {
          if (totalFields() === (maxFields - 1)) {
            buttonAdd.removeAttr("disabled");
            buttonAdd.addClass("shadow-sm");
          }
        }
      
        buttonAdd.click(function() {
          addNewField();
          enableButtonRemove();
          disableButtonAdd();
        });
      
        buttonRemove.click(function() {
          removeLastField();
          disableButtonRemove();
          enableButtonAdd();
        });

}); // DOM Close




function fatchpolicy() { 
var policy = $('#policy').val();
 if (policy == '') {
  $('#policyMsg').show();
  $("#policyMsg").delay(3000).slideUp(300);
   return false;
 }else{

 $.ajax({
    url: urls+'SpotReport/getpolicy',
    type: "POST",
    data: {
    _token: $('#_token').val(),
    policy : policy 
    },
 success:function (response) {
   var obj = jQuery.parseJSON(response);
   var errorMsg =  obj.errorMsg
   if (errorMsg) {
       $("#policyMsg").text(errorMsg);
       $('#policyMsg').show();
       $("#policyMsg").delay(3000).slideUp(300);
   }else {
      var report_id = obj.policyDetails.report_id;
      var redirect_url = urls+"SpotReport/policy-report/"+report_id;
      $('#survey_tab').attr("href", redirect_url);
      window.location.href = redirect_url;
   }
}

 });
}
return false;
  }


// function SurveyorGeneratedURLProcess(){
//   var submircheak = 0 ;
//     var policy_no = jQuery('#policy_no').val();    
//     if (policy_no==null || policy_no==""){         
//         submircheak =1; 
//     setvalidation('policy_no','F',"Please Enter Policy Number");
//      }else{       
//      setvalidation('policy_no','S',''); 
//   }
//   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//     var vehicle_no = jQuery('#vehicle_no').val();
//     if (!regex.test(vehicle_no)){         
//         submircheak =1; 
//         setvalidation('vehicle_no','F',"Please Enter Vehicle Number");
//     }else{       
//         setvalidation('vehicle_no','S',''); 
//     }
    
//   if(submircheak ==1){  
//          return false;
//   }else{
//     $("#submiteAdminButtons_g").hide();
//     $("#c_submiteAdminButtons_g").hide();
//     $("#waiteAdminButtons").show();
//     $("#form-add-new-record").submit(); 
//   }
// }





function loadUpdateForm(id,bankName){
$("#bankName").val(bankName);
$("#bank_id").val(id);
$('#updateBank').modal('show'); 
}

function parteditdata(id,part_name){
$("#partName").val(part_name);
$("#part_id").val(id);
$('#updatePart').modal('show'); 
}

 $('#insurerID').on('change', function (){
  var insurerID = this.value;
  $("#insurer_branch_id").html('');

 $.ajax({
		url: urls+'surveyor/fatchBranchandBankname',
		type: "POST",
		data: {
		_token: $('#_token').val(),
		insurerID : insurerID 
		},
 success: function (response) {

      $.each(response.citiesName, function (key, value) {
      $("#insurer_branch_id").append('<option value="' + value
          .id + '">' + value.city + '</option>');
        });
        $("#insurer_branch_id").append('<option value="' + value
                .id + '">' + value.city + '</option>');
    }
      });
          });


