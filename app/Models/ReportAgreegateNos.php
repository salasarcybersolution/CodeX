<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReportAgreegateNos extends Model{

    use HasFactory, Notifiable;
   	protected $table = 'cdx_report_agreegate_nos';
   	public $timestamps = false;
   	protected $primaryKey ='agreegate_nos_id';
    protected $fillable = [
        'report_id',
        'nos_item_name',
        'nos_remark',
    ];
}
