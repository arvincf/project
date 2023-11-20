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
            <h1>Applicant</h1>
            <div class="card">
                <div class="card-body">
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
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->contact }}</td>
                                    <td style="width:30%;">
                                        <div class="action-btn">
                                            <a href="#" class="btn-success" title="Approve"
                                                data-bs-toggle="modal"><i class="bi bi-check-lg"></i>Approve
                                            </a>
                                            <a href="#show{{ $user->id }}" class="btn-warning" title="View"
                                                data-bs-toggle="modal"><i class="bi bi-eye"></i>View
                                            </a>
                                            <a href="#" class="btn-primary" title="Edit" data-bs-toggle="modal">
                                                <i class="bi bi-pencil-square"></i>Edit</a>
                                            <a href="#" class="btn-danger" title="Remove" data-bs-toggle="modal">
                                                <i class="bi bi-trash"></i>Remove</a>
                                        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
