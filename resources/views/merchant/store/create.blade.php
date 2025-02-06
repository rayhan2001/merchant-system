@extends('layouts.app')

@section('title', 'Create Store')
@section('content')
    @include('merchant.section.navbar')

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('merchant.dashboard') }}" class="btn btn-primary">Home</a>
                        <h3 class="card-title">Create Store</h3>
                        <a href="{{ route('store.list') }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('merchant.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Store Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter store name" required>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
