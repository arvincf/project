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
                @if (auth()->user()->type == 'Supplier')
                    <h1 class="fw-medium">News Dashboard</h1>
                    <div>
                        <iframe
                            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fphoto.php%3Ffbid%3D834344582027375%26set%3Da.502284065233430%26type%3D3&show_text=true&width=500"
                            width="500" height="805" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe><br>
                        <iframe
                            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fphoto.php%3Ffbid%3D788610683295205%26set%3Da.227840946038851%26type%3D3&show_text=true&width=500"
                            width="500" height="805" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        <br>
                    </div>
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

                        <a href="{{ route('admin.product.display') }}" style="color:black;">
                            <div class="widget">
                                <div class="widget-logo-categories">
                                    <i class="bi bi-cart-fill"></i>
                                </div>
                                <div class="widget-details">
                                    <p>{{ $totalProducts }}</p>
                                    Products
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.reservationrecord') }}" style="color:black;//">
                            <div class="widget">
                                <div class="widget-logo-product">
                                    <i class="bi bi-list-ul"></i>
                                </div>
                                <div class="widget-details">
                                    <p>{{ $totalreservation }}</p>
                                    <span>Reservation</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.delivery.display') }}" style="color:black;//">
                            <div class="widget">
                                <div class="widget-logo-sales">
                                    <i class="bi bi-cash"></i>
                                </div>
                                <div class="widget-details">
                                    <p>{{ $totalDelivery }}</p>
                                    <span>Delivery</span>
                                </div>
                            </div>
                        </a>

                    </section>
                @elseif(auth()->user()->type == 'Applicant')
                    <h1>Dashboard</h1>
                    <p>We will just email you to your account: <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>.</p>
                @elseif(auth()->user()->type == 'Manager')
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

                        <a href="{{ route('manager.product.display') }}" style="color:black;">
                            <div class="widget">
                                <div class="widget-logo-categories">
                                    <i class="bi bi-cart-fill"></i>
                                </div>
                                <div class="widget-details">
                                    <p>{{ $totalProducts }}</p>
                                    <span>Products</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('manager.reservationrecord') }}" style="color:black;//">
                            <div class="widget">
                                <div class="widget-logo-product">
                                    <i class="bi bi-list-ul"></i>
                                </div>
                                <div class="widget-details">
                                    <p>{{ $totalreservation }}</p>
                                    <span>Reservation</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('manager.delivery') }}" style="color:black;//">
                            <div class="widget">
                                <div class="widget-logo-sales">
                                    <i class="bi bi-cash"></i>
                                </div>
                                <div class="widget-details">
                                    <p>{{ $totalDelivery }}</p>
                                    <span>Delivery</span>
                                </div>
                            </div>
                        </a>
                    </section>
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
