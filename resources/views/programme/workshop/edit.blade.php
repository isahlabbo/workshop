
<div class="modal fade" id="edit_{{$workshop->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Edit {{$workshop->title}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('programme.workshop.update',[$workshop->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Workshop Programme</label>
                        <select name="programme" class="form-control" id="">
                        <option value="{{$workshop->programme->id}}">{{$workshop->programme->name}}</option>
                        @foreach(App\Models\Programme::where('type','workshop')->get() as $programme)
                            @if($programme->id != $workshop->programme->id)
                            <option value="{{$programme->id}}">{{$programme->name}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Workshop Icon</label>
                        <input type="text" class="input-group form-control"  value="{{$workshop->icon}}" name="icon">
                    </div>

                    <div class="form-group">
                        <label for="">Workshop Title</label>
                        <input type="text" class="input-group form-control"  value="{{$workshop->title}}" name="title">
                    </div>

                    <div class="form-group">
                        <label for="">Workshop Description</label>
                        <textarea name="description" id="" class="form-control" cols="30" rows="3">{{$workshop->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Application Status</label>
                        <select name="application" class="form-control" id="">
                        <option value="{{$workshop->application}}">Application {{ucwords($workshop->application)}}</option>
                       
                            @if($workshop->application == 'close')
                            <option value="open">Open Application</option>
                            @else
                            <option value="close">Close Application</option>
                            @endif
                        
                        </select>
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