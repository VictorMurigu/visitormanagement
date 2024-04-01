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
                    <h4> Add Employee
                        <a href="{{url('employees')}}" class='btn btn-sm btn-primary float-end'>Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('employees/create')}}" method='POST'>
                        @csrf

                        <div class="mb-3">
                            <label>Employee_PJ</label>
                            <input type="text" class='form-control' name='pj' value={{old('pj')}}>
                            @error('pj')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Employee Name</label>
                            <input type="text" class='form-control' name='employee_name'
                                value={{old('employee_name')}}>
                            @error('employee_name')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Employee Tel</label>
                            <input type="text" class='form-control' name='employee_tel' value={{old('employee_tel')}}>
                            @error('employee_tel')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Employee Email</label>
                            <input type="text" class='form-control' name='employee_email' value={{old('employee_email')}}>
                            @error('employee_email')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Employee Department</label>
                            <input type="text" class='form-control' name='employee_department'
                                value={{old('employee_department')}}>
                            @error('employee_department')
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
