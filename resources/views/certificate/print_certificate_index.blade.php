@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<span class="float-md-right mt-1">
                    <form action="{{ route('multiple.print') }}" method="GET" id="formSave">
                    @csrf
						<button type="submit" class="btn btn-primary btn-sm" id="fetchSave">PRINT SELECTED</button>
					</form>
				</span>
				<h3 class="mb-0">
					<span><img src="images/AdminBlue.png" style="width: 40px; text-align: center"></span>
					PRINT CERTIFICATE
				</h3>
				<hr class="bg-primary">
            </div>
            <form action="{{ route('print_certificate_search') }}" method="POST" role="search" class="p-3 bg-primary">
                {{ csrf_field() }}
                <div class="input-group w-50">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search Names or Tracking Number"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-secondary">
                            Go
                        </button>
                    </span>
                </div>
            </form>
            <table class="table bg-white">
                    <thead>
                        <th>Name</th>
                        <th>Qualification</th>
                        <th>Ref #</th>
                        <th>Date Requested</th>
                        <th>Date Printed</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse ($students as $fb)
                            <tr>
                                <td>
                                    <input type="checkbox" name="certificate_ids[]" value="{{$fb->id}}">
                                </td>
                                <td>
                                    {{ $fb->fullname }}
                                </td>
                                <td>
                                    {{ $fb->qualification->course }}
                                </td>
                                <td>
                                    {{ $fb->reference_number }}
                                </td>
                                <td>
                                    {{ $fb->created_at }}
                                </td>
                                <td>
                                    <a href="{{ route('cert.show', $fb->id) }}" class="btn btn-success btn-sm">PREVIEW</a>
                                    <a href="{{ route('cert.print', $fb->id) }}" target="_blank"
                                  class="btn btn-primary btn-sm">PRINT</a>
                                </td>
                            </tr>
                        @empty
                            <h3 class="text-center"> No students as of now.</h3>
                        @endforelse
                    </tbody>
                </table>
                {!! $students->render() !!}
		</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $("#fetchSave").click(function(e) {
            e.preventDefault()
            var val = [];
            $(':checkbox:checked').each(function(i){
            val[i] = $(this).val();
            });
            var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "mydata").val(val);
            $("#formSave").append(input);
            $("#formSave").submit();
        });
    });
</script>
@endsection
