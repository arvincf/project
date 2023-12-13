<div class="modal fade" id="adddeliver" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">DELIVER FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ route('member.adddelivery') }}"
                    method="POST">
                    @csrf
                    <label>Product</label></br>
                    <select name="prodname" class="form-select" required>
                        <option disabled selected hidden value="">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->prodname }}">{{ $product->prodname }}</option>
                        @endforeach
                    </select></br>
                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday" class="form-control" required></br>
                    <label>Quantity</label><br>
                    <input type="number" name="contact" class="form-control"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        pattern="[0-9]{11}" minlength="5" maxlength="5"
                        placeholder="Quantity" required><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Deliver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

