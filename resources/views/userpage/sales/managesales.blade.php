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
            @include('components.header')
            <h1>Sales</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->customer_name }}</td>
                                    <td>{{ $sale->product_name }}</td>
                                    <td>{{ $sale->product_quantity }}</td>
                                    <td>
                                        <div class="action-btn">
                                            <a href="#view{{ $sale->id }}" data-bs-toggle="modal"
                                                class="btn btn-primary" title="Remove"><i class="bi bi-eye"></i>Views</a>
                                        </div>
                                    </td>
                                </tr>
                                @include('userpage.sales.salesModal')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
