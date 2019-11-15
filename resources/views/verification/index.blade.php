@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<h3 class="mb-0">
					<span><img src="{{ asset('images/FeedbackBlue.png') }}" style="width: 40px; text-align: center"></span>
					VERIFICATIONS REQUEST
				</h3>
				<hr class="bg-primary">
			</div>
			<div class="">
				<form action="{{ route('verification.search') }}" method="POST" role="search" class="p-3 bg-primary">
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
			</div>
			<table class="table bg-white">
				<thead>
					<th>Name of Sender</th>
					<th width="40%">Reference No</th>
					<th>Date Received</th>
					<th>Receipt Image</th>
				</thead>
				<tbody>
					@forelse ($verifications as $fb)
						<tr class="{{ $fb->verified == 1 ? 'text-white bg-info' : '' }}">
							<td>
								{{ $fb->verified == 1 ? '♥' : '' }}
								{{ $fb->fullname }}
							</td>
							<td>{{ $fb->tracking_number }}</td>
							<td>{{ $fb->created_at }}</td>
							<td><a href="{{ route('verification.show', $fb->id) }}" class="btn btn-primary btn-sm">View</a></td>
						</tr>
					@empty
						<h3 class="text-center"> No verifications as of now.</h3>
					@endforelse
				</tbody>
			</table>
			{!! $verifications->render() !!}
		</div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
