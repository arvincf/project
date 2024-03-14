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
                            @if (auth()->user()->type == 'Admin' || auth()->user()->type == 'Manager')
                            <th>Customer Name</th>
                            @endif
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
                            @forelse ($reserveProduct as $product)
                                <tr>
                                    @if (auth()->user()->type == 'Admin' || auth()->user()->type == 'Manager')
                                    <td>{{ $product->customer_name }}</td>
                                    @endif
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->details }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ \Carbon\Carbon::parse($product->date)->format('F j, Y') }}</td>
                                    <td>{{ $product->status }}</td>
                                    @if (auth()->user()->type == 'Admin' || auth()->user()->type == 'Manager')
                                        <td style="width:30%;">
                                            <div class="action-btn">
                                                @if ($product->status == 'Pending')
                                                <a href="#claim{{ $product->id }}" class="btn-success" title="Claim"
                                                    data-bs-toggle="modal"><i class="bi bi-check-lg"></i>Claim
                                                </a>
                                                @endif
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                                @include('userpage.reservation.claimed')
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No reservations found.</td>
                                </tr>
                            @endforelse
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
