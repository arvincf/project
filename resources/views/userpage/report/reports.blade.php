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
                    <a class="nav-link active" aria-current="page" href="">Coffee Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manager.sales.rep') }}">Sales Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Members Report</a>
                </li>
            </ul>
            <h1>Reports</h1>
            <div class="card">
                <div class="card-body">
                    <br>
                    <table class="table">
                        <thead>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </thead>
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
