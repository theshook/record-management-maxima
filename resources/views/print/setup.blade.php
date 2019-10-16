@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-primary">
                    <span class="float-md-right mt-1">
                        <a href="{{ route('qualifications.create') }}" class="btn btn-primary btn-sm">
                            Add Qualification
                        </a>
                    </span>
                    <h3 class="mb-0">
                        <span><img src="{{ asset('images/CourseRegisteredBlue.png') }}" style="width: 25px; text-align: center"></span>
                        SETUP CERTIFICATE
                    </h3>
                    <hr class="bg-primary">
                </div>
                <table class="table bg-white display table-striped" id="myTable">
                    <thead>
                        <th>Sector</th>
                        <th>Qualification</th>
                        <th>Accreditation #</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($qualifications as $qualification)
                            <tr>
                                <td>{{ $qualification->sector }}</td>
                                <td>{{ $qualification->course }}</td>
                                <td class="text-danger">{{ $qualification->accreditation }}</td>
                                <td>
                                    <a href="{{ route('add.coc', $qualification->id) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
				</table>
				{!! $qualifications->render() !!}
            </div>
        </div>
    </div>
@endsection
