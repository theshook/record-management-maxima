@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-primary">
                    <h3 class="mb-0">
                        <span><img src="{{ asset('images/CourseRegisteredBlue.png') }}" style="width: 25px; text-align: center"></span>
                        {{ $qualification->course  }} Core Competencies
                    </h3>
                    <hr class="bg-primary">
				</div>
				<form action="{{ route('save.coc') }}" method="POST">
				@csrf
					<div class="form-group row">
						<div class="col-sm-3">
                            <input type="text" class="form-control @error('code_no') is-invalid @enderror" placeholder="Code No" name="code_no">
                            @error('code_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="col-sm-7">
                            <input type="text" class="form-control @error('core_competencies') is-invalid @enderror" placeholder="Core Competencies" name="core_competencies">
                            @error('core_competencies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<input type="text" class="form-control" placeholder="Code No" name="qualification_id" value="{{ $qualification->id }}" hidden>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-success btn-sm" >Save</button>
						</div>
					</div>
                </form>
                <form action="{{ route('search.coc', $qualification->id) }}" method="POST" role="search" class="p-3 bg-primary">
					{{ csrf_field() }}
					<div class="input-group w-50">
						<input type="text" class="form-control" name="q"
							placeholder="Search Code No or Core Competencies"> 
							
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</form>
                <table class="table bg-white display table-striped" id="myTable">
                    <thead>
                        <th>Code No</th>
                        <th>Core Competencies</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($cocs as $coc)
                            <tr>
                                <td>{{ $coc->code_no }}</td>
                                <td>{{ $coc->core_competencies }}</td>
                                <td>
                                    <form action="{{ route('coc.delete', $coc->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('coc.edit', $coc->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
				</table>
				{!! $cocs->render() !!}
            </div>
        </div>
    </div>
@endsection
