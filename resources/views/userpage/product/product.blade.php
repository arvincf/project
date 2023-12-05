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
            <div class="page-btn">
                <button type="button" class="btn-success" data-bs-toggle="modal" data-bs-target="#addproduct"><i
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
                            <th>Supplier Name</th>
                            <th>Date of Storing</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->prodname }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->unitprice }}</td>
                                    <td>{{ $product->supplierName }}</td>
                                    <td>{{ $product->dateofstoring }}</td>
                                    <td>{{ $product->details }}</td>
                                    <td>
                                        <div class="action-btn">
                                            <a href="#edit{{ $product->id }}" class="btn-warning" title="Edit"
                                                data-bs-toggle="modal"><i class="bi bi-pencil-square"></i>Edit</a>
                                            <a href="#remove{{ $product->id }}" data-bs-toggle="modal"
                                                class="btn-danger" title="Remove"><i class="bi bi-trash"></i>Remove</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
