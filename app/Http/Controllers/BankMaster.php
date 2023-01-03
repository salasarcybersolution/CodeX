<?php
namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
use Illuminate\Http\Request;
use App\Http\Requests\BankRequest;
use App\Http\Resources\BankResource;
use App\Models\Bank;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Common_model as Common_model;
class BankMaster extends Controller
{   private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }
    public function index()
    {
      $banks = bank::latest()->where('status', 1)->paginate(100);
       return view('master/bank/bankMaster',[
            'banks' => $banks,'title' => 'Bank List'
        ]);
    }
    public function store(Request $request){
       
        $validatedData = $request->validate([
          'bank' => 'required',
        ]);
        
      
      $attr = $request->toArray();
      Bank::create($attr);
      $success = Session::flash('msg', "Bank has been successfully Added");

      return back()->with([
        'title' => 'Bank List',
          'msg' => 'Bank Master has been created',
      ]);
  }

    public function upDateBankName(Request $request) {
     //  print_r($request->id); die();
     // $id = Crypt::decrypt($request->bank_id);  
       $id = $request->bank_id;

       $validatedData = $request->validate([
                'bank' => 'required'
                  
        ]);
        $insertArr = [
            'bank' =>$request->bank,
            
       ];
        $update = $this->Common_model->updateDate('bank_master', array('id'=>$id), $insertArr);
        $success = Session::flash('msg', "Bank Master has been successfully update");
        return redirect('Master/bank-master');
    }


public function deleteBank(Request $request)
{ 
   $id = Crypt::decrypt($request->id);  
  $delete = DB::table('bank_master')->where('id', $id)->delete();
  $success = Session::flash('msg', "Bank Master has been successfully Delete");
  return redirect('Master/bank-master');
}

}

