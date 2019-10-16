@extends('layouts.appClient')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-primary">
                    <h3 class="mb-0">
                        <span><img src="{{ asset('images/CourseRegisteredBlue.png') }}" style="width: 25px; text-align: center"></span>
                        COURSE REGISTERED
                    </h3>
                    <hr class="bg-primary">
                </div>
                <table class="table bg-white">
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
                                    <a href="{{ route('show_courses', $qualification->id) }}" class="btn btn-primary btn-sm">Description</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection