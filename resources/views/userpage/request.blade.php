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
            @if (auth()->user()->type == 'Supplier')
                <section class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Supplier Name</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </thead>
                            
                        </table>
                    </div>
                </section>
        </main>
    </div>
    @elseif(auth()->user()->type == 'Admin')
    <div class="page-btn">
        <button type="button" class="btn-success" data-bs-toggle="modal" data-bs-target="#addproduct"><i
                class="bi bi-plus-lg"></i>Requesting Product
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
                </thead>
            </table>
        </div>
    </section>
</main>
</div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
