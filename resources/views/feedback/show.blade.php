@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
                <span class="float-md-right mt-1">
                    <a href="{{ route('feedback.index') }}" class="btn btn-warning btn-sm pl-5 pr-5 text-white">
                        BACK
                    </a>
                </span>
				<h3 class="mb-0">
					<span><img src="images/AdminBlue.png" style="width: 40px; text-align: center"></span>
					FEED BACK AND CONCERNS
				</h3>
				<hr class="bg-primary">
			</div>
			<div class="card w-75 mx-auto bg-light shadow-lg">
                <div class="row p-5">
                    <div class="col-md-4">
                        <h4>Name of Sender: </h4>
                        <h4>Message: </h4>
                    </div>
                    <div class="col-md-8">
                        <h4>
                            <span class="text-primary">
                                {{ $feedback->fullname}}
                            </span>
                        </h4>
                        <h5>
                            <span class="text-black">
                                {{ $feedback->message}}
                            </span>
                        </h5>
                        <h6 class="float-md-right text-secondary">
                            <em>
                                {{ $feedback->created_at}}
                                <br>
                                {{ $feedback->email }}
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
