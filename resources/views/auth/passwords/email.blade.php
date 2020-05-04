@extends('layouts.app')

@section('contentauth')
<div class="left">
    <div class="content">
        <div class="header">
            <h4 class="lead">Reset Your Password</h4>
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="signin-email" class="control-label sr-only">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="your email ..." required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button><br>
            <p> </p>
            <a href="{{ route('login') }}" class="btn btn-primary">Cancel</a>
        </form>
    </div>
</div>
@endsection