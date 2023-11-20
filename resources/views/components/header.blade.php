<header class="header-section">
    <div class="header-content">
        <?php
        date_default_timezone_set('Asia/Manila');
        config(['app.timezone' => 'Asia/Manila']);
        ?>
        <p>{{ now()->format('F j, Y, h:i A') }}</p>
        <div class="header-dropdown">
            <button class="toogle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets/img/no_image.png') }}" alt="Profile">
                <span>{{ auth()->user()->firstname }} <i class="bi bi-caret-down-fill"></i></span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ route(strtolower(auth()->user()->type) . '.profile') }}">
                        <i class="bi bi-person"></i>Profile
                    </a>
                </li>
                <li id="settingBtn">
                    <a class="dropdown-item" href="{{ route(strtolower(auth()->user()->type) . '.setting') }}">
                        <i class="bi bi-gear"></i>Settings
                    </a>
                </li>
                <li id="logoutBtn">
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="bi bi-box-arrow-in-left"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
