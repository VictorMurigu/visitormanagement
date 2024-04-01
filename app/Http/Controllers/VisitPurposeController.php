<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitPurpose;

class VisitPurposeController extends Controller
{
     public function index(){
        $visit_purpose=VisitPurpose::get();
        return view('visitpurpose.index',compact('visit_purpose'));
    }
    public function create(){
        return view('visitpurpose.create');
    }

    public function search(Request $request){
        $search=$_GET['query'];
        $visit_purpose=VisitPurpose::where('purpose_of_visit','like',"%$search%");
        // ->orWhere('room_no','like',"%$search%")->get();

        return view('visitpurpose.index',compact('search','visit_purpose'));

    }



    public function store(Request $request){
        $request->validate([
            'purpose_of_visit'=>'required|max:255',

        ]);

        VisitPurpose::create([
            'purpose_of_visit'=>$request->purpose_of_visit,


        ]);

        return redirect('visitpurpose/create')->with('status','purpose created');

    }

    public function edit(int $id){
        $visit_purpose=VisitPurpose::findOrFail($id);
        return view('visitpurpose.edit',compact('visit_purpose'));

    }

    public function update(Request $request,int $id){
         $request->validate([
            'purpose_of_visit'=>'required|max:255',

        ]);

        VisitPurpose::findOrFail($id)->update([
            'purpose_of_visit'=>$request->purpose_of_visit,

        ]);

        return redirect()->back()->with('status','purpose updated');
    }

    public function destroy(int $id){
        $visit_purpose=VisitPurpose::findOrFail($id);
        $visit_purpose->delete();
         return redirect()->back()->with('status','purpose deleted');

    }
}