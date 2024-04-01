<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Office;
use App\Models\VisitPurpose;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $visitor=Visitor::get();
        $office=Office::get();
        $office=Employees::get();
        $visit_purpose=VisitPurpose::get();
        $todayTime=Carbon::now()->timezone('EAT')->format('H:i');
        //  $timeCreated=Carbon::createFromFormat('Y-m-d H:i:s' );
        return view('visitors.index',compact('visitor','office','visit_purpose','todayTime'));
    }

    public function search(Request $request){
        $search=$_GET['query'];
        $visitor=Visitor::where('visitor_name','like',"%$search%")
        ->orWhere('host_department','like',"%$search%")->get();

        return view('visitors.index',compact('search','visitor'));

    }


    public function create(){
        $office=Office::get();
        $employee=Employees::get();
        $visit_purpose=VisitPurpose::get();
        $todayTime=Carbon::now()->timezone('EAT')->format('H:i');
      return view('visitors.create',compact('office','visit_purpose','todayTime','employee'));
    }
    public function store(Request $request){
         $request->validate([
            'visitor_name'=>'required|max:255',
            'visitor_id'=>'required|max:255',
            'host'=>'required|max:255',
            'visit_purpose'=>'required|max:255',
            'host_department'=>'required|max:255',
            'visitor_enter_time'=>'required',
            'visitor_out_time'=>'nullable',
            'visitor_status'=>'sometimes',
        ]);

        Visitor::create([
            'visitor_name'=>$request->visitor_name,
            'visitor_id'=>$request->visitor_id,
            'host'=>$request->host,
            'host_department'=>$request->host_department,
             'visit_purpose'=>$request->visit_purpose,
            'visitor_enter_time'=>$request->visitor_enter_time,
            'visitor_out_time'=>$request->visitor_status=='in'? null : $request->visitor_out_time,
            'visitor_status'=>$request->visitor_status=='in'? 1:0,
            'visitor_enter_by'=> Auth::user()->name,

        ]);

        return redirect('visitors/create')->with('status','Visitor Created');
    }
         public function edit(int $id){
        $visitor=Visitor::findOrFail($id);
        return view('visitors.edit',compact('visitor'));

    }

     public function status(int $id){
        $visitor=Visitor::findOrFail($id);
         $todayTime=Carbon::now()->timezone('EAT')->format('H:i');
        return view('visitors.status',compact('visitor','todayTime'));
     }

     public function statusUpdate(Request $request, $id){
        $visitor=Visitor::findOrFail($id);

        $request->validate([
            'visitor_out_time'=>'required',
        ]);

        $visitor->update([
            'visitor_out_time'=>$request->visitor_out_time,
            'visitor_status'=> 0,
        ]);

        return to_route('visitors');
     }

    public function update(Request $request,int $id){

          $request->validate([
            'visitor_name'=>'required|max:255',
            'visitor_id'=>'required|max:255',
            'host'=>'required|max:255',
            'host_department'=>'required|max:255',
            'visitor_enter_time'=>'required',
            'visitor_out_time'=>'nullable',
            'visitor_status'=>'sometimes',
            'visitor_enter_by'=>'required|max:255',
        ]);

        Visitor::findOrFail($id)->update([
            'visitor_name'=>$request->visitor_name,
            'visitor_id'=>$request->visitor_name,
            'host'=>$request->host,
            'host_department'=>$request->host_department,
            'visitor_enter_time'=>$request->visitor_enter_time,
            'visitor_out_time'=>$request->visitor_out_time,
            'visitor_status'=>$request->visitor_status=='in'?1:0,
            'visitor_enter_by'=>$request->visitor_enter_by,

        ]);


        return redirect()->back()->with('status','Visitor Updated');
    }

    public function destroy(int $id){
        $visitor=Visitor::findOrFail($id);
        $visitor->delete();
         return redirect()->back()->with('status','Visitor deleted');

    }
}