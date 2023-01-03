<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReportVehicleDetails extends Model{

    use HasFactory, Notifiable;
   	protected $table = 'cdx_report_vehicle_details';
   	public $timestamps = false;
   	protected $primaryKey ='vehicle_id';
    protected $fillable = [
        'report_id',
        'master_vehicle_id',
        'vehicle_type',
        'vehicle_registration_no',
        'registered_owner',
        'owner_sr_trs',
        'date_of',
        'date_of_date',
        'chassis',
        'chassis_phy_checked',
        'engine',
        'engine_phy_checked',
        'color',
        'make_variant_mod',
        'fuel_used',
        'type_fo_body',
        'cubic_capacity',
        'engine_cubic_capacity',
        'accident_condition',
        'reg_laden_wt',
        'unladen_wt',
        'seating_capacity',
        'class_of_vehicle',
        'tax_particulars',
        'odometer_reading',
        'puc_details',
        'puc_upto_date',
        'remark_rlw',
        'remark_ulw',
        'vehicle_remark',
        'com_fitness_certificate',
        'com_fitness_to_date',
        'com_fitness_from_date',
        'com_parmit_to_date',
        'com_parmit_from_date',
        'com_parmit_issued',
        'com_type_of_parmit',
        'com_authorization_validity',
        'com_area_of_opration',
    ];
}
