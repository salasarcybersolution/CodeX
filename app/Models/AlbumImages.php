<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumImages extends Model
{
    use HasFactory;

   protected $table = 'cdx_report_images';


    protected $fillable = [
        'id',
        'report_id',
        'filename',
        'created_at',
    ];
}
