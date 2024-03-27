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
            <form
                action="{{ route ('admin.settings.update', ['id' => $user->id])}}"
                method="POST">
                @method('PATCH')
                @csrf
            <b>First Name:</b><br>
            <input type="text" name="firstname" value="{{ auth()->user()->first_name }}" class="form-control" required><br>
            <b>Last Name:</b><br>
            <input type="text" name="lastname" value="{{ auth()->user()->last_name }}" class="form-control" required><br>
            <b>Birthday:</b>
            <input type="date" name="birthday" value="{{ auth()->user()->birthdate }}" class="form-control" required id="birthdayInput"><br>
            <b>Address:</b></br>
            <input type="text" name="address" value="{{ auth()->user()->address }}" class="form-control" required><br>
            <b>Email Address:</b></br>
            <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control" required><br>
            <b>Contact Number:</b><br>
            <input type="number" name="contact" value="{{ auth()->user()->contact }}"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                maxlength="11" class="form-control" required><br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn-success">Edit</button>
            </div>
            </form>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>

<script>
    // Calculate minimum and maximum dates
    var currentDate = new Date();
    var maxDate = new Date(currentDate);
    maxDate.setFullYear(maxDate.getFullYear() - 18); // 18 years ago

    var minDate = new Date(currentDate);
    minDate.setFullYear(minDate.getFullYear() - 70); // 70 years ago

    // Format dates for input
    var formattedMaxDate = maxDate.toISOString().split('T')[0];
    var formattedMinDate = minDate.toISOString().split('T')[0];

    // Set minimum and maximum dates for the input field
    document.getElementById("birthdayInput").setAttribute("max", formattedMaxDate);
    document.getElementById("birthdayInput").setAttribute("min", formattedMinDate);
</script>