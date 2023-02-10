@extends('layouts.app')

@section('content')
<form id="payment-form" method="POST" action="{{ route('payments.store') }}" style="max-width: 480px; margin: 0 auto;">
    @csrf
    @if($plan)
        <div class="mb-5">
            <p class="mb-1">
                <strong>{{ __('You\'re subscription plan') }}</strong>
            </p>
            <label for="{{ $plan->slug }}" class="card card-body">
                <p>
                    <input type="radio" id="{{ $plan->slug }}" name="subscription_as" value="{{ $plan->slug }}" checked>
                    <strong>{{ $plan->name }} ({{ $plan->price }} {{ $plan->currency }})</strong>
                </p>
                <p class="mb-0">{{ $plan->description }}</p>
            </label>
            <p class="text-muted mb-0"><em>{{ __('Note: You can upgrade & downgrade your subscription plan.') }}</em></p>
        </div>
        <div class="mb-3">
            <p class="mb-1">
                <strong>{{ __('You\'re card details') }}</strong>
            </p>
            <div class="mb-3">
                <label for="name" class="col-form-label">{{ __('Card holder name') }}</label>
                <input type="text" name="name" id="card-holder-name" class="form-control" value="{{ auth()->user()->name }}" placeholder="Name on the card">
            </div>
            <div class="mb-3">
                <div id="card-element"></div>
            </div>
            <button type="submit" class="btn btn-warning" id="card-button" data-secret="{{ $intent->client_secret }}">{{ __('Payment') }}</button>
        </div>
    @endif
</form>

<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}')

    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    
    const elements = stripe.elements()
    const cardElement = elements.create('card', {hidePostalCode: true, style: style})

    cardElement.mount('#card-element')

    const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    const cardHolderName = document.getElementById('card-holder-name')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()

        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )

        if(error) {
            cardBtn.disable = false
        } else {
            let token = document.createElement('input')

            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'paymentMethodId')
            token.setAttribute('value', setupIntent.payment_method)

            form.appendChild(token)

            form.submit();
        }
    })
</script>
@endsection