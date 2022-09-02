@if(!$data -> isEmpty())
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
      <a class="btn btn-sm btn-danger" id="delete" href=""> <i class="fa fa-trash" title="delete" aria-hidden="true"></i></a>
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
@else
<div class="mt-5">
	<hr>
	<h5 class="text-center text-secondary p-5" >No data found !!</h5>
</div>
@endif