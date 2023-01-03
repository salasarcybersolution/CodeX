<?php
use Illuminate\Support\Facades\Route;
//Middleware
use App\Http\Middleware\AdminAuth; 
//Controllers 
use App\Http\Controllers\Home;
use App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\BranchMaster;
use App\Http\Controllers\BankMaster;
use App\Http\Controllers\KmRateMaster;
use App\Http\Controllers\InsurerMaster;
use App\Http\Controllers\InsurerUser;
use App\Http\Controllers\GarageMaster;
use App\Http\Controllers\VehicleMaster;
use App\Http\Controllers\PartMaster;
use App\Http\Controllers\Surveyor;
use App\Http\Controllers\SurveyorExecutive;
use App\Http\Controllers\SpotReport;
use App\Http\Controllers\FinalReport;
use App\Http\Controllers\InterimReport;
use App\Http\Controllers\ReportAlbum;
use App\Http\Controllers\Bill;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::any('/logout',[Home::class,'logout']); 
Route::any('/',[Home::class,'index']);

Route::any('Home/checkDetails',[Home::class,'checkDetails']);
// default
Route::any('surveyor/imageGenerateurl/{id}',[Surveyor::class,'imageGenerateurl']);

// forget Password route
Route::any('forgot-password',[Home::class,'forgotPassword']);
Route::any('forgot-password-check',[Home::class,'forgetEDetails']);
Route::get('reset-password/{token}', [Home::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password-updte', [Home::class, 'submitResetPasswordForm']);
Route::any('Home/getBranchByInsurerId', [Home::class, 'getBranchByInsurerId']);

Route::any('settings-account',[Home::class,'settingsAccount']);
Route::any('subscription-plan',[Home::class,'subscriptionPlanDetails']);
Route::any('Home/updateInfo',[Home::class,'updateInfo']);
Route::any('settings-security',[Home::class,'settingsSecurity']);
Route::any('Home/updatePassword',[Home::class,'updatePassword']);
Route::any('settings-billing',[Home::class,'settingsBilling']);
Route::any('Home/getSubscriptionPlanInfo',[Home::class,'getSubscriptionPlanInfo']);
Route::any('Home/subscriptionsPlanInfo',[Home::class,'subscriptionsPlanInfo']);
Route::any('Home/updateSubscriptionsPlanInfo',[Home::class,'updateSubscriptionsPlanInfo']);

Route::any('registration/{id}',[Home::class,'registration']);
Route::any('checkUsername',[Home::class,'checkUsername']);
Route::any('registrationProcess',[Home::class,'registrationProcess']);
Route::any('registration-completed',[Home::class,'registrationCompleted']);
Route::post('Master/fetch-insurer-branch', [InsurerMaster::class, 'fetchBranch']);

Route::post('Master/fetch-surveyor-insurer-branch', [InsurerMaster::class, 'fetchSurveyorInsurerBranch']);
Route::post('Master/fetch-subpart', [BranchMaster::class, 'fetchSubPart']);

Route::post('Master/fetch-vehicle-details',[VehicleMaster::class,'vehicleDetails']);


Route::post('image/upload/store',[ReportAlbum::class,'fileStore']);
Route::post('image/delete',[ReportAlbum::class,'fileDestroy']);
Route::post('image/upload',[ReportAlbum::class,'fileUpload']);
Route::post('image/album/upload',[ReportAlbum::class,'uploadAlbumImage']);


Route::group(['middleware' => ['SuperAdminAuth']], function (){

  Route::any('SuperAdmin',[SuperAdmin::class,'index']);
  // Subscription Plans
  Route::any('Components/SubscriptionPlans',[SuperAdmin::class,'SubscriptionPlans']);
  Route::any('Components/saveSubscriptionPlansInfo',[SuperAdmin::class,'saveSubscriptionPlansInfo']);
  Route::any('Components/subscriptionActiveProcess/{id}/{id2}',[SuperAdmin::class,'subscriptionActiveProcess']);

  // url Generated
  Route::any('Components/urlGenerated',[SuperAdmin::class,'urlGenerated']);
  Route::any('Components/urlGeneratedProcess',[SuperAdmin::class,'urlGeneratedProcess']);
  Route::any('Components/deleteGeneratedURL/{id}',[SuperAdmin::class,'deleteGeneratedURL']);

  // User Management
  Route::any('Components/user-list',[SuperAdmin::class,'userList']);
  
  Route::any('Master/insurer-branch-master',[BranchMaster::class,'index']);
  Route::post('Master/saveBranchData',[BranchMaster::class,'store']);
  Route::any('Master/addBranchData',[BranchMaster::class,'addInsurerBranch']);
  Route::post('Master/fetch-citys', [BranchMaster::class, 'fetchCitys']);
  Route::post('Master/fetch-citys-update', [BranchMaster::class, 'fetchCitysUpdate']);
  Route::any('Master/bank-master',[BankMaster::class,'index']);
  Route::post('Master/saveBankData',[BankMaster::class,'store']);
  Route::post('Master/update-bank-name',[BankMaster::class,'upDateBankName']);
  Route::any('Master/delete-bank-name/{id}',[BankMaster::class,'deleteBank']);

  // part route's here...............
  Route::any('Master/part-master',[PartMaster::class,'part']);
  Route::post('Master/savePartData',[PartMaster::class,'Partstore']);
  Route::post('Master/update-part-name',[PartMaster::class,'upDatePartName']);

  // sub part here /// ........................
  Route::any('Master/sub-part-master',[PartMaster::class,'subpart']);
  Route::any('Master/add-sub-part',[PartMaster::class,'addSubPart']);
  Route::post('Master/saveSubPartData',[PartMaster::class,'saveSubPart']);
  Route::any('Master/esitSubpart/{subpart_id}',[PartMaster::class,'editSubPart']);
  Route::any('Master/deletePart/{part_id}',[PartMaster::class,'deletePart']);
  Route::any('Master/deleteSubpart/{subpart_id}',[PartMaster::class,'deleteSubpart']);
  Route::any('Master/subPartUpdate',[PartMaster::class,'updateSubpart']);
  
  // close part and sub part route section ............
  Route::any('Master/registerBranchMaster',[BranchMaster::class,'store']);
  Route::any('Master/editBranchMaster/{id}',[BranchMaster::class,'editbracnchmaster']);
  Route::any('Master/updateBranchMaster',[BranchMaster::class,'updateInsurerMaster']);

  Route::any('Master/km-rate-master',[KmRateMaster::class,'index']);
  Route::post('Master/saveKmRateData',[KmRateMaster::class,'store']);

  Route::any('Master/garage-master',[GarageMaster::class,'index']);
  Route::post('Master/saveGarageData',[GarageMaster::class,'store']);

  Route::any('Master/vehicle-master',[VehicleMaster::class,'index']);

  Route::post('Master/vehicle-master-add',[VehicleMaster::class,'vechicleFromData']);
  Route::get('Master/vehicle-master-register',[VehicleMaster::class,'registerVehicleMaster']);
  Route::post('Master/vehicle-master-update',[VehicleMaster::class,'updateVehicle']);
  Route::any('Master/vehicle-master-edit/{id}',[VehicleMaster::class,'vehicleEditFun']);
  Route::any('Master/vehicle-master-delete/{id}',[VehicleMaster::class,'deleteVehicle']);

  Route::any('Master/insurer-master',[InsurerMaster::class,'index']);
  Route::get('Master/insurer-master/add',[InsurerMaster::class,'insurerRegistration']);
  Route::any('Master/insurer-master/edit/{id}',[InsurerMaster::class,'insurerMasterEditFun']);
  Route::post('Master/saveInsurerData',[InsurerMaster::class,'store']);
  Route::post('Master/updateInsurerData',[InsurerMaster::class,'updateInsurer']);
  
  // add insurer
  Route::any('Master/insurerList',[InsurerMaster::class,'insurerList']);
  Route::any('Master/addInsurer',[InsurerMaster::class,'addInsurer']);
  Route::any('Master/saveInsurerUserData',[InsurerMaster::class,'saveInsurerUserData']);

  // Add Master Fees

  Route::any('Master/master-fees',[InsurerMaster::class,'masterFees']);
  Route::any('Master/saveMasterFees',[InsurerMaster::class,'saveMasterFees']);
  


  
});
 

Route::group(['middleware' => ['SurveyorAdminAuth']], function (){

  Route::any('Surveyor',[Surveyor::class,'index']);
  //Route::any('SpotReport/policy-report',[SpotReport::class,'index']); 
  Route::any('SpotReport/policy-report/{id}',[SpotReport::class,'index']); 
  Route::any('SpotReport/survey-report/{id}',[SpotReport::class,'spotSurveyReport']);
  Route::any('SpotReport/damages-report/{id}',[SpotReport::class,'spotDamagesReport']);
  Route::any('SpotReport/save-damages-report',[SpotReport::class,'storeSpotDamagesReport']);

  Route::any('SpotReport/saveSurveyInfo',[SpotReport::class,'saveSurveyInfo']);
  Route::any('SpotReport/notes-remark-report/{id}',[SpotReport::class,'spotNotesRemarkReport']);
  Route::any('SpotReport/save-notes-remark-report',[SpotReport::class,'saveSpotNotesRemark']);

  Route::post('SpotReport/addPolicyDetails',[SpotReport::class,'storePolicyDetails']);
  Route::post('SpotReport/addVehicleDetails',[SpotReport::class,'storeVehicleDetails']);
  Route::post('SpotReport/addDriverDetails',[SpotReport::class,'storeDriverDetails']);
  Route::post('SpotReport/getpolicy',[SpotReport::class,'policyDetails']);



  Route::any('final/policy-report',[FinalReport::class,'index']);
  Route::any('final/policy-report/{id}',[FinalReport::class,'index']);
  
  Route::post('final/storePolicyDetails',[FinalReport::class,'storePolicyDetails']);
  Route::post('final/storeVehicleDetails',[FinalReport::class,'storeVehicleDetails']);

  Route::any('final/survey-report',[FinalReport::class,'finalSurveyReport']);
  Route::any('final/survey-report/{id}',[FinalReport::class,'finalSurveyReport']);
  Route::any('final/new-parts',[FinalReport::class,'finalNewParts']);
  Route::any('final/new-parts/{id}',[FinalReport::class,'finalNewParts']);
  Route::any('final/labour',[FinalReport::class,'finalLabour']);
  Route::any('final/summery-remark',[FinalReport::class,'summeryRemark']);
  Route::any('final/summery-remark/{id}',[FinalReport::class,'summeryRemark']);
  Route::post('final/storePartDetails',[FinalReport::class,'savefinalpartDetails']);
  Route::any('final/storeDriverLicenseDetails',[FinalReport::class,'storeDriverLicenseDetails']);
  Route::any('final/save-survey-report',[FinalReport::class,'saveSurveyInfo']);

  Route::any('interim/summery-notes',[FinalReport::class,'interimSummeryNotes']);
  Route::any('interim/new-parts',[InterimReport::class,'interimNewParts']);
  Route::any('interim/policy-report',[InterimReport::class,'index']);
  Route::any('interim/survey-report',[InterimReport::class,'interimSurveyReport']);
  Route::any('interim/summery-notes',[InterimReport::class,'interimSummeryNotes']);

  Route::any('surveyor/serveyorInsurer',[InsurerMaster::class,'surveyorInsurerMaster']);
  Route::post('surveyor/addSuveyorInsurer',[InsurerMaster::class,'addSuveyorInsurer']);
  Route::any('surveyor/serveyorInsurerForm',[InsurerMaster::class,'surveyorInsurerMasterForm']);
  Route::any('surveyor/serveyorInsurerEdit/{id}',[InsurerMaster::class,'surveyorInsurerMasterEdit']);
  Route::any('surveyor/serveyorInsurerview/{id}',[InsurerMaster::class,'surveyorInsurerMasterViewDetails']);
  Route::any('surveyor/serveyorInsurerUpdate',[InsurerMaster::class,'surveyorInsurerMasterUpdate']);


  Route::any('surveyor/serveyorBankAccounts',[Surveyor::class,'serveyorBankAccounts']);
  Route::any('surveyor/addBankAccounts',[Surveyor::class,'addBankAccount']);
  Route::post('surveyor/saveAccount',[Surveyor::class,'storeAccountDetails']);
  Route::get('surveyor/editServeyor/{id}',[Surveyor::class,'editServeyorBankAccountsDetails']);
  Route::post('surveyor/updateServeyorBankDetils',[Surveyor::class,'updateBnkDetails']);
  
  Route::any('reports/add-album',[ReportAlbum::class,'index']);
  Route::any('reports/add-album/{id}',[ReportAlbum::class,'index']);
  Route::any('reports/album-design',[ReportAlbum::class,'design']);
  Route::any('reports/drow-album/{id}',[ReportAlbum::class,'drowAlbum']);
  Route::any('reports/view-album/{id}',[ReportAlbum::class,'AlbumView']);
  Route::any('delete-image',[ReportAlbum::class,'deleteImagesData']);
  Route::any('delete-album-image',[ReportAlbum::class,'deleteAlbumImage']);
   

  Route::any('reports/create-album/{id}',[ReportAlbum::class,'createAlbum']);

  // Surveyor URL Generoter Section
  Route::any('surveyor/saveSurveyorUserInfo',[Surveyor::class,'saveSurveyorUserInfo']);
  Route::any('serveyor/urlGenerated',[Surveyor::class,'serveyorUrlGenerated']);
  Route::any('serveyor/urlGeneratedProcess',[Surveyor::class,'urlGeneratedProcess']);
  Route::any('serveyor/deleteGeneratedURL/{id}',[Surveyor::class,'deleteGeneratedURL']);
  Route::any('report-list',[Surveyor::class,'reportList']);
  Route::any('user-list',[Surveyor::class,'addUser']);
  Route::any('checkUserCreated',[Surveyor::class,'checkUserCreated']);
  Route::any('serveyor/report-view-details/{report_id}',[SpotReport::class,'reportViewDetails']);
     
  // add report section
  Route::any('serveyor/add-report',[Surveyor::class,'AddReport']);
  Route::any('allBill',[Bill::class,'index']);
  Route::any('createBill/{id}',[Bill::class,'createBill']);

});


Route::group(['middleware' => ['SurveyorExecAuth']], function (){

  Route::any('SurveyorExecutive',[SurveyorExecutive::class,'index']);

});


Route::group(['middleware' => ['InsurerAuth']], function (){

  Route::any('Insurer',[InsurerUser::class,'index']);

});
  