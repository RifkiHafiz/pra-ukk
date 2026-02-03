@extends('layouts.app')
@section('content')
<style>
    /* Minimal custom styles - hanya yang tidak bisa digantikan Bootstrap */
    .btn-primary {
        background: linear-gradient(135deg, #0ea5e9, #0369a1);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0284c7, #075985);
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(14, 165, 233, 0.4);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0ea5e9;
        box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.15);
    }

    .file-upload-wrapper {
        border: 2px dashed #e2e8f0;
        background: #f8fafc;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-upload-wrapper:hover {
        border-color: #0ea5e9;
        background: #e0f2fe;
    }
</style>

<div class="bg-light min-vh-100 py-4">
    <div class="container">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary mb-0">
                <i class="bi bi-person-plus-fill me-2"></i>
                Edit Category
            </h3>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Back to Categories
            </a>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
        <div class="alert alert-danger border-0 rounded-3 mb-4" role="alert">
            <strong><i class="bi bi-exclamation-circle me-2"></i>Whoops!</strong> There were some problems with your input.
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Container -->
        <div class="card border-0 rounded-4 shadow-sm">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="category_name" class="form-label fw-semibold text-primary">
                                Category Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                   id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}"
                                   placeholder="Enter category name" required>
                            @error('category_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex gap-2 justify-content-end pt-3 border-top">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary px-4">
                            <i class="bi bi-x-circle me-2"></i>
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-2"></i>
                            Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
