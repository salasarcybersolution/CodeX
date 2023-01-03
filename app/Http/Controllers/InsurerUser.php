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
use Hash;
// use App\Models\AlbumImages;
// use App\Models\ReportAlbums;
use Cache;
use DateTime;

use App\Models\Common_model as Common_model;


class InsurerUser extends Controller
{ 
    private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }
    public function index()
    {
      $data['title'] = 'Dashboard';
      return view('insurer-user/dashboard',$data);
    }
}
