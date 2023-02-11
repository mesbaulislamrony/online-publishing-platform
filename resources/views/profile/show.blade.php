@extends('layouts.app')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4>{{ __('Your profile') }}</h4>
</div>
<form class="card card-body border-0" method="POST" action="{{ route('profile.migrate') }}">
    @csrf
    <div class="row mb-3">
        <label for="name" class="col-md-4 text-md-end">{{ __('Name') }}</label>
        <div class="col-md-6">{{ auth()->user()->name }}</div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 text-md-end">{{ __('Email Address') }}</label>
        <div class="col-md-6">{{ auth()->user()->email }}</div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 text-md-end">{{ __('Your subscription plan') }}</label>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <label for="free" class="card card-body {{ ($stripe_price == env('FREE_PLAN_STRIP_ID')) ? 'border-success' : '' }}">
                        <p>
                            <input type="radio" id="free" name="subscription_as" value="{{ env('FREE_PLAN_STRIP_ID') }}" {{ ($stripe_price == env('FREE_PLAN_STRIP_ID')) ? 'checked' : '' }} checked>
                            <strong>Free</strong>
                        </p>
                        <p class="">
                            <small>{{ __('You can create 2 posts daily and you\'re not able to scheduling your posts.') }}</small>
                        </p>
                    </label>
                </div>
                <div class="col-md-6">
                    <label for="premium" class="card card-body {{ ($stripe_price == env('PREMIUM_PLAN_STRIP_ID')) ? 'border-success' : '' }}">
                        <p>
                            <input type="radio" id="premium" name="subscription_as" value="{{ env('PREMIUM_PLAN_STRIP_ID') }}" {{ ($stripe_price == env('PREMIUM_PLAN_STRIP_ID')) ? 'checked' : '' }}>
                            <strong>Premium</strong>
                        </p>
                        <p class="">
                            <small>{{ __('You can create unlimited posts and you\'re able to scheduling your posts.') }}</small>
                        </p>
                    </label>
                </div>
            </div>
            <p class="text-muted mb-0"><em>{{ __('Note: You can upgrade & downgrade your subscription plan.') }}</em></p>
        </div>
    </div>

    <div class="row mb-3">
        <label for="" class="col-md-4 text-md-end">&nbsp;</label>
        <div class="col-md-6">
            <button type="submit" class="btn btn-warning">{{ __('Migrate you plan') }}</button>
        </div>
    </div>
</form>
@endsection
