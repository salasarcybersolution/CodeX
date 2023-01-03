<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReportSurveyDetails extends Model{

    use HasFactory, Notifiable;
   	protected $table = 'cdx_report_survey_details';
   	public $timestamps = false;
   	protected $primaryKey ='survey_id';
    protected $fillable = [
        'report_id',
        'date_of_accident',
        'time_of_accident',
        'place_of_accident',
        'vehicle_shifted_to',
        'parson_available_on_spot',
        'parmit_to_date',
        'allotment_date',
        'inspection_date',
        'cousenature',
        'police_action',
        'name_of_police_satation',
        'satation_dairy_no',
        'nature_of_goods',
        'goods_caried',
        'origin_destination',
        'ir_invoice_no',
        'transporter_no',
        'no_of_passangers',
        'tp_vehicle_details',
        'tp_death_injuri_details',
        'death_tp_vehicle_details',
        'inspection_remark',
        'third_party_property_damages',
        'media_type',
        'media_type_value',
    ];
}
