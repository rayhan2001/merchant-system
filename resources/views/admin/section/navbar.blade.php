<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="btn btn-outline-light me-2" id="sidebarToggle">☰</button>
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Dashboard</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                        data-bs-toggle="dropdown">
                        <img src="https://img.freepik.com/free-vector/smiling-redhaired-boy-illustration_1308-176664.jpg?t=st=1738646696~exp=1738650296~hmac=3059210e6a1151ba56f2a0533343f26cb0e092402e274f2a3f27730b31ee895a&w=740"
                            width="30" height="30" class="rounded-circle" alt="Profile">
                        <span class="ms-2">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <a class="dropdown-item text-danger" href="#" id="logoutBtn"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
