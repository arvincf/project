<div class="modal fade" id="request" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">REQUESTING PRODUCT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ auth()->check() && auth()->user()->type === 'manager' ? route('manager.request.add') : route('admin.request.add') }}" method="POST">
                    @csrf
                    <label>Supplier</label><br>
                    <select name="supplier" class="form-select" required>
                        <option disabled selected hidden value="">Select Supplier</option>
                        @foreach ($user as $users)
                            @if ($users->type == 'Supplier')
                                <option value="{{ $users->first_name }}">{{ $users->first_name }}</option>
                            @endif
                        @endforeach
                    </select><br>
                    <label>Product</label><br>
                    <select name="prodName" class="form-select" required>
                        <option disabled selected hidden value="">Select Product</option>
                        @foreach ($coffeebeans as $coffeebean)
                            <option value="{{ $coffeebean->coffee_name }}">{{ $coffeebean->coffee_name }}</option>
                        @endforeach
                    </select><br>
                    <input type="hidden" name="status" value="Confirming...">
                    <label>Quantity</label><br>
                    <input type="number" class="form-control" name="quantity" min="1"
                    onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;"><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Request Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for DELIVER FORM -->
<div class="modal fade" id="adddeliver" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">DELIVER FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('supplier.delivery.add') }}" method="POST">
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
                    <input id="deliverQuantityInput" type="number" name="quantity" class="form-control" value="1"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        pattern="[0-9]{11}" minlength="5" maxlength="5" min="1"
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
    $(document).ready(function(){
        // Set quantity to 1 when the modal is shown for request
        $('#request').on('show.bs.modal', function (event) {
            $('#requestQuantityInput').val('1');
        });

        // Set quantity to 1 when the modal is shown for delivery
        $('#adddeliver').on('show.bs.modal', function (event) {
            $('#deliverQuantityInput').val('1');
        });
    });
</script>
