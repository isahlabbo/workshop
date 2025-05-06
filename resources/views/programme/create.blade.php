
<div class="modal fade" id="newProgramme" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>New Programme</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('programme.register')}}" method="post">
                    @csrf
                    <div class="form-group mb-4">
                        <input type="text" class="input-group form-control" placeholder="Name" value="{{old('name')}}" name="name">
                    </div>
                    
                    
                    <div class="form-group mb-4">
                        <input type="text" class="input-group form-control" placeholder="Icon" value="{{old('icon')}}" name="icon">
                    </div>
                    
                    <div class="form-group mb-4">
                        <select class="input-group form-control" name="type">
                        <option value="">Select Type</option>
                        <option value="bootcamp">Bootcamp</option>
                        <option value="workshop">Workshop</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-primary">Register</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>