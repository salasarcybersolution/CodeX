<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReportRemarkDetails extends Model{

    use HasFactory, Notifiable;
   	protected $table = 'cdx_report_remark_details';
    public $timestamps = false;
    protected $fillable = [
        'report_id',
        'damages',
        'notes',
        'endclosers',
        'remarks',
    ];
}
