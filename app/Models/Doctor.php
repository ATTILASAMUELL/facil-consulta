<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'document',
        'specialtie_id',
        'citie_id',
    ];

    public function citie()
    {
        return $this->belongsTo(Cities::class,'citie_id','id');
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class,'specialtie_id','id');
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }


    
}
