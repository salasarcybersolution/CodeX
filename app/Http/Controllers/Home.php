<?php

namespace App\Http\Controllers;
require app_path('Helpers/helper.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

use App\Models\Common_model as Common_model;
use Session;
use Carbon\Carbon; 
use Mail; 
use Hash;

use Illuminate\Support\Str;

class Home extends Controller
{  
    protected $maxAttempts = 3; // default is 5
    protected $decayMinutes = 2; // default is 1
    private $Common_model; 
    public function __construct(Common_model $Common_model)
    {
        $this->Common_model = $Common_model; 
    }
     //logout
    public function logout() 
      { 
        Auth::logout();
        Session::flush();
        return redirect('/');
      }

    public function index()
    {
       $data['title']   = 'Codex Survey Solutions';
       return view('login', $data);
    }
 // ----------------------- Forget password Function here.........----------------------
    public function forgotPassword()
    {
       $data['title']   = 'Forgot Password';
       return view('forgot-password', $data);
    }

    public function forgetEDetails(Request $request)
    {       
        $email =  $request->email; 
        
        $validatedData = $request->validate([
                'email' => 'required|email|exists:cdx_user',
               
        ]);

        $token = Str::random(64);  
        $insert = DB::table('cdx_password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
        $message = "this is a reset password mail";

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });

        return back()->with('message', 'We have e-mailed your password reset link!'); 
        
    }
    public function showResetPasswordForm($token) { 
         return view('reset-password', ['token' => $token]);
      }
  
    public function submitResetPasswordForm(Request $request){
          $request->validate([
              'email' => 'required|email|exists:cdx_user',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);

          $updatePassword = DB::table('cdx_password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();
          if(!$updatePassword){

              return back()->withInput()->with('error', 'Invalid token!');
          }

          $this->Common_model->updateDate('cdx_user',array('email'=>$request->email),['password' => Hash::make($request->password)]); 
          
          DB::table('cdx_password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/')->with('msg', 'Your password has been changed!');
      }


  // ----------------------- Forget password Function here closed.........----------------------   
    public function checkDetails()
    {    

       // echo $pass =  Hash::make('654321'); die;

         $email     = request('email');   
         $password  = request('password');
         $userInfo  = $this->Common_model->getData('cdx_user')->where(array('user_name'=>$email))->orWhere(array('email'=>$email))->first();
 
         if($userInfo && Hash::check($password, $userInfo->password)){
              if($userInfo->status == '1'){
                  $sess_data1['user_id']      = $userInfo->user_id;
                  $sess_data1['user_type_id'] = $userInfo->user_type_id; 
                  if($userInfo->user_type_id == '3' || $userInfo->user_type_id== '4'){
                  $sess_data1['surv_privileges'] = $userInfo->surv_privileges; 
                  }
                  $sess_data1['screen_lock']  = '1';
                  session($sess_data1);  
                  $user_type_id = $userInfo->user_type_id;  

     //              $insertUserSession = [
     //                     'user_id' =>  $userInfo->user_id,
     //                     'user_session_id' => session('user_id'),
     //                     'user_count' => $count 
     //              ]; 
     //              $isertUserID = $this->Common_model->saveDate('user_session',$insertUserSession);   
     //              $getCount = DB::table('user_session')->where('user_id',session('user_id'))->get();
     //              $countID = count($getCount);
     //              if ($countID > 5) {
     //                  Session::flash('msg', 'Sorry you are login attempts crossed');
     //                return redirect('/');
     //              }elseif ($countID) {
     //    // get login user user_type_id

     //         $data['user_type_id'] = DB::table('cdx_user')
     //                               ->select('user_type_id')
     //                               ->where('user_id',session('user_id'))
     //                               ->first();  
     //          $typeid = $data['user_type_id']; 
     //          $UserTypeID =  $typeid->user_type_id; 
     // //  get login user user allowed 

     //    $data['subscription'] = DB::table('cdx_user')
     //                           ->select('subscription_id')
     //                           ->where('user_id',session('user_id'))
     //                           ->first();
     //    $id = $data['subscription']; 
     //    $SubID =  $id->subscription_id; 
     //     echo "<pre>"; print_r($SubID); die();    
     //              echo "<pre>"; print_r($UserTypeID); die();
     //              } 
                  //echo "<pre>"; print_r($countID); die();
                  if($user_type_id == '1'){
                    return redirect('/SuperAdmin');
                  }elseif($user_type_id == '3'){
                    return redirect('/Surveyor');
                  }elseif($user_type_id == '4'){
                    return redirect('/SurveyorExecutive');
                  }elseif($user_type_id == '5'){
                    return redirect('/Insurer');
                  }
                  else{
                     Session::flash('msg', "You don't have permission to access");
                     return redirect('/');  
                  }
              }else{
                Session::flash('msg', 'Your account has been deactivated by admin');
                return redirect('/');
              }
         }else{
            Session::flash('msg', 'Wrong user name or password entered');
            return redirect('/'); 
         }
    } 
    public function settingsAccount()
    {
       $user_id      = session('user_id'); 
       if($user_id != ''){
           $userInfo           = $this->Common_model->getData('cdx_user')->where(array('user_id'=>$user_id))->first();
           $userInfo->img_name =  $userInfo->profile_img == '' ? 'dummy.png' : $userInfo->profile_img;
           $data['userInfo']   = $userInfo;
           $data['cities']     = $this->Common_model->getData('cdx_cities')->get();
           $data['title']      = 'Account Settings';
           $data['subtitle']   = 'Account';

           return view('default/settings-account', $data);
       }else{
           Session::flash('msg', "You don't have permission to access");
           return redirect('/'); 
       } 
    }
    public function updateInfo()
    {
       $user_id         = session('user_id'); 
       if($user_id != ''){
            $first_name = request('first_name');   
            $last_name  = request('last_name'); 
            $phone_no   = request('phone_no'); 
            $address    = request('address'); 
            $city_id    = request('city_id'); 
            if(!empty($_FILES["profile_image"]["tmp_name"])){
              $uploads_dir    = public_path('/profile_img');
              $tmp_name       = $_FILES["profile_image"]["tmp_name"]; 
              $temp           = explode(".", $_FILES["profile_image"]["name"]);
              $profile_image  = 'pimage_'.time().'.'.end($temp);
              move_uploaded_file($tmp_name, "$uploads_dir/$profile_image");
            }else{
              $profile_image  = request('upload_old'); 
           } 
           $info = array('first_name' =>$first_name,'last_name'=>$last_name,'phone_no'=>$phone_no,'address'=>$address,'city_id'=>$city_id,'profile_img'=>$profile_image);
           $this->Common_model->updateDate('cdx_user',array('user_id'=>$user_id),$info); 
           Session::flash('msg', 'Profile info has been updated');
           return redirect('settings-account');
       }else{
           Session::flash('msg', "You don't have permission to access");
           return redirect('/'); 
       }
   } 
   public function settingsSecurity()
    {
       $user_id      = session('user_id'); 
       if($user_id != ''){
           $userInfo           = $this->Common_model->getData('cdx_user')->where(array('user_id'=>$user_id))->first();
           $userInfo->img_name =  $userInfo->profile_img == '' ? 'dummy.png' : $userInfo->profile_img;
           $data['userInfo']   = $userInfo;
           $data['cities']     = $this->Common_model->getData('cdx_cities')->get();
           $data['title']      = 'Account Settings';
           $data['subtitle']   = 'Security';
           return view('default/settings-security', $data);
       }else{
           Session::flash('msg', "You don't have permission to access");
           return redirect('/'); 
       } 
    }
    public function settingsBilling()
    {
       $user_id      = session('user_id'); 
       if($user_id != ''){
           $userInfo           = $this->Common_model->getData('cdx_user')->where(array('user_id'=>$user_id))->first();
           $userInfo->img_name =  $userInfo->profile_img == '' ? 'dummy.png' : $userInfo->profile_img;
           $data['userInfo']   = $userInfo;
           $data['cities']     = $this->Common_model->getData('cdx_cities')->get();
           $data['title']      = 'Account Settings';
           $data['subtitle']   = 'Billings & Plans';
           return view('default/settings-billing', $data);
       }else{
           Session::flash('msg', "You don't have permission to access");
           return redirect('/'); 
       } 
    }
    public function updatePassword()
    {
       $user_id  = session('user_id'); 
       if($user_id != ''){
            $old_password = request('old_password');   
            $userInfos    = $this->Common_model->getData('cdx_user')->where(array('user_id'=>$user_id,'password'=>$old_password));
            $count        = $userInfos->count();
            if($count == '0'){
                Session::flash('msg2', 'Old Password is not correct');
                return redirect('settings-security');
            }else{
                $new_password = request('new_password');  
                $this->Common_model->updateDate('cdx_user',array('user_id'=>$user_id),array('password'=>$new_password)); 
                Session::flash('msg', 'Password is successfully changed');
                return redirect('settings-security');
            }
       }else{
           Session::flash('msg', "You don't have permission to access");
           return redirect('/'); 
       } 
    }
   public function getSubscriptionPlanInfo()
    {
        $subscription_id   = request('subscription_id');  
        $subscription_info = $this->Common_model->getData('cdx_subscription')->where(array('subscription_id'=>$subscription_id))->first();
        echo json_encode($subscription_info); die;
     }

    public function subscriptionsPlanInfo(){
        $subscription_plan_id   = request('subscription_id');  
        $subscription_plans = $this->Common_model->getData('cdx_subscription_plans')->where(array('subscription_plan_id'=>$subscription_plan_id))->first();
        $subscription_plans_info = $this->Common_model->getData('cdx_subscription_plans_info')->where(array('subscription_plan_id'=>$subscription_plan_id))->first();
        echo json_encode(['subscription_plans'=>$subscription_plans,'subscription_plans_info'=>$subscription_plans_info]); die;
    }

    public function updateSubscriptionsPlanInfo(){

       $subscription_plan_id           = request('subscription_plan_id');  
       $subscription_title              = request('subscription_title');   
       $subscription_price              = request('subscription_price');  
       $number_of_surey                 = request('number_of_surey'); 
       $number_of_days                  = request('number_of_days'); 

       $subscription_plans_info_data =  array('subscription_price' =>$subscription_price,'number_of_surey'=>$number_of_surey,'number_of_days'=>$number_of_days);

       $this->Common_model->updateDate('cdx_subscription_plans',array('subscription_plan_id'=>$subscription_plan_id),array('subscription_titles' =>$subscription_title)); 
       $this->Common_model->updateDate('cdx_subscription_plans_info',array('subscription_plan_id'=>$subscription_plan_id),$subscription_plans_info_data);
       Session::flash('msg', "Your Plan has been successfully Updated");
       return redirect('/Components/SubscriptionsPlan');
    } 



 public function subscriptionPlanDetails()
 {      
        $user_id  = session('user_id'); 
        $data['subscription'] = DB::table('cdx_user')->select('subscription_id')->where('user_id',$user_id)->first();
        $id = $data['subscription']; 
        $SubID =  $id->subscription_id; 
        $data['list'] = $this->Common_model->getData('cdx_subscription')->where('subscription_id', $SubID)->get();
        $data['title']    = 'Subscription Plan';
        return  view('default/subscriptionPlan', $data);
  }



   public function registration($id=0)
    {  
       $urlInfos  = $this->Common_model->getData('cdx_generated_url')->where(array('generator_token' =>$id))->first();
       //print_r($urlInfos);
       //$count = $urlInfos->count();
       if(empty($urlInfos)){
           $data['title']   = 'Codex Survey Solutions';
           return view('default/error', $data);  
       }else{
           //$urlInfos        = $urlInfos->first();
           $data['email']   = $urlInfos->email;
           $data['name']    = explode(' ',$urlInfos->name);
           $data['cities']  = $this->Common_model->getData('cdx_cities')->get(); 
           $data['generator_token']    = $urlInfos->generator_token; 
           $data['generated_url_id']   = $urlInfos->generated_url_id; 
           $data['subscription_list']  = $this->Common_model->getData('cdx_subscription_plans')->get();  

           // $data['subscription_list'] = DB::table('cdx_subscription_plans')
           //  ->where('cdx_subscription_plans.status', 1 )
           //  ->leftJoin('cdx_priviliges', 'cdx_priviliges.cdx_priviliges_id', 'IN', 'cdx_subscription_plans.subs_privileges')
           //  ->select('cdx_subscription_plans.*', 'cdx_priviliges.cdx_priviliges_name')
           //  ->get();      

           $data['title']   = 'Codex Survey Solutions :: Registration';
           return view('registration',$data); 
       }
    }

    public function checkUsername()
    {
        $user_name = request('user_name'); 
        $get_count = $this->Common_model->getData('cdx_user')->where(array('user_name' =>$user_name))->first();

        if($get_count=='' || $get_count=0)
        {
            $flag = '0';
             echo json_encode($flag); die;
        }
        else{
            $flag = '1';
             echo json_encode($flag); die;
        }
    }

    public function registrationProcess()
    {

       $company_name             = request('company_name');  
       $company_gst_no           = request('company_gst_no');  
       $company_address          = request('company_address');  
       $city_id                  = request('city_id');  
       $subscription_id        = request('subscription_new_id');   

       $cmp_data =  array('company_name'=>$company_name,'company_address'=>$company_address,'company_gst_no'=>$company_gst_no,'city_id'=>$city_id,'subscription_id'=>$subscription_id, 'surveyor_status'=>'1');
       $survey_info_id   = $this->Common_model->saveDate('cdx_survey_company_info',$cmp_data);

       $first_name             = request('first_name');   
       $last_name              = request('last_name');  
       $email                  = request('g_email');  
       $phone_no               = request('phone_no');  
       $user_name                = request('user_name');  
       // $password = rand(999,9999);
       $password = Hash::make('123456');
       $password_reset_status  = '0'; 

       $subscription_info = $this->Common_model->getData('cdx_subscription_plans')->where(array('subscription_id' =>$subscription_id))->first();
       $users_allowed          = $subscription_info->users_allowed;  
       $survey_allowed_count   = $subscription_info->survey_allowed_count;  
       $sub_validity_days      = $subscription_info->sub_validity_days;  
       $subs_privileges        = $subscription_info->subs_privileges;  
       $subscription_price     = $subscription_info->subscription_price;  
        date_default_timezone_set('Asia/Calcutta'); 
        $subscribe_date = date("Y-m-d H:i:s"); // time in India
        $plan_expiry_date = date("Y-m-d"); // time in India
        $plan_expiry_date = date('Y-m-d', strtotime($plan_expiry_date. ' + '.$sub_validity_days.' days'));


       $user_data =  array('survey_info_id'=>$survey_info_id,'user_type_id' =>'3','first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'user_name'=>$user_name,'password'=>$password,'surv_privileges'=>$subs_privileges, 'phone_no'=>$phone_no,'city_id'=>$city_id,'profile_img'=>'','status'=>'1','password_reset_status'=>'0');
       $user_id  = $this->Common_model->saveDate('cdx_user',$user_data);


        $user_subs_info =  array('survey_info_id'=>$survey_info_id,'subscription_id' =>$subscription_id,'users_allowed'=>$users_allowed,'survey_allowed_count'=>$survey_allowed_count,'sub_validity_days'=>$sub_validity_days,'subs_privileges'=>$subs_privileges,'subscribe_date'=>$subscribe_date,'plan_expiry_date'=>$plan_expiry_date,'subscription_price'=>$subscription_price);
        $this->Common_model->saveDate('cdx_surveyor_subs_info',$user_subs_info);


       $generated_url_id       = request('generated_url_id');  
       $this->Common_model->deleteDate('cdx_generated_url','generated_url_id',$generated_url_id);
       // $this->Common_model->updateDate('cdx_user',array('user_id'=>$user_id),array('user_unique_id' =>$user_unique_id,'user_name'=>$user_name)); 
       Session::flash('msg', "Your registration has been successfully Completed");
       return redirect('/registration-completed');
    } 
    public function registrationCompleted()
    {
        Session::flash('msg', "Your registration has been successfully Completed");
        $data['title']   = 'Codex Survey Solutions';
        return view('default/registrationCompleted', $data);  
    }



    public function getBranchByInsurerId(){
        $insurer_id = request('insurer_id');
        $branch = $this->Common_model->getData('insurer_branch')->where(array('insurer_id'=>$insurer_id))->reorder('branch_name', 'asc')->get();
        $branch_list = '';
        $branch_list  .= '<option value="">Select Branch</option>';
        foreach ($branch as $value){
            $branch_list .= '<option value="'.$value->insurer_branch_id.'">'.$value->branch_name.'</option>';
        }
        $responce =  array('branch_list'=>$branch_list);
        echo json_encode($responce); die;
    }
}
