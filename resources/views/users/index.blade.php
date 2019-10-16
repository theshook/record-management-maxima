@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<span class="float-md-right mt-1">
					<a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
						ADD NEW ADMIN
					</a>
				</span>
				<h3 class="mb-0">
					<span><img src="{{ asset('images/AdminBlue.png') }}" style="width: 40px; text-align: center"></span>
					ADMIN PROFILE
				</h3>
				<hr class="bg-primary">
			</div>
			<div class="">
				<form action="{{ route('users.search') }}" method="POST" role="search" class="p-3 bg-primary">
					{{ csrf_field() }}
					<div class="input-group w-50">
						<input type="text" class="form-control" name="q"
							placeholder="Search Names or Email"> 
							
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</form>
			</div>
			<table class="table bg-white">
				<thead>
					<th>Name</th>
					<th>Position</th>
					<th>Email</th>
					<th>Contact</th>
					<th></th>
				</thead>
				<tbody>
					@forelse ($users as $fb)
						<tr>
							<td>{{ $fb->last_name.', '.$fb->first_name.' '.$fb->name_extension.' '.$fb->middle_name }}
							</td>
							<td>{{ $fb->position }}</td>
							<td>{{ $fb->email }}</td>
							<td>{{ $fb->mobile }}</td>
							<td>
								<form action="{{ route('users.destroy', $fb->id) }}" method="POST">
								@csrf
								@method('DELETE')
								<a href="{{ route('users.show', $fb->id) }}" class="btn btn-primary btn-sm">View</a>
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
								</form>
							</td>
						</tr>
					@empty
						<h3 class="text-center"> No users as of now.</h3>
					@endforelse
				</tbody>
			</table>
			{!! $users->render() !!}
		</div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
