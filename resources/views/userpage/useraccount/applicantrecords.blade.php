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
            <h1>Applicant Records</h1>
            <div class="card">
                <div class="card-body">
                    <form class="form-inline d-flex">
                        <input id="searchapplicantInput" name="name" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search for ...">
                        <button class="btn btn-primary" id="searchApplicantBtn"><i class="bi bi-search"></i></button>
                    </form>
                    <br></br>
                    <table class="table">
                        <thead>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Actions</th>
                        </thead>
                        <tbody id="userTableBody">
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td style="width:30%;">
                                        <div class="action-btn">
                                            <a href="#show{{ $user->id }}" class="btn-primary" title="View"
                                                data-bs-toggle="modal"><i class="bi bi-eye"></i>View
                                            </a>
                                            <a href="#approve{{ $user->id }}" class="btn-success" title="Approve"
                                                data-bs-toggle="modal"><i class="bi bi-check-lg"></i>Approve
                                            </a>
                                        </div>
                                        @include('userpage.useraccount.approvemodal')
                                    </td>
                                    @include('userpage.useraccount.useraccountmodal')
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Applicant found.</td>
                                </tr>
                            @endforelse
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    @include('partials.toastr-script')
</body>

</html>
