@extends('layouts.appClient')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            @foreach ($news as $new)
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>
                            {{ $new->title }}
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