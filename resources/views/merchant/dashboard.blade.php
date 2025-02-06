@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @include('merchant.section.navbar')

    <div class="container-fluid">
        <h2 class="my-3 text-center">Welcome to the Merchant Dashboard</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <a href="{{ route('store.list') }}" class="btn btn-primary">Store List</a>
                        <a href="{{ route('category.list') }}" class="btn btn-primary">Category List</a>
                        <a href="{{ route('product.list') }}" class="btn btn-primary">Product List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
