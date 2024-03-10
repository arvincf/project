<div class="modal fade" id="request" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">REQUESTING PRODUCT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ auth()->check() && auth()->user()->type === 'Manager' ? route('manager.request.add') : route('admin.request.add') }}" method="POST">
                    @csrf
                    <label>Supplier</label></br>
                    <select name="supplier" class="form-select" required>
                        <option disabled selected hidden value="">Select Supplier</option>
                        @foreach ($user as $users)
                            @if ($users->type == 'Supplier')
                                <option value="{{ $users->first_name }}">{{ $users->first_name }}</option>
                            @endif
                        @endforeach
                    </select></br>

                    <label>Product</label></br>
                    <select name="prodName" class="form-select" required>
                        <option disabled selected hidden value="">Select Product</option>
                        @foreach ($coffeebeans as $coffeebean)
                            <option value="{{ $coffeebean->coffee_name }}">{{ $coffeebean->coffee_name }}</option>
                        @endforeach
                    </select></br>
                    <input type="hidden" name="status" value="Confirming...">
                    <label>Quantity</label><br>
                    <input type="number" name="quantity" class="form-control"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        pattern="[0-9]{11}" minlength="5" maxlength="5" placeholder="Quantity" required><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Request Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
