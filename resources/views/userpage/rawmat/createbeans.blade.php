<div class="modal fade" id="createbeans" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">ADD BEAN FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form
                    action="{{ auth()->check() && auth()->user()->type == 'manager' ? route('manager.beans.add') : route('admin.beans.add') }}"
                    method="post">
                    @csrf
                    <label for="coffee_name">Coffee Name</label><br>
                    <input type="text" name="coffee_name" class="form-control" placeholder="Coffee Name" required>
                    <label for="quantity">Quantity</label><br>
                    <input type="number" name="quantity" class="form-control" placeholder="Quantity" min="1"
                        onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;"
                        required>
                    <label for="supplier_name">Supplier Name</label><br>
                    <input type="text" name="supplier_name" class="form-control" placeholder="Supplier Name" required>
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" required>
                    <div class="modal-footer">
                        <button type="submit" class="btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

