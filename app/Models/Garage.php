<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    use HasFactory;

   protected $table = 'garage_master';


    protected $fillable = [
        'id',
        'workshop',
        'contact_person',
        'mobile',
        'authorized',
        'remark',
        'status',
    ];
}
