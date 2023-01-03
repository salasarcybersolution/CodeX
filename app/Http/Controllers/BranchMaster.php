<?php

namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
use Illuminate\Http\Request;
use App\Models\Branch;

use App\Models\Part;
use App\Models\Subpart;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Validator;
use App\Models\Insurer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Models\Common_model as Common_model;
class BranchMaster extends Controller
{ 
    private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }
    public function index() 
    { 


     $insurers = Insurer::latest()->where('status', 1)->get();
     $branches = DB::table('insurer_branch')
            
            ->leftJoin('insurer_master', 'insurer_branch.insurer_id', '=', 'insurer_master.insurer_master_id')
            ->leftJoin('cdx_states', 'insurer_branch.state_id', '=', 'cdx_states.id')
            ->leftJoin('cdx_cities', 'insurer_branch.city_id', '=', 'cdx_cities.id')
            ->select('insurer_branch.*', 'insurer_master.insurer_name', 'cdx_states.name as state_name', 'cdx_cities.city as city_name')
            ->get();
           
      
      return view('master/branch/branchMaster',[
            'branches' => $branches,'insurers' => $insurers,'title' => 'Branch Master'
        ]);
    }

    public function addInsurerBranch() 
    { 
      
      $insurers = Insurer::latest()->where('status', 1)->get();
      $state  =  DB::table('cdx_states')->get()->all();
      $cities =  DB::table('cdx_cities')->get()->all();
      return view('master/branch/branchMasterAdd',
         [ 
           'insurers' => $insurers,
           'title' =>'Add Branch Master',
           'state'  => $state, 
           'cities'=> $cities  
         ]);
    }
    

 public function fetchCitys(Request $request)
 { 
      $id = $request->stateID;
      $getCity['citiesName'] = DB::table('cdx_cities')->where('state_id',"=", $id)->get();
     return response()->json($getCity);
  
 }

  public function fetchCitysUpdate(Request $request)
 {    
       $id = $request->stateUpDate;
      $getCity['citiesName'] = DB::table('cdx_cities')->where('state_id',"=", $id)->get();
     return response()->json($getCity);
  
 }

    public function store(Request $request){
        
         $validatedData = $request->validate([
                'insurer_name' => 'required',
                'state' =>  'required',
                'branch_name' => 'required',
                'city' =>  'required'
               
               
        ]);
       $insertArr = [
            'insurer_id' =>$request->insurer_name,
            'state_id' =>$request->state,
            'branch_name' =>$request->branch_name,
            'city_id' =>$request->city
           
       ];

        $insert = $this->Common_model->saveDate('insurer_branch', $insertArr);
        $success = Session::flash('msg', "Bank Master has been successfully save");
        return redirect('Master/insurer-branch-master');

     
  }


public function editbracnchmaster(Request $request)
{         $id = Crypt::decrypt($request->id);   
           $insurers  = DB::table('insurer_master')->select('id','insurer')->get()->all();
           $state   =   DB::table('cdx_states')->get()->all();
           $cities   =  DB::table('cdx_cities')->get()->all();
           $getBranchName = DB::table('insurer_branch')->get()->where('branch_id',"=", $id)->first();

           return view('master/branch/branchMasteredit',

              [ 
           'insurers' => $insurers,
           'state'  => $state, 
           'cities'=> $cities,
           'getoneData' => $getBranchName 
         ]);
}

 public function updateInsurerMaster(Request $request){
           

         $id = $request->id;
         $validatedData = $request->validate([
                'insurer_name' => 'required',
                'state' => 'required',
                'branch_name' => 'required',
                'city' => 'required',
                'status' => 'required'
               
        ]);

       $updateArr = [
            'insurer_id' =>$request->insurer_name,
            'branch_name' =>$request->branch_name,
            'state_id' =>$request->state,
            'city_id' =>$request->city,
            'status' =>$request->status
       ];
       
     // echo "<pre>";   print_r($insertArr); die();
      
       $update = $this->Common_model->updateDate('insurer_branch', array('branch_id'=>$id), $updateArr);
        $success = Session::flash('msg', "Bank Master has been successfully update");
        return redirect('Master/branch-master');

     
  }


/// part  and sub part section code hire 


  public function part()
  {  
       $getpart = DB::table('cdx_parts')->get()->all();
    return view('master/part/partMaster',['title' => 'Part Master', 'getpart' => $getpart ]);
  }

    public function Partstore(Request $request){
        $validatedData = $request->validate([
          'part' => 'required',
          ]);
      $insertPartArr = [
            'part_name' => $request->part
              ];
    $insert = $this->Common_model->saveDate('cdx_parts', $insertPartArr);
        $success = Session::flash('msg', "Part Master has been successfully save");
        return redirect('Master/part-master');
  }
public function upDatePartName(Request $request) {
       $id = $request->part_id;
          $updatePart = [
            'part_name' => $request->part_name
              ];
        $update = $this->Common_model->updateDate('cdx_parts', array('part_id'=>$id), $updatePart);
        $success = Session::flash('msg', "Part Master has been successfully update");
       return redirect('Master/part-master');
    }

// sub mart section code here
 

public function subpart()
 {  
   // $users = DB::table('cdx_parts')
   //          ->leftJoin('cdx_subpart', 'cdx_subpart.part_id', '=', 'cdx_parts.part_id')
   //           ->select('cdx_parts.part_name','cdx_parts.part_id')
   //          ->get();
    $Subpart = Subpart::with('getpartName')->get();
  return view('master/part/subPartMaster',['Subpart' => $Subpart]);
 } 


public function addSubPart()
{ 
  $part =  DB::table('cdx_parts')->get()->all();
  return view('master/part/addSubpartForm',['part' => $part]); 
}

public function saveSubPart(Request $request)
{ 
    $validatedData = $request->validate([
          'part_name' => 'required',
          'sub_part' => 'required'
          ]);

      $insertPartArr = [
            'part_id' => $request->part_name,
            'subpart_name' => $request->sub_part
              ];
    $insert = $this->Common_model->saveDate('cdx_subpart', $insertPartArr);
        $success = Session::flash('msg', "Sub Part Master has been successfully save");
        return redirect('Master/sub-part-master');

}

public function editSubPart(Request $request)
{    

    $Subpart =  DB::table('cdx_subpart')->get()->where('subpart_id', $request->subpart_id);
    $part =  DB::table('cdx_parts')->get()->all();
    return view('master/part/editSubPart',['part' => $part, 'Subpart' => $Subpart]); 
}

public function updateSubpart(request $request)
{

  $subpartID = $request->subpart_id;
   $validatedData = $request->validate([
          'part_name' => 'required',
          'sub_part' => 'required'
          ]);

      $updateSubPart = [
            'part_id' => $request->part_name,
            'subpart_name' => $request->sub_part
              ];
   $update = $this->Common_model->updateDate('cdx_subpart', array('subpart_id'=>$subpartID), $updateSubPart);
        $success = Session::flash('msg', "Sub Part Master has been successfully update");
       return redirect('Master/sub-part-master');
}

public function fetchSubPart(Request $request)
     {   
       $subpart_list['subpart_list'] = DB::table('cdx_subpart')->where('part_id',"=", $request->id)->get();
        return response()->json($subpart_list);
     }

}  