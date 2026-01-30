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
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="/loans"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('loans') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-table"></i>
                    Loans
                </a>
            </li>

            <li class="nav-item">
                <a href="/returns"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('returns') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-grid"></i>
                    Returns
                </a>
            </li>

            <li class="nav-item">
                <a href="/items"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('items') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-grid"></i>
                    Items
                </a>
            </li>

            <li class="nav-item">
                <a href="/categories"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('categories') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-grid"></i>
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
