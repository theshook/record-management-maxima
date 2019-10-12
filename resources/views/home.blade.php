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
                    <a href="{{ route('categories.index') }}">Categories</a>
                </li>
            </ul>
        </div>
        <div class="col-md-6 offset-md-1">
            @foreach ($news as $new)
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>
                            <a href="{{ route('news.show', $new->id)}}" class="btn-btn-link">
                                {{ $new->title }}
                            </a>
                        </h4>
                        <span class="text-secondary text-small">
                            {{ date('F d, Y', strtotime($new->updated_at)) }}
                        </span>
                        <span class="float-md-right text-small text-secondary">
                            Category: {{ $new->category->name }}
                        </span>
                    </div>
                    <div class="card-body">
                            <p>{{ $new->description }}</p>
                            <img src="{{ asset('storage/'.$new->image) }}" alt="{{ $new->title }}" class="img-fluid" height="300px" width="300px">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
