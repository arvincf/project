<div class="modal fade" id="claim{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Claiming</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type === 'Manager' ? route('manager.claim.confirm', $product->id) : route('admin.claim.confirm', $product->id) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <h4 class="text-center">Are you sure this item is being claimed?</h4>
                    <h5 class="text-center">Claimer: {{ $product->customer_name }}</h5>
                    <input type="hidden" name="status" value="Claimed">
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Claim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
