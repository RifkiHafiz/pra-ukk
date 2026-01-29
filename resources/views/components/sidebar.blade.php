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
                <a href="/home"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('home') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-house"></i>
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a href="/dashboard"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('dashboard') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="/orders"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('orders') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-table"></i>
                    Orders
                </a>
            </li>

            <li class="nav-item">
                <a href="/products"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('products') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-grid"></i>
                    Products
                </a>
            </li>

            <li class="nav-item">
                <a href="/customers"
                class="nav-link d-flex align-items-center gap-2
                {{ request()->is('customers') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-person-circle"></i>
                    Customers
                </a>
            </li>

        </ul>
    </div>
</div>
