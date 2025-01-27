@extends('products.layout')

@section('content')

<div class="container mt-5">
    <div class="row">

        @php $product_id = $product->id; @endphp
        <!-- Product Image -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    @if($product->image)
                    <img src="{{ asset($product->image) }}" class="img-fluid rounded shadow" alt="Product Image">
                    @else
                    <img src="https://via.placeholder.com/500x500" class="img-fluid rounded shadow"
                        alt="Placeholder Image">
                    @endif
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="display-5 text-primary fw-bold">{{ $product->name }}</h1>

            <div class="border rounded p-3 bg-light">
                <p class="mb-1"><strong>Price:</strong> <span
                        class="text-danger fs-4">${{ number_format($product->price, 2) }}</span></p>
                <p class="mb-1"><strong>Size:</strong> {{ $product->size ?? 'Not specified' }}</p>
                <p class="mb-1"><strong>Material:</strong> {{ $product->material ?? 'Not specified' }}</p>
                <p class="mb-1"><strong>Frame:</strong>
                    @if($product->frame)
                    <span class="text-success">Yes</span>
                    @else
                    <span class="text-danger">No</span>
                    @endif
                </p>
                <p class="mb-1"><strong>Condition:</strong> {{ $product->condition ?? 'Not specified' }}</p>

                <!-- Product Detail with Learn More -->
                <p class="text-muted fs-5 text-truncate" style="max-height: 4.5em; overflow: hidden;">
                    {{ $product->detail }}</p>
                <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#detailModal">Learn
                    More</button>
            </div>

            <div class="mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-outline-dark">
                    <i class="fas fa-arrow-left"></i> Back to Products
                </a>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#buyModal">
                    <i class="fas fa-shopping-cart"></i> Buy Now
                </button>
            </div>
        </div>
    </div>

    <!-- Horizontal Scrollable Product List -->
    <div class="mt-5">
        <h3>Other Products in this Category</h3>
        <div class="product-carousel d-flex overflow-auto">
            @foreach ($products_category as $product)
            <div class="col-md-3 mb-4">
                <!-- Thay col-md-4 thành col-md-3 để giảm chiều rộng -->
                <!-- Increased width of the product card -->
                <div class="card shadow-sm">
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
                            <a href="{{ route('products.showdetail2', ['id' => $product->id, 'category_id' => $product->category_id]) }}"
                                class="btn btn-dark btn-sm">View Details</a>
                            <span class="badge bg-secondary">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="mt-5">
        <h3>Customer Reviews</h3>

        <!-- Bộ lọc đánh giá -->
        <div class="mb-3">
            <div class="btn-group" role="group">
                <a href="{{ request()->url() }}"
                    class="btn btn-outline-primary {{ !request('stars') ? 'active' : '' }}">
                    Tất cả ({{ $rates->count() }})
                </a>
                @for($i = 5; $i >= 1; $i--)
                <a href="{{ request()->url() }}?stars={{ $i }}"
                    class="btn btn-outline-primary {{ request('stars') == $i ? 'active' : '' }}">
                    {{ $i }} sao ({{ $allRates->where('stars', $i)->count() }})
                </a>
                @endfor
            </div>
        </div>

        <!-- Hiển thị đánh giá -->
        @foreach ($rates as $rating)
        <div class="review-card mb-3 p-3 border rounded">
            <p><strong>Email:</strong> {{ $rating->email }}</p>
            <p><strong>Rating:</strong>
                @for ($i = 1; $i <= $rating->stars; $i++)
                    <i class="fas fa-star text-warning"></i>
                    @endfor
                    @for ($i = $rating->stars + 1; $i <= 5; $i++) <i class="fas fa-star text-muted"></i>
                        @endfor
            </p>
            <p><strong>Comment:</strong> {{ $rating->comment }}</p>

            @if($rating->image)
            <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset($rating->image) }}">
                <img src="{{ asset($rating->image) }}" class="img-fluid review-img" alt="Review Image"
                    style="width: 100px; height: 50px; object-fit: cover;">
            </a>
            @endif
        </div>
        @endforeach
    </div>
</div>

<!-- Modal for Product Details -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Product Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted fs-5">{{ $product->detail }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Buy Now -->
<div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="buyModalLabel">Enter Your Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.buy', $product_id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="phone" class="form-label"><i class="fas fa-phone"></i> Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter your phone number" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><i class="fas fa-map-marker-alt"></i> Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"
                            placeholder="Enter your address" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Close
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> Confirm Order
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal to display image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Review Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" id="modalImage" class="img-fluid" alt="Review Image">
            </div>
        </div>
    </div>
</div>

<script>
// Sử dụng JavaScript để lấy ảnh từ data-bs-image
var reviewImages = document.querySelectorAll('[data-bs-image]');
reviewImages.forEach(function(element) {
    element.addEventListener('click', function() {
        var imageUrl = element.getAttribute('data-bs-image');
        document.getElementById('modalImage').src = imageUrl;
    });
});
</script>

@endsection

@push('styles')
<style>
.product-carousel {
    display: flex;
    overflow-x: auto;
    gap: 15px;
    /* Giảm khoảng cách giữa các phần tử */
    padding-bottom: 10px;
}


.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
    /* Phóng to khi hover */
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    /* Thêm bóng đổ */
}

.card-img-top {
    object-fit: cover;
    height: 200px;
}

.card:hover img {
    transform: scale(1.1);
    /* Phóng to hình ảnh khi hover */
}
</style>
@endpush