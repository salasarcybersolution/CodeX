<?php
namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Insurer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;

class InterimReport extends Controller
{
    public function index(){
        $banks = Bank::latest()->where('status', 1)->get();

      $insurer = DB::table('serveyor_insurer')
            ->where('serveyor_insurer.status', 1 )
            ->where('serveyor_insurer.serveyor_user_id', session('user_id') )
            ->leftJoin('insurer_master', 'serveyor_insurer.insurer_id', '=', 'insurer_master.id')
            ->select('serveyor_insurer.*', 'insurer_master.insurer')
            ->get();

       $vehicles =  DB::table('cdx_vehicle')->where('status', 1 )->get()->all();  
       return view('surveyor-admin/reports/interimReportManagement/interimPolicyReport',[
           'title' => 'Policy & Vehicle','insurers' => $insurer,'banks' => $banks,'vehicles' => $vehicles
        ]);
    }
    public function interimSurveyReport(Request $request){
      return view('surveyor-admin/reports/interimReportManagement/interimSurveyReport',[
           'title' => 'Interim Survey Report'
        ]);
      
    }

    public function interimNewParts(Request $request){
      return view('surveyor-admin/reports/interimReportManagement/interimNewParts',[
           'title' => 'Interim New Parts'
        ]);
    }

    public function interimLabour(Request $request){
      return view('surveyor-admin/reports/interimReportManagement/interimLabour',[
           'title' => 'Interim Labour'
        ]);
    }
}