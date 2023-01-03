<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

   protected $table = 'cdx_parts';


    protected $fillable = [
        'part_id',
        'part_name',
        'status',
      
    ];
}
