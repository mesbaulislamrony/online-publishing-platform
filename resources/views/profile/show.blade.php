@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('profile.update') }}" class="card card-body">
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
        <label for="plan" class="col-md-4 text-md-end">{{ __('Choose your subscription plan') }}</label>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <label for="free" class="card card-body">
                        <p>
                            <input type="radio" id="free" name="subscription_as" value="free" {{ (auth()->user()->subscription_as == 'free') ? 'checked' : '' }}>
                            <strong>Free</strong>
                        </p>
                        <p>You can post max two articles daily.</p>
                        <p class="mb-0">0 TK</p>
                    </label>
                </div>
                <div class="col-md-6">
                    <label for="premium" class="card card-body">
                        <p>
                            <input type="radio" id="premium" name="subscription_as" value="premium" {{ (auth()->user()->subscription_as == 'premium') ? 'checked' : '' }}>
                            <strong>Premium</strong>
                        </p>
                        <p>You can post unlimited articles.</p>
                        <p class="mb-0">10 TK</p>
                    </label>
                </div>
            </div>
            <p class="text-muted mb-0"><em>{{ __('Note: You can upgrade & downgrade your subscription plan.') }}</em></p>
        </div>
    </div>
    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-warning">{{ __('Update Membership Plan') }}</button>
        </div>
    </div>
</form>
@endsection
