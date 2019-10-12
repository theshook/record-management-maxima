@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row justify-content-center">
        <div class="col-xs-12">
			<div class="text-primary">
				{{-- <span class="float-md-right mt-1">
					<a href="{{ route('assessor.create') }}" class="btn btn-primary btn-sm">
						PRINT ALL
					</a>
				</span> --}}
				<h3 class="mb-0">
					<span><img src="images/AdminBlue.png" style="width: 40px; text-align: center"></span>
					PRINT APPLICATION FORM
				</h3>
				<hr class="bg-primary">

				<form action="{{ route('applicants.search') }}" method="POST" role="search" class="p-3 bg-primary">
					{{ csrf_field() }}
					<div class="input-group w-50">
						<input type="text" class="form-control" name="q"
							placeholder="Search Names or Tracking Number"> 
							
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
						<th>Reference #</th>
						<th>Date Registered</th>
						<th></th>
					</thead>
					<tbody>
						@forelse ($applicants as $app)
							<tr>
								<td>
									{{ $app->last_name.', '.$app->first_name.' '.$app->name_extension.' '.$app->middle_name}}
								</td>
								<td>
									{{ $app->qualification->course }}
								</td>
								<td>
									{{ $app->ref_no }}
								</td>
								<td>
									{{ $app->created_at }}
								</td>
								<td>
									<a href="{{ route('applicants.show', $app->id) }}" class="btn btn-success btn-sm">Preview</a>
									<a href="{{ route('applicants.print', $app->id) }}"  target="_blank" class="btn btn-primary btn-sm">Print</a>
								</td>
							</tr>
						@empty
							<h4>No verified applicants as of now</h4>
						@endforelse
					</tbody>
				</table>
				{!! $applicants->render() !!}
			</div>
		</div>
    </div>
</div>
@endsection