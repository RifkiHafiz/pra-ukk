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
                <i class="bi bi-pencil-square me-2"></i>
                Edit Item
            </h3>
            <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Back to Items
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
                <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-primary">Item Image</label>
                        <div class="file-upload-wrapper rounded-3 p-4 text-center" onclick="document.getElementById('item_image').click()">
                            <i class="bi bi-cloud-upload display-4 text-primary d-block mb-3"></i>
                            <p class="fw-semibold text-dark mb-1">Click to upload item image</p>
                            <p class="text-muted small mb-0">PNG, JPG up to 2MB</p>
                            <input type="file" id="item_image" name="item_image" accept="image/*" class="d-none" onchange="previewImage(event)" readonly>
                            @if($item->item_image)
                                <img id="preview" class="img-thumbnail mt-3" style="max-width: 200px;" src="{{ asset('storage/' . $item->item_image) }}" alt="Preview">
                            @else
                                <img id="preview" class="img-thumbnail mt-3 d-none" style="max-width: 200px;" alt="Preview">
                            @endif
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="item_code" class="form-label fw-semibold text-primary">
                                Item Code <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('item_code') is-invalid @enderror"
                                   id="item_code" name="item_code" value="{{ old('item_code', $item->item_code) }}"
                                   placeholder="Enter item code" readonly>
                            @error('item_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Item code must be unique</div>
                        </div>

                        <div class="col-md-6">
                            <label for="item_name" class="form-label fw-semibold text-primary">
                                Item Name <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control border-start-0 @error('item_name') is-invalid @enderror"
                                       id="item_name" name="item_name" value="{{ old('item_name', $item->item_name) }}"
                                       placeholder="Enter item name" readonly>
                                @error('item_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="category_id" class="form-label fw-semibold text-primary">
                                Category <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                    id="category_id" name="category_id" readonly>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="total_quantity" class="form-label fw-semibold text-primary">
                                Total Quantity <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('total_quantity') is-invalid @enderror"
                                   id="total_quantity" name="total_quantity" value="{{ old('total_quantity', $item->total_quantity) }}"
                                   placeholder="Enter total quantity" readonly>
                            @error('total_quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="available_quantity" class="form-label fw-semibold text-primary">
                                Available Quantity <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('available_quantity') is-invalid @enderror"
                                   id="available_quantity" name="available_quantity" value="{{ old('available_quantity', $item->available_quantity) }}"
                                   placeholder="Enter available quantity" readonly>
                            @error('available_quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="condition" class="form-label fw-semibold text-primary">
                                Condition <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('condition') is-invalid @enderror" id="condition" name="condition" readonly>
                                <option value="">Select Condition</option>
                                <option value="Good" {{ old('condition', $item->condition) == 'Good' ? 'selected' : '' }}>Good</option>
                                <option value="Damaged" {{ old('condition', $item->condition) == 'Damaged' ? 'selected' : '' }}>Damaged</option>
                            </select>
                            @error('condition')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex gap-2 justify-content-end pt-3 border-top">
                        <a href="{{ route('items.index') }}" class="btn btn-secondary px-4">
                            <i class="bi bi-x-circle me-2"></i>
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-2"></i>
                            Update Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Preview uploaded image
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }

            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
