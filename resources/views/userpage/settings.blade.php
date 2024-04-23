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
                action="{{ auth()->check() && auth()->user()->type === 'admin'
                    ? route('admin.settings.update', ['id' => $user->id])
                    : (auth()->check() && auth()->user()->type === 'supplier'
                        ? route('supplier.settings.update', ['id' => $user->id])
                        : (auth()->check() && auth()->user()->type === 'manager'
                            ? route('manager.settings.update', ['id' => $user->id])
                            : (auth()->check() && auth()->user()->type === 'applicant'
                                ? route('applicant.settings.update', ['id' => $user->id])
                                : route('customer.settings.update', ['id' => $user->id])))) }}"
                method="POST">
                @method('PATCH')
                @csrf
                <b>First Name:</b><br>
                <input type="text" name="firstname" value="{{ auth()->user()->first_name }}" class="form-control"
                    required><br>
                <b>Last Name:</b><br>
                <input type="text" name="lastname" value="{{ auth()->user()->last_name }}" class="form-control"
                    required><br>
                <b>Birthday:</b>
                <input type="date" id="birthInput{{ auth()->user()->id }}" value="{{ auth()->user()->birthdate }}" name="birthday"
                    class="form-control" required onchange="calcAge({{ auth()->user()->id }})">
                <input type="hidden" id="countageInput{{ auth()->user()->id }}" name="age" value="{{ auth()->user()->age }}"
                    class="form-control" min="1" max="120"><br>
                <b>Address:</b></br>
                <input type="text" name="address" value="{{ auth()->user()->address }}" class="form-control"
                    required><br>
                <b>Email Address:</b></br>
                <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control"
                    required><br>
                <b>Contact Number:</b><br>
                <input type="text" name="contact" class="form-control" value="{{ auth()->user()->contact }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    pattern="[0-9]{11}" title="Please enter 11 digits" minlength="11" maxlength="11"
                    placeholder="Contact Number" required
                    onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;"><br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn-success">Edit</button>
                    <br><br>
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

    function calcAge(userId) {
        var birthday = new Date(document.getElementById('birthInput' + userId).value);
        var today = new Date();
        var birthDate = new Date(birthday);
        var age = today.getFullYear() - birthDate.getFullYear();
        var month = today.getMonth() - birthDate.getMonth();
        if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        document.getElementById('countageInput' + userId).value = age;
    }
</script>
