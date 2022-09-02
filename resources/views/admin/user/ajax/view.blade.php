<div class="card">
	<div class="card-body">
		<table class="table">
			<tr>
				<th>Name :</th>
				<td>{{ $data->name }}</td>
			</tr>
			<tr>
				<th>Email :</th>
				<td>{{ $data->email }}</td>
			</tr>
			<tr>
				<th>Phone :</th>
				<td>{{ $data->phone }}</td>
			</tr>
			<tr>
				<th>CV Link :</th>
				<td>{{ $data->cv_link }}</td>
			</tr>
			<tr>
				@if($data->status == 1)
				<td><a class="btn btn-xs btn-success" href="{{ route('approved.user',$data->id) }}">Approved</a></td>
				<td><a class="btn btn-xs btn-danger" href="{{ route('rejected.user',$data->id) }}">Reject</a></td>
				@elseif($data->status == 2)
				<td><a class="btn btn-xs btn-danger" href="{{ route('rejected.user',$data->id) }}">Reject</a></td>
				@else
				<td><a class="btn btn-xs btn-success" href="{{ route('approved.user',$data->id) }}">Approved</a></td>
				@endif
			</tr>
		</table>
	</div>
</div>