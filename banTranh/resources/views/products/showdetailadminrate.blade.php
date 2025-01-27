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
                <a href="{{ url()->previous() }}" class="btn btn-outline-dark">
                    <i class="fas fa-arrow-left"></i> Back
                </a>

            </div>
        </div>
    </div>

    <!-- Customer Reviews -->
    <div class="mt-5">
        <h3>Customer Reviews (Average Rating: {{ number_format($averageRating, 2) }})</h3>
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
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
}

.card-img-top {
    object-fit: cover;
    height: 200px;
}

.card:hover img {
    transform: scale(1.1);
}
</style>
@endpush