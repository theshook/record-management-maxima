@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-primary">
                    <span class="float-md-right mt-1">
                        <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm">
                            Add Student
                        </a>
                    </span>
                    <h3 class="mb-0 text-uppercase">
                        <span><img src="{{ asset('images/AssessmentLogo.png') }}" style="width: 25px; text-align: center"></span>
                        STUDENT ASSESSMENT STATUS
                    </h3>
                    <hr class="bg-primary">
                </div>
                <form action="{{ route('schedule.search.students') }}" method="POST" role="search" class="p-3 bg-primary">
					{{ csrf_field() }}
					<div class="input-group w-50">
						<input type="text" class="form-control" name="q"
							placeholder="Search Names or Reference Number"> 
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</form>
                <table class="table bg-white">
                    <thead>
                        <th>Name</th>
                        <th>Qualification</th>
                        <th>Reference #</th>
                        <th>Date Registered</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($applicants as $app)
                            <tr>
                                <td>
                                    {{ $app->last_name.', '. $app->first_name.' '. $app->name_extention.', '.$app->middle_name }}
                                </td>
                                <td>
                                    {{ $app->qualification->course }}

                                </td>
                                <td class="text-danger">{{ $app->ref_no }}</td>
                                <td>{{ $app->created_at }}</td>
                                <td>
                                    @forelse($app->studentlists as $as)
                                    <a href="{{ route('schedule.showList', [$as->schedule_id, $as->assessor_id]) }}" class="btn btn-success btn-sm">Schedule</a>
                                    @empty
                                    <p class="text-danger"><em>PENDING</em></p>
                                    @endforelse
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $applicants->render() !!}
            </div>
        </div>
    </div>
@endsection