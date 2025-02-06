@extends('layouts.app')

@section('title', 'Store List')
@section('content')
    @include('merchant.section.navbar')

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('merchant.dashboard') }}" class="btn btn-primary">Home</a>
                        <h3 class="card-title">Store List</h3>
                        <a href="{{ route('store.create') }}" class="btn btn-primary">Create Store</a>
                    </div>
                    <div class="card-body">
                        <table id="storeListTable" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $store->name }}</td>
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
            $('#storeListTable').DataTable({
                "dom": '<"row"<"col-md-6"l><"col-md-6"f>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
                "responsive": true,
                "paging": true,
                "ordering": true,
                "info": true
            });
        });
    </script>
@endsection
