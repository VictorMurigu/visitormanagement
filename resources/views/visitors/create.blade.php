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
                        <a href="{{url('visitors')}}" class='btn btn-primary btn-sm float-end'>Back</a>
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
                        <div class="mb-3">
                            <label>Visitor_id</label>
                            <input type="text" class='form-control' name='visitor_id' value={{old('visitor_id')}}>
                            @error('visitor_id')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 select_div">
                            <label for="department">Department Visiting</label>
                            <select class="form-control" onclick="setInputValue()" id="department"  name="host_department">
                                @foreach($office as $office)
                                <option value="{{$office->office_name}}">{{ $office->office_name}}</option>
                                @endforeach
                                @error('host_department')
                                <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Person Meeting</label>
                                <select class="form-control" id="employee" name="host">

                                    {{-- <option value="{{$employee->employee_name}}" >{{$employee->employee_name}}</option> --}}

                                </select>
                            @error('host')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        {{-- Visitor purpose of visiting --}}
                        <div class="mb-3 select_div">
                            <label for="purpose">Purpose of Visiting</label>
                            <select class="form-control" id="purpose" name="visit_purpose">
                                @foreach($visit_purpose as $purpose)
                                <option value="{{$purpose->purpose_of_visit}}">{{ $purpose->purpose_of_visit}}</option>
                                @endforeach
                                @error('visit_purpose')
                                <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Visitor_enter_time</label>
                            <input type="datetime-local" class='form-control' name='visitor_enter_time' value={{$todayTime}}>
                            @error('visitor_enter_time')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        {{-- Visitor Status --}}
                        <div class="mb-3" style="display:none">
                            <label>Visitor status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name='visitor_status' id="flexRadioDefault1" value="in" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <p style="color:green">IN</p>

                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type='submit' class='btn btn-primary'>SAVE</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
   function setInputValue(){
        // var input=document.getElementById('input');
        // input.value="New Value"

        //select
        var selectedInput = document.getElementById('department').value

        removeOptions(document.getElementById('employee'));

        chooseEmployeeDepartment(selectedInput);
    }

let dataEmployees = {!! json_encode($employee) !!};

function chooseEmployeeDepartment(department){
    //filter by selected department
    dataEmployees.forEach(function(employee) {
        if (department == employee.employee_department){
            var option = document.createElement("option");
            option.text = employee.employee_name;
            option.value = employee.employee_name;

            document.getElementById("employee").appendChild(option);
        }
    });

    if (!!document.getElementById('employee').children.length == 0){
        var option = document.createElement("option");
        option.text = "No employee found";
        option.value = "";

        document.getElementById("employee").appendChild(option);
    }
}

//removing the options from select
function removeOptions(selectElement) {
    var i, L = selectElement.options.length - 1;
    for(i = L; i >= 0; i--) {
    selectElement.remove(i);
    }
}
</script>
@endsection
