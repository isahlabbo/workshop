
<div class="modal fade" id="coupon" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Generate New Coupon</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('coupon.generate')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <select class="input-group form-control" name="quantity">
                            <option value="">Select Quantity</option>
                            @for($percent = 1; $percent <=25; $percent++)
                                <option value="{{$percent}}">{{$percent}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Percentage off</label>
                        <select class="input-group form-control" name="percentage">
                            <option value="">Select Percentage off</option>
                            @for($percent = 1; $percent <=100; $percent++)
                                <option value="{{$percent}}">{{$percent}}%</option>
                            @endfor
                        </select>
                    </div>
                    <button class="btn btn-primary btn-sm">Generate</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>