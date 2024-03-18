<div class="modal fade" id="show{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">SHOW USER INFO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-bold">User Id:<span class="fw-normal"> {{ $user->id }}</span></p>
                <p class="fw-bold">First Name:<span class="fw-normal"> {{ $user->first_name }}</span></p>
                <p class="fw-bold">Last Name:<span class="fw-normal"> {{ $user->last_name }}</span></p>
                <p class="fw-bold">Address:<span class="fw-normal"> {{ $user->address }}</span></p>
                <p class="fw-bold">Email:<span class="fw-normal"> {{ $user->email }}</span></p>
                <p class="fw-bold">Contact:<span class="fw-normal"> {{ $user->contact }}</span></p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="edit{{ $user->id }}">EDIT ACCOUNT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type == 'Manager' ? route('manager.manageusers.update', $user->id) : route('admin.manageusers.update', $user->id) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <label> {{ $user->id }} </label><br>
                    <label>First Name</label><br>
                    <input type="text" name="firstname" value="{{ $user->first_name }}" class="form-control">
                    <label>Last Name</label><br>
                    <input type="text" name="lastname" value="{{ $user->last_name }}" class="form-control">
                    <label>Address</label><br>
                    <input type="text" name="address" value="{{ $user->address }}" class="form-control">
                    <label>Email Address</label><br>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                    <label>Contact Number</label><br>
                    <input type="number" name="contact" value="{{ $user->contact }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="11" class="form-control">
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="delete{{ $user->id }}">REMOVE ACCOUNT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type === 'Manager' ? route('manager.manageusers.delete', $user->id) : route('admin.manageusers.delete', $user->id) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <h4 class="text-center">Are you sure you want to remove User?</h4>
                    <h5 class="text-center">Name: {{ $user->first_name }} {{ $user->last_name }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Remove</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

