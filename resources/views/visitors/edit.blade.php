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
                        <a href="{{url('visitors')}}" class='btn btn-primary btn-sm float-end'>Back</a>
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
                            <label>Visitor_id</label>
                            <input type="text" class='form-control' name='visitor_id' value={{$visitor->visitor_id}}>
                            @error('visitor_id')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Visitor_meet_person</label>
                            <input type="text" class='form-control' name='host'
                                value={{$visitor->host}}>
                            @error('host')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Visitor Department</label>
                            <input type="text" class='form-control' name='host_department'
                                value={{$visitor->host_department}}>
                            @error('host')
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
                            <button type='submit' class='btn btn-sm btn-primary'>UPDATE</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
