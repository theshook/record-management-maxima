@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<span class="float-md-right mt-1">
					<button class="btn btn-success btn-sm" id="clickMe" >Print This</button>
				</span>
				{{-- <span class="float-md-right mt-1">
					<form action="{{ route('cert.update', $requestCertificate->id)}}" method="POST">
					@csrf
					@method('PUT')
					
					<button class="btn btn-danger btn-sm text-white" id="clickMe" >Done Printing</button>
					</form>
				</span> --}}
				<h3 class="mb-0">
					<span><img src="{{ asset('images/CourseRegisteredBlue.png') }}" style="width: 40px; text-align: center"></span>
					PRINT CERTIFICATE
				</h3>
				<hr class="bg-primary">
			</div>
			<div id="printThis">
				@foreach ($requestCertificate as $item)
					<div class="card img-fluid">
						<img class="card-img-top" src="{{ asset('images/blankcertificate.jpg') }}" alt="Card image" style="width:100%">
						<div class="card-img-overlay">
							<h1 class="text-underlined text-uppercase font-weight-bold text-center " style="margin-top: 220px; font-face:'Arial Black';">
								<u>{{strtoupper($item->fullname)}}</u>
							</h1>
							<h2 class="text-underlined text-uppercase font-weight-bold text-center " style="margin-top: 25px;">
								{{strtoupper($item->qualification->course)}}
							</h2>
							<div class=" font-weight-bolder" style="height: 380px;">
								<table align="center">
									<tr>
										<td style="font-size:12px;"">
											<strong>CODE NO.</strong>
										</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td style="font-size:12px;"">
											<strong>CODE COMPETENCIES</strong>
										</td>
									</tr>
									@foreach ($item->qualification->printCertificateModels as $item1)
										<tr>
											<td style="font-size:12px;"><strong>{{ $item1-> code_no}}</strong></td>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
											<td style="font-size:12px;"><strong>{{ $item1-> core_competencies}}</strong></td>
										</tr>
									@endforeach
								</table>
								<div class="mx-auto text-center w-75 mt-2">
									<h5>
										@php
											$dt = new DateTime();
											$dt->setTimezone(new DateTimeZone('Asia/Manila'));
										@endphp
										<strong>
											<em>
												Conducted on {{ date('F d, Y', strtotime($item->created_at)) }}
													to {{ \Carbon\Carbon::now('+08:00')->format('F d, Y') }} at Maxima Technical Skills Training Institute, Inc. Given this {{ \Carbon\Carbon::now('+08:00')->format('jS') }} day of {{ \Carbon\Carbon::now('+08:00')->format('F Y') }} at Dagupan City, Pangasinan
											</em>
										</strong> 
									</h5>
								</div>
							</div>
							<h4 class="text-center">
								@php
									$words = explode(" ", $item->qualification->course);
									$acronym = "";
		
									foreach ($words as $w) {
									$acronym .= $w[0];
									}
									$input = $item->id;
									$number = str_pad($input, 3, "0", STR_PAD_LEFT);
								@endphp
								Certificate No. {{ $acronym.\Carbon\Carbon::now('+08:00')->format('Y').$number}}
							</h4>
						</div>
					</div>
				@endforeach
			</div>
		</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
				$(document).ready(function() {
			$("#clickMe").click(function() {
				$("#printThis").print({
					globalStyles: false,
					mediaPrint: true,
					stylesheet: '{!! asset('css/certificate.css') !!}',
					noPrintSelector: ".no-print",
					iframe: false,
					append: null,
					prepend: null,
					manuallyCopyFormValues: true,
					deferred: $.Deferred(),
					timeout: 750,
					title: null,
					doctype: '<!doctype html>'
				});
			})
		});
		var reference = (function thename(){

			$("#printThis").print({
					globalStyles: false,
					mediaPrint: true,
					stylesheet: '{!! asset('css/certificate.css') !!}',
					noPrintSelector: ".no-print",
					iframe: false,
					append: null,
					prepend: null,
					manuallyCopyFormValues: true,
					deferred: $.Deferred(),
					timeout: 750,
					title: null,
					doctype: '<!doctype html>'
				});

return thename; //return the function itself to reference

}()); //auto-run

$(document).ready(function() {
$("#clickMe").click(function() {
	$("#printThis").print({
					globalStyles: false,
					mediaPrint: true,
					stylesheet: '{!! asset('css/certificate.css') !!}',
					noPrintSelector: ".no-print",
					iframe: false,
					append: null,
					prepend: null,
					manuallyCopyFormValues: true,
					deferred: $.Deferred(),
					timeout: 750,
					title: null,
					doctype: '<!doctype html>'
				});
})
});
	</script>
@endsection
