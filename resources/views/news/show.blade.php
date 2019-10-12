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
				<div class="card text-center">
					<div class="card-header">
						<strong>{{ $news->title }}</strong>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="img-fluid" height="300px" width="300px">
						</li>
						<li class="list-group-item">
							{{ $news->description }}
						</li>
						<li class="list-group-item">
							<button class="btn btn-danger btn-sm float-md-right" onclick="handleDelete({{$news->id}}, '{{$news->title}}')">Delete</button>
							<a href="{{ route('news.edit', $news->id) }}" class="btn btn-secondary btn-sm float-md-right mr-3">Edit</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<form action="" method="POST" id="deleteNewsForm">
		@csrf
		@method('DELETE')
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="deleteModalLabel">Delete News</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<p class="text-center" id="modalBodyText">
			</p>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
			<button type="submit" class="btn btn-danger">Yes, Delete</button>
			</div>
		</div>
	</form>
	</div>
</div>
@endsection

@section('scripts')
<script>
	function handleDelete(id, name) {
		var form = document.getElementById('deleteNewsForm')
		form.action = '/news/'+id
		document.getElementById("modalBodyText").innerHTML = "Do you want to delete this news " + name;
		$("#deleteModal").modal('show');
	}
</script>
@endsection