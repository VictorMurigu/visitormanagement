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
                    <h4> Add Purpose
                        <a href="{{url('visitpurpose')}}" class='btn btn-primary btn-sm float-end'>Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('visitpurpose/create')}}" method='POST'>
                        @csrf

                        <div class="mb-3">
                            <label>Purpose of Visit</label>
                            <input type="text" class='form-control' name='purpose_of_visit' value={{old('purpose_of_visit')}}>
                            @error('purpose_of_visit')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type='submit' class='btn btn-sm btn-primary'>SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
