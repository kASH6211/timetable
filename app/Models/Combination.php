<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combination extends Model
{
    use HasFactory;
    protected $fillable = [
        
       
    ];
    public function hassubject()
    {
        return $this->belongsTo(Subject::class,'subjectid');
    }
    public function hasteacher()
    {
        return $this->belongsTo(Teacher::class,'teacherid');
    }
}
