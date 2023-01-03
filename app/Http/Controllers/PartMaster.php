<?php

namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Part;
use App\Models\Subpart;
use Illuminate\Support\Facades\Validator;
use App\Models\Insurer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Support\Facades\Crypt;
use App\Models\Common_model as Common_model;
class PartMaster extends Controller
{ 
    private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }


 /// part  and sub part section code hire 


  public function part()
  {  
       $getpart = DB::table('cdx_parts')->get()->all();
    return view('master/part/partMaster',['title' => 'Part Master', 'getpart' => $getpart ]);
  }

    public function Partstore(Request $request){
        $validatedData = $request->validate([
          'part' => 'required'
          ]);
      $insertPartArr = [
            'part_name' => $request->part
              ];
    $insert = $this->Common_model->saveDate('cdx_parts', $insertPartArr);
        $success = Session::flash('msg', "Part Master has been successfully save");
        return redirect('Master/part-master');
  }
public function upDatePartName(Request $request) {
   $validatedData = $request->validate([
          'part' => 'required'
          ]);
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
      $id = Crypt::decrypt($request->subpart_id); 

    $Subpart =  DB::table('cdx_subpart')->get()->where('subpart_id', $id);
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



public function deleteSubPart(Request $request)
{ 
  $id = Crypt::decrypt($request->subpart_id);
  //$id = $request->subpart_id;
  $delete = DB::table('cdx_subpart')->where('subpart_id', $id)->delete();
  $success = Session::flash('msg', "Sub Part Master has been successfully Delete");
  return redirect('Master/sub-part-master');
}

public function deletePart(Request $request)
{ 
 $id = Crypt::decrypt($request->part_id);
  $delete = DB::table('cdx_parts')->where('part_id', $id)->delete();
  $deletesub = DB::table('cdx_subpart')->where('part_id', $id)->delete();
  $success = Session::flash('msg', "Part Master has been successfully Delete");
  return redirect('Master/part-master');
}


}  