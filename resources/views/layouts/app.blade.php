<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <script src="{{ asset('js/jquery-slim.js') }}"></script>
    <script src="{{ asset('js/jqueryprint.js') }}"></script>
    
</head>
<body style="background: transparent url('{{ asset('images/User BG.jpg') }}') no-repeat fixed center/cover">

    <div id="app">
        
    <img src="{{ asset('images/AdminHeader.jpg') }}" style="width: 100%">
        <nav style="background: transparent url('{{ asset('images/Menu BG.jpg') }}') no-repeat fixed center/cover" class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    
                    @guest
                    <ul class="navbar-nav mr-auto">
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
                                    <img src="{{ asset('images/VerificationLogo.png') }}" style="width: 20px;">
                                    VERIFICATION
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('courseRegistered') }}">
                                <strong>
                                    <img src="{{ asset('images/CourseRegisteredLogo1.png') }}" style="width: 18px">
                                    COURSE REGISTERED
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('feedback.create') }}">
                                <strong>
                                    <img src="{{ asset('images/Feedback1.png') }}" style="width: 18px"> FEEDBACK
                                </strong>
                            </a>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            WELCOME BACK {{ strtoupper(Auth::user()->first_name) }}! <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endguest
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/login">
                                    <font color="white" face="arial bold"><img src="{{ asset('images/RegisterLogo.png') }}" style="width: 25px"> LOGIN </font>
                                </a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('home') }}">
                                    <strong>
                                        <img src="{{ asset('images/HomeLogo1.png') }}" style="width: 25px; text-align: center"> HOME 
                                    </strong>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="studentDropDown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>
                                        <img src="{{ asset('images/RegisterLogo1.png') }}" style="width: 25px; text-align: center">
                                        REGISTER<span class="caret"></span>
                                    </strong>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="studentDropDown">
                                    <a class="dropdown-item text-white" href="{{ route('student.index')}}">
                                        <strong>
                                            <img src="{{ asset('images/RegisterLogo.png') }}" style="width: 25px; text-align: center">
                                        STUDENT PROFILE
                                        </strong>
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ route('users.index') }}">
                                        <strong>
                                            <img src="{{ asset('images/RegisterLogo.png') }}" style="width: 25px; text-align: center">
                                        ADMIN PROFILE
                                        </strong>
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ route('assessor.index') }}">
                                        <strong>
                                            <img src="{{ asset('images/RegisterLogo.png') }}" style="width: 25px; text-align: center">
                                        ASSESSOR PROFILE
                                        </strong>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="studentDropDown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>
                                        <img src="{{ asset('images/CourseRegisteredLogo1.png') }}" style="width: 25px; text-align: center">
                                   CERTIFICATE<span class="caret"></span>
                                    </strong>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="studentDropDown">
                                    <a class="dropdown-item text-white" href="{{ route('print_certificate_index') }}">
                                        <strong>
                                            <img src="{{ asset('images/CourseRegisteredLogo.png') }}" style="width: 25px; text-align: center">
                                        PRINT CERTIFICATE
                                        </strong>
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ route('certificate.status') }}">
                                        <strong>
                                            <img src="{{ asset('images/CourseRegisteredLogo.png') }}" style="width: 25px; text-align: center">
                                        CERTIFICATE STATUS
                                        </strong>
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ route('print.index') }}">
                                        <strong>
                                            <img src="{{ asset('images/CourseRegisteredLogo.png') }}" style="width: 25px; text-align: center">
                                        SETUP CERTIFICATE
                                        </strong>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="studentDropDown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>
                                        <img src="{{ asset('images/AssessmentLogo1.png') }}" style="width: 25px; text-align: center">
                                        ASSESSMENT<span class="caret"></span>
                                    </strong>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="studentDropDown">
                                    <a class="dropdown-item text-white" href="{{ route('qualifications.index') }}">
                                        <strong>
                                            <img src="{{ asset('images/AssessmentLogo.png') }}" style="width: 25px; text-align: center">
                                        ASSESSMENT SCHEDULE
                                        </strong>
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ route('schedule.students') }}">
                                        <strong>
                                            <img src="{{ asset('images/AssessmentLogo.png') }}" style="width: 25px; text-align: center">
                                        STUDENT ASSESSMENT
                                        </strong>
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ route('applicants.index') }}">
                                        <strong>
                                            <img src="{{ asset('images/AssessmentLogo.png') }}" style="width: 25px; text-align: center">
                                        PRINT STUDENT FORM
                                        </strong>
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ route('applicants.index') }}">
                                        <strong>
                                            <img src="{{ asset('images/AssessmentLogo.png') }}" style="width: 25px; text-align: center">
                                        ASSESSMENT RESULT
                                        </strong>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="feedback" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>
                                        <img src="{{ asset('images/Feedback1.png') }}" style="width: 25px; text-align: center">
                                        OTHERS
                                    </strong>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="studentDropDown">
                                    <a class="dropdown-item text-white" href="{{ route('feedback.index') }}">
                                        <strong>
                                            <img src="{{ asset('images/Feedback.png') }}" style="width: 25px; text-align: center">
                                        FEEDBACK
                                        </strong>
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ route('verification.index') }}">
                                        <strong>
                                            <img src="{{ asset('images/Feedback.png') }}" style="width: 25px; text-align: center">
                                        VERIFICATION
                                        </strong>
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
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
    </div>
    <!-- Jquery Slim -->
    <script src="{{ asset('js/propper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    
    @yield('scripts')
</body>
</html>
