@extends('layouts.app')

@section('title', 'Create Category')
@section('content')
    @include('merchant.section.navbar')

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('merchant.dashboard') }}" class="btn btn-primary">Home</a>
                        <h3 class="card-title">Create Category</h3>
                        <a href="{{ route('store.list') }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="store_id" class="form-label">Select Store</label>
                                        <select name="store_id" id="store_id" class="form-control" required>
                                            <option value="">---</option>
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" name="category_name" id="name"
                                            placeholder="Enter category name" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
