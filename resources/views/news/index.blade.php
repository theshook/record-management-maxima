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
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<strong>News</strong>
						<a href="{{ route('news.create') }}" class="btn btn-success btn-sm float-md-right">
							Add News
						</a>
					</div>
					<div class="card-body">
						@if ($news->count() > 0)
							<table class="table">
								<thead>
									<th>Title</th>
									<th>Category</th>
									<th class="text-right">Date Create</th>
								</thead>
								<tbody>
									@foreach ($news as $new)
										<tr>
											<td>
												<a href="{{ route('news.show', $new->id) }}">{{ $new->title }}</a>
											</td>
											<td>
												<a href="{{ route('categories.edit', $new->category->id)}}">
													{{ $new->category->name }}
												</a>
											</td>
											<td class="text-right">
												{{ $new->created_at }}
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							<h3 class="text-center">No news yet</h3>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection