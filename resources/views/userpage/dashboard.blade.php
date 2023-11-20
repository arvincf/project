<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.header-package')
</head>

<body>
    <div class="wrapper">
        @include('components.sidebar')
        @include('components.dropdown')
        <main class="main-container">
            <section class="main-section">
                @include('components.header')
                @if (auth()->user()->type == 'Member')
                    <h1 class="fw-medium">Dashboard</h1>
                    <p>Member</p>
                @elseif(auth()->user()->type == 'Admin')
                    <h1 class="fw-medium">Dashboard,</h1>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Welcome to Inventory Management.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <section class="wigdet-container">
                        <div class="widget">
                            <div class="widget-logo-user">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="widget-details">
                                <p>{{ $totalUsers }}</p>
                                <span>Users</span>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-logo-categories">
                                <i class="bi bi-cart-fill"></i>
                            </div>
                            <div class="widget-details">
                                <p>{{ $totalProducts }}</p>
                                <span>Products</span>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-logo-product">
                                <i class="bi bi-list-ul"></i>
                            </div>
                            <div class="widget-details">
                                <p>12</p>
                                <span>Reservation</span>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-logo-sales">
                                <i class="bi bi-cash"></i>
                            </div>
                            <div class="widget-details">
                                <p>11</p>
                                <span>Sales</span>
                            </div>
                        </div>
                    </section>
                @elseif(auth()->user()->type == 'Applicant')
                    <h1>Dashboard</h1>
                    <p>We will just email you to your account.</p>
                @else
                    <h1>Dashboard</h1>
                    <p>Customer</p>
                @endif
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
