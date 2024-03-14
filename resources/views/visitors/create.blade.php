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
                    <h4> Add Visitor
                        <a href="{{url('visitors')}}" class='btn btn-primary float-end'>Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('visitors/create')}}" method='POST'>
                        @csrf

                        <div class="mb-3">
                            <label>Visitor_name</label>
                            <input type="text" class='form-control' name='visitor_name' value={{old('visitor_name')}}>
                            @error('visitor_name')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 select_div">
                            <label for="">Department Visiting</label>
                            <select class="form-control" id="type" name="visitor_department">
                                @foreach($office as $office)
                                <option id="typey" value="{{$office->office_name}}">{{ $office->office_name}}</option>
                                @endforeach
                                @error('visitor_department')
                                <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </select>

                        </div>
                        <div class="mb-3">
                            <label>Person Meeting</label>
                            <input type="text" class='form-control' name='visitor_meet_person'
                                value={{old('visitor_meet_person')}}>
                            @error('visitor_meet_person')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>


                        {{-- <div class="mb-3">
                            <label>Office Department</label>
                            <input type="text" class='form-control'  name='visitor_department' value={{old('visitor_department')}}>
                            @error('visitor_department')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label>Visitor_enter_time</label>
                            <input type="text" class='form-control' name='visitor_enter_time' value={{old('visitor_enter_time')}}>
                            @error('visitor_enter_time')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label>Visitor_out_time</label>
                            <input type="text" class='form-control' name='visitor_out_time' value={{old('visitor_out_time')}}>
                            @error('visitor_out_time')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div> --}}
                        {{--Changed visitors time to carbonTime  --}}
                        <div class="mb-3">
                            <label>Visitor_enter_time</label>
                            <input type="datetime-local" class='form-control' name='visitor_enter_time' value={{$todayTime}}>
                            @error('visitor_enter_time')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label>Visitor_out_time</label>
                            <input type="text" class='form-control' name='visitor_out_time' value={{$todayTime}}>
                            @error('visitor_out_time')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div> --}}

                        {{-- <div class="mb-3">
                            <label>Visitor status</label>
                            <input type="checkbox"  name='visitor_status' {{old('visitor_status')==true?'checked':''}}>
                            <div class='mt-2'></div>
                            @error('visitor_status')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div> --}}
                        {{-- Visitor Status --}}
                        <div class="form-group">
                            <label>Visitor status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name='visitor_status' id="flexRadioDefault1" value="in">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    IN
                                </label>
                            </div>
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="radio" name='visitor_status' id="flexRadioDefault2" value="out">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    OUT
                                </label>
                            </div> --}}
                        <div class="mb-3">
                            <label>Visitor_enter_by</label>
                            <input type="text" class='form-control' name='visitor_enter_by' value={{old('visitor_enter_by')}}>
                            @error('visitor_enter_by')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type='submit' class='btn btn-primary'>SAVE</button>
                        </div>

                        {{-- Testing script --}}
                        <div class="mb-3">
                            <label>Person Meeting</label>
                            <input type="text" id="input" class='form-control' name='visitor_meet_person' value={{old('visitor_meet_person')}}>
                            @error('visitor_meet_person')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type='button' class='btn btn-primary' onclick="setInputValue()">btn</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
   function setInputValue(){
var input=document.getElementById('input');
input.value="New Value"
}
</script>
@endsection
