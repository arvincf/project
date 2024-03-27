<div class="modal fade" id="adduser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">CREATE ACCOUNT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type === 'Manager' ? route('manager.manageusers.create') : route('admin.manageusers.create') }}"
                    method="POST">
                    @csrf
                    <label>Type</label></br>
                    <select name="type" class="form-select" required>
                        <option disabled selected hidden value="">Select Type</option>
                        <option value="Admin">Admin</option>
                        <option value="Supplier">Supplier</option>
                        <option value="Customer">Customer</option>
                    </select></br>
                    <label>Last Name</label></br>
                    <input type="text" name="lastname" class="form-control"
                        value="{{ !empty(old('lastname')) ? old('lastname') : null }}" placeholder="Last Name"
                        required></br>
                    <label>First Name</label></br>
                    <input type="text" name="firstname" class="form-control"
                        value="{{ !empty(old('firstname')) ? old('firstname') : null }}" placeholder="First Name"
                        required></br>
                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthdayInput" name="birthday" class="form-control" required></br>
                    <label>Age</label></br>
                    <input type="number" name="age" class="form-control"
                        value="{{ !empty(old('age')) ? old('age') : null }}"placeholder="Age" required></br>
                    <label>Address</label></br>
                    <input type="text" name="address" class="form-control"
                        value="{{ !empty(old('address')) ? old('address') : null }}"placeholder="Address" required></br>
                    <label>Email Address</label></br>
                    <input type="email" name="email" class="form-control"
                        value="{{ !empty(old('email')) ? old('email') : null }}" placeholder="Email Address"
                        required></br>
                    <label>Contact Number</label><br>
                    <input type="number" name="contact" class="form-control"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        pattern="[0-9]{11}" title="Please enter 11 digits" minlength="11" maxlength="11"
                        placeholder="Contact Number" required><br>
                    <label>Password</label></br>
                    <input type="password" name="password" class="form-control" required></br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
