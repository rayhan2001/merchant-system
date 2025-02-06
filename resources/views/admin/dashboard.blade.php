@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @include('admin.section.navbar')
    
    <div class="container-fluid">
        <h2 class="my-3 text-center">Welcome to the Admin Dashboard</h2>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Merchant List</h3>
                    </div>
                    <div class="card-body">
                        <table id="merchantListTable" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#merchantListTable').DataTable({
                "dom": '<"row"<"col-md-6"l><"col-md-6"f>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
                "responsive": true,
                "paging": true,
                "ordering": true,
                "info": true
            });
        });
    </script>

@endsection
