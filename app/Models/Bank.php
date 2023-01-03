<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

   protected $table = 'bank_master';


    protected $fillable = [
        'id',
        'bank',
        'ac_no',
        'ifsc_code',
        'micr',
        'address',
        'address',
        'phone',
        'fax',
        'email',
        'remark',
        'contact_person',
        'mobile',
        'designation',
        'status',
    ];
}
