@extends('products.layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            @if($product->image)
            <img src="{{ asset($product->image) }}" class="img-fluid rounded shadow" alt="Product Image">
            @else
            <img src="https://via.placeholder.com/500x500" class="img-fluid rounded shadow" alt="Placeholder Image">
            @endif
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="display-5 text-primary">{{ $product->name }}</h1>
            <p class="text-muted">{{ $product->detail }}</p>
            <a href="{{ route('products.index') }}" class="btn btn-dark mt-3">Back to Products</a>
            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#buyModal">Buy</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="buyModalLabel">Enter Your Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.buy', $product->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter your phone number" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"
                            placeholder="Enter your address" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Confirm Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection