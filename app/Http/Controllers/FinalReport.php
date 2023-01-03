<?php
namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
use App\Models\Common_model as Common_model;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Insurer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;

class FinalReport extends Controller
{
    private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }

    public function index(Request $request){
      
       $id = $request->id;
      if(!empty($id)){
        $reportDetails = DB::table('cdx_surveyor_reports')->where('report_id', $id )->first();
        $policyDetails = DB::table('cdx_report_policy_details')->where('report_id', $id )->first();
        $vehicleDetails = DB::table('cdx_report_vehicle_details')->where('report_id', $id )->first();
        $driverDetails = DB::table('cdx_report_driver_licence_details')->where('report_id', $id )->first();
       // print_r($policyDetails);
      }else{
        $reportDetails = '';
        $policyDetails = '';
        $vehicleDetails = '';
        $driverDetails = '';
      }

        $banks = Bank::latest()->where('status', 1)->get();

      $insurer = DB::table('cdx_surveyor_insurer')
            ->where('cdx_surveyor_insurer.status', 1 )
            ->where('cdx_surveyor_insurer.survey_info_id', session('user_id') )
            ->leftJoin('insurer_master', 'cdx_surveyor_insurer.insurer_id', '=', 'insurer_master.insurer_master_id')
            ->select('cdx_surveyor_insurer.*', 'insurer_master.insurer_name')
            ->get();

       $vehicles =  DB::table('cdx_vehicle')->where('status', 1)->get()->all();  
       return view('surveyor-admin/reports/finalReportManagement/finalPolicyReport',[
           'title' => 'Policy & Vehicle','insurers' => $insurer,'banks' => $banks,'vehicles' => $vehicles,
           'reportDetails' => $reportDetails, 'policyDetails' => $policyDetails, 'vehicleDetails' => $vehicleDetails,
           'driverDetails' => $driverDetails


        ]);
    }
    public function finalSurveyReport(Request $request){
       $id = $request->id;
      if(!empty($id)){
       
        $surveyDetails = DB::table('cdx_report_survey_details')->where('report_id', $id )->first();
        
        //print_r($driverDetails); die;
      }else{
        $surveyDetails = '';
      }

      return view('surveyor-admin/reports/finalReportManagement/finalSurveyReport',[
     'title' => 'Final Survey Report','report_id' => $id,'surveyDetails' => $surveyDetails,'title' => 'Sport Report'
        ]);
      
    }

    public function finalNewParts(Request $request){
       $id = $request->id;
      if(!empty($id)){
       
        $surveyDetails = DB::table('cdx_report_survey_details')->where('report_id', $id )->first();
        
        //print_r($driverDetails); die;
      }else{
        $surveyDetails = '';
      }
      return view('surveyor-admin/reports/finalReportManagement/finalNewParts',[
           'title' => 'Final New Parts',
           'report_id' => $id,
        ]);
    }

    public function finalLabour(Request $request){
      return view('surveyor-admin/reports/finalReportManagement/finalLabour',[
           'title' => 'Final Labour'
        ]);
    }    

    public function summeryRemark(Request $request){
      return view('surveyor-admin/reports/finalReportManagement/summeryRemark',[
           'title' => 'Summery Remark'
        ]);
    }

    public function storePolicyDetails(Request $request){
   
      $reportData =  array('surveyor_id' =>session('user_id'),'insurer_id'=>$request->insurer_id,'insurer_branch_id'=>$request->insurer_branch_id,'report_type'=>$request->report_type,'report_status'=>$request->report_status,'reference_number'=>$request->reference_number);
        $report_id = $request->report_id;
        if(!empty($request->report_id)){
            $updateReport = $this->Common_model->updateDate('cdx_surveyor_reports', array('report_id'=>$report_id), $reportData);

            $policyData = array('policy'=>$request->policy,'idv'=>$request->idv,'policy_type'=>$request->policy_type,'insurance_from_date'=>$request->insurance_from_date,'insurance_to_date'=>$request->insurance_to_date,'insurer_id'=>$request->insurer_id,'insurer_branch_id'=>$request->insurer_branch_id,'appointing_office'=>$request->appointing_office,'insured'=>$request->insured,'address'=>$request->address,'hpa'=>$request->hpa,'claim'=>$request->claim);
            $policy_id = $this->Common_model->updateDate('cdx_report_policy_details', array('report_id'=>$report_id), $policyData);

        }else{
            $report_id  = $this->Common_model->saveDate('cdx_surveyor_reports',$reportData);
            $policyData = array('report_id' =>$report_id,'policy'=>$request->policy,'idv'=>$request->idv,'policy_type'=>$request->policy_type,'insurance_from_date'=>$request->insurance_from_date,'insurance_to_date'=>$request->insurance_to_date,'insurer_id'=>$request->insurer_id,'insurer_branch_id'=>$request->insurer_branch_id,'appointing_office'=>$request->appointing_office,'insured'=>$request->insured,'address'=>$request->address,'hpa'=>$request->hpa,'claim'=>$request->claim);
            $policy_id  = $this->Common_model->saveDate('cdx_report_policy_details',$policyData);
      }
      
      echo json_encode(['msg'=>'success','report_id'=>$report_id]); die;
   }


    public function storeVehicleDetails(Request $request){
          $attr = $request->toArray();
      $report_id = $request->report_id;
      $report_vehicle_id = $request->report_vehicle_id;

       $vehicleData =  array(
         'report_id' =>$request->report_id,
         'master_vehicle_id'=>1,
         'vehicle_type'=>$request->vehicle_type,
         'registration_no'=>$request->registration,
         'registerd_owner'=>$request->registered_owner,
         'owner_sr_trs'=>$request->owner_sr,
         'date_of'=>$request->date_of_purchase,
         'date_of_date'=>$request->date_of_registration,
         'chassis'=>$request->chassis,
         'chassis_phy_checked'=>$request->chassis_phy_checked,
         'engine'=>$request->engine,
         //'engine_phy_checked'=>$request->phy_checked,
         'color'=>$request->body_color,
         'odometer_reading'=>$request->odometer_reading,
         'puc_details'=>$request->puc_details,
         'puc_upto_date'=>$request->puc_upto,
         'remark_rlw'=>$request->remark_rlw,
         'remark_ulw'=>$request->remark_ulw,
         'remark'=>$request->remark,

         'com_fitness_certificate'=>$request->fitness_certificate,
         'com_fitness_to_date'=>$request->fitness_to_date, 
         'com_fitness_from_date'=>$request->fitness_from_date,
         'com_parmit_to_date'=>$request->parmit_to_date,
         'com_parmit_from_date'=>$request->parmit_from_date,
         'com_type_of_parmit'=>$request->type_of_parmit,
         'com_authorization_validity'=>$request->authorization_validity,
         'com_area_of_opration'=>$request->area_of_opration,

         'make_variant_mod'=>$request->make_varient_mod,
         'fuel_used'=>$request->fuel_used,
         'type_fo_body'=>$request->type_of_body,
         'cubic_capacity'=>$request->cubic_capacity,
         'accident_condition'=>$request->pre_accident_condition,
         'reg_laden_wt'=>$request->reg_laden_wt,
         'unladen_wt'=>$request->unladen_wt,
         'seating_capacity'=>$request->seating_capacity,
         'class_of_vehicle'=>$request->class_of_value,
         'tax_particulars'=>$request->tax_particular
       );
        //echo "<pre>"; print_r($vehicleData); die();
      if(!empty($request->report_vehicle_id)){

        $vehicleUpdate = $this->Common_model->updateDate('cdx_report_vehicle_details', array('vehicle_id'=>$report_vehicle_id), $vehicleData);

      }else{
        $report_vehicle_id  = $this->Common_model->saveDate('cdx_report_vehicle_details',$vehicleData);
      }
      
      echo json_encode(['msg'=>'success','report_id'=>$report_id,'report_vehicle_id'=>$report_vehicle_id]); die;
  }
  
  public function storeDriverLicenseDetails(Request $request){
    //echo "<pre>"; print_r($_POST); die();
      $attr = $request->toArray();
      //print_r($attr); die;
      $report_id = $request->report_id;

      $report_driver_id = $request->report_driver_id;

      $driverData =  array('report_id' =>$request->report_id,'driving_licence'=>$request->driving_licence,'driver_name'=>$request->driver_name,'date_of_birth'=>$request->date_of_birth,'issue_date'=>$request->issue_date,'valid_from'=>$request->valid_from,'issuing_authority'=>$request->issuing_authority,'licence_type'=>$request->licence_type,'badge'=>$request->badge,'remark'=>$request->remark);
      
      if(!empty($request->report_driver_id)){

        $driverUpdate = $this->Common_model->updateDate('cdx_report_driver_licence_details', array('driver_id'=>$report_driver_id), $driverData);

      }else{
        $report_driver_id  = $this->Common_model->saveDate('cdx_report_driver_licence_details',$driverData);
      }
      
      echo json_encode(['msg'=>'success','report_id'=>$report_id,'report_vehicle_id'=>$report_driver_id]); die;
  }
public function savefinalpartDetails(Request $request)
{
      

        if ($request->dept  > 0) {
            $getlength = count($request->dept);
               $InserNewPart = array('dept'=>$request->dept,'item_name'=>$request->item_name,'hsn_code'=>$request->hsn_code,'remark'=>$request->remark,'estimate'=>$request->estimate,'assessed'=>$request->assessed,'qe_aq'=>$request->qe_aq,'bill_sr'=>$request->bill_sr,'gst'=>$request->gst,'total'=>$request->total,'type'=>$request->type);      
               $jsonEncode =  json_encode($InserNewPart);   
                $inserNewAr = [
                         'partd_details' => $jsonEncode,
                         'report_id' => $request->report_id,
                         'wo_tax' => $request->wo_tax,
                         'estimated_amount' => $request->estimate_value,
                         'assessed_amount' => $request->assesed_value,
                         'diffrence_amount' => $request->difference_value
                 ];  
           $insert  = $this->Common_model->saveDate('cdx_final_parts',$inserNewAr); 
           return redirect('final/new-parts');

            }           
        }
  
  public function saveSurveyInfo(Request $request){
      
   //    echo "<pre>"; print_r($_POST); die(); 

    $surveyDate =  array(
       'report_id' =>$request->report_id,
       'date_of_accident'=>$request->date_of_accident,
       'time_of_accident'=>$request->time_of_accident,
       'place_of_accident'=>$request->place_of_accident,
      //'vehicle_shifted_to'=>$request->vehicle_shifted_to,
     // 'parson_available_on_spot'=>$request->parson_available_on_spot,
      //'parmit_to_date'=>$request->parmit_to_date,
      'allotment_date'=>$request->allotment_date,
      'inspection_date'=>$request->inspection, 
      'police_action'=>$request->police_action,
   //   'name_of_police_satation'=>$request->name_of_police_satation,
     // 'satation_dairy_no'=>$request->satation_dairy_no,
  //    'nature_of_goods'=>$request->nature_of_goods,

      // 'Goods_caried'=>$request->Goods_caried,
      // 'origin_destination'=>$request->origin_destination,
      // 'lr_invoice_no'=>$request->lr_invoice_no,
      // 'transporter_no'=>$request->transporter_no,
      // 'no_of_passangers'=>$request->no_of_passangers,
      // 'tp_vehicle_details'=>$request->tp_vehicle_details,
      // 'tp_death_injuri_details'=>$request->tp_death_injuri_details,
      // 'death_tp_vehicle_details'=>$request->death_tp_vehicle_details,
      // 'third_party_property_damages'=>$request->third_party_property_damages
    );
      
      if(!empty($request->survey_id)){
        $survey_id = $this->Common_model->updateDate('cdx_report_survey_details', array('survey_id'=>$survey_id), $surveyDate);
      }else{
        $survey_id  = $this->Common_model->saveDate('cdx_report_survey_details',$surveyDate);
      }
      echo json_encode(['msg'=>'success','survey_id'=>$survey_id]); die;
  }

   
 }