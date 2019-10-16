@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
                <span class="float-md-right mt-1">
                    <a href="{{ route('verification.index') }}" class="btn btn-warning btn-sm pl-5 pr-5 text-white">
                        BACK
                    </a>
                </span>
				<h3 class="mb-0">
					<span><img src="{{ asset('images/FeedbackBlue.png') }}" style="width: 40px; text-align: center"></span>
					VERIFICATION REQUEST
				</h3>
				<hr class="bg-primary">
			</div>
			<div class="card w-75 mx-auto bg-light shadow-lg">
                <div class="card-body">
                    <form action="{{ route('verification.update', $verification->id )}}" method="POST">
                        @csrf
                        @method('PUT')
                        <span class="float-md-right m-3">
                            <button type="submit" class="btn btn-info btn-sm pl-5 pr-5 text-white">Verified!</button>
                        </span>
                    </form>
                    <div class="pl-5 pb-5">
                        <h4>Name of Sender: 
                            <span class="text-primary">
                                {{ $verification->fullname}}
                            </span>
                        </h4>
                        <h4>Reference/Tracking Number: 
                            <span class="text-danger">
                                {{ $verification->tracking_number}}
                            </span>
                        </h4>
                        <img src="{{ $verification->image }}" alt="{{$verification->fullname}}" class="img-fluid">
                        <h6 class="float-md-right text-secondary">
                            <em>
                                Contact #: {{ $verification->contact}}
                                <br>
                                Email: {{ $verification->email }}
                            </em>
                        </h6>
                    </div>
                </div>
            </div>
		</div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
