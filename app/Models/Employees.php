<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='employees';
    protected $fillable=['employee_pj','employee_name','employee_tel','employee_email','employee_department'];

}