<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $employee=Employees::get();
        return view('employees.index',compact('employee'));
    }

    public function create(){
      return view('employees.create');
    }

     public function search(Request $request){
        $search=$_GET['query'];
        $employee=Employees::where('employee_pj','like',"%$search%")
        ->orWhere('employee_name','like',"%$search%")
        ->orWhere('employee_department','like',"%$search%")->get();

        return view('employees.index',compact('search','employee'));

    }


    public function store(Request $request){
         $request->validate([
            'employee_pj'=>'required|max:255',
            'employee_name'=>'required|max:255',
            'employee_tel'=>'required|max:255',
            'employee_email'=>'required',
            'employee_department'=>'required',
        ]);

        Employees::create([
            'employee_pj'=>$request->employee_pj,
            'employee_name'=>$request->employee_name,
            'employee_tel'=>$request->employee_tel,
            'employee_email'=>$request->employee_email,
            'employee_department'=>$request->employee_department,
        ]);

        return redirect('employees/create')->with('status','Employee Created');
    }
         public function edit(int $id){
        $employee=Employees::findOrFail($id);
        return view('employeeS.edit',compact('employee'));

    }

    public function update(Request $request,int $id){

         $request->validate([
            'employee_pj'=>'required|max:255',
            'employee_name'=>'required|max:255',
            'employee_tel'=>'required|max:255',
            'employee_email'=>'required',
            'employee_department'=>'required',
        ]);

        Employees::findOrFail($id)->update([
            'employee_pj'=>$request->employee_pj,
            'employee_name'=>$request->employee_name,
            'employee_tel'=>$request->employee_tel,
            'employee_email'=>$request->employee_email,
            'employee_department'=>$request->employee_department,
        ]);

        return redirect('employees/create')->with('status','Employee Created');
    }

    public function destroy(int $id){
        $employee=Employees::findOrFail($id);
        $employee->delete();
         return redirect()->back()->with('status','Employee deleted');


    }
}