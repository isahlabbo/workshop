
<div class="modal fade" id="edit_{{$programme->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>EDIT {{strtoupper($programme->name)}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('programme.update',[$programme->id])}}" method="post">
                    @csrf
                    
                    <div class="form-group mb-4">
                        <input type="text" class="input-group form-control" placeholder="Name" value="{{$programme->name}}" name="name">
                    </div>
                    
                    
                    <div class="form-group mb-4">
                        <input type="text" class="input-group form-control" placeholder="Icon" value="{{$programme->icon}}" name="icon">
                    </div>
                    
                    <div class="form-group mb-4">
                        <select class="input-group form-control" name="type">
                        <option value="{{$programme->type}}">{{ucwords($programme->type)}}</option>
                       @if($programme->type == 'workshop')
                        <option value="bootcamp">Bootcamp</option>
                       @else
                        <option value="workshop">Workshop</option>
                        @endif
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