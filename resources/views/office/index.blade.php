@extends('layout.layout')
@section('content')
<div class="container  mt-3">
    <div class="row ">
        <div class="col-md-12">

            {{-- Office Search --}}
            <div class="row">
                <div class="">
                    <div class="card-header">
                        <form action="{{url('/search')}}" class="form-inline my-2 my-lg-0 float-end"
                            style='display:flex;width:330px' type="get">
                            <input type="search" class="form-control" name='query' placeholder="search...">
                            <button type="submit" class="btn btn-success  float-end">search</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4>Office
                        <a href="{{url('office/create')}}" class='btn btn-primary float-end'>Add Office</a>
                    </h4>
                </div>



                <div class="card-body">
                    <div class="mt-3">
                        <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>OFFICE NAME</th>
                                    <th>ROOM NO</th>
                                    <th>BUILDING</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($office as $dep )
                                <tr>
                                    <td>{{$dep->id}}</td>
                                    <td>{{$dep->office_name}}</td>
                                    <td>{{$dep->room_no}}</td>
                                    <td>{{$dep->building}}</td>
                                    <td>
                                        <a href="{{url('office/'.$dep->id.'/edit')}}" class='btn btn-success' >Edit</a>
                                        <a href="{{url('office/'.$dep->id.'/delete')}}" onclick="confirm('Are you sure you want to delete office')"
                                             class='btn btn-danger'>Delete</a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection


