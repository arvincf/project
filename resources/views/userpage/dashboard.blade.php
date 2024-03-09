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
                       <p> #AgriInterventions | VALIDATION NG PAGTATAYUAN NG BAGONG COFFEE BEANS STORAGE SA CASILE COFFEE PROCESSING CENTER
                Sinamahan kanina ng Cabuyao Agriculture Office ang validation team mula sa DA-Calabarzon Regional Agricultural Engineering Division (RAED) at High-Value Crops Development Program (HVCDP) na sina Engr. Marianne San Buenaventura, Darwin Bigyan, at Maximo Factor sa lugar kung saan itatayo ang proposed coffee beans storage sa Brgy. Casile. Ang coffee beans storage na ito na project grant sa Casile-Guinting Upland Marketing Cooperative ay nagkakahalaga ng ₱750,000.00 mula sa Department of Agriculture Region 4A HVCDP.
                Target na ma-construct ang nasabing storage o warehouse sa mga susunod na buwan.
                Hindi pa man naitatayo ang storage facility, mainit na po agad ang aming pasasalamat sa DA sa patuloy at walang sawang pag-agapay sa ating mga magsasaka. 🙌🏼
                #HVCDP
                #Coffee
                #CafeDeCabuyao
                #MasaganangAgrikulturaMaunladNaEkonomiya
                #BagongCabuyao</p>
                <img src="{{ asset('assets/img/1.jpg') }}" alt="Supplier">

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
                    <p>We will just email you to your account: {{ auth()->user()->email }} .</p>
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
