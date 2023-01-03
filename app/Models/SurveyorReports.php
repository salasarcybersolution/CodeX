<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SurveyorReports extends Model{

    use HasFactory, Notifiable;
   	protected $table = 'cdx_surveyor_reports';
   	public $timestamps = false;
   	protected $primaryKey ='report_id';
    protected $fillable = [
        'surveyor_id',
        'insurer_id',
        'insurer_branch_id',
        'surveyor_bank_id',
        'report_type',
        'report_status',
        'reference_number',
        'created_at',
        'updated_at',
        'vehicle_registration_no',
        'appointed_by',
        'insured_name',
        'insured_mobile_no',
        'place_of_survey',
        'remark',
        'allotment_date',
        'report_date',
        'is_submitted',
    ];
}
