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
					<strong>CATEGORIES</strong>
					<a href="{{ route('categories.create') }}" class="btn btn-success btn-sm float-md-right">
						Add Category
					</a>
				</div>
                <div class="card-body">
                    @if ($categories->count() > 0)
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm float-md-right" onclick="handleDelete({{$category->id}}, '{{$category->name}}')">
                                                Delete
                                            </button>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary btn-sm float-md-right mr-2">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center">No Categories</h3>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <form action="" method="POST" id="deleteCategoryForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id, name) {
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/'+id
            document.getElementById("modalBodyText").innerHTML = "Do you want to delete this category " + name;
            $("#deleteModal").modal('show');
        }
    </script>
@endsection
