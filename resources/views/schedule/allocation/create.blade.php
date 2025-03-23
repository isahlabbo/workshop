
<div class="modal fade" id="allocate_{{$topic->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>FACILITATOR TOPIC ALLOCATION</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('schedule.allocation.register',[$schedule->id, $topic->id])}}" method="post">
                    @csrf
                        <div class="form-group ">
                            <label for="">Facilitator</label>
                            <select name="facilitator" id="" class="input-group form-control">
                            @foreach(App\Models\User::where('role','facilitator')->get() as $facilitator)
                            <option value="{{$facilitator->id}}">{{$facilitator->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    
                    <button class="btn btn-primary">Allocate</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>