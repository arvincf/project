<div class="modal fade" id="confirm{{ $requests->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">CONFIRMATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ route('supplier.request.confirm', $requests->id) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <h4 class="text-center">Are you sure you confirm this request?</h4>
                    <input type="hidden" name="status" value="Confirmed">
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>