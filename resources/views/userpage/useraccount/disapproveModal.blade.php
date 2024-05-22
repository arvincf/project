<div class="modal fade" id="disapprove{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">DISAPPROVED ACCOUNT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type === 'manager' ? route('manager.applicant.remove', $user->id) : route('admin.applicant.remove', $user->id) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <h4 class="text-center">Are you sure to make this user to refuse this applicant?</h4>
                    <h5 class="text-center">User Name: {{ $user->first_name }}</h5>
                    <input type="hidden" name="type" value="disapprove">
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Disapproved</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
