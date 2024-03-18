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
            <h1>Settings</h1><br>
            <b>First Name:</b><br>
            <input type="text" name="firstname" value="{{ auth()->user()->first_name }}" class="form-control"><br>
            <b>Last Name:</b><br>
            <input type="text" name="lastname" value="{{ auth()->user()->last_name }}" class="form-control"><br>
            <b>Address:</b></br>
            <input type="text" name="address" value="{{ auth()->user()->address }}" class="form-control"><br>
            <b>Email Address:</b></br>
            <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control"><br>
            <b>Contact Number:</b><br>
            <input type="number" name="contact" value="{{ auth()->user()->contact }}"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                maxlength="11" class="form-control">
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
