<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DriverLicenceDetails extends Model{

    use HasFactory, Notifiable;
   	protected $table = 'cdx_report_driver_licence_details';
   	public $timestamps = false;
   	protected $primaryKey ='driver_id';
    protected $fillable = [
        'report_id',
        'driving_licence',
        'driver_name',
        'date_of_birth',
        'issue_date',
        'valid_from',
        'valid_to',
        'issuing_authority',
        'licence_type',
        'badge',
        'driver_remark',
        'driver_address',
    ];
}
