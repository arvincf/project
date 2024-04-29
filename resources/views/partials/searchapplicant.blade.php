<script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#searchApplicantBtn").on("click", function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ auth()->check() && auth()->user()->type === 'admin' ? route('admin.search.applicant') : route('manager.search.applicant') }}",
                method: "GET",
                data: {
                    name: $("#searchapplicantInput").val()
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
                                <td style="width:30%;">
                                    <div class="action-btn">
                                        <a href="#show${user.id}" class="btn-primary" title="View"
                                            data-bs-toggle="modal"><i class="bi bi-eye"></i>View
                                        </a>
                                        <a href="#approve${user.id}" class="btn-success" title="Approve"
                                            data-bs-toggle="modal"><i class="bi bi-check-lg"></i>Approve
                                        </a>
                                        <a href="" class="btn-danger" title="Disapproved"
                                            data-bs-toggle="modal"><i class="bi bi-x-lg"></i>Disapproved
                                         </a>
                                    </div>
                                    @include('userpage.useraccount.approvemodal')
                                </td>
                                @include('userpage.useraccount.useraccountmodal')
                            </tr>
                        `);
                    });
                }
            });
        });

        $('#searchapplicantInput').on('keyup', function() {
            let userInput = $(this).val().trim();

            if (userInput == "") {
                $.ajax({
                    url: "{{auth()->check() && auth()->user()->type === 'admin' ? route('admin.getApplicant') : route('manager.getApplicant') }}",
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
                                <td style="width:30%;">
                                    <div class="action-btn">
                                        <a href="#show${user.id}" class="btn-primary" title="View"
                                            data-bs-toggle="modal"><i class="bi bi-eye"></i>View
                                        </a>
                                        <a href="#approve${user.id}" class="btn-success" title="Approve"
                                            data-bs-toggle="modal"><i class="bi bi-check-lg"></i>Approve
                                        </a>
                                        <a href="" class="btn-danger" title="Disapproved"
                                            data-bs-toggle="modal"><i class="bi bi-x-lg"></i>Disapproved
                                         </a>
                                    </div>
                                    @include('userpage.useraccount.approvemodal')
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
