@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-primary">
                    <h3 class="mb-0">
                        <span><img src="{{ asset('images/CourseRegisteredBlue.png') }}" style="width: 25px; text-align: center"></span>
                        {{ $print->qualification->course  }} Core Competencies
                    </h3>
                    <hr class="bg-primary">
				</div>
				<form action="{{ route('coc.update', $print->id) }}" method="POST">
				@csrf
				@method('PUT')
					<div class="form-group row">
						<div class="col-sm-3">
                            <input type="text" class="form-control @error('code_no') is-invalid @enderror" placeholder="Code No" name="code_no" value="{{ $print->code_no }}">
                            @error('code_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="col-sm-7">
                            <input type="text" class="form-control @error('core_competencies') is-invalid @enderror" placeholder="Core Competencies" name="core_competencies" value="{{ $print->core_competencies }}">
                            @error('core_competencies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<input type="text" class="form-control" placeholder="Code No" name="qualification_id" value="{{ $print->qualification->id }}" hidden>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-success btn-sm" >Update</button>
						</div>
					</div>
                </form>
            </div>
        </div>
    </div>
@endsection
