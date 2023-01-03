<?php
/**
* below funcation will use to show active/in-active status 
*
* @param $status
*/
//Get User Type
function getUserType($id)
	{
			$result = DB::table('cdx_user_type')->where('user_type_id', $id )->value('user_type');
	        return $result; 
	}
//Get User Info
function getUserInfo($id)
	{
			$result = DB::table('cdx_user')->where('user_id', $id )->first();
	        return $result; 
	}
//Get City Name
function getCityName($id)
	{
			$result = DB::table('cdx_cities')->where('id', $id )->value('city');
	        return $result; 
	}

//Get City Name
function getSubscriptionInfo($id)
	{
			$result = DB::table('cdx_subscription_plans')->where('subscription_id', $id )->first();
	        return $result; 
	}
function getSubscriptionPlanPriviliges($ids)
	{		
		    $ids = explode (",", $ids);
		    $result_new =array();
			$result = DB::table('cdx_priviliges')->whereIn('cdx_priviliges_id', $ids)->get();
            foreach ($result as $value) {
												$result_new[] = $value->cdx_priviliges_name;
                                             }
                                             $result = implode(",", $result_new);
			return $result; 
	}	
function getInsurerList($user_id)
	{
	      $result = DB::table('cdx_surveyor_insurer')
            ->where('cdx_surveyor_insurer.status', 1 )
            ->where('cdx_surveyor_insurer.survey_info_id',$user_id)
            ->leftJoin('insurer_master', 'cdx_surveyor_insurer.insurer_id', '=', 'insurer_master.insurer_master_id')
            ->select('cdx_surveyor_insurer.*', 'insurer_master.insurer_name')
            ->groupBy('cdx_surveyor_insurer.insurer_id')
            ->get();
            return $result;
       
	}

function getInsurerInfo($id){
	$result = DB::table('insurer_master')->where('insurer_master_id', $id )->first();
    return $result; 
}	
function getBranchInfo($id){
	$result = DB::table('insurer_branch')->where('insurer_branch_id', $id )->first();
    return $result; 
}
?>