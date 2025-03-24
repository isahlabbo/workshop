
<div class="modal fade" id="newQuestion" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>New Assessment Question</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('schedule.allocation.question.register',[$allocation->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Question</label>
                        <textarea name="question" id="" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="row">
                    @foreach(['A', 'B','C','D'] as $questionOption)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Option {{$questionOption}}</label>
                            <input type="text" name="{{$questionOption}}" class="form-control">
                        </div>
                    </div>
                    @endforeach
                    </div>
                    <div class="form-group ">
                        <label for="">Answer</label>
                        <select name="answer" id="" class="input-group form-control">
                        <option value="">Select Answer</option>
                        @foreach(['A', 'B','C','D'] as $option)
                        <option value="{{$option}}">{{$option}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <button class="btn btn-primary">Add Question</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>