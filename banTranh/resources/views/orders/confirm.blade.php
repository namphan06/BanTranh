@extends('products.layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Order Confirmation</h2>

    <div class="row">
        <!-- Product Info -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <img src="{{ asset($product->image) }}" class="card-img-top rounded-top" alt="Product Image"
                    style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ $product->detail }}</p>

                    <!-- Additional Product Information -->
                    <ul class="list-unstyled">
                        <li><strong>Size:</strong> {{ $product->size }}</li>
                        <li><strong>Material:</strong> {{ $product->material }}</li>
                        <li><strong>Frame:</strong> {{ $product->frame ? 'Yes' : 'No' }}</li>
                        <li><strong>Condition:</strong> {{ $product->condition }}</li>
                    </ul>

                    <!-- <p class="text-danger fs-4">${{ number_format($product->price, 2) }}</p> -->
                </div>
            </div>
        </div>

        <!-- User Info and Order Confirmation Combined -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <!-- User Info Section -->
                <div class="card-header bg-info text-white rounded-top">
                    <h4 class="mb-0">User Information</h4>
                </div>
                <div class="card-body">
                    <p><strong>Phone:</strong> {{ $request->phone }}</p>
                    <p><strong>Address:</strong> {{ $request->address }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                </div>

                <!-- Order Confirmation Section -->
                <div class="card-footer bg-success text-white mt-3">
                    <h4 class="alert-heading">Order Confirmed!</h4>
                    <p>Your order has been placed successfully and will be delivered to the provided address.</p>
                    <p><strong>Product Name:</strong> {{ $product->name }}</p>
                    <p><strong>Total Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    <p><strong>Estimated Delivery:</strong> Within 3-5 business days</p>

                    <a href="{{ route('products.index') }}" class="btn btn-outline-light mt-3 rounded-pill px-4 py-2">
                        <i class="fas fa-arrow-left"></i> Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.card {
    border-radius: 12px;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.2);
}

.card-img-top {
    object-fit: cover;
    height: 300px;
    border-radius: 12px 12px 0 0;
}

.card-body {
    padding: 15px;
}

.card-footer {
    background-color: #28a745;
    /* Green (slightly lighter) */
    padding: 20px;
    border-radius: 0 0 12px 12px;
}

.alert-heading {
    font-size: 1.6rem;
    font-weight: 600;
}

.btn-outline-light {
    border: 2px solid #ffffff;
    color: #ffffff;
}

.btn-outline-light:hover {
    background-color: #ffffff;
    color: #007bff;
}

.card-header {
    background-color: #17a2b8;
    /* Light blue */
    color: white;
    border-radius: 12px 12px 0 0;
    padding: 10px 15px;
    font-weight: bold;
}

.card-header h4 {
    margin: 0;
}

.card-footer {
    background-color: #e8f5e9;
    /* Lighter green */
}

.card-header,
.card-footer {
    border-radius: 12px;
}

@keyframes fadeInRight {
    0% {
        opacity: 0;
        transform: translateX(50px);
    }

    100% {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>
@endpush
@endsection