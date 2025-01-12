@extends('products.layout')
@section('content')

<div class="card mt-5">
    <h2 class="card-header">Categories</h2>
    <div class="card-body">

        <!-- Nút tạo danh mục mới -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i> Add New
                Category</a>
        </div>

        <!-- Hiển thị thông báo thành công nếu có -->
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif

        <!-- Bảng danh sách các danh mục -->
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" width="50">
                    </td>
                    <td>
                        <!-- Nút xem sản phẩm của danh mục -->
                        <a href="{{ route('categories.showProducts', $category->id) }}"
                            class="btn btn-primary btn-sm">View
                            Products</a>


                        <!-- Nút chỉnh sửa danh mục -->
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Nút xóa danh mục -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>

                        <!-- Nút tạo sản phẩm mới cho danh mục này -->
                        <a href="{{ route('categories.createProduct',  $category->id) }}"
                            class="btn btn-info btn-sm">Create Product</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Hiển thị phân trang -->
        <div class="mt-3">
            {{ $categories->links() }}
        </div>

    </div>
</div>

@endsection