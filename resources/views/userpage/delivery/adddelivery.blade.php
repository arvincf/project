<div class="modal fade" id="adddeliver" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">DELIVER FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deliveryForm" action="{{ route('supplier.delivery.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="supplierName" value="{{ auth()->user()->first_name }}">
                    <label>Product</label><br>
                    <select name="prodName" class="form-select" required>
                        <option disabled selected hidden value="">Select Product</option>
                        @foreach ($coffeebeans as $coffeebean)
                            <option value="{{ $coffeebean->coffee_name }}">{{ $coffeebean->coffee_name }}</option>
                        @endforeach
                    </select><br>
                    <input type="hidden" name="status" value="On Deliver">
                    <label>Quantity</label><br>
                    <input id="quantityInput" type="number" name="quantity" class="form-control"
                        pattern="[0-9]{11}" minlength="1" min="1"
                        onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;" required><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Deliver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // jQuery is used here, make sure to include it before this script
    $('#adddeliver').on('show.bs.modal', function(event) {
        // Set the value of the quantity input field to 1 when the modal is shown
        $('#quantityInput').val('1');
    });
</script>
