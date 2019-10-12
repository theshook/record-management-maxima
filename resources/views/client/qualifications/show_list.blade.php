@extends('layouts.appClient')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<h3 class="mb-0 text-uppercase">
					<span><img src="images/AdminBlue.png" style="width: 40px; text-align: center"></span>
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
				</thead>
				<tbody>
					@foreach ($students as $applicant)
						<tr>
							<td>{{ $applicant->last_name.', '.$applicant->first_name.' '.$applicant->middle_name }}</td>
							<td>{{ $applicant->ref_no }}</td>
							<td>{{ $applicant->assessment_type }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
