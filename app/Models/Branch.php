<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

   protected $table = 'insurer_branch';


    protected $fillable = [
        'insurer_branch_id',
        'insurer_id',
        'branch_name',
        'state_id',
        'city_id',
    ];
}
