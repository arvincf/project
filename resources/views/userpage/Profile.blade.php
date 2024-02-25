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
            
            <div class="row">
                <div class="col-md-4">
                    <div class="panel profile">
                        <h3 class="text-dark mb-4">Profile</h3>
                        <div class="jumbotron text-center bg-red">
                            <img class="img-circle img-size-2" src="{{ asset('assets/img/no_image.png')}}" alt="">
                            
                        </div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{ route(strtolower(auth()->user()->type) . '.setting') }}"> <i class="bi bi-pencil-square"></i> Edit profile</a></li>
                        </ul>
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
