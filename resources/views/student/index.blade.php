@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<span class="float-md-right mt-1">
					<a href="{{ route('student.create') }}" class="btn btn-primary btn-sm">
						ADD NEW STUDENT
					</a>
				</span>
				<h3 class="mb-0">
					<span><img src="{{ asset('images/AdminBlue.png') }}" style="width: 40px; text-align: center"></span>
					STUDENT PROFILE
				</h3>
				<hr class="bg-primary">
			</div>
			<form action="{{ route('student.search') }}" method="POST" role="search" class="p-3 bg-primary">
				{{ csrf_field() }}
				<div class="input-group w-50">
					<input type="text" class="form-control" name="q"
						placeholder="Search Names or email"> 
						
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</form>
			<table class="table bg-white">
				<thead>
					<th>Name</th>
					<th>Qualification</th>
					<th>Mobile</th>
					<th>Email</th>
					<th></th>
				</thead>
				<tbody>
					@forelse ($students as $fb)
						<tr>
							<td>
								{{ $fb->last_name.', '.$fb->first_name.' '.$fb->name_extension.' '.$fb->middle_name }}
							</td>
							<td>
								{{ $fb->qualification->course }}
							</td>
							<td>
								{{ $fb->mobile }}
							</td>
							<td>
								{{ $fb->email }}
							</td>
							<td>
								<form action="{{ route('student.destroy', $fb->id) }}" method="POST">
									@csrf
									@method('DELETE')
									<a href="{{ route('student.edit', $fb->id) }}" class="btn btn-primary btn-sm">
										View
									</a>
									<button type="submit" class="btn btn-danger btn-sm">Delete</button>
								</form>
							</td>
						</tr>
					@empty
						<h3 class="text-center"> No students as of now.</h3>
					@endforelse
				</tbody>
			</table>
			{!! $students->render() !!}
		</div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
