<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
     protected $primaryKey='id';
     protected $table='office';
     protected $fillable=[
        'office_name',
        'room_no',
        'building',
     ];
}