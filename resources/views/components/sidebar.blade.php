<div class="sidebar">
    <header class="sidebar-header">
        <div class= "image-text">
            <a href="dashboard">
            <span class="image">
                <img src="{{ asset('assets/img/cgumc.png') }}" alt="logo">
            </span>
            </a>
        </div>
    </header>
    <div class="sidebar-container">
        <div class="sidebar-text-container">
            <p>INVENTORY MANAGEMENT SYSTEM</p>
        </div>
        <div class="sidebar-user-details">
            <p>{{ strtoupper(auth()->user()->type) }}</p>
        </div>
        <div class="sidebar-content">
            <div class="nav-item">
                <a href="{{ route(auth()->user()->type . '.dashboard') }}">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            @if(auth()->user()->type == 'admin')
                <button class="dropdown-btn" data-bs-toggle="dropdown">
                    <i class="bi bi-person"></i>
                    <span style="margin-right: 10px;">User Management</span>
                    <span class="bi bi-caret-down-fill"></span>
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
                    <a href="{{ route('admin.coffeebeans') }}">
                        <i class="bi bi-database-fill"></i>
                        <span>Inventory</span>
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
            @elseif(auth()->user()->type == 'supplier')
                <div class="nav-item">
                    <a href="{{ route('supplier.request') }}">
                        <i class="bi bi-bag-fill"></i>
                        <span>Request Product</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('supplier.delivery.display') }}">
                        <i class="bi bi-truck"></i>
                        <span>Delivery</span>
                    </a>
                </div>
                
            @elseif(auth()->user()->type == 'customer')
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
            @elseif(auth()->user()->type == 'manager')
            <button class="dropdown-btn" data-bs-toggle="dropdown">
                <i class="bi bi-person"></i>
                <span style="margin-right: 10px;">User Management </span>
                <span class="bi bi-caret-down-fill"></span>
            </button>
            <div class="dropdown-container">
                <li><a href="{{ route('manager.newapplicant') }}">New Applicant</a></li>
                <li><a href="{{ route('manager.drecord') }}">Applicant Records</a></li>
                <li><a href="{{ route('manager.manageusers') }}">Manage Users</a></li>
            </div>
            <div class="nav-item">
                <a href="{{ route('manager.request') }}">
                    <i class="bi bi-bag-fill"></i>
                    <span>Request Product</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('manager.delivery') }}">
                    <i class="bi bi-truck"></i>
                    <span>Delivery</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('manager.coffeebeans') }}">
                    <i class="bi bi-database-fill"></i>
                    <span>Inventory</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('manager.product.display') }}">
                    <i class="bi bi-grid"></i>
                    <span>Products</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('manager.reservationrecord') }}">
                    <i class="bi bi-calendar-check"></i>
                    <span>Product Reservation</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('manager.managesales') }}">
                    <i class="bi bi-table"></i>
                    <span>Sales </span>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    var currentUrl = window.location.href;
    var links = document.querySelectorAll('.nav-item a');

    links.forEach(function(link) {
        if (link.getAttribute('href') === currentUrl) {
            link.closest('.nav-item').classList.add('active');
        }
    });
});
</script>

