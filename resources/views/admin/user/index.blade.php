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
          <h1>Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="ml-1">
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
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body" id="user_data">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10">SL</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th width="150">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key=> $row)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>
                    @if($row->status == 2)
                      <a class="btn btn-xs btn-success">Approved</a>
                    @elseif($row->status == 1)
                    <a class="btn btn-xs btn-warning">Pending</a>
                    @else
                      <a class="btn btn-xs btn-danger">Reject</a>
                    @endif
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info view" data-id="{{ $row->id }}" data-toggle="modal" data-target="#modal-lg-view"><i class="fa fa-eye"></i> </button>
                    <button type="button" class="btn btn-sm btn-primary edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#modal-lg-edit"><i class="fa fa-edit"></i> </button>
                    <a class="btn btn-sm btn-danger" id="delete" href="{{ route('delete.user',$row->id) }}"> <i class="fa fa-trash" title="delete" aria-hidden="true"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="10">SL</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Status</th>
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

      <!-- View modal -->
      <div class="modal fade" id="modal-lg-view">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">User Details</h4>
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
              <h4 class="modal-title">User Edit</h4>
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
          var url = "{{ url('admin/user/edit') }}/"+id;
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