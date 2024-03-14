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
                    <h4> Edit Visitor
                        <a href="{{url('visitors')}}" class='btn btn-primary float-end'>Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('visitors/'.$visitor->id.'/edit')}}" method='POST'>
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Visitor_name</label>
                            <input type="text" class='form-control' name='visitor_name' value={{$visitor->visitor_name}}>
                            @error('visitor_name')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Visitor_meet_person</label>
                            <input type="text" class='form-control' name='visitor_meet_person'
                                value={{$visitor->visitor_meet_person}}>
                            @error('visitor_meet_person')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Visitor Department</label>
                            <input type="text" class='form-control' name='visitor_department'
                                value={{$visitor->visitor_department}}>
                            @error('visitor_department')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Visitor_enter_time</label>
                            <input type="text" class='form-control' name='visitor_enter_time'
                                value={{$visitor->visitor_enter_time}}>
                            @error('visitor_enter_time')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Visitor_out_time</label>
                            <input type="text" class='form-control' name='visitor_out_time'
                                value={{$visitor->visitor_out_time}}>
                            @error('visitor_out_time')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Visitor status</label>
                            <input type="checkbox" name='visitor_status' {{$visitor->visitor_status==true?'checked':''}}>
                            <div class='mt-2'></div>
                            @error('visitor_status')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Visitor_enter_by</label>
                            <input type="text" class='form-control' name='visitor_enter_by'
                                value={{$visitor->visitor_enter_by}}>
                            @error('visitor_enter_by')
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
