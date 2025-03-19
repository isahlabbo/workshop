
<div class="modal fade" id="addProduction" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW PRODUCTION</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('production.register')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{old('name')}}" name="name">
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <input type="number" class="input-group form-control" placeholder="QUANTITY" value="{{old('quantity')}}" name="quantity">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="number" class="input-group form-control" placeholder="PRICE/EACH" value="{{old('price')}}" name="price">
                    </div>
                    <br>
                    <div class="row">
                    @foreach(App\Models\Ingredient::all() as $ingredient)
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="">{{$ingredient->name}} Quantity Used (KG)</label>
                            <select name="{{$ingredient->id}}" id="" class="input-group form-control">
                            @for($i= 0; $i<=$ingredient->quantity; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            </select>
                        </div>
                    </div>
                    <br>
                    @endforeach
                    </div>
                    <button class="btn btn-primary">REGISTER</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>