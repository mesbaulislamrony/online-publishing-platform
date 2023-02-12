@extends('layouts.app')

@section('content')
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h4>{{ __('Payment') }}</h4>
    </div>
    <form id="payment-form" class="card card-body border-0" method="POST" action="{{ route('profile.migrate') }}">
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
            <div class="col-md-4">
                @if($subscription_as == env('FREE_PLAN_STRIP_ID'))
                    <label for="free" class="card card-body">
                        <p>
                            <input type="radio" id="free" name="subscription_as" value="{{ env('FREE_PLAN_STRIP_ID') }}" checked>
                            <strong>Free</strong>
                        </p>
                        <p class="">
                            <small>{{ __('You can create 2 posts daily and you\'re not able to scheduling your posts.') }}</small>
                        </p>
                    </label>
                @endif
                @if($subscription_as == env('PREMIUM_PLAN_STRIP_ID'))
                    <label for="premium" class="card card-body">
                        <p>
                            <input type="radio" id="premium" name="subscription_as" value="{{ env('PREMIUM_PLAN_STRIP_ID') }}" checked>
                            <strong>Premium</strong>
                        </p>
                        <p class="">
                            <small>{{ __('You can create unlimited posts and you\'re able to scheduling your posts.') }}</small>
                        </p>
                    </label>
                @endif
                <p class="text-muted mb-0"><em>{{ __('Note: You can upgrade & downgrade your subscription plan.') }}</em></p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 text-md-end">{{ __('Card Details') }}</label>
            <div class="col-md-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="card-holder-name" name="name">
                </div>
                <div id="card-element"></div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="" class="col-md-4 text-md-end">&nbsp;</label>
            <div class="col-md-6">
                <button type="submit" class="btn btn-warning" id="card-button" data-secret="{{ $intent->client_secret }}">{{ __('Migrate you plan') }}</button>
            </div>
        </div>
    </form>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}')
        var style = {
            base: {
                iconColor: '#666EE8',
                color: '#31325F',
                lineHeight: '40px',
                fontWeight: 300,
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSize: '15px',

                '::placeholder': {
                    color: '#CFD7E0',
                },
            },
        }
        const elements = stripe.elements()
        const cardElement = elements.create('card', {
            hidePostalCode: true,
            style: style
        })

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
                token.setAttribute('name', 'payment_method')
                token.setAttribute('value', setupIntent.payment_method)

                form.appendChild(token)

                form.submit();
            }
        })
    </script>
@endsection
