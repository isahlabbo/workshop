<div class="modal fade" id="pay" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Proceed to Flutterwave Payment</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('payment.authorize')}}" method="post">
                    @csrf
                    <p>Note: that this registration require to make the payment of {{number_format($workshop->totalFees(),2)}} and transaction chages of less than 2%, and this Payment can be done online using Card, USSD, NQR, Bank Transfer and more.. </p>
                    <input type="hidden" name="amount" value="{{$workshop->totalFees()}}">
                    <input type="hidden" name="title" value="{{$workshop->title}}">
                    <input type="hidden" name="phone" value="08162463010">
                    <input type="hidden" name="workshopId" value="{{$workshop->id}}">
                    
                    <div class="form-group">
                        <label for="workshop">Mode of Workshop</label>
                        <select name="method" id="workshop" class="form-control">
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
                        <label for="schedule">Schedule</label>
                        <select name="schedule" id="language" class="form-control">
                            <option value="">Select Schedule</option>
                            <option value="morning">Morning</option>
                            <option value="afternoon">Afternoon</option>
                            <option value="evening">Evening</option>
                            <option value="night">Night</option>
                            <option value="weekend">Weekend</option>
                        </select>
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