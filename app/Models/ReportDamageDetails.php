<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReportDamageDetails extends Model{

    use HasFactory, Notifiable;
   	protected $table = 'cdx_report_damage_details';
    public $timestamps = false;
    protected $fillable = [
        'report_id',
        'parts',
        'description',
        
    ];
}
