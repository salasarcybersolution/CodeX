<?php
namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
use Illuminate\Http\Request;

use App\Models\Garage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GarageMaster extends Controller
{
    public function index()
    {
      $garages = garage::latest()->where('status', 1)->paginate(10);
       return view('master/garageMaster',[
            'garages' => $garages,'title' => 'Garage Master'
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
          'workshop' => 'required',
          'contact_person' => 'required',
          'remark' => 'required',
          'mobile' => 'required',
        ]);
        
      $attr = $request->toArray();

      Garage::create($attr);

      return back()->with([
        'title' => 'Garagge Master',
          'msg' => 'Garagge Master has been created',
      ]);
  }
}