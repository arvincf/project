<div class="modal fade" id="delivered{{ $deliver->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">REMOVE PRODUCT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action=""
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <h4 class="text-center">Are yuo sure that this product is delivered</h4>
                    <h5 class="text-center">Product Name: {{ $deliver->prodName }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Delivered</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
