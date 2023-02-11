@extends('layouts.app')

@section('content')
<div class="card card-body border-0" style="max-width: 640px; margin: 0 auto;">
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
            <label for="{{ $plan->slug }}" class="card card-body">
                <p>
                    <strong>{{ $plan->name }} ({{ $plan->price }} {{ $plan->currency }})</strong>
                </p>
                <p class="mb-0">{{ $plan->description }}</p>
            </label>
            <p class="text-muted mb-0"><em>{{ __('Note: You can upgrade & downgrade your subscription plan.') }}</em></p>
        </div>
    </div>
</div>
@endsection
