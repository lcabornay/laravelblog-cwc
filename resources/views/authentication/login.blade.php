@extends('layouts/main')

@section('content')
    <body class="hold-transition login-page">
    <div class="login-box">
        @if (session('fail'))
            <div class="alert alert-danger">Email is not registered, please contact admin</div>
        @endif

        @if ( $errors->any() )
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-logo">
            <img src="{{ asset('images/Logo.png') }}" alt="" id="logo">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">

                <div class="social-auth-links text-center mb-3">
                    <a href="{{ url('/login/google') }}" class="btn btn-block border border-primary">
                        <img src="{{ asset('images/google_logo.svg') }}" alt="" style="height: 30px; width: 20px" class="mr-3"> Sign-in using Google
                    </a>
                </div>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
