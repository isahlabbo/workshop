
<div class="modal fade" id="edit_{{$centre->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            <b>EDIT {{strtoupper($centre->name)}}</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" action="{{route('centre.update',[$centre->id])}}" method="post">
                @csrf
                <div class="form-group">
                <label for="">Centre Name</label>
                    <input type="text" class="input-group form-control" placeholder="Name" value="{{$centre->name}}" name="name">
                </div>

            
                <div class="form-group">
                <label for="">Centre Address</label>
                    <input type="text" class="input-group form-control" placeholder="Address" value="{{$centre->address}}" name="address">
                </div>

                <div class="form-group">
                    <label for="">Centre Capacity</label>
                    <input type="text" class="input-group form-control" placeholder="Capacity" value="{{$centre->capacity}}" name="capacity">
                </div>

                <div class="form-group">
                    <label for="">Centre Contact</label>
                    <input type="text" class="input-group form-control" placeholder="Contact" value="{{$centre->contact}}" name="contact">
                </div>

                <button class="btn btn-primary">UPDATE</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>