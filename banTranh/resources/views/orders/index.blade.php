@extends('products.layout')

@section('content')
<div class="container mt-5">
    <h1>Order List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Order Time</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>${{ $order->price }}</td>
                <td><img src="{{ asset($order->img) }}" alt="Order Image" width="100"></td>
                <td>{{ $order->order_time }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->email }}</td>
                <td>
                    @if($order->check)
                    <!-- Hiển thị tích xanh nếu check = true -->
                    <i class="fa fa-check-circle text-success"></i> Rated
                    @else
                    <!-- Nút mở modal đánh giá nếu check = false -->
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#rateModal{{ $order->id }}">
                        ⭐ Rate Now
                    </button>
                    @endif
                </td>
            </tr>

            <!-- Modal đánh giá -->
            <div class="modal fade" id="rateModal{{ $order->id }}" tabindex="-1" aria-labelledby="rateModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rateModalLabel">Rate Order: {{ $order->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form
                                action="{{ route('rate.store', ['product_id' => $order->product_id, 'email' => $order->email]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="stars" class="form-label">Stars</label>
                                    <select name="stars" class="form-select">
                                        <option value="1">⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Comment</label>
                                    <textarea name="comment" class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Rating</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>

    <!-- Nút Back -->
    <a href="{{ route('products.index') }}" class="btn btn-dark mt-3">Back</a>
</div>
@endsection