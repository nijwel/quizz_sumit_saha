<form action="{{ route('update.question',$data->id) }}" method="post">
@csrf
  <div class="card-body">
  		<div class="form-group">
      		<label for="exampleInputEmail1"><span class="text-danger">* </span>Question</label>
      		<input type="text" class="form-control" value="{{ $data->question }}" id="exampleInputEmail1" name="question" placeholder="Enter question">
  		</div>
  </div>
  <hr>
  <div class="row">
  	<div class="col-sm-6">
	      	<div class="form-group">
          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Option 1</label>
          		<input type="text" class="form-control" value="{{ $data->option->option_one }}" id="exampleInputEmail1" placeholder="Option" name="option_one">
	      	</div>
  	</div>
    	<div class="col-sm-6">
		      	<div class="form-group">
	          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Option 2</label>
	          		<input type="text" class="form-control" value="{{ $data->option->option_two }}" id="exampleInputEmail1" placeholder="Option" name="option_two">
		      	</div>
    	</div>
    	<div class="col-sm-6">
		      	<div class="form-group">
	          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Option 3</label>
	          		<input type="text" class="form-control" value="{{ $data->option->option_three }}" id="exampleInputEmail1" placeholder="Option" name="option_three">
		      	</div>
    	</div>
    	<div class="col-sm-6">
		      	<div class="form-group">
	          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Option 4</label>
	          		<input type="text" class="form-control" value="{{ $data->option->option_four }}" id="exampleInputEmail1" placeholder="Option" name="option_four">
		      	</div>
      </div>
  </div>
  <div class="row">
    	<div class="col-sm-6">
	      	<div class="form-group">
          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Right Option:</label>
          		<select class="form-control" name="is_right_option">
          			<option value="a" @if($data->option->option_one == $data->option->is_right_option) selected @endif> Option 1 </option>
          			<option value="b" @if($data->option->option_two == $data->option->is_right_option) selected @endif> Option 2 </option>
          			<option value="c" @if($data->option->option_three == $data->option->is_right_option) selected @endif> Option 3 </option>
          			<option value="d" @if($data->option->option_four == $data->option->is_right_option) selected @endif> Option 4 </option>
          		</select>
	      	</div>
      </div>
    	<div class="col-sm-6">
	      	<div class="form-group">
          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Marks </label>
          		<input type="number" class="form-control" value="{{ $data->marks }}" id="exampleInputEmail1" name="marks">
	      	</div>
      </div>
  </div>
  <!-- /.card-body -->
  <div class=" modal-footer justify-content-between">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>