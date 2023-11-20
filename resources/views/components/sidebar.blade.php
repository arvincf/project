<div class="sidebar">
    <header class="sidebar-header">
        <p>INVENTORY SYSTEM</p>
    </header>
    <div class="sidebar-container">
        <div class="sidebar-user-details">
            <p>{{ strtoupper(auth()->user()->type) }}</p>
        </div>
        <div class="sidebar-content">
            <div class="nav-item">
                <a href="dashboard">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            @if (auth()->user()->type == 'Admin')
                <button class="dropdown-btn" data-bs-toggle="dropdown">
                    <i class="bi bi-person"></i>
                    <span>User Management</span>
                    <i class="bi bi-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <li><a href="{{ route('admin.newapplicant') }}">New Applicant</a></li>
                    <li><a href="{{ route('admin.manageusers') }}">Manage Users</a></li>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.product') }}">
                        <i class="bi bi-grid"></i>
                        <span>Products</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.delivery') }}">
                        <i class="bi bi-truck"></i>
                        <span>Delivery</span>
                    </a>
                </div>
            @elseif(auth()->user()->type == 'Member')
                <div class="nav-item">
                    <a href="{{ route('member.product') }}">
                        <i class="bi bi-grid"></i>
                        <span>Products</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#">
                        <i class="bi bi-truck"></i>
                        <span>Delivery</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="reservationrecord">
                        <i class="bi bi-calendar-check"></i>
                        <span>Product Reservation</span>
                    </a>
                </div>
                <button class="dropdown-btn" data-bs-toggle="dropdown">
                    <i class="bi bi-table"></i>
                    <span>Sales</span>
                    <i class="bi bi-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <li><a href="#">Manage Sales</a></li>
                    <li><a href="#">Search Sales</a></li>
                </div>
                <div class="nav-item">
                    <a href="">
                        <i class="bi bi-graph-up"></i>
                        <span>Sales Report</span>
                    </a>
                </div>
            @elseif (auth()->user()->type == 'Customer')
                <div class="nav-item">
                    <a href="{{ route('customer.product') }}">
                        <i class="bi bi-grid"></i>
                        <span>Products</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('customer.reservationrecord') }}">
                        <i class="bi bi-grid"></i>
                        <span>Record of Reservation</span>
                    </a>
                </div>
            @else
            @endif
        </div>
    </div>
</div>
