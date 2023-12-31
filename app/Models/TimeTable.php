<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;
    protected $fillable = [
        
       'about',
    ];
    public function hasperiod()
    {
        return $this->belongsTo(Period::class,'periodid');
    }
    public function hascombination()
    {
        return $this->belongsTo(Combination::class,'combinationid');
    }
}
