<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subpart extends Model
{
    use HasFactory;

   protected $table = 'cdx_subpart';


    protected $fillable = [
        'subpart_id  ',
        'part_id',
        'subpart_name',
        'status',
      
    ];

     public function getpartName()
    {
        return $this->belongsTo(Part::class,'part_id','part_id');
    }
}
