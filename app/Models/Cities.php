<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
