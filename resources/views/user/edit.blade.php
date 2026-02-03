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
                 Edit User
            </h3>
            <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Back to Users
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
                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Profile Picture Upload -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-primary">Profile Picture</label>
                        <div class="file-upload-wrapper rounded-3 p-4 text-center" onclick="document.getElementById('profile_picture').click()">
                            <i class="bi bi-cloud-upload display-4 text-primary d-block mb-3"></i>
                            <p class="fw-semibold text-dark mb-1">Click to upload profile picture</p>
                            <p class="text-muted small mb-0">PNG, JPG up to 2MB</p>
                            <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="d-none" onchange="previewImage(event)">
                            <img id="preview" class="img-thumbnail mt-3 d-none" style="max-width: 200px;" alt="Preview">
                        </div>
                        <div class="form-text">Optional: Upload a profile picture for this user</div>
                    </div>

                    <!-- Row 1: Full Name & Username -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="full_name" class="form-label fw-semibold text-primary">
                                Full Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                   id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}"
                                   placeholder="Enter full name" required>
                            @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="username" class="form-label fw-semibold text-primary">
                                Username <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">@</span>
                                <input type="text" class="form-control border-start-0 @error('username') is-invalid @enderror"
                                       id="username" name="username" value="{{ old('username', $user->username) }}"
                                       placeholder="username" required>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text">Username must be unique</div>
                        </div>
                    </div>

                    <!-- Row 2: Email & Phone Number -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold text-primary">
                                Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email', $user->email) }}"
                                   placeholder="user@example.com" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="phone_number" class="form-label fw-semibold text-primary">Phone Number</label>
                            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                                   id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}"
                                   placeholder="+62 812-3456-7890">
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 3: Password & Role -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label fw-semibold text-primary">
                                Password <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" placeholder="Enter password" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                    <i class="bi bi-eye" id="password-icon"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text">Minimum 6 characters</div>
                        </div>

                        <div class="col-md-6">
                            <label for="role" class="form-label fw-semibold text-primary">
                                Role <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                <option value="">Select Role</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="borrower" {{ old('role') == 'borrower' ? 'selected' : '' }}>Borrower</option>
                                <option value="lender" {{ old('role') == 'lender' ? 'selected' : '' }}>Lender</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="form-label fw-semibold text-primary">Address</label>
                        <textarea class="form-control @error('address') is-invalid @enderror"
                                  id="address" name="address" rows="4"
                                  placeholder="Enter full address">{{ old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex gap-2 justify-content-end pt-3 border-top">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary px-4">
                            <i class="bi bi-x-circle me-2"></i>
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-2"></i>
                            Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const passwordIcon = document.getElementById('password-icon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            passwordIcon.classList.remove('bi-eye');
            passwordIcon.classList.add('bi-eye-slash');
        } else {
            passwordField.type = 'password';
            passwordIcon.classList.remove('bi-eye-slash');
            passwordIcon.classList.add('bi-eye');
        }
    }

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
