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
            <h1>Schedule Of Reservation</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Customer Id</th>
                            <th>Product Name</th>
                            <th>Details</th>
                            <th>Quantity</th>
                            <th>Reservation Date</th>
                            <th>Reservation Status</th>
                            @if (auth()->user()->type == 'Admin' || auth()->user()->type == 'Manager')
                                <th>Action</th>
                            @endif
                        </thead>
                        <tbody>
                            @foreach ($reserveProduct as $product)
                                <tr>
                                    <th>{{ auth()->user()->id }}</th>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->details }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->date }}</td>
                                    <td>{{ $product->status }}</td>
                                </tr>
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
