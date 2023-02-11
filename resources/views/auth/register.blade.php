@extends('layouts.app')

@section('content')
<div class="card card-body border-0" style="max-width: auto; margin: 0 auto;">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Choose your subscription plan') }}</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="free" class="card card-body">
                            <p>
                                <input type="radio" id="free" name="subscription_as" value="{{ env('FREE_PLAN_STRIP_ID') }}" {{ (old('subscription_as') == env('FREE_PLAN_STRIP_ID')) ? 'checked' : '' }} checked>
                                <strong>Free</strong>
                            </p>
                            <p class="">
                                <small>{{ __('You can create 2 posts daily and you\'re not able to scheduling your posts.') }}</small>
                            </p>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label for="premium" class="card card-body">
                            <p>
                                <input type="radio" id="premium" name="subscription_as" value="{{ env('PREMIUM_PLAN_STRIP_ID') }}" {{ (old('subscription_as') == env('PREMIUM_PLAN_STRIP_ID')) ? 'checked' : '' }}>
                                <strong>Premium</strong>
                            </p>
                            <p class="">
                                <small>{{ __('You can create unlimited posts and you\'re able to scheduling your posts.') }}</small>
                            </p>
                        </label>
                    </div>
                </div>
                @error('subscription_as')
                    <p class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
