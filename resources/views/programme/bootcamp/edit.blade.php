
<div class="modal fade" id="edit_{{$bootcamp->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Edit {{$bootcamp->title}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('bootcamp.update',[$bootcamp->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Bootcamp Programme</label>
                        <select name="programme" class="form-control" id="">
                        <option value="{{$bootcamp->programme->id}}">{{$bootcamp->programme->name}}</option>
                        @foreach(App\Models\Programme::where('type','bootcamp')->get() as $programme)
                            @if($programme->id != $bootcamp->programme->id)
                            <option value="{{$programme->id}}">{{$programme->name}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Bootcamp Icon</label>
                        <input type="text" class="input-group form-control"  value="{{$bootcamp->icon}}" name="icon">
                    </div>

                    <div class="form-group">
                        <label for="">Bootcamp Title</label>
                        <input type="text" class="input-group form-control"  value="{{$bootcamp->title}}" name="title">
                    </div>

                    <div class="form-group">
                        <label for="">Bootcamp Description</label>
                        <textarea name="description" id="" class="form-control" cols="30" rows="3">{{$bootcamp->description}}</textarea>
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