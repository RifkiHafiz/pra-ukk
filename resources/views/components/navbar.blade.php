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
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown">

                                {{-- Foto Profile --}}
                                <img
                                    src="{{ auth()->user()->profile_picture
                                        ? asset('storage/' . auth()->user()->profile_picture)
                                        : asset('images/default-avatar.svg') }}"
                                    alt="Profile"
                                    class="rounded-circle border border-white"
                                    width="35"
                                    height="35"
                                    style="object-fit: cover;"
                                >

                                {{-- Username --}}
                                <span>{{ auth()->user()->username }}</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" onsubmit="showLoading()">
                                        @csrf
                                        <button class="dropdown-item">Logout</button>
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
