
<div class="modal fade" id="edit_{{$participant->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            <b>Edit Participant</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" action="{{route('participant.update',[$participant->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{$participant->name}}"/>
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" value="{{$participant->email}}"/>
            </div>

            <div class="form-group">
                <label for="">Change Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Enter New Password"/>
            </div>

            <div class="form-group">
                <label for="">Role</label>
                <select name="role" id="" class="form-control">
                <option value="{{$participant->role}}">{{ucwords($participant->role)}}</option>
                @foreach(['Admin', 'Facilitator', 'Participant'] as $role)
                    @if(ucwords($participant->role) != $role)
                    <option value="{{strtolower($role)}}">{{$role}}</option>
                    @endif
                @endforeach
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