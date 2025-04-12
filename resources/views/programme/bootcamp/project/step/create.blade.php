
<div class="modal fade" id="step_{{$project->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Add Project Step</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('programme.bootcamp.project.step.register',[$project->id])}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Procedure</label>
                        <textarea name="title" id="" cols="30" rows="4" class="form-control">{{old('title')}}</textarea>
                    </div>

                    <button class="btn btn-primary btn-sm">Register</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>