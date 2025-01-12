@extends('products.layout')

@section('content')

<!-- Phần header giới thiệu -->
<div class="container-fluid bg-dark text-white py-5 text-center"
    style="background-image: url('https://source.unsplash.com/1600x900/?gallery,art'); background-size: cover; background-position: center;">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <img src="https://source.unsplash.com/200x200/?logo,art" alt="Shop Logo"
                class="img-fluid rounded-circle mb-4">
            <h1 class="display-4">Welcome to Artistry Gallery</h1>
            <p class="lead text-white-50">We bring life to your walls with our exquisite collection of artwork. Discover
                creativity like never before.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg rounded-pill px-5">Explore Now</a>
        </div>
    </div>
</div>

<!-- Phần carousel tranh chạy lướt -->
<div id="artCarousel" class="carousel slide my-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="{{ asset('images/ảnh_1.JPG') }}" class="d-block w-100 rounded-4 shadow-lg" alt="Artwork 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Artwork 1</h5>
                <p>Bring elegance and creativity to your space.</p>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="{{ asset('images/IMG_8055.JPG') }}" class="d-block w-100 rounded-4 shadow-lg" alt="Artwork 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Artwork 2</h5>
                <p>Bring elegance and creativity to your space.</p>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="{{ asset('images/IMG_7721.JPG') }}" class="d-block w-100 rounded-4 shadow-lg" alt="Artwork 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Artwork 3</h5>
                <p>Bring elegance and creativity to your space.</p>
            </div>
        </div>
        <!-- Slide 4 -->
        <div class="carousel-item">
            <img src="{{ asset('images/IMG_7886.JPG') }}" class="d-block w-100 rounded-4 shadow-lg" alt="Artwork 4">
            <div class="carousel-caption d-none d-md-block">
                <h5>Artwork 4</h5>
                <p>Bring elegance and creativity to your space.</p>
            </div>
        </div>
        <!-- Slide 5 -->
        <div class="carousel-item">
            <img src="{{ asset('images/IMG_7900.JPG') }}" class="d-block w-100 rounded-4 shadow-lg" alt="Artwork 5">
            <div class="carousel-caption d-none d-md-block">
                <h5>Artwork 5</h5>
                <p>Bring elegance and creativity to your space.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#artCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#artCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Phần giới thiệu chi tiết -->
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/IMG_8044.JPG') }}" alt="Art Studio" class="img-fluid rounded-4 shadow">
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">Why Choose Us?</h2>
            <ul class="list-unstyled">
                <li><i class="fa fa-check-circle text-success me-2"></i> Premium Quality Artworks</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Custom Framing Options</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Affordable Prices</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Free Delivery for Orders Over $100</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Exclusive Limited Edition Pieces</li>
            </ul>

            <a href="{{ route('products.learnMore') }}" class="btn btn-outline-dark mt-4">Learn More</a>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Phong cách phần header */
.bg-dark {
    background-color: rgba(0, 0, 0, 0.8) !important;
}

/* Phong cách cho logo */
img.rounded-circle {
    border: 5px solid #fff;
}

.carousel-img {
    height: 80px;
    /* Thay đổi kích thước theo ý muốn */
    max-width: 100%;
    /* Đảm bảo ảnh không bị vượt quá khung */
    border-radius: 10px;
}

/* Phong cách cho carousel */
.carousel-item img {
    object-fit: cover;
    width: 100%;
    height: 300px;
    /* Đặt chiều cao phù hợp */
    max-height: 400px;
    border-radius: 15px;
}

/* Phong cách phần giới thiệu */
ul.list-unstyled {
    font-size: 1.2rem;
    line-height: 2;
}

ul.list-unstyled li i {
    font-size: 1.5rem;
}

/* Button hover */
.btn-outline-dark:hover {
    background-color: #333;
    color: #fff;
}
</style>
@endpush