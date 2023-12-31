<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'subjectname',
        
        
       
    ];
    public function ofclass()
    {
        return $this->belongsTo(Grade::class,'classid');
    }
}
