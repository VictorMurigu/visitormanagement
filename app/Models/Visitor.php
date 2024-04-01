<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $table='visitors';
     protected $fillable = [
                'visitor_name',
                'visitor_id',
                'host',
                'host_department',
                'visit_purpose',
                'visitor_enter_time',
                'visitor_out_time',
                'visitor_status',
                'visitor_enter_by'
    ];
}