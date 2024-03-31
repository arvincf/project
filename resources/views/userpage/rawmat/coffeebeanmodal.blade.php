<div class="modal fade" id="show{{ $coffeebean->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">SHOW USER INFO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <label><b>Gender:</b></label><br>
                    <input type="radio" name="gender" value="male">Male<br>
                    <input type="radio" name="gender" value="female">Female<br>
                    <input type="radio" name="gender" value="others">Others
                    <input type="text" name="others">
            <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>