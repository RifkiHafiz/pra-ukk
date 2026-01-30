@extends('layouts.app')
@section('content')
<style>
    :root {
        --primary-blue: #0ea5e9;
        --blue-600: #0284c7;
        --blue-700: #0369a1;
        --blue-800: #075985;
        --blue-900: #0c4a6e;
        --light-blue: #38bdf8;
        --ultra-light-blue: #e0f2fe;
        --white: #ffffff;
        --gray-50: #f8fafc;
        --gray-100: #f1f5f9;
        --gray-200: #e2e8f0;
        --gray-600: #475569;
        --gray-800: #1e293b;
    }

    .page-header {
        background: linear-gradient(135deg, var(--primary-blue), var(--blue-700));
        color: white;
        padding: 30px 0;
        margin: -20px -15px 30px -15px;
        border-radius: 0 0 20px 20px;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
    }

    .page-subtitle {
        opacity: 0.9;
        margin-top: 8px;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 2px 20px rgba(14, 165, 233, 0.1);
        margin-bottom: 30px;
    }

    .card-header {
        background: white;
        border-bottom: 2px solid var(--gray-100);
        padding: 20px 25px;
        border-radius: 15px 15px 0 0 !important;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--blue-900);
        margin: 0;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-blue), var(--blue-700));
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(14, 165, 233, 0.3);
        background: linear-gradient(135deg, var(--blue-600), var(--blue-800));
    }

    .btn-sm {
        padding: 6px 15px;
        font-size: 0.875rem;
    }

    .btn-warning {
        background: #f59e0b;
        border: none;
        color: white;
    }

    .btn-warning:hover {
        background: #d97706;
        color: white;
    }

    .btn-danger {
        background: #ef4444;
        border: none;
    }

    .btn-danger:hover {
        background: #dc2626;
    }

    .btn-info {
        background: var(--primary-blue);
        border: none;
        color: white;
    }

    .btn-info:hover {
        background: var(--blue-700);
        color: white;
    }

    .search-box {
        position: relative;
        max-width: 300px;
    }

    .search-box input {
        padding-left: 40px;
        border: 2px solid var(--gray-200);
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .search-box input:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
        outline: none;
    }

    .search-box i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-600);
    }

    .table-container {
        overflow-x: auto;
    }

    .table {
        margin: 0;
    }

    .table thead {
        background: var(--ultra-light-blue);
    }

    .table thead th {
        color: var(--blue-900);
        font-weight: 600;
        border: none;
        padding: 15px;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table tbody td {
        padding: 15px;
        vertical-align: middle;
        border-bottom: 1px solid var(--gray-100);
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background: var(--gray-50);
    }

    .badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .badge-success {
        background: #10b981;
        color: white;
    }

    .badge-warning {
        background: #f59e0b;
        color: white;
    }

    .badge-danger {
        background: #ef4444;
        color: white;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-blue), var(--blue-700));
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        margin-right: 10px;
    }

    .user-info {
        display: inline-block;
        vertical-align: middle;
    }

    .user-name {
        font-weight: 600;
        color: var(--blue-900);
        display: block;
    }

    .user-email {
        font-size: 0.85rem;
        color: var(--gray-600);
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .pagination {
        margin-top: 20px;
    }

    .pagination .page-link {
        color: var(--primary-blue);
        border: 1px solid var(--gray-200);
        padding: 8px 15px;
        margin: 0 3px;
        border-radius: 6px;
    }

    .pagination .page-link:hover {
        background: var(--primary-blue);
        color: white;
        border-color: var(--primary-blue);
    }

    .pagination .page-item.active .page-link {
        background: var(--primary-blue);
        border-color: var(--primary-blue);
    }

    .modal-header {
        background: linear-gradient(135deg, var(--primary-blue), var(--blue-700));
        color: white;
        border-radius: 15px 15px 0 0;
    }

    .modal-content {
        border-radius: 15px;
        border: none;
    }

    .form-label {
        font-weight: 600;
        color: var(--blue-900);
        margin-bottom: 8px;
    }

    .form-control {
        border: 2px solid var(--gray-200);
        border-radius: 8px;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
        outline: none;
    }

    .alert {
        border-radius: 10px;
        border: none;
        padding: 15px 20px;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--gray-200);
        margin-bottom: 20px;
    }

    .empty-state h4 {
        color: var(--gray-600);
        margin-bottom: 10px;
    }

    .empty-state p {
        color: var(--gray-600);
    }
</style>

<div class="container-fluid">
    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Main Card -->
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title">
                        <i class="bi bi-people-fill me-2"></i>
                        All Users
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>
                        Add New User
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Search and Filter -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" id="searchInput" class="form-control" placeholder="Search users...">
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <select class="form-select" style="max-width: 200px; display: inline-block;">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="suspended">Suspended</option>
                    </select>
                </div>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table class="table" id="usersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Phone Number</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <div class="user-avatar">{{ $user->profile_picture }}</div>
                                    <div class="user-info">
                                        <span class="user-name">{{ $user->full_name ?? 'No Name' }}</span>
                                        <span class="user-email">{{ $user->email }}</span>
                                    </div>
                                </td>
                                <td>{{ $user->username }}</td>
                                <td><span class="badge badge-success">{{ $user->role }}</span></td>
                                <td>{{ $user->phone_number ?? '0888' }}</td>
                                <td>
                                    <div class="action-buttons justify-content-center">
                                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(1)" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div>
                                data belum tersedia
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-person-plus me-2"></i>
                    Create New User
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-pencil-square me-2"></i>
                    Edit User
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" value="Rifki Ahmad" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="edit_username" name="username" value="rifki_ahmad" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" value="rifki@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_password" class="form-label">Password (leave blank to keep current)</label>
                        <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="edit_role" class="form-label">Role</label>
                        <select class="form-select" id="edit_role" name="role" required>
                            <option value="admin" selected>Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Status</label>
                        <select class="form-select" id="edit_status" name="status" required>
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View User Modal -->
<div class="modal fade" id="viewUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-person-circle me-2"></i>
                    User Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <div class="user-avatar" style="width: 80px; height: 80px; font-size: 2rem; margin: 0 auto;">R</div>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 35%;">Full Name</th>
                        <td>Rifki Ahmad</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>rifki_ahmad</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>rifki@example.com</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td><span class="badge badge-success">Admin</span></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><span class="badge badge-success">Active</span></td>
                    </tr>
                    <tr>
                        <th>Joined Date</th>
                        <td>January 15, 2024</td>
                    </tr>
                    <tr>
                        <th>Last Login</th>
                        <td>January 30, 2024 - 10:30 AM</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this user? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="#" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-2"></i>
                        Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
