<div class="row">
    <div class="col-md-4">
            <div class="panel profile">
                <div class="jumbotron text-center bg-red">
                    <img class="img-circle img-size-2" src="{{ asset('assets/img/no_image.png')}}" alt="">
                    <h3><?php echo $Firstname = auth()->user()->Firstname ?></h3>
                </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href=""> <i class="bi bi-pencil-square"></i> Edit profile</a></li>
                    </ul>
            </div>
     </div>
</div>
