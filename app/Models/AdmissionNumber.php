<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionNumber extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'class_id',
        'admission_number',
    ];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function classes(){
        return $this->belongsTo(Classes::class,'class_id','id');
    }
}
