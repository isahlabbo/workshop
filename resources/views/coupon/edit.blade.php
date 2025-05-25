
<div class="modal fade" id="edit_{{$coupon->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            <b>EDIT {{strtoupper($coupon->name)}}</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" action="{{route('coupon.update',[$coupon->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" class="input-group form-control" placeholder="Name" value="{{$coupon->name}}" name="name">
                </div>

            
                <div class="form-group">
                    <label for="">Percentage</label>
                    <input type="text" class="input-group form-control" placeholder="Percentage off" value="{{$coupon->percentage}}" name="percentage">
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <input type="text" class="input-group form-control" placeholder="Status" value="{{$coupon->status}}" name="status">
                </div>


                <button class="btn btn-primary">UPDATE</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>