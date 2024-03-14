@extends('layout.layout')
@section('content')
<table class="table table-bordered table-striped" id="visitor_table">
    <thead>
        <tr>
            <th>Visitor Name</th>
            <th>Visitor_Meet_Person_Name</th>
            <th>Department</th>
            <th>In Time</th>
            <th>Out Time</th>
            <th>Status</th>
            <th>Enter By</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($visitor as $visitor )
        <tr>
            <td>{{$visitor->visitor_name}}</td>
            <td>{{$visitor->visitor_meet_person}}</td>
            <td>{{$visitor->visitor_department}}</td>
            <td>{{$visitor->visitor_enter_time}}</td>
            <td>{{$visitor->visitor_out_time}}</td>
            <td>
                @if ($visitor->visitor_status)
                IN
                @else
                OUT
                @endif
            <td>{{$visitor->visitor_enter_by}}</td>
            <td>
                <a href="{{url('visitors/'.$visitor->id.'/edit')}}" class='btn btn-success'>Edit</a>
                <a href="{{url('visitors/'.$visitor->id.'/delete')}}"
                    onclick="confirm('Are you sure you want to delete office')" class='btn btn-danger'>Delete</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection



