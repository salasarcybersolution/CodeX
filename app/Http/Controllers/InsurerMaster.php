<?php
namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
use App\Models\Common_model as Common_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
// use App\Http\Requests\BankRequest;
// use App\Http\Resources\BankResource;
use App\Models\Bank;
use App\Models\Insurer;
use App\Models\Branch;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;

class InsurerMaster extends Controller
{
    private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }

    public function index(){ 
        $banks    = $this->Common_model->getData('bank_master')->where('status', 1)->get();
        $insurer  = $this->Common_model->getData('insurer_master')->get();
        return view('master/insurer/insurerMaster',['insurers' => $insurer,'banks' => $banks,'title' => 'Insurer Master' ]);
    }


   public function insurerRegistration()
   { 
  
      return view('master/insurer/insurerAdd');
   }
 

   public function store(Request $request){     

    echo '<pre>';
    print_r($_POST);
    die;

       $validatedData = $request->validate([
          'insurer' => 'required',
          'initial' => 'required',
          'remark'  => 'required'
        ]);

       $insertArr = [
                'insurer_name' => $request->insurer,
                'initial' => $request->initial,
                'remark' => $request->remark
        ];

        $InsurerMasterId = $this->Common_model->saveDate('insurer_master', $insertArr);

        $InsurerMasterFeesArr = [
                'insurer_master_id' => $InsurerMasterId,
                'tds' => $request->initial,
                'tcs' => $request->remark,
                'fee_based_on' => $request->remark,
                'spot_prof_fees' => $request->remark,
                'reins_prof_fees' => $request->remark,
                'spot_coveyance' => $request->remark,
                'reins_coveyance' => $request->remark,
                'final_conveyance' => $request->remark,
                'insurer_slab_fees_status' => '1',
        ]; 
        $this->Common_model->saveDate('cdx_insurer_master_fees', $InsurerMasterFeesArr);       

        $InsurerSlabFeesArr = [
                'insurer_master_id' => $InsurerMasterId,
                'slab_from' => $request->initial,
                'slab_to' => $request->remark,
                'min_amount' => $request->remark,
                'max_amount' => $request->remark,
                'formula_percent' => $request->remark,
                'master_fees_status' => '1'
        ];
        $this->Common_model->saveDate('cdx_insurer_slab_fees', $InsurerSlabFeesArr); 

        $success = Session::flash('msg', "Insure Master has been successfully save");
        return redirect('Master/insurer-master');
               
    
  }

    public function insurerMasterEditFun(Request $request)
     {  
        $id = Crypt::decrypt($request->id);
        //$insurerData = Insurer::where('insurer_master_id',$id)->first();
        $insurerData = $this->Common_model->getData('insurer_master')->where('insurer_master_id', $id)->first();
        return view('master/insurer/insurer_edit',['getOne' => $insurerData]);
    }

public function updateInsurer(Request $request)
{     //echo "<pre>"; print_r($_POST); die();
     $id = $request->id;
     $validatedData = $request->validate([
           'insurer_name' => 'required',
           'initial' => 'required',
           'remark'  => 'required'
          
        ]);

       Insurer::where('insurer_master_id', $id)
       ->update([
                'insurer_name' => $request->insurer,
                'initial' => $request->initial,
                'remark' => $request->remark,
                'status' => $request->status
        ]);
        $success = Session::flash('msg', "Insure Master has been successfully Update");
         return redirect('Master/insurer-master');
}

   public function surveyorInsurerMaster() 
    { 
       $insurer_list = Insurer::latest()->where('status', 1)->get();
       $branch_list = Branch::latest()->where('status', 1)->get();
       $BankList    = $this->Common_model->getData('cdx_serveyor_bankaccounts')->where('surveyor_id', session('user_id'))->where('status', 1)->get();
       $survey_info_id    = $this->Common_model->getData('cdx_user')->where('user_id', session('user_id'))->first()->survey_info_id;
        // echo $survey_info_id;die;

       $insurer = DB::table('cdx_surveyor_insurer')
            ->where('cdx_surveyor_insurer.status', 1 )
            ->where('cdx_surveyor_insurer.survey_info_id',$survey_info_id)
            ->leftJoin('insurer_master', 'cdx_surveyor_insurer.insurer_id', '=', 'insurer_master.insurer_master_id')
            ->leftJoin('insurer_branch', 'insurer_branch.insurer_id', '=', 'insurer_master.insurer_master_id')
            ->select('cdx_surveyor_insurer.*', 'insurer_master.insurer_name','insurer_branch.branch_name')
            ->groupBy('cdx_surveyor_insurer.surveyor_insurer_id') 
            ->get();

        return view('surveyor-admin/InsurerManagement/SurveyorInsurer',['insurers' => $insurer,'insurer_list' => $insurer_list,'branch_list' => $branch_list,'BankList' => $BankList,'title' => 'Surveyor Insurer List' ]);
    }

    public function surveyorInsurerMasterForm(){ 


       $insurer_list= Insurer::latest()->where('status', 1)->get();
       $BankList    = $this->Common_model->getData('cdx_serveyor_bankaccounts')->where('surveyor_id', session('user_id'))->where('status', 1)->get();
       $branch_list = Branch::latest()->where('status', 1)->get();
       return view('surveyor-admin/InsurerManagement/addSurveInsurer',['insurer_list' => $insurer_list,'branch_list' => $branch_list,'BankList' => $BankList,'title' => 'Surveyor Insurer List' ]);
    }
  
    public function addSuveyorInsurer(Request $request) 
    {   

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // die;         

        $validatedData = $request->validate([
          'party_code' => 'required',
          'tat' => 'required',
          'tds' => 'required',
          'tcs' => 'required'
        ]);

        $SuveyorInsurerInfo    = $this->Common_model->getData('cdx_surveyor_insurer')->where('surveyor_insurer_id', session('user_id'))->where('insurer_id', $request->insurer)->where('insurer_branch_id', $request->insurer_branch_id);

         $count = $SuveyorInsurerInfo->count(); 

        if($count > 0){
         Session::flash('msg', "Insure and Branch already exists");
         return redirect('surveyor/serveyorInsurer');
        }


        // echo '<pre>';
        // print_r($SuveyorInsurerInfo);
        // die;
        $survey_info_id    = $this->Common_model->getData('cdx_user')->where('user_id', session('user_id'))->first()->survey_info_id;
        $slab_amount = json_encode($request->slab_amount);
      $data  = array(
        'insurer_id'=>session('user_id'),
        'survey_info_id'=>$survey_info_id,
        'insurer_id'=>$request->insurer,
        'insurer_branch_id' =>$request->insurer_branch_id,
        'serveyor_bank_account_id' => $request->bank_account,
        'status'=>$request->status,
        'party_code' => $request->party_code,
        'tat' => $request->tat,
        'tds' => $request->tds,
        'tcs' => $request->tcs,
        'formula_amount' => $request->formula_amount,
        'min_amount' => $request->min_amount,
        'percent' => $request->percent,
        'final_conveyance' => $request->conveyance,
        'photo_rate' => $request->photos_rate,
        'km_rate' => $request->km_rate,
        'spot_prof_fees' => $request->spot_proof_fee,
        'spot_coveyance' => $request->spot_coveyance,
        'reins_prof_fees' => $request->reins_prof_fees,
        'slab_amount' => $slab_amount,
        'reins_coveyance' => $request->reins_conveyance,
      );


      // echo '<pre>';
      //   print_r($data);
      //   die;
      $insurer_id  = $this->Common_model->saveDate('cdx_surveyor_insurer',$data);
      
      if ($request->from  > 0) {
            $getlength = count($request->from);
            for($i=0; $i < $getlength; $i++){
                $ammountData = [
                  'surveryor_id' => $insurer_id,
                  'from' => $request->from[$i],
                  'to' => $request->to[$i],
                  'amount' => $request->amount[$i] 
      ];

      $insertAmount  = $this->Common_model->saveDate('surveryor_amount',$ammountData); 

            }           
         }
      Session::flash('msg', "Insurer has been successfully save");
      return redirect('surveyor/serveyorInsurer');
    }

public function surveyorInsurerMasterEdit(Request $request)
 {     
      $id = Crypt::decrypt($request->id);
       $insurer_list = Insurer::latest()->where('status', 1)->get();
       $branch_list = Branch::latest()->where('status', 1)->get();
       $BankList    = $this->Common_model->getData('cdx_serveyor_bankaccounts')->where('surveyor_id', session('user_id'))->where('status', 1)->get();
      
       $insurer = DB::table('cdx_surveyor_insurer')
            ->where('cdx_surveyor_insurer.status', 1 )
            ->where('cdx_surveyor_insurer.survey_info_id', session('user_id') )
            ->leftJoin('insurer_master', 'cdx_surveyor_insurer.insurer_id', '=', 'insurer_master.insurer_master_id')
            ->select('cdx_surveyor_insurer.*', 'insurer_master.insurer_name')
            ->get();

         $insureSurveyorData = DB::table('cdx_surveyor_insurer')->get()->where('id',$id)->first();
         $surveyorAmountData = DB::table('surveryor_amount')->get()->where('surveryor_id',$id);
       return view('surveyor-admin/InsurerManagement/editSurveyorInsurer',['insurers' => $insurer,'insurer_list' => $insurer_list,'branch_list' => $branch_list,'BankList' => $BankList,'insureSurveyor' => $insureSurveyorData, 'rowamontData' => $surveyorAmountData ]);
  }

public function surveyorInsurerMasterViewDetails(request $request)
{     
       $id = Crypt::decrypt($request->id);
        $insurer = DB::table('cdx_surveyor_insurer')
            ->where('cdx_surveyor_insurer.id', $id )
            ->where('cdx_surveyor_insurer.serveyor_user_id', session('user_id') )
            ->leftJoin('insurer_master', 'cdx_surveyor_insurer.insurer_id', '=', 'insurer_master.insurer_master_id')
            ->leftJoin('insurer_branch', 'cdx_surveyor_insurer.insurer_branch_id', '=', 'insurer_branch.insurer_branch_id')
            ->leftJoin('cdx_serveyor_bankaccounts', 'cdx_surveyor_insurer.serveyor_bank_account_id', '=', 'cdx_serveyor_bankaccounts.id')
            ->select('cdx_surveyor_insurer.*', 'insurer_master.insurer_name','insurer_branch.branch_name','cdx_serveyor_bankaccounts.bank_name')
            ->first();
            //echo "<pre>"; print_r($insurer); die();
         $insureSurveyorData = DB::table('cdx_surveyor_insurer')->get()->where('id',$id)->first();
         $serveyorAmoutData  = DB::table('surveryor_amount')->get()->where('surveryor_id',$id);
      
  return view('surveyor-admin/InsurerManagement/SurveyorInsurerView',['insurers' => $insurer,'insureSurveyor' => $insureSurveyorData, 'serveyorAmoutData'=> $serveyorAmoutData]);
}


public function surveyorInsurerMasterUpdate(Request $request)
{   
       $id = $request->serveyor_insurer_id;
       $validatedData = $request->validate([
          'party_code' => 'required',
          'tat' => 'required',
          'tds' => 'required',
          'tcs' => 'required'
        ]);
      $updateArr  = array(
              'surveyor_insurer_id'=>session('user_id'),
              'insurer_id'=>$request->insurer,
              'insurer_branch_id' =>$request->insurer_branch_id,
              'serveyor_bank_account_id' => $request->bank_account,
              'status'=>$request->status,
              'party_code' => $request->party_code,
              'tat' => $request->tat,
              'tds' => $request->tds,
              'tcs' => $request->tcs
      );

   $update = $this->Common_model->updateDate('cdx_surveyor_insurer', array('surveyor_insurer_id'=>$id), $updateArr); 

    if ($request->from > 0) {
                   $getlength = count($request->from);
                   for($i=0; $i < $getlength; $i++){

                $update = DB::table('surveryor_amount')
                             ->updateOrInsert(['id' => $request->amountSurveyorID[$i]],
              [   
                'from' => $request->from[$i],
                'to' => $request->to[$i],
                'amount' => $request->amount[$i],
                'surveryor_id' => $id
            ]); 
       }
    }
         $success = Session::flash('msg', "Sarveyor Insurer has been successfully update");
         return redirect('surveyor/serveyorInsurer');
}
public function fetchBranch(Request $request)
     {   
        $branch_list['branch_list'] = Branch::where('insurer_id',$request->id)->get();
        return response()->json($branch_list);
     }


public function fetchSurveyorInsurerBranch(Request $request)
     {   
        $insurer_id = $request->id; 
        $user_id = session('user_id');
        
        $data['branch_list'] = DB::table('insurer_branch')
        ->whereIn('insurer_branch_id', function($query) use ($insurer_id, $user_id)
        {
            $query->select(DB::raw('insurer_branch_id'))
                  ->from('cdx_surveyor_insurer')
                  ->where('serveyor_user_id', $user_id)
                  ->where('insurer_id', $insurer_id);
        })
        ->get();
        
         //->whereRaw('serveyor_insurer.insurer_branch_id = insurer_branch.branch_id');

        return response()->json($data);
     }


    public function insurerList(){ 
        $insurer  = $this->Common_model->getData('cdx_user')->where('user_type_id', 5)->get();
        return view('master/insurer/insurerList',['insurers' => $insurer,'title' => 'Insurer List' ]);
    }

    public function addInsurer(){ 
        $insurer_list = Insurer::latest()->where('status', 1)->get();
        $branch_list = Branch::latest()->where('status', 1)->get();
        $city  = $this->Common_model->getData('cdx_cities')->orderBy('state_id', 'ASC')->get();
        return view('master/insurer/addInsurerUser',['insurer_list' => $insurer_list, 'branch_list' => $branch_list,'city' => $city, 'title' => 'Add Insurer' ]);
    }    

    public function saveInsurerUserData(){ 
        
        $first_name             = request('first_name');   
        $last_name              = request('last_name');  
        $user_name              = request('user_name');  
        $email                  = request('insurer_email');  
        $phone_no               = request('mobile_number');  
        $city_id                = request('city_id');   
        $insurer_branch         = request('insurer_branch');   
        $surv_privileges        = request('surv_privileges');  
        $password = Hash::make('123456');
        $password_reset_status  = '0'; 
        date_default_timezone_set('Asia/Calcutta'); 
        $create_date = date("Y-m-d H:i:s"); // time in India


       $user_data =  array('survey_info_id' => $insurer_branch, 'user_type_id' =>'5','first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'user_name'=>$user_name,'password'=>$password, 'phone_no'=>$phone_no,'city_id'=>$city_id,'status'=>'1','password_reset_status'=>'0');
       $user_id  = $this->Common_model->saveDate('cdx_user',$user_data);
       

       return redirect('Master/insurerList');
    }

    public function saveMasterFees(){
        $slab_from         = request('slab_from');  
        $slab_to           = request('slab_to');  
        $feeData =  array('slab_from'=>$slab_from,'slab_to' =>$slab_to);
        $user_id  = $this->Common_model->saveDate('cdx_master_fees',$feeData);
        return redirect('Master/master-fees');
    }

    public function masterFees(){
        $fees_list  = $this->Common_model->getData('cdx_master_fees')->orderBy('master_fees_id', 'ASC')->get();
        return view('master/masterFees/masterFees',['fees_list' => $fees_list, 'title' => 'Master Fees' ]);
    }

}