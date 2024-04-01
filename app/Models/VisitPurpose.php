<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitPurpose extends Model
{
    use HasFactory;
    protected $table='visitpurpose';
     protected $fillable = [
                'purpose_of_visit',
    ];
}