<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'logo',
        'phone',
        'address',
        'has_shift',
        'has_version',
        'has_section',
        'status',
    ];

    public function AdmissionNumber(){
        return $this->hasMany(AdmissionNumber::class);
    }
}
