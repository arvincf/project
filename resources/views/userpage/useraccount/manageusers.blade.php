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
            <h1>Users Account</h1>
            <button type="button" class="btn-success" data-bs-toggle="modal" data-bs-target="#adduser">
                <i class="bi bi-plus-lg"></i>Create User
            </button><br><br>
            <div class="user-table-body"></div>
            @include('userpage.useraccount.createaccountmodal')
            <div class="card">
                <div class="card-body">
                    <form class="form-inline d-flex">
                        <input id="searchInput" name="name" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search for ...">
                        <button class="btn btn-primary" id="searchUserBtn"><i class="bi bi-search"></i></button>
                    </form>
                    <table class="table">
                        <thead> 
                            <th>User Type</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </thead>
                        <tbody id="userTableBody">
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->contact }}</td>
                                    <td class="action-btn">
                                        <a href="#show{{ $user->id }}" class="btn-primary" title="View"
                                            data-bs-toggle="modal"><i class="bi bi-eye"></i>View
                                        </a>
                                        <a href="#edit{{ $user->id }}" class="btn-warning" title="Edit"
                                            data-bs-toggle="modal">
                                            <i class="bi bi-pencil-square"></i>Edit
                                        </a>
                                        <a href="#delete{{ $user->id }}" class="btn-danger" title="Remove"
                                            data-bs-toggle="modal">
                                            <i class=" bi bi-trash"></i>Remove
                                        </a>
                                    </td>
                                    @include('userpage.useraccount.useraccountmodal')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">{{ $users->links() }}</div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @include('partials.search')
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
