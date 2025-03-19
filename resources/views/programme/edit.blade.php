
<div class="modal fade" id="edit_{{$production->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>EDIT {{strtoupper($production->name)}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('production.update',[$production->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{$production->name}}" name="name">
                    </div>
                    <br>
                
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="QUANTITY" value="{{$production->quantity}}" name="quantity">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="PPRICE" value="{{$production->price}}" name="price">
                    </div>
                    <br>
                    <button class="btn btn-primary">UPDATE</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>