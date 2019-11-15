@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<span class="float-md-right mt-1">
					<a href="{{ route('assessor.create') }}" class="btn btn-primary btn-sm">
						ADD NEW ASSESSOR
					</a>
				</span>
				<h3 class="mb-0">
					<span><img src="images/AdminBlue.png" style="width: 40px; text-align: center"></span>
					ASSESSOR PROFILE
				</h3>
				<hr class="bg-primary">

				<form action="{{ route('assessor.search') }}" method="POST" role="search" class="p-3 bg-primary">
					{{ csrf_field() }}
					<div class="input-group w-50">
						<input type="text" class="form-control" name="q"
							placeholder="Search Names"> 
							
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
						<th>Date Registered</th>
						<th></th>
					</thead>
					<tbody>
						@forelse ($assessors as $app)
							<tr>
								<td>
									{{ $app->last_name.', '.$app->first_name.' '.$app->name_extension.' '.$app->middle_name}}
								</td>
								<td>
									{{ $app->qualification->course }}
								</td>
								<td>
									{{ $app->created_at }}
								</td>
								<td>
									<form action="{{ route('assessor.destroy', $app->id) }}" method="POST">
										@csrf
										@method('DELETE')
										<a href="{{ route('assessor.edit', $app->id) }}" class="btn btn-success btn-sm">Edit</a>
										<button type="submit" class="btn btn-danger btn-sm">Delete</button>
									</form>
								</td>
							</tr>
						@empty
							<h4>No verified applicants as of now</h4>
						@endforelse
					</tbody>
				</table>
				{!! $assessors->render() !!}
			</div>
		</div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
