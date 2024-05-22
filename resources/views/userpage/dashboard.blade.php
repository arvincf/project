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
                @if (auth()->user()->type == 'supplier')
                    <h1 class="fw-medium">News Dashboard</h1>
                    <div>
                        <iframe
                            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fphoto.php%3Ffbid%3D834344582027375%26set%3Da.502284065233430%26type%3D3&show_text=true&width=500"
                            width="500" height="805" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe><br>
                        <iframe
                            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fphoto.php%3Ffbid%3D788610683295205%26set%3Da.227840946038851%26type%3D3&show_text=true&width=500"
                            width="500" height="805" style="border:none;overflow:hidden" scrolling="no"
                            frameborder="0" allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        <br>
                    </div>
                @elseif(auth()->user()->type == 'admin')
                    <h1 class="fw-medium">Dashboard,</h1>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Welcome to Inventory Management.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#generateSalesModal"
                        class="btn btn-success generateBtn">
                        <i class="bi bi-printer"></i>
                        Generate Sales Data
                    </button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#generateBeansModal"
                        class="btn btn-success generateBeansBtn">
                        <i class="bi bi-printer"></i>
                        Generate Coffee Beans Data
                    </button>
                    <div class="modal fade" id="generateSalesModal" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-label">Generate Excel Sales</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" id="generateSalesForm">
                                        @csrf
                                        <div class="form-content">
                                            <div class="field-container">
                                                <label for="disaster_name">Range</label>
                                                <select class="form-control form-select" name="range" required>
                                                    <option value="" selected disabled hidden>Select Range
                                                    </option>
                                                    <option value="weekly">Weekly</option>
                                                    <option value="monthly">Monthly</option>
                                                    <option value="annually">Annualy</option>
                                                </select>
                                            </div>
                                            <div class="form-button-container">
                                                <button class="btn-success modalBtn" id="btnSubmit">
                                                    Generate
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="generateBeansModal" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-label">Generate Excel Coffee Beans</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" id="generateBeansForm">
                                        @csrf
                                        <div class="form-content">
                                            <div class="field-container">
                                                <label for="disaster_name">Range</label>
                                                <select class="form-control form-select" name="range" required>
                                                    <option value="" selected disabled hidden>Select Range
                                                    </option>
                                                    <option value="weekly">Weekly</option>
                                                    <option value="monthly">Monthly</option>
                                                    <option value="annually">Annualy</option>
                                                </select>
                                            </div>
                                            <div class="form-button-container">
                                                <button class="btn-success modalBtn" id="beansBtnSubmit">
                                                    Generate
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                    <span>Products</span>
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
                @elseif(auth()->user()->type == 'applicant')
                    <h1>Dashboard</h1>
                    <p>We will just email you to your account: <a
                            href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>.</p>
                @elseif(auth()->user()->type == 'manager')
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
    <script type="text/javascript">
        $(document).ready(() => {
            let generateBtn = $("#btnSubmit"),
                modal = $("#generateSalesModal"),
                form = $('#generateSalesForm'),
                generateBeansBtn = $("#beansBtnSubmit"),
                beansModal = $("#generateBeansModal"),
                beansForm = $('#generateBeansForm');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            generateBeansBtn.click((e) => {
                e.preventDefault();
                
                $.ajax({
                    type: "POST",
                    url: '{{ route(auth()->user()->type == 'admin' ? 'admin.generate.beans.data' : 'manager.generate.beans.data') }}',
                    data: beansForm.serialize(),
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success(response) {
                        let blob = new Blob([response], {
                                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            }),
                            link = document.createElement('a');

                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'beans-data.xlsx';
                        link.click();
                        beansModal.modal('hide');
                    },
                    error() {
                        console.log("An error occurred while generating the sales data.");
                    }
                });
            });

            generateBtn.click((e) => {
                e.preventDefault();
                
                $.ajax({
                    type: "POST",
                    url: '{{ route(auth()->user()->type == 'admin' ? 'admin.generate.sales.data' : 'manager.generate.sales.data') }}',
                    data: form.serialize(),
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success(response) {
                        let blob = new Blob([response], {
                                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            }),
                            link = document.createElement('a');

                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'sales-data.xlsx';
                        link.click();
                        modal.modal('hide');
                    },
                    error() {
                        console.log("An error occurred while generating the sales data.");
                    }
                });
            });
        });
    </script>
</body>

</html>
