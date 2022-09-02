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
          <h1>Quiz</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quiz</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      {{-- <div class="ml-1">
        <form>
          <div class="row">
            <div class="form-group col-lg-2">
              <label for="exampleInputEmail1">Status</label>
              <select class="form-control select2bs4" name="status" id="status" style="width: 100%;">
                <option value="" selected>All</option>
                <option value="1" >Pending</option>
                <option value="2">Approved</option>
                <option value="3">Reject</option>
              </select>
            </div>
          </div>
        </form>
      </div> --}}
      <div class="row">
        <div class="col-12">
          <div class="card">
          	<div class="card-header">
          		<button type="button" class="btn btn-sm btn-info float-right" data-id="" data-toggle="modal" data-target="#modal-lg-create"><i class="fa fa-plus"></i> Add New </button>
          	</div>
            <div class="card-body" id="user_data">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10">SL</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Question</th>
                  <th width="150">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key=> $row)
                @php
                  $q_count = App\Models\Question::where('quiz_id',$row->id)->count();
                @endphp
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->date }}</td>
                  <td>( {{ $q_count }} )</td>
                  <td>
                    <a href="{{ route('view.quiz',$row->slug) }}" type="button" class="btn btn-sm btn-info" ><i class="far fa-clipboard"></i> </a>
                    <button type="button" class="btn btn-sm btn-primary edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#modal-lg-edit"><i class="fa fa-edit"></i> </button>
                    <a class="btn btn-sm btn-danger" id="delete" href="{{ route('delete.quiz',$row->id) }}"> <i class="fa fa-trash" title="delete" aria-hidden="true"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="10">SL</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Question</th>
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
              <h4 class="modal-title">Create Quiz</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.quiz') }}" method="post">
                @csrf
                  <div class="card-body">
          	  		<div class="form-group">
          	      		<label for="exampleInputEmail1"><span class="text-danger">* </span>Name</label>
          	      		<input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter name">
          	  		</div>
  			      	<div class="form-group">
  		          		<label for="exampleInputEmail1"><span class="text-danger">* </span> Date</label>
  		          		<input type="date" class="form-control" id="exampleInputEmail1" name="date">
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
      //---View Section---//
      $(document).ready(function(){
        $('.view').click(function(){
          var id=$(this).data('id');
          var url = "{{ url('admin/user/details') }}/"+id;
          $.ajax({
            url:url,
            type:'get',
            success:function(data){
              $('#view_part').html(data);
            }
          });
        });
      });

      //---Edit Section---//
      $(document).ready(function(){
        $('.edit').click(function(){
          var id=$(this).data('id');
          var url = "{{ url('admin/quiz/edit') }}/"+id;
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
        $(".alert").delay(3000).fadeOut(500);
      });
</script>
@endpush
@endsection