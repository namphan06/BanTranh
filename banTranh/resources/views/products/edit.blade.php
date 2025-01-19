@extends('products.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit Product</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('products.admin') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Name:</strong></label>
                <input type="text" name="name" value="{{ $product->name }}"
                    class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Name">
                @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
                <textarea class="form-control @error('detail') is-invalid @enderror" style="height:150px" name="detail"
                    id="inputDetail" placeholder="Detail">{{ $product->detail }}</textarea>
                @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPrice" class="form-label"><strong>Price:</strong></label>
                <input type="number" name="price" value="{{ $product->price }}"
                    class="form-control @error('price') is-invalid @enderror" id="inputPrice" placeholder="Price">
                @error('price')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputSize" class="form-label"><strong>Size:</strong></label>
                <input type="text" name="size" value="{{ $product->size }}"
                    class="form-control @error('size') is-invalid @enderror" id="inputSize"
                    placeholder="Size (e.g., 50x70 cm)">
                @error('size')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputMaterial" class="form-label"><strong>Material:</strong></label>
                <input type="text" name="material" value="{{ $product->material }}"
                    class="form-control @error('material') is-invalid @enderror" id="inputMaterial"
                    placeholder="Material (e.g., Canvas, Oil Paint)">
                @error('material')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Frame:</strong></label>
                <div>
                    <input type="radio" name="frame" value="1" id="frameYes" @if($product->frame == 1) checked @endif>
                    <label for="frameYes">Yes</label>

                    <input type="radio" name="frame" value="0" id="frameNo" @if($product->frame == 0) checked @endif>
                    <label for="frameNo">No</label>
                </div>
                @error('frame')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputCondition" class="form-label"><strong>Condition:</strong></label>
                <input type="text" name="condition" value="{{ $product->condition }}"
                    class="form-control @error('condition') is-invalid @enderror" id="inputCondition"
                    placeholder="Condition (e.g., New, Used)">
                @error('condition')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputImage" class="form-label"><strong>Image:</strong></label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                    id="inputImage">

                @if($product->image)
                <div class="mt-2">
                    <strong>Current Image:</strong><br>
                    <img src="{{ asset($product->image) }}" alt="Product Image" class="img-thumbnail" width="100">
                </div>
                @endif

                @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </form>

    </div>
</div>
@endsection