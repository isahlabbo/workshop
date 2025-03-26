
<div class="modal fade" id="edit_{{$question->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Edit Assessment Question</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('schedule.allocation.question.update',[$question->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Question</label>
                        <textarea name="question" id="" cols="30" rows="3" class="form-control">{{$question->content}}</textarea>
                    </div>
                    <div class="row">
                    @foreach($question->options as $questionOption)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Option {{$questionOption->name}}</label>
                            <input type="text" name="{{$questionOption->name}}" class="form-control" value="{{$questionOption->content}}">
                        </div>
                    </div>
                    @endforeach
                    </div>
                    <div class="form-group ">
                        <label for="">Answer</label>
                        <select name="answer" id="" class="input-group form-control">
                        <option value="{{$question->answer()->name}}">{{$question->answer()->name}}</option>
                        @foreach(['A', 'B','C','D'] as $option)
                        <option value="{{$option}}">{{$option}}</option>
                        @endforeach
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