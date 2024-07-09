<div class="modal fade" id="show{{ $coffeebean->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><b>{{ $coffeebean->coffee_name }}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <label><b>Process:</b></label><br>
                    <input type="radio" name="process" value="Brewed"> Brewed<br>
                    <input type="radio" name="process" value="Powdered"> Powdered<br>
                    <input type="radio" name="process" value="others"> Others:
                    <input type="text" name="others"><br>
                    <label><b>Use product: </b></label><br>
                    <select name="prodquantity" required>
                        <option disabled selected hidden value="">Unit</option>
                        <!-- Options for quantities from 1 to 25 -->
                        @for ($i = 1; $i <= 25; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    KG<br>
                    <label><b>Quantity: </b></label>
                    <input type="number" class="form-control" name="quantity" min="1"
                        onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;">
                    <label><b>Expiration Date:</b></label>
                    <input type="date" id="ExipiredInput" name="expdate" class="form-control" required
                        min="{{ date('Y-m-d', strtotime('+6 years')) }}"><br>
                    <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
