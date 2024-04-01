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
                    <h4>  Visitor Out Time
                        <a href="{{url('visitors')}}" class='btn btn-primary float-end'>Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('visitors/'.$visitor->id.'/status')}}" method='POST'>
                        @csrf
                        <div class="mb-3">
                            <label>Visitor_out_time</label>
                            <input type="datetime-local" class='form-control' name='visitor_out_time'
                                value={{$todayTime}}>
                            @error('visitor_out_time')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Visitor Status --}}
                        <div class="form-group">
                            <label>Visitor status</label>
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="radio" name='visitor_status'
                                    id="flexRadioDefault1" value="in">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    IN
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name='visitor_status'
                                    id="flexRadioDefault2" value="out">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    OUT
                                </label>
                            </div> --}}
                            <div class="mb-3">
                                <button type='submit' class='btn btn-danger btn-sm'>Log Visitor Out</button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
