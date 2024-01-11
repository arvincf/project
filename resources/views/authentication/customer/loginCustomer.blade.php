<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="icon" href="{{asset('assets/img/cgumc.png')}}" type="image">

<head>
    @include('partials.header-package')
</head>

<body>
    <main class="authentication-container">
        <section class="side-image-content">
            <img src="{{ asset('assets/img/side-image.jpg') }}" alt="Picture">
        </section>
        <section class="authentication-form-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Login Customer Form</h1>
                <div class="field-container">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ !empty(old('email')) ? old('email') : null }}" placeholder="Enter Email Address"
                        required>
                </div>
                <div class="field-container">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="form-link">
                    <a href="{{ route('register.customer') }}">Do you have an account? Create new account.</a>
                </div>
            </br>
                <div class="authentication-button-container">
                    <a href="{{ route('home') }}" class="btn-danger">Back</a>
                    <button type="submit" class="btn-success">Login</button>
                </div>
            </form>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
