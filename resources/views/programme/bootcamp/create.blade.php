
<div class="modal fade" id="newBootcamp" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Register New Bootcamp</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('programme.bootcamp.register')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Bootcamp Programme</label>
                        <select name="programme" class="form-control" id="">
                        <option value="">Select Programme</option>
                        @foreach(App\Models\Programme::where('type','bootcamp')->get() as $programme)
                            <option value="{{$programme->id}}">{{$programme->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Bootcamp Icon</label>
                        <input type="text" class="input-group form-control"  value="{{old('icon')}}" name="icon">
                    </div>

                    <div class="form-group">
                        <label for="">Bootcamp Title</label>
                        <input type="text" class="input-group form-control"  value="{{old('title')}}" name="title">
                    </div>

                    <div class="form-group">
                        <label for="">Bootcamp Description</label>
                        <textarea name="description" id="" class="form-control" cols="30" rows="3">{{old('decsription')}}</textarea>
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