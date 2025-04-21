
<div class="modal fade" id="edit_role_{{$role->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            <b>Edit {{strtoupper($role->name)}}</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" action="{{route('access.role.update',[$role->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="input-group form-control" placeholder="Name" value="{{$role->name}}" name="name">
                </div>

                <button class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>