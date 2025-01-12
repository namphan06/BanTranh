@extends('products.layout')

@section('content')

<!-- Phần header giới thiệu -->
<div class="container-fluid bg-dark text-white py-5 text-center"
    style="background-image: url('https://source.unsplash.com/1600x900/?gallery,art'); background-size: cover; background-position: center;">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h1 class="display-4">Learn More About Us</h1>
            <p class="lead text-white-50">We are dedicated to providing the best in art and home décor. Read on to learn
                more about our vision, services, and why we are the best choice for your artistic needs.</p>
        </div>
    </div>
</div>

<!-- Phần thông tin chi tiết -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Who We Are</h2>
            <p>We are a team of passionate artists and curators committed to bringing high-quality artwork and décor to
                your home or office. Our goal is to make art accessible and enjoyable for everyone, whether you're a
                seasoned art collector or a first-time buyer.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Our Vision</h2>
            <p>Our vision is to create spaces that inspire creativity and positivity. We believe that art has the power
                to transform any environment, bringing joy and beauty to all who experience it.</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/IMG_8044.JPG') }}" alt="Art Studio" class="img-fluid rounded-4 shadow">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/IMG_8055.JPG') }}" alt="Art Exhibition" class="img-fluid rounded-4 shadow">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Our Services</h2>
            <p>We offer a wide range of services to cater to your needs, including:</p>
            <ul class="list-unstyled">
                <li><i class="fa fa-check-circle text-success me-2"></i> Custom Art Commissions</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Art Installation Services</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Art Curation for Events and Spaces</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Framing and Restoration Services</li>
            </ul>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-md-12">
            <h2 class="mb-4">Why Choose Us?</h2>
            <ul class="list-unstyled">
                <li><i class="fa fa-check-circle text-success me-2"></i> High-quality, handpicked artwork</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Affordable prices</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Dedicated customer support</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Secure online ordering and delivery</li>
                <li><i class="fa fa-check-circle text-success me-2"></i> Free consultation for custom projects</li>
            </ul>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-md-12">
            <h2 class="mb-4">Contact Us</h2>
            <p>If you have any questions or would like to know more about our services, feel free to get in touch with
                us. Our team is here to assist you with any inquiries you may have.</p>
            <p><strong>Email:</strong> info@artistrygallery.com</p>
            <p><strong>Phone:</strong> +1 234 567 890</p>
            <p><strong>Address:</strong> 123 Art Street, City, Country</p>
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

/* Phong cách cho hình ảnh */
img.rounded-4 {
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

/* Phong cách cho danh sách */
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