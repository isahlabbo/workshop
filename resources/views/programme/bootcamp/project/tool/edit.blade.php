
<div class="modal fade" id="edit_{{$tool->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Edit {{$project->name}} Tool</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('programme.bootcamp.project.tool.update',[$tool->id])}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Tool Name</label>
                        <input name="name" id=""  class="form-control" value="{{$tool->name}}">
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