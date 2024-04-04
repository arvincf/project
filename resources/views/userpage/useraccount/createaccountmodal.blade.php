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
                    <input type="text" name="lastname" class="form-control" autocomplete="off"
                        value="{{ !empty(old('lastname')) ? old('lastname') : null }}" placeholder="Last Name"
                        required></br>
                    <label>First Name</label></br>
                    <input type="text" name="firstname" class="form-control" autocomplete="off"
                        value="{{ !empty(old('firstname')) ? old('firstname') : null }}" placeholder="First Name"
                        required></br>
                    <label for="birthday">Birthday:</label></br>
                    <input type="date" id="birthdayInput" name="birthday" class="form-control" required
                        onchange="calculateAge()"></br>
                    <label>Age</label></br>
                    <input type="number" id="ageInput" name="age" class="form-control" autocomplete="off"
                        placeholder="Age" min="1" max="120" readonly></br>
                    <label>Address</label></br>
                    <input type="text" name="address" class="form-control" autocomplete="off"
                        value="{{ !empty(old('address')) ? old('address') : null }}"placeholder="Address" required></br>
                    <label>Email Address</label></br>
                    <input type="email" name="email" class="form-control"
                        value="{{ !empty(old('email')) ? old('email') : null }}" placeholder="Email Address"
                        required></br>
                    <label>Contact Number</label></br>
                    <input type="text" name="contact" class="form-control" autocomplete="off"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        pattern="[0-9]{11}" title="Please enter 11 digits" minlength="11" maxlength="11"
                        placeholder="Contact Number" required
                        onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;">
                    <div id="notification" style="display:none; color:red;">Need to have 11 digits for contact before
                        continuing</div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm" onclick="validateContact()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
