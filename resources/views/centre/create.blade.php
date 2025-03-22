
<div class="modal fade" id="centre" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW CENTER REGISTRATION</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('centre.register')}}" method="post">
                    @csrf
                    <div class="form-group">
                <label for="">Centre Name</label>
                    <input type="text" class="input-group form-control" placeholder="Name" value="" name="name">
                </div>

            
                <div class="form-group">
                <label for="">Centre Address</label>
                    <input type="text" class="input-group form-control" placeholder="Address" value="" name="address">
                </div>

                <div class="form-group">
                    <label for="">Centre Capacity</label>
                    <input type="text" class="input-group form-control" placeholder="Capacity" value="" name="capacity">
                </div>

                <div class="form-group">
                    <label for="">Centre Contact</label>
                    <input type="text" class="input-group form-control" placeholder="Contact" value="" name="contact">
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