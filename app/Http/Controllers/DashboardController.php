<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Visitor;
use App\Models\Employees;
use App\Models\Office;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(){


            $visitor_number=Visitor::count();
            $todayDate=Carbon::now()->format('Y-m-d');
            $today_visitor=Visitor::whereDate('created_at',$todayDate)->count();



            $employees_number=Employees::count();
            $office_number=Office::count();
            return view('dashboard.index',compact('visitor_number','today_visitor','employees_number','office_number'));

    }
}