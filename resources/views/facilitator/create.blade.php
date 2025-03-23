
<div class="modal fade" id="facilitator" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW FACILITATOR REGISTRATION</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('facilitator.register')}}" method="post">
                    @csrf
                    <div class="form-group">
                    <label for="">Name</label>
                        <input type="text" class="input-group form-control" placeholder="Name" value="" name="name">
                    </div>

            
                <div class="form-group">
                <label for="">E-mail Address</label>
                    <input type="text" class="input-group form-control" placeholder="E-mail Address" value="" name="email">
                </div>

                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="text" class="input-group form-control" placeholder="Phone Number" value="" name="phone">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="input-group form-control" placeholder="Password" value="" name="password">
                </div>
                    
                    <button class="btn btn-primary btn-sm">REGISTER</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>