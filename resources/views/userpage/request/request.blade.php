<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.header-package')
    <title>RequestProduct</title>
</head>

<body>
    <div class="wrapper">
        @include('components.sidebar')
        @include('components.dropdown')
        <main class="main-container">
            @include('components.header')
            <h1>Request Product</h1>
            @if(auth()->user()->type == 'admin' || auth()->user()->type == 'manager')
            <div class="page-btn">
                <button type="button" class="btn-success" data-bs-toggle="modal" data-bs-target="#request"><i
                        class="bi bi-plus-lg"></i>Requesting Product
                </button>
            </div>
            @include('userpage.request.requestmodal')
            @endif
                <section class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                @if (auth()->user()->type == 'Admin' || auth()->user()->type == 'Manager')
                                <th>Supplier Name</th>
                                @endif
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Status</th>
                                @if (auth()->user()->type == 'Supplier')
                                <th>Actions</th>
                                @endif
                            </thead>
                            <tbody>
                                @forelse ($request as $requests)
                                    <tr>
                                        @if (auth()->user()->type == 'Admin' || auth()->user()->type == 'Manager')
                                        <td>{{ $requests->supplier_name }}</td>
                                        @endif
                                        <td>{{ $requests->product_name }}</td>
                                        <td>{{ $requests->quantity }}</td>
                                        <td>{{ \Carbon\Carbon::parse($requests->date)->format('F j, Y') }}</td>
                                        <td>
                                            <div
                                                class="fw-bold text-{{ $requests->status == 'Confirming...' ? 'warning' : 'success' }}">
                                                {{ $requests->status }}
                                            </div>
                                        </td>
                                        @if (auth()->user()->type == 'Supplier')
                                        <td style="width:30%;">
                                            <div class="action-btn">
                                                @if ($requests->status == 'Confirming...')
                                                <a href="#confirm{{ $requests->id }}" class="btn-success" title="Confirm"
                                                    data-bs-toggle="modal"><i class="bi bi-check-lg"></i>Confirm
                                                </a>
                                                @include('userpage.request.confirmation')
                                                @endif
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No request found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
