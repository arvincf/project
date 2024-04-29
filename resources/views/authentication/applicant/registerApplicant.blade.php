<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.header-package')
</head>

<body>
    <main class="authentication-container">
        <section class="side-image-content">
            <img src="{{ asset('assets/img/login.jpg') }}" alt="Picture">
        </section>
        <section class="authentication-form-container">
            <form action="{{ route('registerUser') }}" method="GET">
                @csrf
                <h1>Register New Applicant</h1>
                <input type="text" name="type" value="applicant" hidden>
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
                    <label for="birthday" class="form-label">Birthday</label>
                    <input type="date" id="birthdayInput" name="birthday" class="form-control" required
                        onchange="calculateAge()">
                </div>
                <div class="field-container">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" id="ageInput" name="age" class="form-control" autocomplete="off"
                        placeholder="Age" min="1" max="120" readonly>
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
                    <input type="text" name="contact" class="form-control"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        pattern="[0-9]{11}" title="Please enter 11 digits" minlength="11" maxlength="11"
                        placeholder="Contact Number" required
                        onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;">
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

<script>
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


    // Function to generate a random password
    function randomPassword(length) {
        var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        var password = "";
        for (var i = 0; i < length; i++) {
            password += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return password;
    }

    // Set the generated password to the password input field when the form is submitted
    document.getElementById("userForm").addEventListener("submit", function(event) {
        var passwordInput = document.getElementById("password");
        passwordInput.value = randomPassword(8); // Generate an 8-character random password
    });

    function calculateAge() {
        var birthday = new Date(document.getElementById('birthdayInput').value);
        var today = new Date();
        var age = today.getFullYear() - birthday.getFullYear();
        var monthDiff = today.getMonth() - birthday.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthday.getDate())) {
            age--;
        }
        document.getElementById('ageInput').value = age;
    }

</script>