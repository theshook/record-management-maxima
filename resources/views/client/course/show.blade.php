@extends('layouts.appClient')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
				<div class="card">
					<div class="card-header text-center">
						<h3 class="text-info text-uppercase">{{ $qualification->sector }}</h3>
					</div>
					<div class="card-body">
						<div class="row pb-2">
							<div class="col-md-6 text-center text-secondary">{{$qualification->course}}</div>
							<div class="col-md-6 text-center text-danger">{{$qualification->accreditation}}</div>
						</div>
						<p class="text-center">
							{{$qualification->description}}
						</p>
					</div>
				</div>
			</div>
        </div>
    </div>
@endsection