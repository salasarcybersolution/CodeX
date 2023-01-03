<?php
namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
use App\Models\Common_model as Common_model;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Insurer;
use App\Models\PolicyDetails;
use App\Models\SurveyorReports;
use App\Models\DriverLicenceDetails;
use App\Models\ReportVehicleDetails;
use App\Models\ReportSurveyDetails;
use App\Models\ReportDamageDetails;
use App\Models\ReportRemarkDetails;
use App\Models\ReportAgreegateNos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;

class SpotReport extends Controller
{
    private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }
    
    public function index(Request $request) 
    {
      $id = $request->id;
      if(!empty($id)){
        $reportDetails = DB::table('cdx_surveyor_reports')->where('report_id', $id )->first();
        $policyDetails = DB::table('cdx_report_policy_details')->where('report_id', $id )->first();
        $vehicleDetails = DB::table('cdx_report_vehicle_details')->where('report_id', $id )->first();
        $driverDetails = DB::table('cdx_report_driver_licence_details')->where('report_id', $id )->first();
        //print_r($policyDetails);

        $insurer_id = $reportDetails->insurer_id; 
        $user_id = session('user_id');
        
        $branch_list = DB::table('insurer_branch')
        ->whereIn('insurer_branch_id', function($query) use ($insurer_id, $user_id)
        {
            $query->select(DB::raw('insurer_branch_id'))
                  ->from('serveyor_insurer')
                  ->where('serveyor_user_id', $user_id)
                  ->where('insurer_id', $insurer_id);
        })
        ->get();

      }else{
        $reportDetails = '';
        $policyDetails = '';
        $vehicleDetails = '';
        $driverDetails = '';
        $branch_list = '';
      }
      //$insurer = Insurer::latest()->where('status', 1)->paginate(10);
      $banks = Bank::latest()->where('status', 1)->get();

      $insurer = DB::table('serveyor_insurer')
            ->where('serveyor_insurer.status', 1 )
            ->where('serveyor_insurer.serveyor_user_id', session('user_id') )
            ->leftJoin('insurer_master', 'serveyor_insurer.insurer_id', '=', 'insurer_master.insurer_master_id')
            ->select('serveyor_insurer.*', 'insurer_master.insurer_name')
            ->groupBy('serveyor_insurer.insurer_id') 
            ->get();      
    
      $vehicles =  DB::table('cdx_vehicle')->where('status', 1 )->get()->all();     

       return view('surveyor-admin/reports/spotReportManagement/spotPolicyReport',[
            'insurers' => $insurer,'banks' => $banks,'vehicles' => $vehicles,'reportDetails' => $reportDetails,'PolicyDetails' => $policyDetails,'vehicleDetails' => $vehicleDetails,'driverDetails' => $driverDetails,'branch_list' => $branch_list, 'title' => 'Sport Report'
        ]);

    }
 public function policyDetails(Request $request)
 { 
  if ($request->policy) {
      $policy = $request->policy; 

      $policyDetails = DB::table('cdx_report_policy_details')->where('policy', $policy )->first();
      if($policyDetails){
        echo json_encode(['msg'=>'success','policyDetails'=>$policyDetails]); die;
      }else{
        echo json_encode(['errorMsg'=>'Sorry! your policy Number is Invalid']); die;
      }
      
   }else{
       echo json_encode(['msg'=>'Sorry there is no result found !!!']); die;
   }
 }


  
  public function storePolicyDetails(Request $request){
     
      $input = $request->all();
      $report_id = $request->report_id;
      
      // Add/Update policy Information
      $reportData = SurveyorReports::where('report_id', $report_id)->first();
      $policyDetails = PolicyDetails::where('report_id', $report_id)->first();
      if(!empty($policyDetails)){
        $reportData->surveyor_id = session('user_id');
        $reportData->update($input);
        $policyDetails->update($input);
      }else{
        $policy_id  =  PolicyDetails::create($input);
      }

      // Add/Update Vehical details Information
      $vehicleDetailsData = ReportVehicleDetails::where('report_id', $report_id)->first();
      if(!empty($vehicleDetailsData)){
        $vehicleDetailsData->update($input);
      }else{
        $report_vehicle_id  =  ReportVehicleDetails::create($input);
      }
      
      // Add/Update Driver Information
      $driverDetails = DriverLicenceDetails::where('report_id', $report_id)->first();
      if(!empty($driverDetails)){
        $driverDetails->update($input);
      }else{
        $report_driver_id  =  DriverLicenceDetails::create($input);
      }

      return redirect('SpotReport/survey-report/'.$report_id);
  }

    public function spotSurveyReport(Request $request){
      $id = $request->id;
      if(!empty($id)){
        $surveyDetails = DB::table('cdx_report_survey_details')->where('report_id', $id )->first();
      }else{
        $surveyDetails = '';
      }

       return view('surveyor-admin/reports/spotReportManagement/spotSurveyReport',[
            'report_id' => $id,'surveyDetails' => $surveyDetails,'title' => 'Sport Report'
        ]); 
    }


  public function saveSurveyInfo(Request $request){
    $input = $request->all();
    $report_id = $request->report_id;
    $surveyDetails = ReportSurveyDetails::where('report_id', $report_id)->first();

      if(!empty($surveyDetails)){
       $surveyDetails->update($input);
      }else{
        $survey_id  =  ReportSurveyDetails::create($input);
      }
      return redirect('SpotReport/damages-report/'.$report_id);
  }


    public function spotDamagesReport(Request $request){
      $id = $request->id;
      $parts =  DB::table('cdx_parts')->where('status', 1 )->get()->all();

      if(!empty($id)){
        $damageDetails = DB::table('cdx_report_damage_details')->where('report_id', $id )->first();
      }else{
        $damageDetails = '';
      }

      return view('surveyor-admin/reports/spotReportManagement/spotDamagesReport',[
            'parts' => $parts,'damageDetails' => $damageDetails,'report_id' => $id,'title' => 'Sport Report'
        ]); 
    }

    public function storeSpotDamagesReport(Request $request){
      $report_id = $request->report_id; 
      $parts = json_encode($request->part);
      $description = json_encode($request->description);
      $damageDetails = DB::table('cdx_report_damage_details')->where('report_id', $report_id )->first();
      $damageData =  array('report_id' =>$request->report_id,'parts'=>$parts,'description'=>$description);
      if(!empty($damageDetails)){
        $damageUpdate = $this->Common_model->updateDate('cdx_report_damage_details', array('report_id'=>$report_id), $damageData);
      }else{
        $damage_id  = $this->Common_model->saveDate('cdx_report_damage_details',$damageData);
      }
       return redirect('SpotReport/notes-remark-report/'.$report_id);
    }


    public function spotNotesRemarkReport(Request $request){
      $report_id = $request->id;
      $ReportRemarkDetails = ReportRemarkDetails::where('report_id', $report_id)->first();
      $ReportAgreegateNos = ReportAgreegateNos::where('report_id', $report_id)->first();
      $reportData = SurveyorReports::where('report_id', $report_id)->first();
      return view('surveyor-admin/reports/spotReportManagement/spotNotesRemarkReport',[
            'report_id' => $report_id, 'ReportRemarkDetails' => $ReportRemarkDetails, 'ReportAgreegateNos' => $ReportAgreegateNos, 'reportData' => $reportData,'title' => 'Sport Report'
        ]); 
    }
  public function saveSpotNotesRemark(Request $request){
    $input = $request->all();
    $report_id = $request->report_id;
    $ReportRemarkDetails = ReportRemarkDetails::where('report_id', $report_id)->first();

      if(!empty($ReportRemarkDetails)){
       $ReportRemarkDetails->update($input);
      }else{
        $remarkdata  =  ReportRemarkDetails::create($input);
      }

    $nos_item_name = json_encode($request->nos_item_name);
    $nos_remark = json_encode($request->nos_remark);
    
    $ReportAgreegateNos = ReportAgreegateNos::where('report_id', $report_id)->first();

    if(!empty($ReportAgreegateNos)){
     $ReportAgreegateNos->report_id = $report_id;
     $ReportAgreegateNos->nos_item_name = $nos_item_name;
     $ReportAgreegateNos->nos_remark = $nos_remark;
     $ReportAgreegateNos->update();
    }else{
      $remarkdata  =  ReportAgreegateNos::create([
        'report_id' =>$report_id,
        'nos_item_name' =>$nos_item_name,
        'nos_remark' =>$nos_remark,
      ]);
    }
//echo $request->is_submitted; die;
    $reportData = SurveyorReports::where('report_id', $report_id)->first();
    $reportData->is_submitted = $request->is_submitted;
    $reportData->update();
    
    return redirect('report-list');
      
  }  




 public function reportViewDetails($report_id)
  {      
     
         $sql2= DB::table('cdx_surveyor_reports')
            ->leftJoin('cdx_report_policy_details', 'cdx_surveyor_reports.report_id', '=', 'cdx_report_policy_details.report_id')
            ->leftJoin('cdx_report_vehicle_details', 'cdx_surveyor_reports.report_id', '=', 'cdx_report_vehicle_details.report_id')
            ->leftJoin('cdx_report_driver_licence_details', 'cdx_surveyor_reports.report_id', '=', 'cdx_report_driver_licence_details.report_id')
             ->where('cdx_surveyor_reports.report_id','=', $report_id)
             ->first();
          $data['title'] = 'Report View Details';
        return view('surveyor-admin/reports/reportList/report_view_details',$data);
  } 
}