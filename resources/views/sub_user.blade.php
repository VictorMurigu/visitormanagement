@extends('layout.layout')

@section('content')
<h2 class="mt-3">Sub User Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Sub Management</li>
    </ol>
</nav>

<div class="mt-4 mb-4">
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">Sub User Management</div>
                <div class="col col-md-6">
                    <a href="{{ route('sub_user.add') }}" class="btn btn-success btn-sm float-end">Add</a>
                </div>
            </div>
        </div>
        {{$data}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="user_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $userdata )
                        <tr>
                            <td>{{$userdata->name}}</td>
                            <td>{{$userdata->email}}</td>
                            <td>{{$userdata->created_at}}</td>
                            <td>{{$userdata->updated_at}}</td>
                            <td>
                                <a href="{{url('sub_user/'.$userdata->id.'/edit')}}" class='btn btn-success'>Edit</a>
                                <a href="{{url('sub_user/'.$userdate->id.'/delete')}}" onclick="confirm('Are you sure you want to delete office')"
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
{{-- <script>
    $(function() {

            var table = $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('sub_user.fetch_all') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });

            $(document).on('click', '.delete', function() {

                var id = $(this).data('id');

                if (confirm("Are you sure you want to remove it?")) {
                    window.location.href = "/sub_user/delete/" + id;
                }

            });

        })
</script> --}}
@endsection
