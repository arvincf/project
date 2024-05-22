<div class="modal fade" id="view{{ $sale->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">PRODUCT INFORMATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Customer Name: {{ $sale->customer_name }}</h5>
                <p class="text-center">Product Name: {{ $sale->product_name }}</p>
                <p class="text-center">Product Quantity: {{ $sale->product_quantity }}</p>
            </div>
        </div>
    </div>
</div>
