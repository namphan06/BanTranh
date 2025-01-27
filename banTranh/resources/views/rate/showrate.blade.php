@extends('products.layout')

@section('content')
<div class="container mt-5">


    <!-- Customer Reviews Table -->
    <div class="mt-5">
        <h3>Customer Reviews</h3>
        @if($rates->isEmpty())
        <p>No ratings found for this product.</p>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Stars</th>
                    <th>Comment</th>
                    <th>Image</th>
                    <th>Rated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rates as $rating)
                <tr>
                    <td>{{ str_repeat('⭐', $rating->stars) }}</td>
                    <td>{{ $rating->comment }}</td>
                    <td>
                        @if($rating->image)
                        <img src="{{ asset($rating->image) }}" width="50">
                        @endif
                    </td>
                    <td>{{ $rating->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <!-- Show Product Button -->
    <a href="{{ route('products.showrate', $product_id) }}" class="btn btn-primary mt-3">Show Product</a>

    <!-- Back Button -->
    <a href="{{ route('categories.index') }}" class="btn btn-dark mt-3">Back</a>
</div>
@endsection