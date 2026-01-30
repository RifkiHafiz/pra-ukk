@extends('layouts.app')
@section('content')
<style>
    :root {
        --primary-blue: #0ea5e9;
        --blue-600: #0284c7;
        --blue-700: #0369a1;
        --blue-900: #0c4a6e;
        --light-blue: #38bdf8;
        --ultra-light-blue: #e0f2fe;
        --white: #ffffff;
        --gray-50: #f8fafc;
        --gray-100: #f1f5f9;
        --gray-200: #e2e8f0;
        --gray-600: #475569;
        --gray-800: #1e293b;
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
    }

    .page-container {
        background: var(--gray-50);
        min-height: 100vh;
        padding: 30px 0;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--blue-900);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .btn-back {
        background: white;
        color: var(--gray-600);
        border: 2px solid var(--gray-200);
        padding: 10px 25px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: var(--gray-100);
        color: var(--blue-900);
        border-color: var(--primary-blue);
    }

    .form-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 20px rgba(14, 165, 233, 0.08);
        overflow: hidden;
    }

    .form-body {
        padding: 40px;
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 600;
        color: var(--blue-900);
        margin-bottom: 10px;
        display: block;
        font-size: 0.95rem;
    }

    . {
        color: var(--danger);
        margin-left: 3px;
    }

    .form-control {
        width: 100%;
        border: 2px solid var(--gray-200);
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--white);
    }

    .form-control:focus {
        border-color: var(--primary-blue);
        outline: none;
        background: var(--white);
        box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.1);
    }

    .form-control::placeholder {
        color: var(--gray-600);
        opacity: 0.6;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .form-select {
        width: 100%;
        border: 2px solid var(--gray-200);
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
        cursor: pointer;
    }

    .form-select:focus {
        border-color: var(--primary-blue);
        outline: none;
        box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.1);
    }

    .input-group {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-prefix {
        position: absolute;
        left: 16px;
        color: var(--gray-600);
        font-weight: 600;
        pointer-events: none;
    }

    .input-group .form-control {
        padding-left: 40px;
    }

    .password-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--gray-600);
        cursor: pointer;
        padding: 5px;
        transition: color 0.3s ease;
    }

    .password-toggle:hover {
        color: var(--primary-blue);
    }

    .form-help {
        font-size: 0.875rem;
        color: var(--gray-600);
        margin-top: 6px;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        border: none;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .alert ul {
        margin: 8px 0 0 0;
        padding-left: 20px;
    }

    .alert ul li {
        margin-bottom: 4px;
    }

    .is-invalid {
        border-color: var(--danger) !important;
    }

    .invalid-feedback {
        color: var(--danger);
        font-size: 0.875rem;
        margin-top: 6px;
        display: block;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
        padding-top: 30px;
        border-top: 2px solid var(--gray-100);
        margin-top: 30px;
    }

    .btn {
        padding: 12px 35px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-blue), var(--blue-700));
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(14, 165, 233, 0.4);
        color: white;
    }

    .btn-secondary {
        background: var(--gray-200);
        color: var(--gray-800);
    }

    .btn-secondary:hover {
        background: var(--gray-600);
        color: white;
    }

    .file-upload-wrapper {
        border: 2px dashed var(--gray-200);
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
        background: var(--gray-50);
        cursor: pointer;
    }

    .file-upload-wrapper:hover {
        border-color: var(--primary-blue);
        background: var(--ultra-light-blue);
    }

    .file-upload-wrapper input[type="file"] {
        display: none;
    }

    .upload-icon {
        font-size: 3rem;
        color: var(--primary-blue);
        margin-bottom: 15px;
    }

    .upload-text {
        color: var(--gray-800);
        font-weight: 600;
        margin-bottom: 5px;
    }

    .upload-subtext {
        color: var(--gray-600);
        font-size: 0.875rem;
    }

    .preview-image {
        max-width: 200px;
        max-height: 200px;
        border-radius: 10px;
        margin-top: 15px;
        display: none;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .form-body {
            padding: 25px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="page-container">
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">
                <i class="bi bi-person-plus-fill"></i>
                Add New User
            </h1>
            <a href="{{ route('user.index') }}" class="btn-back">
                <i class="bi bi-arrow-left"></i>
                Back to Users
            </a>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong><i class="bi bi-exclamation-circle me-2"></i>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Container -->
        <div class="form-container">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-body">
                    <!-- Profile Picture Upload -->
                    <div class="form-group">
                        <label class="form-label">Profile Picture</label>
                        <div class="file-upload-wrapper" onclick="document.getElementById('profile_picture').click()">
                            <div class="upload-icon">
                                <i class="bi bi-cloud-upload"></i>
                            </div>
                            <div class="upload-text">Click to upload profile picture</div>
                            <div class="upload-subtext">PNG, JPG up to 2MB</div>
                            <input type="file"
                                   id="profile_picture"
                                   name="profile_picture"
                                   accept="image/*"
                                   onchange="previewImage(event)">
                            <img id="preview" class="preview-image" alt="Preview">
                        </div>
                        <div class="form-help">Optional: Upload a profile picture for this user</div>
                    </div>

                    <!-- Row 1: Full Name & Username -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="full_name" class="form-label">
                                Full Name <span class="">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('full_name') is-invalid @enderror"
                                   id="full_name"
                                   name="full_name"
                                   value="{{ old('full_name') }}"
                                   placeholder="Enter full name"
                                   >
                            @error('full_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username" class="form-label">
                                Username <span class="">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-prefix">@</span>
                                <input type="text"
                                       class="form-control @error('username') is-invalid @enderror"
                                       id="username"
                                       name="username"
                                       value="{{ old('username') }}"
                                       placeholder="username"
                                       >
                            </div>
                            @error('username')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <div class="form-help">Username must be unique</div>
                        </div>
                    </div>

                    <!-- Row 2: Email & Phone Number -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email" class="form-label">
                                Email <span class="">*</span>
                            </label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="user@example.com"
                                   >
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="tel"
                                   class="form-control @error('phone_number') is-invalid @enderror"
                                   id="phone_number"
                                   name="phone_number"
                                   value="{{ old('phone_number') }}"
                                   placeholder="+62 812-3456-7890">
                            @error('phone_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 3: Password & Role -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="password" class="form-label">
                                Password <span class="">*</span>
                            </label>
                            <div class="password-wrapper">
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       placeholder="Enter password"
                                       >
                                <button type="button" class="password-toggle" onclick="togglePassword()">
                                    <i class="bi bi-eye" id="password-icon"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <div class="form-help">Minimum 6 characters</div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="form-label">
                                Role <span class="">*</span>
                            </label>
                            <select class="form-select @error('role') is-invalid @enderror"
                                    id="role"
                                    name="role"
                                    >
                                <option value="">Select Role</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="borrower" {{ old('role') == 'borrower' ? 'selected' : '' }}>Borrower</option>
                                <option value="lender" {{ old('role') == 'lender' ? 'selected' : '' }}>Lender</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control @error('address') is-invalid @enderror"
                                  id="address"
                                  name="address"
                                  rows="4"
                                  placeholder="Enter full address">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i>
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i>
                            Create User
                        </button>
                    </div>
                </div>
            </form>
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
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
