@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<h3 class="mb-0">
					<span><img src="{{ asset('images/FeedbackBlue.png') }}" style="width: 40px; text-align: center"></span>
					FEED BACK AND CONCERNS
				</h3>
				<hr class="bg-primary">
			</div>
			
			<div class="">
				<form action="{{ route('feedback.search') }}" method="POST" role="search" class="p-3 bg-primary">
					{{ csrf_field() }}
					<div class="input-group w-25">
						<input type="text" class="form-control" name="q"
							placeholder="Search Names"> 
							
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
					<th>Name of Sender</th>
					<th width="40%">Message</th>
					<th>Date Messaged</th>
					<th></th>
				</thead>
				<tbody>
					@forelse ($feedbacks as $fb)
						<tr>
							<td>{{ $fb->fullname }}</td>
							<td>{{ str_limit($fb->message, $limit=20, $end='...') }}</td>
							<td>{{ $fb->created_at }}</td>
							<td><a href="{{ route('feedback.show', $fb->id) }}" class="btn btn-primary btn-sm">READ</a></td>
						</tr>
					@empty
						<h3 class="text-center"> No feedbacks as of now.</h3>
					@endforelse
				</tbody>
			</table>
			{!! $feedbacks->render() !!}
		</div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
