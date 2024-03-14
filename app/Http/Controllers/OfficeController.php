<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
{
    public function index(){
        $office=Office::get();
        return view('office.index',compact('office'));
    }
    public function create(){
        return view('office.create');
    }

    public function search(Request $request){
        $search=$_GET['query'];
        $office=Office::where('office_name','like',"%$search%")
        ->orWhere('room_no','like',"%$search%")->get();

        return view('office.index',compact('search','office'));

    }



    public function store(Request $request){
        $request->validate([
            'office_name'=>'required|max:255',
            'room_no'=>'required|max:255',
            'building'=>'required|max:255',
        ]);

        Office::create([
            'office_name'=>$request->office_name,
            'room_no'=>$request->room_no,
            'building'=>$request->building,

        ]);

        return redirect('office/create')->with('status','office created');

    }

    public function edit(int $id){
        $office=Office::findOrFail($id);
        return view('office.edit',compact('office'));

    }

    public function update(Request $request,int $id){
         $request->validate([
            'office_name'=>'required|max:255',
            'room_no'=>'required|max:255',
            'building'=>'required|max:255',
        ]);

        Office::findOrFail($id)->update([
            'office_name'=>$request->office_name,
            'room_no'=>$request->room_no,
            'building'=>$request->building,

        ]);

        return redirect()->back()->with('status','office updated');
    }

    public function destroy(int $id){
        $office=Office::findOrFail($id);
        $office->delete();
         return redirect()->back()->with('status','office deleted');

    }
}