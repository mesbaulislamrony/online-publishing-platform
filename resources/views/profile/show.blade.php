@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('payments') }}" class="card card-body">
    @csrf
    <div class="row mb-3">
        <label for="name" class="col-md-4 text-md-end">{{ __('Name') }}</label>
        <div class="col-md-6">{{ auth()->user()->name }}</div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 text-md-end">{{ __('Email Address') }}</label>
        <div class="col-md-6">{{ auth()->user()->email }}</div>
    </div>

    @if($plans)
    <div class="row mb-3">
        <label for="plan" class="col-md-4 text-md-end">{{ __('Choose your subscription plan') }}</label>
        <div class="col-md-6">
            <div class="row">
                @foreach($plans as $plan)
                <div class="col-md-6">
                    <label for="{{ $plan->slug }}" class="card card-body">
                        <p>
                            <input type="radio" id="{{ $plan->slug }}" name="subscription_as" value="{{ $plan->slug }}" {{ ($stripe_id == $plan->stripe_id) ? 'checked' : '' }}>
                            <strong>{{ $plan->name }} ({{ $plan->price }} {{ $plan->currency }})</strong>
                        </p>
                        <p class="mb-0">{{ $plan->description }}</p>
                    </label>
                </div>
                @endforeach
            </div>
            <p class="text-muted mb-0"><em>{{ __('Note: You can upgrade & downgrade your subscription plan.') }}</em></p>
        </div>
    </div>
    @endif

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-warning">{{ __('Update Membership Plan') }}</button>
        </div>
    </div>
</form>
@endsection
