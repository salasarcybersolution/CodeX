<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurer extends Model
{
   

   protected $primaryKey = 'insurer_branch_id';
   protected $table = 'insurer_master';


    protected $fillable = [
        'insurer_master_id ',
        'insurer_name',
        'remark',
        'initial',
        'status',
    ];
}
