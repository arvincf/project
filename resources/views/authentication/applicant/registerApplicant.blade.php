<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.header-package')
</head>

<body>
    <main class="authentication-container">
        <section class="side-image-content">
            <img src="{{ asset('assets/img/side-image.jpg') }}" alt="Picture">
        </section>
        <section class="authentication-form-container">
            <form action="{{ route('registerUser') }}" method="GET">
                @csrf
                <h1>Register New Applicant</h1>
                <input type="text" name="type" value="Applicant" hidden>
                <div class="field-container">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" class="form-control"
                        value="{{ !empty(old('lastname')) ? old('lastname') : null }}" placeholder="Enter Last Name" required>
                </div>
                <div class="field-container">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" class="form-control"
                        value="{{ !empty(old('firstname')) ? old('firstname') : null }}" placeholder="Enter First Name" required>
                </div>
                <div class="field-container">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" name="age" class="form-control"
                        value="{{ !empty(old('age')) ? old('age') : null }}" placeholder="Enter Age" required>
                </div>
                <div class="field-container">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control"
                        value="{{ !empty(old('address')) ? old('address') : null }}" placeholder="Enter Address"
                        required>
                </div>
                <div class="field-container">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ !empty(old('email')) ? old('email') : null }}" placeholder="Enter Email Address"
                        required>
                </div>
                <div class="field-container">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input type="number" name="contact" class="form-control"
                        value="{{ !empty(old('contact')) ? old('contact') : null }}" placeholder="Enter Contact Number"
                        required>
                </div>
                <div class="field-container">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="authentication-button-container">
                    <a href="{{ route('home') }}" class="btn-danger">Back</a>
                    <button type="submit" class="btn-success" onclick="return confirm('Are you sure to register this information?')">Register</button>
                </div>
            </form>
        </section>
    </,>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
