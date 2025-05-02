<div class="modal fade" id="pay" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Proceed to Online Payment</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('payment.authorize')}}" method="post">
                    @csrf
                    <p>Note: that this registration require to make the payment of {{number_format($programme->totalFees(),2)}} and transaction chages of less than 2%, and this Payment can be done online using Card, USSD, NQR, Bank Transfer and more.. </p>
                    <input type="hidden" name="amount" value="{{$programme->totalFees()}}">
                    <input type="hidden" name="title" value="{{$programme->title}}">
                    <input type="hidden" name="phone" value="{{Auth::user()->phone}}">
                    <input type="hidden" name="programmeId" value="{{$programme->id}}">

                    @if($programme->programme->type == 'workshop')
                    <input type="hidden" name="workshopId" value="{{$programme->id}}">
                    @else
                    <input type="hidden" name="bootcampId" value="{{$programme->id}}">
                    @endif
                    
                    <div class="form-group">
                        <label for="programme">Mode of Learning</label>
                        <select name="method" id="programme" class="form-control">
                            <option value="">Select Method</option>
                            <option value="online">Online</option>
                            <option value="physical">Physical</option>
                            <option value="blended">Blended (Online & Phisical)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="language">Preferred Language</label>
                        <select name="language" id="language" class="form-control">
                            <option value="">Select Language</option>
                            <option value="english">English</option>
                            <option value="hausa">Hausa</option>
                            <option value="combine">Combine (English & Hausa)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="schedule">Preferred Time</label>
                        <select name="schedule" id="language" class="form-control">
                            <option value="">Select Time</option>
                            <option value="morning">Morning</option>
                            <option value="afternoon">Afternoon</option>
                            <option value="evening">Evening</option>
                            <option value="night">Night</option>
                            <option value="weekend">Weekend</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="schedule">Coupon Code</label>
                        <input type="text" id="coupon" class="form-control" name="coupon">
                        <div id="success" class="text text-success"></div>
                        <div id="error" class="text text-warning"></div>
                    </div>
                    <button class="btn btn-info"><i class="fas fa-wallet"></i> Pay Now</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>