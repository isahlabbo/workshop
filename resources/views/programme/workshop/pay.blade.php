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
                <form action="{{route('workshop.payment.authorize')}}" method="post">
                    @csrf
                    
                    <input type="hidden" disabled name="amount" value="{{$workshop->totalFees()}}" class="form-control">
                    
                    <div class="form-group">
                        <label for="workshop">Mode of Workshop</label>
                        <select name="workshop" id="" class="form-control">
                            <option value="">Select Method</option>
                            <option value="">Online</option>
                            <option value="">Physical</option>
                            <option value="">Blended (Online & Phisical)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="workshop">Preferred Language</label>
                        <select name="workshop" id="" class="form-control">
                            <option value="">Select Language</option>
                            <option value="">English</option>
                            <option value="">Hausa</option>
                            <option value="">Combine (English & Hausa)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="workshop">Schedule</label>
                        <select name="workshop" id="" class="form-control">
                            <option value="">Select Schedule</option>
                            <option value="">Morning</option>
                            <option value="">Afternoon</option>
                            <option value="">Evening</option>
                            <option value="">Night</option>
                            <option value="">Weekend</option>
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