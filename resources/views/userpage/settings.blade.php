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
                <input type="date" id="birthInput" value="{{ auth()->user()->birthdate }}" name="birthday"
                    class="form-control" required onchange="calculateAge({{ auth()->user()->id }})">
                <input type="number" id="ageInput" name="age" value="{{ auth()->user()->age }}"
                    class="form-control" min="1" max="120" hidden><br>
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

    

    // Set minimum and maximum dates for the input field
    document.getElementById("birthInput").setAttribute("max", formattedMaxDate);
    document.getElementById("birthInput").setAttribute("min", formattedMinDate);

    function calculateAge() {
        var birthday = new Date(document.getElementById('birthInput').value);
        var today = new Date();
        var age = today.getFullYear() - birthday.getFullYear();
        var monthDiff = today.getMonth() - birthday.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthday.getDate())) {
            age--;
        }
        document.getElementById('ageInput').value = age;
    }
</script>
