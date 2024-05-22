<div class="modal fade" id="claim{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Claiming</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type === 'manager' ? route('manager.claim.confirm', $product->id) : route('admin.claim.confirm', $product->id) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <h4 class="text-center">Are you sure this item is being claimed?</h4>
                    <h5 class="text-center">Claimer: {{ $product->customer_name }}</h5>
                    <input type="hidden" name="status" value="Claimed">
                    <input type="hidden" name="customer_name" value="{{ $product->customer_name }}">
                    <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                    <input type="hidden" name="price" value="{{ $product->unit_price }}">
                    <input type="hidden" name="quantity" value="{{ $product->quantity }}">
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Claim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
