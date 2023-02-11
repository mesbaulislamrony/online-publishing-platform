@extends('layouts.app')

@section('content')
<div style="max-width: 480px; margin: 0 auto;">
    @if($plans)
    <h4 class="text-center mb-3">{{ __('Choose your subscription plan') }}</h4>
    <div class="row mb-3">
        @foreach($plans as $plan)
        <div class="col-md-6">
            <label for="{{ $plan->slug }}" class="card card-body">
                <p>
                    <strong>{{ $plan->name }} ({{ $plan->price }} {{ $plan->currency }})</strong>
                </p>
                <p class="">{{ $plan->description }}</p>
                @if($currently_plan->id == $plan->id)
                <a href="{{ route('payments') }}?plan={{ $plan->slug }}" class="btn btn-warning">Migrate</a>
                @else
                <a href="javaScript:;" class="btn btn-success">Your Plan</a>
                @endif
            </label>
        </div>
        @endforeach
    </div>
    <p class="text-muted mb-0"><em>{{ __('Note: You can upgrade & downgrade your subscription plan.') }}</em></p>
    @endif
</div>


    
@endsection
