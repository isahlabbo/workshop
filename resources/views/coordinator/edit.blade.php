
<div class="modal fade" id="edit_{{$coordinator->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            <b>Edit Coordinator</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" action="{{route('coordinator.update',[$coordinator->id])}}" method="post">
                @csrf
                <div class="form-group">
                <label for="">Facilitator</label>
                <select name="facilitator" id="" class="form-control">
                <option value="{{$coordinator->user->id}}">{{$coordinator->user->name}}</option>
                @foreach(App\Models\User::where('role', 'facilitator')->get() as $facilitator)
                    <option value="{{$facilitator->id}}">{{$facilitator->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Programme</label>
                <select name="programme" id="" class="form-control">
                <option value="{{$coordinator->programme->id}}">{{$coordinator->programme->name}}</option>
                @foreach(App\Models\Programme::all() as $programme)
                    <option value="{{$programme->id}}">{{$programme->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                <option value="{{$coordinator->status}}">{{ucwords($coordinator->status)}}</option>
                <option value="active">Active</option>
                <option value="revoke">Revoke</option>
                </select>
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