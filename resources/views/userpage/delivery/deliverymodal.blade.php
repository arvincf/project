<div class="modal fade" id="delivered{{ $deliver->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">DELIVERED PRODUCT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type == 'manager' ? route('manager.update.delivery', $deliver->id) : route('admin.delivery.update', $deliver->id) }}"
                    method="POST">
                    @method('PUT')
                    @csrf
                    <h4 class="text-center">Are you sure that this product is delivered?</h4>
                    <h5 class="text-center">Product Name: {{ $deliver->product_name }}</h5>
                    <input type="hidden" name="status" value="Delivered">
                    <div class="modal-footer">
                        <button type="submit" class="btn-success">Deliver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
