@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				{{-- update for add later --}}
				<form action="{{ route('schedule.update', $schedule->id) }}" method="POST" id="updateStatus">
				@csrf
				@method('PUT')
					<input type="text" name="status" hidden id="status" value="">
					<span class="float-md-right mt-1 mr-1">
						<button type="submit" class="btn btn-success btn-sm" value="Add Later" id="addLater">
							Add Later
						</button>
					</span>
					<span class="float-md-right mt-1 mr-1">
						<button type="submit" class="btn btn-danger btn-sm" value="Disapprove" id="disapprove">
							Disapprove
						</button>
					</span>
					<span class="float-md-right mt-1 mr-1">
						<button type="submit" class="btn btn-primary btn-sm" value="Approve" id="approve">
							Approve
						</button>
					</span>
				</form>
				<h3 class="mb-0 text-uppercase">
					<span><img src="{{ asset('images/AssessmentLogoBlue.png') }}" style="width: 40px; text-align: center"></span>
					{{ $assessor->qualification->course }}
				</h3>
				<hr class="bg-primary">
			</div>
		</div>
		<div class="col-md-6">
			<h4>Assessor: {{ $assessor->last_name. ', ' .$assessor->first_name. ' ' . $assessor->middle_name }}</h4>
		</div>
		<div class="col-md-6">
			<h4>Schedule Date: {{ $schedule->assessment_schedule }}</h4>
		</div>

		{{-- can remove student list --}}
		<div class="col-md-12">
			<table class="table bg-white" id="student-list-table">
				<thead>
					<th>Name</th>
					<th>Reference #</th>
					<th>Applied for</th>
					<th></th>
				</thead>
				<tbody>
					@foreach ($students as $applicant)
						<tr>
							<td>{{ $applicant->last_name.', '.$applicant->first_name.' '.$applicant->middle_name }}</td>
							<td>{{ $applicant->ref_no }}</td>
							<td>{{ $applicant->assessment_type }}</td>
							<td>
								<form action="{{ route('schedule.removestudents', $applicant->id) }}" method="POST">
									@csrf
									@method('PUT')
									<button submit class="btn btn-sm btn-danger">Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		{{-- to be save on student list --}}
		<div class="col-sm-4">
			<form action="{{ route('schedule.search', [$schedule->id, $assessor->id]) }}" method="POST" role="search">
				{{ csrf_field() }}
				<div class="input-group">
					<input type="text" class="form-control" name="q"
						placeholder="Search students"> <span class="input-group-btn">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-md-12">
			@if (isset($applicants))
				<table class="table bg-white" id="student-list-table">
					<thead>
						<th>Name</th>
						<th>Reference #</th>
						<th>Applied for</th>
						<th></th>
					</thead>
					<tbody>
						@foreach ($applicants as $applicant)
							<tr>
								<td>{{ $applicant->last_name.', '.$applicant->first_name.' '.$applicant->middle_name }}</td>
								<td>{{ $applicant->ref_no }}</td>
								<td>{{ $applicant->assessment_type }}</td>
								<td>
									<form action="{{ route('schedule.addstudents') }}" method="POST">
										@csrf
										<input type="hidden" value="{{ $applicant->id }}" name="student_id">
										<input type="hidden" value="{{ $assessor->id }}" name="assessor_id">
										<input type="hidden" value="{{ $schedule->id }}" name="schedule_id">
										<button submit class="btn btn-sm btn-success">Add</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!! $applicants->render() !!}
			@endif
		</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function() {
		$('#addLater').click(function(e) {
			e.preventDefault();
			$('#status').val('later');
			$('#updateStatus').submit();
		});
		$('#disapprove').click(function(e) {
			e.preventDefault();
			$('#status').val('not yet approved');
			$('#updateStatus').submit();
		});
		$('#approve').click(function(e) {
			e.preventDefault();
			$('#status').val('approved');
			$('#updateStatus').submit();
		});
	});
</script>
@endsection
