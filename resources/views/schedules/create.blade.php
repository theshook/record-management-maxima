@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<h3 class="mb-0">
					<span><img src="images/AdminBlue.png" style="width: 40px; text-align: center"></span>
					CREATE SCHEDULE
				</h3>
				<hr class="bg-primary">

				<form action="{{ route('schedule.store') }}" method="POST">
					@csrf

					<div class="form-group">
						<select name="assessor_id" class="form-control">
							@foreach ($assessors as $assessor)
								<option value="{{ $assessor->id }}">{{ $assessor->last_name.', '.$assessor->first_name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<input type="date" class="form-control" name="assessment_schedule">
					</div>

					<button type="submit" class="btn btn-success btn-sm pl-3 pr-3">Submit</button>
				</form>
			</div>
		</div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
