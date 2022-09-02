@extends('layouts.app')
@section('content')
@push('css')

@endpush
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
        <!--Flash message--->
         @if(Session::get('success'))
              <div class="callout callout-success bg-custom-success alert">
                <h5>{{Session::get('success')}}</h5>
              </div>
          @elseif(Session::get('error'))
              <div class="callout callout-danger bg-custom-danger alert">
                  {{Session::get('error')}}
              </div>
          @endif
          @if ($errors->any())
              <div class="callout callout-danger bg-custom-danger alert">
                  <p> <span class="font-weight-bolder h5">Error ! </span> Somthing went wrong !</p>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <!--/End Flash message--->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Question</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Question</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
          	<div class="card-header">
              <h2 class="text-center">" {{ $data->name }} "</h2>
              <hr>
          		<button type="button" class="btn btn-sm btn-info float-right" data-id="" data-toggle="modal" data-target="#modal-lg-create"><i class="fa fa-plus"></i> Add New </button>
          	</div>
            <div class="card-body" id="user_data">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10">SL</th>
                  <th>Quesion</th>
                  <th>Option One</th>
                  <th>Option Two</th>
                  <th>Option Three</th>
                  <th>Option Four</th>
                  <th class="text-success">Right Option</th>
                  <th>Marks</th>
                  <th width="150">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($question as $key=> $row)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $row->question }}</td>
                  <td>{{ $row->option->option_one }}</td>
                  <td>{{ $row->option->option_two }}</td>
                  <td>{{ $row->option->option_three }}</td>
                  <td>{{ $row->option->option_four }}</td>
                  <td class="text-success">{{ $row->option->is_right_option }}</td>
                  <td>{{ $row->marks }}</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-primary edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#modal-lg-edit"><i class="fa fa-edit"></i> </button>
                    <a class="btn btn-sm btn-danger" id="delete" href="{{ route('delete.question',$row->id) }}"> <i class="fa fa-trash" title="delete" aria-hidden="true"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="10">SL</th>
                  <th>Quesion</th>
                  <th>Option One</th>
                  <th>Option Two</th>
                  <th>Option Three</th>
                  <th>Option Four</th>
                  <th class="text-success">Right Option</th>
                  <th>Marks</th>
                  <th width="150">Action</th>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <!-- /.modal -->
      </div>
      <!-- /.row -->

      <!-- Create modal -->
      <div class="modal fade" id="modal-lg-create">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Question</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.question') }}" method="post">
                @csrf
                  <div class="card-body">
            	  		<div class="form-group">
            	      		<label for="exampleInputEmail1"><span class="text-danger">* </span>Question</label>
            	      		<input type="text" class="form-control" id="exampleInputEmail1" name="question" placeholder="Enter question">
            	  		</div>
                  </div>
                  <input type="hidden" name="quiz_id" value="{{ $data->id }}">
                  <hr>
                  <div class="row">
                  	<div class="col-sm-6">
        			      	<div class="form-group">
        		          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Option 1</label>
        		          		<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Option" name="option_one">
        			      	</div>
                  	</div>
    	            	<div class="col-sm-6">
      				      	<div class="form-group">
      			          		<label for="exampleInputEmail1"> Option 2</label>
      			          		<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Option" name="option_two">
      				      	</div>
    	            	</div>
    	            	<div class="col-sm-6">
      				      	<div class="form-group">
      			          		<label for="exampleInputEmail1"> Option 3</label>
      			          		<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Option" name="option_three">
      				      	</div>
    	            	</div>
    	            	<div class="col-sm-6">
      				      	<div class="form-group">
      			          		<label for="exampleInputEmail1"> Option 4</label>
      			          		<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Option" name="option_four">
      				      	</div>
    	              </div>
                  </div>
                  <div class="row">
    	            	<div class="col-sm-6">
      				      	<div class="form-group">
      			          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Right Option:</label>
      			          		<select class="form-control" name="is_right_option">
      			          			<option value="a" > Option 1 </option>
      			          			<option value="b" > Option 2 </option>
      			          			<option value="c" > Option 3 </option>
      			          			<option value="d" > Option 4 </option>
      			          		</select>
      				      	</div>
    	              </div>
    	            	<div class="col-sm-6">
      				      	<div class="form-group">
      			          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Marks </label>
      			          		<input type="number" class="form-control" id="exampleInputEmail1" name="marks">
      				      	</div>
        	          </div>
                  </div>
                  <!-- /.card-body -->
                  <div class=" modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- View modal -->
      <div class="modal fade" id="modal-lg-view">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Quiz Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="view_part">
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Edit modal -->
      <div class="modal fade" id="modal-lg-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Quiz</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="edit_part">
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
    <!-- /.container-fluid -->
  </section>
</div>
@push('js')
<script>

      //---Edit Section---//
      $(document).ready(function(){
        $('.edit').click(function(){
          var id=$(this).data('id');
          var url = "{{ url('admin/question/edit') }}/"+id;
          $.ajax({
            url:url,
            type:'get',
            success:function(data){
              $('#edit_part').html(data);
            }
          });
        });
      });

      $(document).ready(function () {
          $("#status").on('change',function(){
              var status   = $("#status").val();
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-Token': '{{ csrf_token() }}',
                  }
              });

              var url = "{{ route('index.user.filter') }}";
              $.ajax({
                  url:url,
                  method:'get',
                  data:{
                      status:status,
                  },
                  success:function(response){
                      $('#user_data').html(response);
                  }
              });
          });
      });

    $(document).ready(function(){
        $(".alert").delay(3000).fadeOut(3000);
      });
</script>
@endpush
@endsection