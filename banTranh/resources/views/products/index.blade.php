@extends('products.layout')

@section('content')

<div class="container mt-5">
    <style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }

    h1,
    h5 {
        font-weight: bold;
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

    .badge {
        font-size: 0.85rem;
    }

    .form-control {
        border-radius: 20px;
    }

    .form-select {
        border-radius: 20px;
    }

    .shadow-sm {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .pagination .page-link {
        border-radius: 20px;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    /* Category Section Styles */
    .category-section {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .category-card {
        width: 150px;
        height: 100px;
        background-size: cover;
        background-position: center;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-weight: bold;
        font-size: 1rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .category-card:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }

    /* Carousel Styling */
    .carousel-inner {
        border-radius: 10px;
        /* Bo góc các hình ảnh */
        overflow: hidden;
        /* Ẩn phần thừa */
    }

    .carousel img {
        max-height: 450px;
        /* Giới hạn chiều cao hình ảnh */
        width: 100%;
        /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng */
        object-fit: cover;
        /* Đảm bảo hình ảnh không bị méo */
        transition: transform 0.5s ease;
        /* Thêm hiệu ứng chuyển động */
    }

    .carousel img:hover {
        transform: scale(1.1);
        /* Phóng to hình ảnh khi hover */
    }

    .carousel-caption {
        font-size: 1.2rem;
        /* Tăng kích thước font chữ */
        /* background: rgba(0, 0, 0, 0.5); */
        /* Nền mờ cho caption */
        color: #fff;
        /* Màu chữ trắng */
        padding: 10px;
        border-radius: 5px;
    }

    .carousel-caption h3 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .carousel-caption .btn {
        font-size: 1rem;
        padding: 10px 20px;
        border-radius: 20px;
        transition: background-color 0.3s ease;
    }

    .carousel-caption .btn:hover {
        background-color: #0056b3;
        /* Đổi màu khi hover */
    }
    </style>

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="display-4 text-primary">Shop the Best Products</h1>
            <p class="lead text-muted">Explore the best products available for you at the best prices.</p>
        </div>
        <div>
            <a href="{{ route('orders.index') }}" class="btn btn-outline-dark position-relative">
                <i class="fas fa-shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                    {{ $cartCount ?? 0 }}
                </span>
            </a>
        </div>
    </div>

    <!-- Featured Products (Carousel) -->
    <div id="featuredProductsCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($products->take(5) as $product)
            <div class="carousel-item @if($loop->first) active @endif">
                @if($product->image)
                <img src="{{ asset($product->image) }}" class="d-block w-100" alt="Product Image">
                @else
                <img src="https://via.placeholder.com/1200x600" class="d-block w-100" alt="Placeholder Image">
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{ Str::limit($product->name, 40) }}</h3>
                    <a href="{{ route('products.showdetail2', $product->id) }}" class="btn btn-primary btn-lg">View
                        Details</a>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#featuredProductsCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#featuredProductsCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Category Section -->
    <div class="category-section mb-5">
        <h5>Explore Categories</h5>
        <div class="d-flex flex-wrap justify-content-start gap-3 mt-3">
            @foreach ($categories as $category)
            <a href="{{ route('filter', ['category' => $category->id]) }}" class="category-card"
                style="background-image: url('{{ asset($category->image) }}');">
                {{ $category->name }}
            </a>
            @endforeach
        </div>
    </div>

    <!-- Product Listing Section -->
    <div class="row">
        <!-- Filters Section -->
        <div class="col-md-3">
            <h5>Filters</h5>
            <form action="{{ route('filter') }}" method="GET">
                <div class="mb-3">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price">Price Range</label>
                    <input type="number" name="min_price" class="form-control" placeholder="Min Price"
                        value="{{ request('min_price') }}">
                    <input type="number" name="max_price" class="form-control mt-2" placeholder="Max Price"
                        value="{{ request('max_price') }}">
                </div>
                <button type="submit" class="btn btn-dark w-100">Apply Filters</button>
            </form>
        </div>

        <!-- Products Section -->
        <div class="col-md-9">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if($product->image)
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
                                <a href="{{ route('products.showdetail2', $product->id) }}"
                                    class="btn btn-dark btn-sm">View Details</a>
                                <span class="badge bg-secondary">${{ number_format($product->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection