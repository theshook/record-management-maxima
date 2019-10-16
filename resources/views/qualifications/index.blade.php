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
                        <span><img src="{{ asset('images/AssessmentLogoBlue.png') }}" style="width: 25px; text-align: center"></span>
                        ASSESSMENT SCHEDULE
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
                    {{-- <tbody>
                        @foreach ($qualifications as $qualification)
                            <tr>
                                <td>{{ $qualification->sector }}</td>
                                <td>{{ $qualification->course }}</td>
                                <td class="text-danger">{{ $qualification->accreditation }}</td>
                                <td>
                                    <a href="{{ route('qualifications.show', $qualification->id) }}" class="btn btn-primary btn-sm">Schedule</a>
                                    <a href="{{ route('qualifications.edit', $qualification->id) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
   $(function() {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get.qualification') !!}',
            columns: [
                { data: 'sector', name: 'sector' },
                { data: 'course', name: 'course' },
                { data: 'accreditation', name: 'accreditation' },
                {data: 'action', name:'schedule', orderable: false, searchable: false},
            ],
            columnDefs: [{
                targets: 2,
                render: function ( data, type, row ) {
                    return '<span class="text-danger">' + data + '</span>';
                }
            }]
        });
    });
</script>
@endsection