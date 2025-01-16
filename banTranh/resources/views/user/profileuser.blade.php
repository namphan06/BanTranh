@extends('products.layout')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center" style="background-color: #e9ecef;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 100%; max-width: 450px; background-color: #f8f9fa;">
        <div class="card-header text-center text-white py-5 rounded-top"
            style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
            <i class="fas fa-user-circle fa-8x mb-3"></i>
            <h3 class="fw-bold mb-1">{{ $user->name }}</h3>
            <p class="mb-0 fs-6">{{ $user->email }}</p>
        </div>
        <div class="card-body text-center py-3">
            <p class="text-muted fs-6 mb-3">You are successfully logged in.</p>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm px-4 me-2">Back</a>
            <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm px-4">Logout</a>
        </div>
    </div>
</div>
@endsection