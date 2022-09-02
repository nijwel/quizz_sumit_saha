  <form action="{{ route('update.user',$data->id) }}" method="post" enctype="multipart/form-data" >
  	@csrf
    <div class="card-body">
	  <div class="row" >
	  	<div class="col-md-6">
	  		<div class="form-group">
	      		<label for="exampleInputEmail1"><span class="text-danger">* </span>Name</label>
	      		<input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data->name }}" name="name" placeholder="Enter name">
	  		</div>
	  	</div>
	  	<div class="col-md-6">
			<div class="form-group">
	    		<label for="exampleInputEmail1"><span class="text-danger">* </span> Email</label>
	    		<input type="email" class="form-control" id="exampleInputEmail1" value="{{ $data->email }}" name="email" placeholder="example@example.com">
			</div>
	  	</div>
	  </div>
  	  <div class="row">
  	  	<div class="col-md-6">
	      	  <div class="form-group">
          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Phone</label>
          		<input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data->phone }}" name="phone" placeholder="Enter phone">
	      	  </div>
  	  	</div>
  	  </div>
    </div>
    <!-- /.card-body -->

    <div class=" modal-footer justify-content-between">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>