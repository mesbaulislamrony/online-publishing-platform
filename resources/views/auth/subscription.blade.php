@extends('layouts.app')

@section('content')
<div style="max-width: 480px; margin: 0 auto;">
    <h4 class="text-center mb-3">{{ __('Choose your subscription plan') }}</h4>
    @if($plans)
    <div class="row mb-3">
        @foreach($plans as $plan)
        <div class="col-md-6">
            <label for="{{ route('register') }}?plan={{ $plan->slug }}" class="card card-body">
                <p>
                    <strong>{{ $plan->name }} ({{ $plan->price }} {{ $plan->currency }})</strong>
                </p>
                <p class="">{{ $plan->description }}</p>
                <a href="{{ route('register') }}?plan={{ $plan->slug }}" class="btn btn-warning">Buy</a>
            </label>
        </div>
        @endforeach
    </div>
    <p class="text-muted mb-0"><em>{{ __('Note: You can upgrade & downgrade your subscription plan.') }}</em></p>
    @endif
</div>
@endsection
