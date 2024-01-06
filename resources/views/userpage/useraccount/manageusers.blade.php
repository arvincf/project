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
            <div class="user-table-body"></div>
            @include('userpage.useraccount.createaccountmodal')
            <div class="card">
                <div class="card-body">
                    <form class="form-inline d-flex">
                        <input id="searchInput" name="name" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search for ...">
                        <button class="btn btn-primary" id="searchUserBtn"><i class="bi bi-search"></i></button>
                    </form>
                    <table class="table">
                        <button type="button" class="btn-success" data-bs-toggle="modal" data-bs-target="#adduser">
                            <i class="bi bi-plus-lg"></i>Create User
                        </button>
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
