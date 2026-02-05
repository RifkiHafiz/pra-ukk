@extends('layouts.app')
@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #0ea5e9, #0369a1);
        margin: -20px -15px 30px -15px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #0ea5e9, #0369a1);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0284c7, #075985);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(14, 165, 233, 0.3);
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #0ea5e9, #0369a1);
    }

    .modal-header.bg-gradient-primary {
        background: linear-gradient(135deg, #0ea5e9, #0369a1);
    }

    .card {
        box-shadow: 0 2px 20px rgba(14, 165, 233, 0.1);
    }

    .table thead {
        background-color: #e0f2fe;
    }

    .search-box input:focus {
        border-color: #0ea5e9;
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
    }

    .form-control:focus {
        border-color: #0ea5e9;
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
    }
</style>

<div class="container-fluid">
    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 rounded-3" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3" role="alert">
        <i class="bi bi-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Main Card -->
    <div class="card border-0 rounded-4 mb-4">
        <div class="card-header bg-white border-bottom border-2 border-light rounded-top-4 p-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title fw-bold text-primary mb-0 fs-4">
                        <i class="bi bi-people-fill me-2"></i>
                        All Loans
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('loans.create') }}" class="btn btn-primary px-4 py-2 rounded-3 fw-semibold">
                        <i class="bi bi-plus-circle me-2"></i>
                        Add New Loans
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="categoriesTable">
                    <thead>
                        <tr>
                            <th class="text-primary fw-semibold border-0 p-3 small text-uppercase">No</th>
                            <th class="text-primary fw-semibold border-0 p-3 small text-uppercase">Code</th>
                            <th class="text-primary fw-semibold border-0 p-3 small text-uppercase">Item</th>
                            <th class="text-primary fw-semibold border-0 p-3 small text-uppercase">Quantity</th>
                            <th class="text-primary fw-semibold border-0 p-3 small text-uppercase">Deadline</th>
                            <th class="text-primary fw-semibold border-0 p-3 small text-uppercase">Status</th>
                            <th class="text-primary fw-semibold border-0 p-3 small text-uppercase text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($loans as $loan)
                            <tr>
                                <td class="p-3 align-middle border-bottom border-light">{{ $loop->iteration }}</td>

                                <td class="p-3 align-middle border-bottom border-light">{{ $loan->loan_code }}</td>
                                <td class="p-3 align-middle border-bottom border-light">{{ $loan->item->item_name }}</td>
                                <td class="p-3 align-middle border-bottom border-light">{{ $loan->quantity }}</td>
                                <td class="p-3 align-middle border-bottom border-light">{{ \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') }} - <br> {{ \Carbon\Carbon::parse($loan->return_date)->format('d M Y') }}</td>
                                <td class="p-3 align-middle border-bottom border-light">
                                    @if($loan->status === 'submitted')
                                        <span class="badge bg-warning rounded-pill px-3 py-2">Submitted</span>
                                    @elseif($loan->status === 'approved')
                                        <span class="badge bg-success rounded-pill px-3 py-2">Approved</span>
                                    @else
                                        <span class="badge bg-info rounded-pill px-3 py-2">Returned</span>
                                    @endif
                                </td>
                                <td class="p-3 align-middle border-bottom border-light">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <button class="btn btn-warning btn-sm text-white px-3 py-1"
                                                onclick="openBorrowModal({{ $loan->item->id }}, '{{ $loan->item->item_name }}', {{ $loan->item->available_quantity }}, '{{ $loan->item->item_code }}')"
                                                {{ $loan->item->available_quantity <= 0 ? 'disabled' : '' }}>
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm px-3 py-1" onclick="confirmDelete({{ $loan->id }})" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bi bi-inbox display-1 d-block mb-3 opacity-25"></i>
                                        <h4 class="text-secondary mb-2">No Loans Found</h4>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation" class="p-3">
                <ul class="pagination justify-content-end mb-0">
                    <li class="page-item disabled">
                        <a class="page-link text-primary border border-light rounded-2 px-3 py-2 mx-1" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link bg-primary border-primary rounded-2 px-3 py-2 mx-1" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-primary border border-light rounded-2 px-3 py-2 mx-1" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-primary border border-light rounded-2 px-3 py-2 mx-1" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-primary border border-light rounded-2 px-3 py-2 mx-1" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Borrow Item Modal -->
<div class="modal fade" id="borrowModal" tabindex="-1" aria-labelledby="borrowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header modal-header-gradient text-white rounded-top-4 border-0">
                <h5 class="modal-title fw-bold" id="borrowModalLabel">
                    <i class="bi bi-bag-plus me-2"></i>
                    Edit Item to Borrow
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('loans.update', $loan->id) }}" method="POST" id="borrowForm">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <!-- Item Info Display -->
                    <div class="alert alert-info border-0 rounded-3 mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-info-circle-fill fs-4"></i>
                            <div>
                                <div class="fw-bold mb-1" id="modalItemName">Item Name</div>
                                <div class="small">
                                    <span class="badge bg-dark me-2" id="modalItemCode">CODE</span>
                                    <span class="text-muted">Available: <strong id="modalAvailableQty">0</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="item_id" id="itemId">

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label fw-semibold text-primary">
                            Quantity <span class="text-danger">*</span>
                        </label>
                        <input type="number"
                               class="form-control rounded-3 @error('quantity') is-invalid @enderror"
                               id="quantity"
                               name="quantity"
                               min="1"
                               value="{{ old('quantity', $loan->quantity) }}"
                               required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Enter the quantity you want to borrow</div>
                    </div>

                    <!-- Loan Date -->
                    <div class="mb-3">
                        <label for="loan_date" class="form-label fw-semibold text-primary">
                            Loan Date <span class="text-danger">*</span>
                        </label>
                        <input type="date"
                               class="form-control rounded-3 @error('loan_date') is-invalid @enderror"
                               id="loan_date"
                               name="loan_date"
                               value="{{ old('loan_date', date('Y-m-d'), $loan->loan_date) }}"
                               required>
                        @error('loan_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Return Date -->
                    <div class="mb-3">
                        <label for="return_date" class="form-label fw-semibold text-primary">
                            Expected Return Date <span class="text-danger">*</span>
                        </label>
                        <input type="date"
                               class="form-control rounded-3 @error('return_date') is-invalid @enderror"
                               id="return_date"
                               name="return_date"
                               value="{{ old('return_date', $loan->return_date) }}"
                               required>
                        @error('return_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Select when you plan to return the item</div>
                    </div>

                    <!-- Notes (Optional) -->
                    <div class="mb-3">
                        <label for="notes" class="form-label fw-semibold text-primary">
                            Notes <span class="text-muted small">(Optional)</span>
                        </label>
                        <textarea class="form-control rounded-3 @error('notes') is-invalid @enderror"
                                  id="notes"
                                  name="notes"
                                  rows="3"
                                  placeholder="Add any additional notes or special requests...">{{ old('notes', $loan->notes) }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-secondary rounded-3 px-4" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary rounded-3 px-4">
                        <i class="bi bi-check-circle me-2"></i>
                        Submit Loan Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-header bg-danger text-white rounded-top-4">
                <h5 class="modal-title mb-0">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <p class="mb-0">Are you sure you want to delete this user? This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="#" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-3">
                        <i class="bi bi-trash me-2"></i>
                        Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Open borrow modal with item details
    function openBorrowModal(itemId, itemName, availableQty, itemCode) {
        // Set item details in modal
        document.getElementById('itemId').value = itemId;
        document.getElementById('modalItemName').textContent = itemName;
        document.getElementById('modalItemCode').textContent = itemCode;
        document.getElementById('modalAvailableQty').textContent = availableQty;

        // Set max quantity
        document.getElementById('quantity').max = availableQty;

        // Set minimum return date to tomorrow
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        document.getElementById('return_date').min = tomorrow.toISOString().split('T')[0];

        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('borrowModal'));
        modal.show();
    }

    // Confirm delete function
    function confirmDelete(loanId) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = '/loans/' + loanId;
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
        deleteModal.show();
    }

    // Validate quantity on input
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.getElementById('quantity');

        if (quantityInput) {
            quantityInput.addEventListener('input', function() {
                const max = parseInt(this.max);
                const value = parseInt(this.value);

                if (value > max) {
                    this.value = max;
                }
                if (value < 1) {
                    this.value = 1;
                }
            });
        }
    });
</script>
@endsection
