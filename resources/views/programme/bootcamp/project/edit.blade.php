
<div class="modal fade" id="edit_{{$project->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Edit {{$project->name}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('programme.bootcamp.project.update',[$project->id])}}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <label for="">Project Name</label>
                        <input type="text" class="input-group form-control"  value="{{$project->name}}" name="name">
                    </div>

                    <div class="form-group">
                        <label for="">Project Description</label>
                        <textarea name="description" id="" cols="30" rows="4" class="form-control">{{$project->description}}</textarea>
                    </div>

                    <button class="btn btn-primary btn-sm">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>