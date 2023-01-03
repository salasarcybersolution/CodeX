<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAlbums extends Model
{
    use HasFactory;

   protected $table = 'cdx_report_album_images';


    protected $fillable = [
        'album_id',
        'report_id',
        'album_filename',
        'updated_at',
        'created_at',
    ];
}
