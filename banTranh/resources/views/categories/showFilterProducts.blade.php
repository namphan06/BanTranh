@extends('products.layout')
@section('content')
<div class="container mt-5">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
    }

    .form-select,
    .form-control {
        border-radius: 20px;
    }

    .btn {
        border-radius: 20px;
    }

    .card {
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }
    </style>

    <div class="mb-4">
        @if ($category)
        <h1 class="text-primary">Products in {{ $category->name }}</h1>
        @else
        <h1 class="text-primary">Products</h1>
        @endif
    </div>

    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
    </div>

    <!-- Product Listing -->
    <div class="row">
        @forelse ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if ($product->image)
                <img src="{{ asset($product->image) }}" alt="Product Image" class="card-img-top"
                    style="height: 200px; object-fit: cover;">
                @else
                <div class="d-flex justify-content-center align-items-center"
                    style="height: 200px; background: #f0f0f0;">
                    <span class="text-muted">No Image</span>
                </div>
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title">{{ Str::limit($product->name, 30) }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($product->detail, 60) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-secondary">${{ number_format($product->price, 2) }}</span>
                        <a href="{{ route('products.showdetail2', $product->id) }}" class="btn btn-dark btn-sm">Details</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-muted text-center">No products found for this filter.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {!! $products->appends(request()->query())->links() !!}
    </div>
</div>
@endsection