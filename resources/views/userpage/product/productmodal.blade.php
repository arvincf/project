<div class="modal fade" id="addproduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">ADD PRODUCT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type == 'manager' ? route('manager.product.add') : route('admin.product.add') }}"
                    method="post">
                    @csrf
                    <label for="product_name">Product Name</label><br>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name"
                         required>
                    <label for="quantity">Quantity</label><br>
                    <input type="number" name="quantity" class="form-control" placeholder="Quantity" min="1"
                        onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;" required>
                    <label for="unit_price">Unit Price</label><br>
                    <input type="number" name="unit_price" class="form-control" placeholder="Unit Price"
                        pattern="[0-9]{11}" minlength="1" min="1"
                        onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;" required>
                    <label for="details">Details</label><br>
                    <input type="text" name="details" class="form-control" placeholder="Details"
                        required>
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">EDIT PRODUCT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type == 'manager' ? route('manager.product.edit', $product->id) : route('admin.product.edit', $product->id) }}"
                    method="POST">
                    @method('PUT')
                    @csrf
                    <label for="product_name">Product Name</label><br>
                    <input type="text" name="product_name" value="{{ $product->name }}" class="form-control"
                        placeholder="Product Name" required>
                    <label for="quantity">Quantity</label><br>
                    <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control"
                        placeholder="Quantity" min="1"
                        onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;" required>
                    <label for="unit_price">Unit Price</label><br>
                    <input type="text" name="unit_price" value="{{ $product->unit_price }}" class="form-control"
                        placeholder="Unit Price"
                        onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;" required>
                    <label for="details">Details</label><br>
                    <input type="text" name="details" value="{{ $product->details }}" class="form-control"
                        placeholder="Details" required>
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="remove{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">REMOVE PRODUCT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ auth()->check() && auth()->user()->type === 'manager' ? route('manager.product.remove', $product->id) : route('admin.product.remove', $product->id) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <h4 class="text-center">Are you sure you want to remove this product?</h4>
                    <h5 class="text-center">Product Name: {{ $product->name }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Remove</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
