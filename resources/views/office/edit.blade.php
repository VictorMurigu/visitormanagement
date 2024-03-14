@extends('layout.layout')
@section('content')
<div class="container mt-3">
    <div class='alert alert-success'>
        @if (session('status'))
        <h4>{{session('status')}}</h4>
        @endif
    </div>


    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Edit Office
                        <a href="{{url('office')}}" class='btn btn-primary float-end'>Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('office/'.$office->id.'/edit')}}" method='POST'>
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Office_name</label>
                            <input type="text" class='form-control' name='office_name' value={{$office->office_name}}>
                            @error('office_name')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Room Number</label>
                            <input type="text" class='form-control' name='room_no'
                                value={{$office->room_no}}>
                            @error('room_no')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>BUILDING</label>
                            <input type="text" class='form-control' name='building' value={{$office->building}}>
                            @error('building')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type='submit' class='btn btn-primary'>UPDATE</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
