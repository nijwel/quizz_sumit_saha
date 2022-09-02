  <form action="{{ route('update.quiz',$data->id) }}" method="post">
  @csrf
    <div class="card-body">
  		<div class="form-group">
      		<label for="exampleInputEmail1"><span class="text-danger">* </span>Name</label>
      		<input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $data->name }}" placeholder="Enter name">
  		</div>
      	<div class="form-group">
      		<label for="exampleInputEmail1"><span class="text-danger">* </span> Date</label>
      		<input type="date" class="form-control" id="exampleInputEmail1" name="date" value="{{ $data->date }}">
      	</div>
    </div>
    <!-- /.card-body -->
    <div class=" modal-footer justify-content-between">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>