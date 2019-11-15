@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-primary">
                    <span class="float-md-right mt-1">
                        <a href="{{ route('schedule.assessor', $qualification->id) }}" class="btn btn-primary btn-sm">
                            Create Schedule
                        </a>
                    </span>
                    <h3 class="mb-0 text-uppercase">
                        <span><img src="{{ asset('images/AssessmentLogoBlue.png') }}" style="width: 25px; text-align: center"></span>
                        {{ $qualification->course }}
                    </h3>
                    <hr class="bg-primary">
                </div>
                <table class="table bg-white">
                    <thead>
                        <th>Assessor</th>
                        <th>Date of Assessment</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($qualification->assessors as $qa)
                            @foreach ($qa->schedules as $sched)
                            <tr>
                                <td>{{ $qa->last_name.', '. $qa->first_name }}</td>
                                <td>{{ $sched->assessment_schedule }}</td>
                                <td class="text-danger">{{ $sched->status }}</td>
                                <td>
                                    <a href="{{ route('schedule.showList', [$sched->id, $qa->id]) }}" class="btn btn-primary btn-sm">List</a>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection