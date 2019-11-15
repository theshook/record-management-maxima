@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-primary">
                    <span class="float-md-right mt-1">
                        <a href="{{ route('qualifications.index') }}" class="btn btn-warning btn-sm text-white pl-5 pr-5">
                            Back
                        </a>
                    </span>
                    <h3 class="mb-0">
                        <span><img src="{{ asset('images/AssessmentLogoBlue.png') }}" style="width: 25px; text-align: center"></span>
                        ASSESSMENT SCHEDULE
                    </h3>
                    <hr class="bg-primary">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header text-primary text-center">
                        <h4>{{ isset($qualification) ? 'EDIT' : 'ADD NEW' }} QUALIFICATION</h4>
                    </div>
                    <div class="card-body">
                        <form 
                        action="{{ isset($qualification) ? route('qualifications.update', $qualification->id) : route('qualifications.store') }}" 
                        method="POST">
                            @csrf
                            @if (isset($qualification))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <input 
                                type="text" 
                                class="form-control @error('sector') is-invalid @enderror" 
                                name="sector" 
                                placeholder="Sector" 
                                value="{{ isset($qualification) ? $qualification->sector : old('sector') }}" 
                                autofocus>

                                @error('sector')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input 
                                type="text" 
                                class="form-control @error('course') is-invalid @enderror" 
                                name="course" 
                                placeholder="Qualification" 
                                value="{{ isset($qualification) ? $qualification->course : old('course') }}">

                                @error('course')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input 
                                type="text" 
                                class="form-control @error('accreditation') is-invalid @enderror" name="accreditation" 
                                placeholder="Accreditation #" 
                                value="{{ isset($qualification) ? $qualification->accreditation : old('accreditation') }}">

                                @error('accreditation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea 
                                name="description" 
                                id="description" 
                                class="form-control @error('description') is-invalid @enderror" placeholder="Description..." 
                                cols="30" 
                                rows="5">{{ isset($qualification) ? $qualification->description : old('description') }}</textarea>
                                
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-small">
                                    {{ isset($qualification) ? 'Update' : 'Add'}} Qualification
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection