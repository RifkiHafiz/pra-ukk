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
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">
                                {{ auth()->user()->username }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
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
