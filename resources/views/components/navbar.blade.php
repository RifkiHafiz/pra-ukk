<style>
.profile-dropdown-toggle {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 30px;
    padding: 5px 16px 5px 5px !important;
    transition: all 0.3s ease;
}

.profile-dropdown-toggle:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-1px);
}

.profile-dropdown-toggle span {
    font-weight: 500;
    color: white !important;
}

.profile-avatar-nav {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease;
}

.profile-dropdown-toggle:hover .profile-avatar-nav {
    transform: scale(1.05);
}

/* Dropdown Menu */
.profile-dropdown-menu {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    padding: 8px;
    margin-top: 10px;
    min-width: 180px;
}

.profile-dropdown-menu .dropdown-item {
    border-radius: 8px;
    padding: 10px 16px;
    transition: all 0.2s ease;
    font-weight: 500;
    color: #475569;
    display: flex;
    align-items: center;
    gap: 10px;
}

.profile-dropdown-menu .dropdown-item:hover {
    background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
    color: #0369a1;
    transform: translateX(4px);
}

.profile-dropdown-menu .dropdown-item.text-danger:hover {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    color: #dc2626;
}
</style>
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm" style="position: sticky; top: 0; z-index: 10;">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 profile-dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                                {{-- Foto Profile --}}
                                <img
                                    src="{{ auth()->user()->profile_picture
                                        ? asset('storage/' . auth()->user()->profile_picture)
                                        : asset('storage/img/user-default.jpg') }}"
                                    alt="Profile"
                                    class="rounded-circle border border-white profile-avatar-nav"
                                    width="35"
                                    height="35"
                                    style="object-fit: cover;"
                                >

                                {{-- Username --}}
                                <span>{{ auth()->user()->username }}</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end profile-dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-person-circle"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" onsubmit="showLoading()">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        @if (request()->routeIs('register.page'))
                            <li class="nav-item">
                                <a class="btn btn-light text-primary px-3 ms-2" href="{{ route('login.page') }}">Login</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-light text-primary px-3 ms-2 " href="{{ route('register.page') }}">Sign Up</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>
