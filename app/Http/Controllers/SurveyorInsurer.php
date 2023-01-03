<?php
namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
//use App\Models\Common_model as Common_model;
use Illuminate\Http\Request;
use App\Http\Requests\BankRequest;
use App\Http\Resources\BankResource;
use App\Models\Bank;
use App\Models\Insurer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Session;
class InsurerMaster extends Controller
{
    public function index() 
    { 
        $banks = Bank::latest()->where('status', 1)->get();
       $insurer = Insurer::latest()->where('status', 1)->paginate(10);
       return view('master/insurer/insurerMaster',['insurers' => $insurer,'banks' => $banks,'title' => 'Insurer Master' ]);
    }


   public function insurerRegistration()
   { 
  
     return view('master/insurer/insurerAdd');
   }


    public function store(Request $request){
      

        $validatedData = $request->validate([
          'insurer' => 'required',
          'fee_based_on' => 'required',
          'TAT' => 'required',
        ]);
        
      $attr = $request->toArray();
      Insurer::create($attr);

      return back()->with([
        'title' => 'Insurer Master',
          'msg' => 'Insurer Master has been created',
      ]);
  }



public function insurerMasterEditFun(Request $request)
{   
    $insurerData = Insurer::where('id',$request->id)->first();
    return view('master/insurer/insurer_edit',['getOne' => $insurerData]);

}

public function updateInsurer(Request $request)
{     
     $id = $request->id;
     $validatedData = $request->validate([
          'insurer' => 'required',
          'fee_based_on' => 'required',
          'TAT' => 'required',
        ]);
        
  


       Insurer::where('id', $id)
       ->update([
                'insurer' => $request->insurer,
                'fee_based_on' => $request->fee_based_on,
                'TAT' => $request->TAT,
                'party_code' => $request->party_code,
                'initial' => $request->initial,
                'remark' => $request->remark
        ]);
        $success = Session::flash('msg', "Insure Master has been successfully Update");
}

}