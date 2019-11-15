<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<script src="{{ asset('js/jquery-slim.js') }}"></script>
	
  </head>
  <body style="background: transparent url('{{ asset('images/User BG.jpg') }}') no-repeat fixed center/cover">

<img src="{{ asset('images/Header.jpg') }}" style="width: 100%">
    <nav class="navbar-dark bg-primary" style="background: transparent url('{{ asset('images/Menu BG.jpg') }}') no-repeat fixed center/cover">
		<div class="container-fluid">
			<ul class="nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/">
						<strong>
							<font color="white" face="arial bold"><img src="{{ asset('images/HomeLogo1.png') }}" style="width: 25px; text-align: center"> HOME </font>
						</strong>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a id="studentDropDown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						<strong>
							<img src="{{ asset('images/AssessmentLogo1.png') }}" style="width: 25px; text-align: center">
							APPOINTMENT<span class="caret"></span>
						</strong>
					</a>
					<div class="dropdown-menu" aria-labelledby="studentDropDown">
						<a class="dropdown-item text-white" href="{{ route('applicants.create') }}">
							<strong>
								APPLYING FOR ASSESSMENT
							</strong>
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-white" href="{{ route('request.create') }}">
							<strong>
								REQUEST FOR CERTIFICATES
							</strong>
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-white" href="{{ route('qualifications.index') }}">
							<strong>
								ASSESSMENT SCHEDULE
							</strong>
						</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="{{ route('verification.create') }}">
						<strong>
							<img src="{{ asset('images/VerificationLogo.png') }}" style="width: 25px;">
							VERIFICATION
						</strong>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="{{ route('courseRegistered') }}">
						<strong>
							<img src="{{ asset('images/CourseRegisteredLogo1.png') }}" style="width: 25px">
							COURSE REGISTERED
						</strong>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="{{ route('feedback.create') }}">
						<strong>
							<img src="{{ asset('images/Feedback1.png') }}" style="width: 25px"> FEEDBACK
						</strong>
					</a>
				</li>
				<ul class="nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="/login">
							<font color="white" face="arialbold"><img src="{{ asset('images/RegisterLogo1.png') }}" style="width: 25px"> LOGIN </font>
						</a>
					</li>
				</ul>
			</ul>
		</div>
	</nav>
	@if (session()->has('success'))
		<div class="alert alert-success" id="sessions">
			{{ session()->get('success')}}
		</div>
	@endif

	@if (session()->has('error'))
		<div class="alert alert-danger" id="sessions">
			{{ session()->get('error')}}
		</div>
	@endif
    <main class="py-4">            
        @yield('content')
	</main>
	<script src="{{ asset('js/propper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	
	@yield('scripts')
 </body>
 </html>