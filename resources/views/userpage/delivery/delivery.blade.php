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
                <h1>Deliver</h1>
                @if (auth()->user()->type == 'Member')
                    <div class="page-btn">
                        <button type="button" class="btn-success" data-bs-toggle="modal" data-bs-target="#adddeliver"><i
                                class="bi bi-plus-lg"></i>Add Delivery
                        </button>
                    </div>
                    @include('userpage.delivery.adddelivery')
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Supplier Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                @if (auth()->user()->type == 'Admin' || auth()->user()->type == 'Manager')
                                    <th>Action</th>
                                @endif
                            </thead>
                            <tbody>
                                @foreach ($delivers as $deliver)
                                    <tr>
                                        <td>{{ $deliver->product_name }}</td>
                                        <td>{{ $deliver->quantity }}</td>
                                        <td>{{ $deliver->supplier_name }}</td>
                                        <td>{{ $deliver->delivery_date }}</td>
                                        <td>
                                            <div
                                                class="fw-bold text-{{ $deliver->status == 'On Deliver' ? 'warning' : 'success' }}">
                                                {{ $deliver->status }}
                                            </div>
                                        </td>
                                        <td>
                                            @if (auth()->user()->type == 'Admin' || auth()->user()->type == 'Manager')
                                                <div class="action-btn">
                                                    @if ($deliver->status == 'On Deliver')
                                                        <a href="#delivered{{ $deliver->id }}" class="btn btn-primary"
                                                            title="Deliver" data-bs-toggle="modal">Deliver</a>
                                                    @endif
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @include('userpage.delivery.deliverymodal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
