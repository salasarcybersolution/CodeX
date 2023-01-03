<?php

namespace App\Http\Controllers;
require app_path('Helpers/helper.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

use App\Models\Common_model as Common_model;
use Session;

class KmRateMaster extends Controller
{
    private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }

    public function index()
    {
      $data['title'] = 'Km Rate';
      return view('master/kmRateMaster',$data);
    }
}
