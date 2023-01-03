<?php

namespace App\Http\Controllers;
require app_path('Helpers/helper.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

use App\Models\Common_model as Common_model;
use Session;

class webService extends Controller
{
    private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }
    // User Login
    public function login()
    {  //echo "string"; die();
       $mobile_no  = request('mobile_no');   
       $password   = request('password'); 
       $whereData  =  array('mobile_no'=>$mobile_no,'password'=>$password);
       $userInfos  = $this->Common_model->getData('mk_user')->where($whereData);
       $count      = $userInfos->count();
       if($count == '0'){
            $response =  array('status' =>false,'msg'=>'Wrong phone no or password entered');
       }else{
            $info = $userInfos->first();
            if($info->status == '2'){
               $response =  array('status' =>false,'msg'=>'your account has been deactivated please contact our administrator');  
            }else{
            $profile_image = $info->profile_image == "" ?  "dummyImage.png" : $info->profile_image;
            $image = url('public/profile_image/'.$profile_image);
            $status = $info->status == "1" ?  "Active" : "Deactive";
            $userInfo = array('user_id'=>$info->user_id,'user_unique_id'=>$info->user_unique_id,'user_type'=>getUserType($info->user_type_id),'name'=>$info->name,'email'=>$info->email,'mobile_no'=>$info->mobile_no,'profile_image'=>$image,'address'=>$info->address,'status'=>$status);
            $response =  array('status' =>true,'msg'=>'sucess','userInfo'=>$userInfo);
           }
       }
       return response($response);
    }

     //Change Password
    public function forgetPassword()
    {
        $mobile_no  = request('mobile_no');   
        $whereData  =  array('mobile_no'=>$mobile_no);
        $userInfos  = $this->Common_model->getData('mk_user')->where($whereData);
        $count      = $userInfos->count();
        if($count == '0'){
            $response =  array('status' =>false,'msg'=>'Wrong phone no entered');
        }else{
            $info = $userInfos->first();
            if($info->status == '2'){
               $response =  array('status' =>false,'msg'=>'your account has been deactivated please contact our administrator');  
            }else{
                $otp      = rand (1000,9999);
                $this->Common_model->updateDate('mk_user',array('user_id'=>$info->user_id),array('otp'=>$otp)); 
                $userInfo = array('user_id'=>$info->user_id,'mobile_no'=>$mobile_no,'otp'=>$otp);
                $response =  array('status' =>true,'msg'=>'sucess','info'=>$userInfo);   
            }
       }
       return response($response);   
    }

    public function checkOtp()
    {
       $user_id     = request('user_id'); 
       $otp         = request('otp');  
       $whereData   =  array('user_id'=>$user_id,'otp'=>$otp);
        $userInfos  = $this->Common_model->getData('mk_user')->where($whereData);
        $count      = $userInfos->count();
        if($count == '0'){
            $response =  array('status' =>false,'msg'=>'Wrong otp entered');
        }else{
            $this->Common_model->updateDate('mk_user',array('user_id'=>$user_id),array('otp'=>''));
            $userInfo = array('user_id'=>$user_id);
            $response =  array('status' =>true,'msg'=>'sucess','info'=>$userInfo);   
        }
         return response($response);   
    }

    public function updatePassword()
    {
        $user_id      = request('user_id'); 
        $password     = request('new_password'); 
        $c_password   = request('conf_password');    
        if($password != $c_password){
           $response =  array('status' =>false,'msg'=>'New password and confirmation password not match'); 
        }else{
           $this->Common_model->updateDate('mk_user',array('user_id'=>$user_id),array('password'=>$password));
           $info =  array('alert_msg' =>'password has been successfully changed');
           $response =  array('status' =>true,'msg'=>'sucess','info'=>$info);   
        }
        return response($response);   
    }
      
}
