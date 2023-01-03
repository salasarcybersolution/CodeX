<?php

namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Session;
use App\Models\AlbumImages; 
use App\Models\ReportAlbums;
use Cache;
use DateTime;

use App\Models\Common_model as Common_model;


class Bill extends Controller
{ 
   
    private $Common_model; 
    public function __construct(Common_model $Common_model){
        $this->Common_model = $Common_model; 
    }
    
    public function index(){

        $data['title'] = 'All Bills';
        $sql= DB::table('cdx_surveyor_reports')
            ->leftJoin('insurer_master', 'cdx_surveyor_reports.insurer_id', '=', 'insurer_master.insurer_master_id')
            ->select('cdx_surveyor_reports.*','insurer_master.insurer_name')
            ->orderBy('cdx_surveyor_reports.report_id', 'DESC')
            ->get();
        return view('surveyor-admin/billManagement/allBill',$data,['sql' => $sql]);   
    }    

    public function createBill($id=0){
        $data['title'] = 'Create Bill'; 
        $sql= DB::table('cdx_surveyor_reports')->where('report_id', $id)->first();
        $vehicle_registration_no = $sql->vehicle_registration_no;
        $insurer_id = $sql->insurer_id;
        $insurer_branch_id = $sql->insurer_branch_id;
        $whereData = array('insurer_id'=> $insurer_id, 'vehicle_registration_no'=>$vehicle_registration_no, 'insurer_branch_id'=>$insurer_branch_id, 'is_submitted' => '0');
        $allBill = DB::table('cdx_surveyor_reports')->where($whereData)->get();
        return view('surveyor-admin/billManagement/createBill',$data,['sql' => $sql, 'allBill' => $allBill]);  
    }
   
}
