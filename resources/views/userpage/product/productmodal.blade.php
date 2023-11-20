<div class="modal fade" id="addproduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">ADD PRODUCT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.add.product') }}" method="post">
                    @csrf
                    <label for="product_name">Product Name</label><br>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name"
                        autocomplete="off" required>
                    <label for="quantity">Quantity</label><br>
                    <input type="number" name="quantity" class="form-control" placeholder="Quantity" autocomplete="off"
                        required>
                    <label for="unit_price">Unit Price</label><br>
                    <input type="text" name="unit_price" class="form-control" placeholder="Unit Price"
                        autocomplete="off" required>
                    <label for="supplier_name">Supplier Name</label><br>
                    <input type="text" name="supplier_name" class="form-control" placeholder="Supplier Name"
                        autocomplete="off" required>
                    <label for="details">Details</label><br>
                    <input type="text" name="details" class="form-control" placeholder="Details" autocomplete="off"
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
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">EDIT PRODUCT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.edit.product', $product->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label for="product_name">Product Name</label><br>
                    <input type="text" name="product_name" value="{{ $product->prodname }}" class="form-control"
                        placeholder="Product Name" autocomplete="off" required>
                    <label for="quantity">Quantity</label><br>
                    <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control"
                        placeholder="Quantity" autocomplete="off" required>
                    <label for="unit_price">Unit Price</label><br>
                    <input type="text" name="unit_price" value="{{ $product->unitprice }}" class="form-control"
                        placeholder="Unit Price" autocomplete="off" required>
                    <label for="supplier_name">Supplier Name</label><br>
                    <input type="text" name="supplier_name" value="{{ $product->supplierName }}" class="form-control"
                        placeholder="Supplier Name" autocomplete="off" required>
                    <label for="details">Details</label><br>
                    <input type="text" name="details" value="{{ $product->details }}" class="form-control"
                        placeholder="Details" autocomplete="off" required>
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-warning">Edit</button>
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
                <form action="{{ route('admin.remove.product', $product->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <h4 class="text-center">Are you sure you want to remove this product?</h4>
                    <h5 class="text-center">Product Name: {{ $product->prodname }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success">Remove</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
