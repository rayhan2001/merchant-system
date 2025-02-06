@extends('layouts.app')

@section('title', 'Shop Page')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Shop Name</th>
                            <th>Category Name</th>
                            <th>Product Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stores as $store)
                            @php
                                $rowspanStore = $store->categories->sum(fn($category) => max($category->products->count(), 1));
                            @endphp
                            <tr>
                                <td rowspan="{{ $rowspanStore }}">{{ $store->name }}</td>

                                @foreach ($store->categories as $category)
                                    @php
                                        $rowspanCategory = max($category->products->count(), 1);
                                    @endphp

                                    <td rowspan="{{ $rowspanCategory }}">{{ $category->category_name }}</td>

                                    @if ($category->products->count() > 0)
                                        @foreach ($category->products as $product)
                                            <td>{{ $product->product_name }}</td>
                                        </tr>
                                        @if (!$loop->last) <tr> @endif
                                        @endforeach
                                    @else
                                        <td>-</td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
    