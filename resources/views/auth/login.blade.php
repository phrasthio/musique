@extends('layouts.app')

@section('contentauth')
<div class="left">
    <div class="content">
        <div class="header">
            <div class="logo text-center"><img src="{{asset('/electro/img/logoblack.png')}}" alt="Klorofil Logo"></div>
            <p class="lead">Login to your account</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="signin-email" class="control-label sr-only">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email ..." autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="signin-password" class="control-label sr-only">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="password ..." autocomplete="current-password">
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <br><span>Or</span><br>
            <a class="btn btn-primary" href="{{ route('register') }}">
                        Register Now
            </a>
            <div class="bottom">
                <span class="helper-text">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </span>
                <span class="helper-text">
                    <a class="btn btn-link" href="{{ route('auth.activate.resend') }}">
                        Resend Activation Email
                    </a>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection