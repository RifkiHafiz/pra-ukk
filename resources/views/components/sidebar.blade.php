<div>
    <div class="d-flex flex-column p-3 bg-white rounded-end-5"
        style="position: fixed; top: 0; left: 0; width: 260px; min-height: 100vh; border-right: 1px solid #e5e7eb; z-index: 20;">

        <!-- Logo -->
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 text-decoration-none">
            <span class="fs-4 fw-semibold">🅱 BorrowMe</span>
        </a>

        <hr>

        <!-- Menu -->
        <ul class="nav nav-pills flex-column gap-1">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('dashboard') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-clipboard-data"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('loans.index') }}"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('loans') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-bag-plus"></i>
                    Loans
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('returns.index') }}"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('returns') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-arrow-left-circle"></i>
                    Returns
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('items.index') }}"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('items') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-tools"></i>
                    Items
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('categories.index') }}"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('categories') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-card-checklist"></i>
                    Categories
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.index') }}"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('user') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-person-circle"></i>
                    Users
                </a>
            </li>

        </ul>
    </div>
</div>
