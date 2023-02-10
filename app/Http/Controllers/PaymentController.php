<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PaymentController extends Controller
{
    public function index(Request $request) {
        $data['plan'] = Plan::where('slug', $request->subscription_as)->first();
        $data['intent'] = auth()->user()->createSetupIntent();
        return view('subscription.payment')->with($data);
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'paymentMethodId' => 'required'
        ]);

        $plan = Plan::where('slug', $request->subscription_as)->first();
        
        $request->user()->newSubscription('default', $plan->stripe_id)->create($request->paymentMethodId);

        session()->flash('success', 'Your subscription plan has been updated successful.');
        return redirect()->route('profile.show');
    }
}
