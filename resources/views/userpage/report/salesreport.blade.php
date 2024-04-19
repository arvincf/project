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
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('manager.report') }}">Coffee Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">Sales Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Members Report</a>
                </li>
            </ul>
            <h1>Sales</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Sales Date</th>
                            @if (auth()->user()->type == 'Admin' || auth()->user()->type == 'Manager')
                                <th>Action</th>
                            @endif
                        </thead>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
