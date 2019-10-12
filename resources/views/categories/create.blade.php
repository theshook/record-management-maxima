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
					<strong>{{ isset($category) ? 'Edit Category' : 'Create Category' }}</strong>
					<a href="{{ route('categories.index') }}" class="btn btn-warning float-md-right text-white">
						Back
					</a>
				</div>
                <div class="card-body">
                    <form action="{{ isset($category) ? 
                    route('categories.update', $category->id) : 
                    route('categories.store') }}" 
                    method="POST">
                        @csrf
                        @if (isset($category))
                            @method('PUT')
                        @endif
						<div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Category Name" value="{{ isset($category) ? $category->name : old('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">
                                {{ isset($category) ? 'Update Category' : 'Add Category'}}
                            </button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
