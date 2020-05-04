@extends('layouts.app')

@section('contentauth')
<div class="left">
    <div class="content">
        <div class="header">
            <h4 class="lead">Form Register For New Account</h4>
        </div>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="form-group">
                <label for="signin-email" class="control-label sr-only">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email ..." required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="signin-email" class="control-label sr-only">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password ..." required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="signin-password" class="control-label sr-only">Confirm Password</label>
                <input id="password-confirm" placeholder="confirm password ..." type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                Reset Password
            </button>
        </form>
    </div>
</div>
@endsection

