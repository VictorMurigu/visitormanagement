@extends('layout.layout')
@section('content')
<div class="container mt-3">
    <div class="row ">
        <div class="col-md-12">

            {{-- Office Search --}}
            <div class="row">
                <div class="">
                    <div class="card-header">
                        <form action="{{url('/search')}}" class="my-2 form-inline my-lg-0 float-end"
                            style='display:flex;width:330px' type="get">
                            <input type="search" class="form-control" name='query' placeholder="search...">
                            <button type="submit" class="btn btn-success btn-sm float-end">search</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4>Purpose of Visit
                        <a href="{{url('visitpurpose/create')}}" class='btn btn-primary btn-sm float-end'>Add Purpose</a>
                    </h4>
                </div>



                <div class="card-body">
                    <div class="mt-3">
                        <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Purpose of Visit</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visit_purpose as $purpose )
                                <tr>
                                    <td>{{$purpose->id}}</td>
                                    <td>{{$purpose->purpose_of_visit}}</td>

                                    <td>
                                        <a href="{{url('visitpurpose/'.$purpose->id.'/edit')}}"
                                            class='btn btn-sm btn-success'>Edit</a>
                                        <a href="{{url('visitpurpose/'.$purpose->id.'/delete')}}"
                                            onclick="confirm('Are you sure you want to delete office')"
                                            class='btn btn-sm btn-danger'>Delete</a>
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
