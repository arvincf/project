<div class="modal fade" id="approve{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">APPROVING ACCOUNT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type === 'Manager' ? route('manager.newapplicant.update', $user->id) : route('admin.newapplicant.update', $user->id) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <h4 class="text-center">Are you sure to make this user to become a member?</h4>
                    <h5 class="text-center">Product Name: {{ $user->first_name }}</h5>
                    <input type="hidden" name="type" value="Supplier">
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
