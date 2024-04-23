<script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#searchUserBtn").on("click", function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ auth()->check() && auth()->user()->type === 'admin' ? route('admin.search.users') : route('manager.search.users') }}",
                method: "GET",
                data: {
                    name: $("#searchInput").val()
                },
                success(response) {
                    let userTableBody = $("#userTableBody");

                    userTableBody.empty();
                    response.userData.forEach(user => {
                        userTableBody.append(`
                            <tr>
                                <td>${user.type}</td>
                                <td>${user.first_name}</td>
                                <td>${user.last_name}</td>
                                <td>${user.age}</td>
                                <td>${user.address}</td>
                                <td>${user.contact}</td>
                                <td class="action-btn">
                                    <a href="#show${user.id}" class="btn-primary" title="View" data-bs-toggle="modal">
                                        <i class="bi bi-eye"></i>View
                                    </a>
                                    <a href="#edit${user.id}" class="btn-warning" title="Edit" data-bs-toggle="modal">
                                        <i class="bi bi-pencil-square"></i>Edit
                                    </a>
                                    <a href="#delete${user.id}" class="btn-danger" title="Remove" data-bs-toggle="modal">
                                        <i class=" bi bi-trash"></i>Remove
                                    </a>
                                </td>
                                @include('userpage.useraccount.useraccountmodal')
                            </tr>
                        `);
                    });
                }
            });
        });

        $('#searchInput').on('keyup', function() {
            let userInput = $(this).val().trim();

            if (userInput == "") {
                $.ajax({
                    url: "{{auth()->check() && auth()->user()->type === 'admin' ? route('admin.getUsersAccount') : route('manager.getUsersAccount') }}",
                    method: "GET",
                    success(response) {
                        let userTableBody = $("#userTableBody");

                        userTableBody.empty();
                        response.userData.forEach(user => {
                            userTableBody.append(`
                            <tr>
                                <td>${user.type}</td>
                                <td>${user.first_name}</td>
                                <td>${user.last_name}</td>
                                <td>${user.age}</td>
                                <td>${user.address}</td>
                                <td>${user.contact}</td>
                                <td class="action-btn">
                                    <a href="#show${user.id}" class="btn-primary" title="View" data-bs-toggle="modal">
                                        <i class="bi bi-eye"></i>View
                                    </a>
                                    <a href="#edit${user.id}" class="btn-warning" title="Edit" data-bs-toggle="modal">
                                        <i class="bi bi-pencil-square"></i>Edit
                                    </a>
                                    <a href="#delete${user.id}" class="btn-danger" title="Remove" data-bs-toggle="modal">
                                        <i class=" bi bi-trash"></i>Remove
                                    </a>
                                </td>
                                @include('userpage.useraccount.useraccountmodal')
                            </tr>
                        `);
                        });
                    }
                });
            }
        });
    });
</script>