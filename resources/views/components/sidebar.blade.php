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
                    <a href="{{ route('admin.request') }}">
                        <i class="bi bi-bag-fill"></i>
                        <span>Request Product</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.delivery.display') }}">
                        <i class="bi bi-truck"></i>
                        <span>Delivery</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.product.display') }}">
                        <i class="bi bi-grid"></i>
                        <span>Products</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.reservationrecord') }}">
                        <i class="bi bi-calendar-check"></i>
                        <span>Product Reservation</span>
                    </a>
                </div>
            @elseif(auth()->user()->type == 'Supplier')
                <div class="nav-item">
                    <a href="{{ route('supplier.request') }}">
                        <i class="bi bi-bag-fill"></i>
                        <span>Request Product</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('supplier.product.display') }}">
                        <i class="bi bi-grid"></i>
                        <span>Products</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('supplier.delivery.display') }}">
                        <i class="bi bi-truck"></i>
                        <span>Delivery</span>
                    </a>
                </div>
                
            @elseif (auth()->user()->type == 'Customer')
                <div class="nav-item">
                    <a href="{{ route('customer.product.display') }}">
                        <i class="bi bi-grid"></i>
                        <span>Products</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('customer.reservation.product') }}">
                        <i class="bi bi-cart-plus"></i>
                        <span>Product Reservation</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('customer.reservation.record') }}">
                        <i class="bi bi-calendar-check"></i>
                        <span>Record of Reservation</span>
                    </a>
                </div>
            @elseif(auth()->user()->type == 'Manager')
            <button class="dropdown-btn" data-bs-toggle="dropdown">
                <i class="bi bi-person"></i>
                <span>User Management</span>
                <i class="bi bi-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <li><a href="{{ route('manager.newapplicant') }}">New Applicant</a></li>
                <li><a href="{{ route('manager.manageusers') }}">Manage Users</a></li>
            </div>
            <div class="nav-item">
                <a href="{{ route('manager.request') }}">
                    <i class="bi bi-bag-fill"></i>
                    <span>Request Product</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('manager.product.display') }}">
                    <i class="bi bi-grid"></i>
                    <span>Products</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('manager.delivery') }}">
                    <i class="bi bi-truck"></i>
                    <span>Delivery</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('manager.reservationrecord') }}">
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
                <li><a href="{{ route('manager.managesales') }}">Manage Sales</a></li>
                <li><a href="#">Search Sales</a></li>
            </div>
            <div class="nav-item">
                <a href="">
                    <i class="bi bi-graph-up"></i>
                    <span>Reports</span>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
