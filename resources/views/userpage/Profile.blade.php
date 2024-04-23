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
            <h3 class="text-dark mb-4">Profile</h3>
            <div class="row">
                <div class="col-md-15">
                    <div class="panel profile">
                        <div class="jumbotron text-center bg-red">
                            <img class="img-circle img-size-2" src="{{ asset('assets/img/no_image.png')}}" alt=""><br>
                            <h3>{{ auth()->user()->first_name }}</h3>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route(strtolower(auth()->user()->type) . '.setting') }}">
                                        <i class="bi bi-pencil-square"></i> Edit profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
