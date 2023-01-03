<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PolicyDetails extends Model
{
    use HasFactory, Notifiable;

   protected $table = 'cdx_report_policy_details';
   
   public $timestamps = false;
   
   protected $primaryKey ='policy_id';


    protected $fillable = [
        'report_id',
        'policy',
        'idv_1',
        'idv_2',
        'policy_type',
        'insurance_from_date',
        'insurance_to_date',
        'insurer_id',
        'insurer_branch_id',
        'appointing_office',
        'appointed_by',
        'insured_name',
        'address',
        'hpa',
        'claim',
        'privous_policy_insurer',
        'privous_policy_from_date',
        'privous_policy_to_date',
        'privous_policy_no',
        'no_claim_bonus',
        'compliance_of_64VB',
        'privous_remark',
        'third_party_policy_insurer',
        'third_party_from_date',
        'third_party_to_date',
        'third_party_policy_no',
        'previous_remark',
        'third_party_policy_remark',
    ];
}
