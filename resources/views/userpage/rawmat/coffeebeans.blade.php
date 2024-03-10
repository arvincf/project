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
            <h1>Stored Beans</h1>
            <div id="grid-view" class="panel">
                <div class="row">
                    @foreach ($coffeebeans as $coffeebean)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="card card-profile">
                                <div class="card-header justify-content-end pb-0">
                                    <div class="dropdown">
                                        <button class="btn btn-link" type="button" data-toggle="dropdown">
                                            <span class="dropdown-dots fs--1"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right border py-0">
                                            <div class="py-2">
                                                <a class="dropdown-item" href="">Edit</a>
                                                <a class="dropdown-item text-danger" href="">Delete</a>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="/assets/img/side-image.jpg" width="100"
                                                        class="img-fluid rounded circle">
                                                </div>
                                                <h3 class="mt-4 mb-1">{{ $coffeebean->coffee_name }}</h3>
                                                <ul class="list-group mb-3 list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span>Quantity:</span><strong>{{ $coffeebean->quantity }}KG</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span>Date Stored:</span><strong>{{ $coffeebean->date }}</strong>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                    href="">Use</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
