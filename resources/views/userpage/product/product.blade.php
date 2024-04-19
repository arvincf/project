<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.header-package')
    <title>Product</title>
</head>

<body>
    <div class="wrapper">
        @include('components.sidebar')
        @include('components.dropdown')
        <main class="main-container">
            @include('components.header')
            <h1>Products</h1>
            @if (auth()->user()->type == 'Manager' || auth()->user()->type == 'Admin')
                <div class="page-btn">
                    <button type="button" class="btn-primary" data-bs-toggle="modal" data-bs-target="#addproduct"><i
                            class="bi bi-plus-lg"></i>Add Product
                    </button>
                </div>
                <section class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Date of Storing</th>
                                <th>Details</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>₱{{ $product->unit_price }}</td>
                                        <td>{{ \Carbon\Carbon::parse($product->date_of_storing)->format('F j, Y') }}
                                        </td>
                                        <td>{{ $product->details }}</td>
                                        <td>
                                            <div class="action-btn">
                                                <a href="#edit{{ $product->id }}" class="btn-success" title="Edit"
                                                    data-bs-toggle="modal"><i class="bi bi-pencil-square"></i>Edit</a>
                                                <a href="#remove{{ $product->id }}" data-bs-toggle="modal"
                                                    class="btn-danger" title="Remove"><i
                                                        class="bi bi-trash"></i>Remove</a>
                                                </td>
                                            </div>
                                    </tr>
                                    @include('userpage.product.productmodal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
        </main>
    </div>
@elseif (auth()->user()->type == 'Customer')
    <div id="grid-view" class="panel">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-profile">
                        <div class="card-header justify-content-end pb-0">
                            <div class="card-body pt-2">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="/assets/img/side-image.jpg" width="100"
                                            class="img-fluid rounded circle">
                                    </div>
                                    <h3 class="mt-4 mb-1">{{ $product->name }}</h3>
                                    <p class="text-muted">₱{{ $product->unit_price }}</p>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Quantity:</span><strong>{{ $product->quantity }}</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Unit Price:</span><strong>₱{{ $product->unit_price }}</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Description:</span><strong>{{ $product->details }}</strong>
                                        </li>
                                    </ul>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="">Read
                                        More</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
