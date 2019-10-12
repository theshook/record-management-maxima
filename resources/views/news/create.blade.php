@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('news.index') }}">Posts</a>
                </li>
                <li class="list-group-item">
                    <a href="/categories">Categories</a>
                </li>
            </ul>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
					<strong>Create News</strong>
					<a href="{{ route('news.index') }}" class="btn btn-warning float-md-right text-white">
						Back
					</a>
				</div>
                <div class="card-body">
                    <form action="{{ 
                    route('news.store') }}" 
                    method="POST" enctype="multipart/form-data">
                        @csrf
						<div class="form-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ old('title') }}">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>

						<div class="form-group">
							<textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" cols="50"placeholder="Description">{{ old('description') }}</textarea>

							@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<select name="category_id" id="category_id" class="form-control">
								@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" accept="image/x-png,image/gif,image/jpeg" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01" name="image">
									<label class="custom-file-label" for="image">
										Choose image...
									</label>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<img src="" id="blah" alt="" class="img-fluid" width="300px">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success">
								Add News
                            </button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/loadImageOnUpload.js') }}"></script>
@endsection