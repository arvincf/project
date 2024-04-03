<div class="modal fade" id="show{{ $coffeebean->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><b>{{ $coffeebean->coffee_name }}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <label><b>Process:</b></label><br>
                    <input type="radio" name="gender" value="male"> Brewed<br>
                    <input type="radio" name="gender" value="female"> Powdered<br>
                    <input type="radio" name="gender" value="others"> Others: 
                    <input type="text" name="others"><br>
                    <label><b>Use product: </b></label><br>
                    <select name="type" required>
                        <option disabled selected hidden value="">Unit</option>
                        <!-- Options for quantities from 1 to 25 -->
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                    </select>
                    KG<br>
                    <label><b>Quantity: </b></label>
                    <input type="number" class="form-control" name="quantity"
                    onkeypress="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8;">

            <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn-success">Store</button>
                </div>
            </div>
        </div>
    </div>
</div>