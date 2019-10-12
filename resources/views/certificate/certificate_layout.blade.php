@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<span class="float-md-right mt-1">
					<button class="btn btn-success btn-sm" id="clickMe" >Print This</button>
				</span>
				<h3 class="mb-0">
					<span><img src="images/AdminBlue.png" style="width: 40px; text-align: center"></span>
					PRINT CERTIFICATE
				</h3>
				<hr class="bg-primary">
			</div>
			<div id="printThis" class="card img-fluid">
				<img class="card-img-top" src="{{ asset('images/blankcertificate.jpg') }}" alt="Card image" style="width:100%">
				<div class="card-img-overlay">
					<h1 class="text-underlined text-uppercase font-weight-bold text-center " style="margin-top: 220px; font-face:'Arial Black';">
						<u>{{strtoupper($requestCertificate->fullname)}}</u>
					</h1>
					<h2 class="text-underlined text-uppercase font-weight-bold text-center " style="margin-top: 25px;">
						{{strtoupper($requestCertificate->qualification->course)}}
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
							@foreach ($requestCertificate->qualification->printCertificateModels as $item)
								<tr>
									<td style="font-size:12px;"><strong>{{ $item-> code_no}}</strong></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td style="font-size:12px;"><strong>{{ $item-> core_competencies}}</strong></td>
								</tr>
							@endforeach
						</table>
						<div class="mx-auto text-center w-75 mt-2">
							<h5>
								<strong>
									<em>
										Conducted on June 7, 2019 to June 29, 2019 at Maxima Technical Skills Training Institute, Inc. Given this 29th day of June 2019 at Dagupan City, Pangasinan
									</em>
								</strong> 
							</h5>
						</div>
					</div>
					<h4 class="text-center">
						Certificate No. CRY2019001
					</h4>
				</div>
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
	</script>
@endsection
