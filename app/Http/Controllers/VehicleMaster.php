<?php

namespace App\Http\Controllers;
require app_path('Helpers/helper.php');

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use App\Models\Common_model as Common_model;
use Session;

class VehicleMaster extends Controller
{
    private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }

    public function index()
    { 
      
      $data['title'] = 'Vehicle Master';      
      $list['listdata'] =  DB::table('cdx_vehicle')->get()->all();

      
      return view('master/vehicle/vehicleMaster',$data,$list);
    }

 
  public function registerVehicleMaster()
  {    
     return view('Master/vehicle/registerVehicleMaster');
  }


    public function vechicleFromData(Request $request)
    {     


       $validatedData = $request->validate([
                'vehicle_name' => 'required',
                'body_type' => 'required',
                'reg_laden_wt' => 'required',
                'cubic_capacity' => 'required',
                'tax_particulers' => 'required',
                'vehicle_class' => 'required',
                'unladen_wt' => 'required',
                'imposed_excess' => 'required',
                'Fuel_used' => 'required',
                'make_and_model' => 'required',
                'pre_accident_con' => 'required',
                'seating_capacity' => 'required',
                'compulsory_exccess' => 'required',
        ]);

       $insertArr = [         
                'vehicle_name' => $request->vehicle_name,
                'body_type' => $request->body_type,
                'reg_laden_wt' => $request->reg_laden_wt,
                'cubic_capacity' => $request->cubic_capacity,
                'tax_particulers' => $request->tax_particulers,
                'vehicle_class' => $request->vehicle_class,
                'unladen_wt' => $request->unladen_wt,
                'imposed_excess' => $request->imposed_excess,
                'Fuel_used' => $request->Fuel_used,
                'make_and_model' => $request->make_and_model,
                'pre_accident_con' => $request->pre_accident_con,
                'seating_capacity' => $request->seating_capacity,
                'compulsory_exccess' => $request->compulsory_exccess
           

         ];

        $insert = $this->Common_model->saveDate('cdx_vehicle', $insertArr);
        $success = Session::flash('msg', "Vehicle Master has been successfully save");
        return redirect('Master/vehicle-master');
             
    }
 

  public function vehicleEditFun(Request $request)
    {
         $id = Crypt::decrypt($request->id);  
         $getone['getoneData'] = DB::table('cdx_vehicle')->get()->where('id',"=", $id);
         return view('master/vehicle/vehicleMasterEdit',$getone);   
   }
  
 
  public function updateVehicle(Request $request)
  { 
     $id = $request->id;
     $validatedData = $request->validate([
                'vehicle_name' => 'required',
                'body_type' => 'required',
                'reg_laden_wt' => 'required',
                'cubic_capacity' => 'required',
                'tax_particulers' => 'required',
                'vehicle_class' => 'required',
                'unladen_wt' => 'required',
                'imposed_excess' => 'required',
                'Fuel_used' => 'required',
                'make_and_model' => 'required',
                'pre_accident_con' => 'required',
                'seating_capacity' => 'required',
                'compulsory_exccess' => 'required',
        ]);
     $updateArr = [         
                'vehicle_name' => $request->vehicle_name,
                'body_type' => $request->body_type,
                'reg_laden_wt' => $request->reg_laden_wt,
                'cubic_capacity' => $request->cubic_capacity,
                'tax_particulers' => $request->tax_particulers,
                'vehicle_class' => $request->vehicle_class,
                'unladen_wt' => $request->unladen_wt,
                'imposed_excess' => $request->imposed_excess,
                'Fuel_used' => $request->Fuel_used,
                'make_and_model' => $request->make_and_model,
                'pre_accident_con' => $request->pre_accident_con,
                'seating_capacity' => $request->seating_capacity,
                'compulsory_exccess' => $request->compulsory_exccess
           

         ];
        $update = $this->Common_model->updateDate('cdx_vehicle', array('id'=>$id), $updateArr);
        $success = Session::flash('msg', "Vehicle Master has been successfully update");
        return redirect('Master/vehicle-master');

     
  }
  public function vehicleDetails(Request $request)
    {

          $id = $request->id;  
          $vehicle_details = DB::table('cdx_vehicle')->where('id',"=", $id)->get()->first();
         
         echo json_encode(['msg'=>'success','vehicle_details'=>$vehicle_details]); die;
   }

public function deleteVehicle(Request $request)
{ 
  $id = $request->id;
  $delete = DB::table('cdx_vehicle')->where('id', $id)->delete();
  $success = Session::flash('msg', "Vehicle Master has been successfully Delete");
  return redirect('Master/vehicle-master');
}

}




