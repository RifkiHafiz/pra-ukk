@extends('layouts.app')
@section('content')

<style>
    .stat-card {
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(14, 165, 233, 0.15);
    }

    .stat-card.primary {
        border-left-color: #0ea5e9;
    }

    .stat-card.success {
        border-left-color: #10b981;
    }

    .stat-card.warning {
        border-left-color: #f59e0b;
    }

    .stat-card.danger {
        border-left-color: #ef4444;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 28px;
    }

    .activity-item {
        transition: background-color 0.2s ease;
    }

    .activity-item:hover {
        background-color: #f8fafc;
    }
</style>

<div class="bg-light min-vh-100 py-4">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="mb-4">
            <h2 class="fw-bold text-primary mb-1">
                <i class="bi bi-clipboard-data me-2"></i>
                Dashboard
            </h2>
            <p class="text-muted mb-0">Welcome back! Here's an overview of your library system</p>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <!-- Total Users -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 rounded-4 shadow-sm stat-card primary h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted small mb-1">Total Users</p>
                                <h2 class="fw-bold mb-0">{{ $totalUsers }}</h2>
                            </div>
                            <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Items -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 rounded-4 shadow-sm stat-card success h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted small mb-1">Total Items</p>
                                <h2 class="fw-bold mb-0">{{ $totalItems }}</h2>
                            </div>
                            <div class="stat-icon bg-success bg-opacity-10 text-success">
                                <i class="bi bi-box-seam-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Loans -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 rounded-4 shadow-sm stat-card warning h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted small mb-1">Total Loans</p>
                                <h2 class="fw-bold mb-0">{{ $totalLoans }}</h2>
                            </div>
                            <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                                <i class="bi bi-clipboard-check-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Returns -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 rounded-4 shadow-sm stat-card danger h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted small mb-1">Total Returns</p>
                                <h2 class="fw-bold mb-0">{{ $totalReturns }}</h2>
                            </div>
                            <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                                <i class="bi bi-arrow-return-left"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Loan Status Breakdown -->
            <div class="col-12 col-lg-6">
                <div class="card border-0 rounded-4 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">
                            <i class="bi bi-pie-chart-fill me-2 text-primary"></i>
                            Loan Status Breakdown
                        </h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="border rounded-3 p-3 text-center">
                                    <div class="badge bg-info bg-opacity-10 text-info rounded-pill px-3 py-2 mb-2">
                                        <i class="bi bi-clock-history me-1"></i>
                                        Submitted
                                    </div>
                                    <h4 class="fw-bold mb-0">{{ $submittedLoans }}</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border rounded-3 p-3 text-center">
                                    <div class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 mb-2">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Approved
                                    </div>
                                    <h4 class="fw-bold mb-0">{{ $approvedLoans }}</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border rounded-3 p-3 text-center">
                                    <div class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-2 mb-2">
                                        <i class="bi bi-hourglass-split me-1"></i>
                                        Waiting
                                    </div>
                                    <h4 class="fw-bold mb-0">{{ $waitingLoans }}</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border rounded-3 p-3 text-center">
                                    <div class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-2">
                                        <i class="bi bi-check-all me-1"></i>
                                        Returned
                                    </div>
                                    <h4 class="fw-bold mb-0">{{ $returnedLoans }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="col-12 col-lg-6">
                <div class="card border-0 rounded-4 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0">
                                <i class="bi bi-activity me-2 text-primary"></i>
                                Recent Activities
                            </h5>
                            @if (Auth::user()->role === 'Admin')
                                <a href="{{ route('activity-logs.index') }}" class="btn btn-sm btn-outline-primary rounded-3">
                                    View All
                                </a>
                            @endif
                        </div>
                        <div class="activity-list">
                            @forelse($recentActivities as $activity)
                                <div class="activity-item p-3 rounded-3 mb-2">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                                 style="width: 40px; height: 40px; background: linear-gradient(135deg, #0ea5e9, #0369a1);">
                                                {{ strtoupper(substr($activity->user->username ?? 'U', 0, 1)) }}
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-1 fw-semibold small">{{ $activity->user->username ?? 'Unknown User' }}</p>
                                            <p class="mb-1 text-muted small">{{ $activity->activity }}</p>
                                            <p class="mb-0 text-muted" style="font-size: 0.75rem;">
                                                <i class="bi bi-clock me-1"></i>
                                                {{ $activity->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox display-4 opacity-25 d-block mb-3"></i>
                                    <p class="mb-0">No recent activities</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row g-4 mt-2">
            <div class="col-12">
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">
                            <i class="bi bi-lightning-fill me-2 text-primary"></i>
                            Quick Actions
                        </h5>
                        <div class="row g-3 justify-content-center">
                            @if (Auth::user()->role !== 'Staff')
                                <div class="col-6 col-md-3">
                                    <a href="{{ route('loans.index') }}" class="btn btn-outline-primary w-100 py-3 rounded-3">
                                        <i class="bi bi-plus-circle d-block mb-2" style="font-size: 24px;"></i>
                                        <span class="small">New Loan</span>
                                    </a>
                                </div>
                                @if (Auth::user()->role === 'Admin')
                                    <div class="col-6 col-md-3">
                                        <a href="{{ route('items.create') }}" class="btn btn-outline-success w-100 py-3 rounded-3">
                                            <i class="bi bi-box-seam d-block mb-2" style="font-size: 24px;"></i>
                                            <span class="small">Add Item</span>
                                        </a>
                                    </div>
                                @endif
                            @endif
                            <div class="col-6 col-md-3">
                                <a href="{{ route('loans.index-table') }}" class="btn btn-outline-warning w-100 py-3 rounded-3">
                                    <i class="bi bi-list-check d-block mb-2" style="font-size: 24px;"></i>
                                    <span class="small">Manage Loans</span>
                                </a>
                            </div>
                            <div class="col-6 col-md-3">
                                <a href="{{ route('returns.index') }}" class="btn btn-outline-danger w-100 py-3 rounded-3">
                                    <i class="bi bi-arrow-return-left d-block mb-2" style="font-size: 24px;"></i>
                                    <span class="small">Manage Returns</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
