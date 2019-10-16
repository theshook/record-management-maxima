@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<h3 class="mb-0">
					<span><img src="{{ asset('images/CourseRegisteredBlue.png') }}" style="width: 40px; text-align: center"></span>
					CERTIFICATE STATUS
				</h3>
				<hr class="bg-primary">
			</div>
			<form action="{{ route('certificate.status.search') }}" method="POST" role="search" class="p-3 bg-primary">
				{{ csrf_field() }}
				<div class="input-group w-50">
					<input type="text" class="form-control" name="q"
						placeholder="Search Names or Reference #"> 
						
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
					<th>Ref #</th>
					<th>Date Requested</th>
					<th>Date Printed</th>
					<th></th>
				</thead>
				<tbody>
					@forelse ($students as $fb)
						<tr>
							<td>
								{{ $fb->fullname }}
							</td>
							<td>
								{{ $fb->qualification->course }}
							</td>
							<td>
								{{ $fb->reference_number }}
							</td>
							<td>
								{{ $fb->created_at }}
							</td>
							<td>
								<span  class="{{$fb->isPrinted == 0 ? 'text-danger' : ''}}">
									{{ $fb->isPrinted == 0 ? 'not yet printed' : $fb->updated_at }}
								</span>
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
