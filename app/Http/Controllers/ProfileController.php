<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data['stripe_price'] = null;
        if (auth()->user()->subscribed('default')) {
            $data['stripe_price'] = auth()->user()->subscription()->stripe_price;
        }
        return view('profile.show', $data);
    }

    public function payment(Request $request)
    {
        $data = $this->validate($request, [
            'subscription_as' => 'required'
        ]);

        if (in_array(env('FREE_PLAN_STRIP_ID'), $data))
        {
            if (auth()->user()->subscribed('default')) {
                auth()->user()->subscription('default')->swap(env('FREE_PLAN_STRIP_ID'));
            } else {
                auth()->user()->newSubscription('default', env('FREE_PLAN_STRIP_ID'))->create();
            }
            session()->flash('success', 'Your subscription plan has been updated successful.');
            return redirect()->route('profile.show');
        }
        $data['intent'] = auth()->user()->createSetupIntent();
        return view('profile.payment', $data);
    }

    public function migrate(Request $request)
    {
        $this->validate($request, [
            'subscription_as' => 'required',
            'payment_method' => 'required'
        ]);

        if (auth()->user()->subscribed('default')) {
            auth()->user()->subscription('default')->swap($request->subscription_as);
        } else {
            auth()->user()->newSubscription('default', $request->subscription_as)->create($request->payment_method);
        }
        session()->flash('success', 'Your subscription plan has been updated successful.');
        return redirect()->route('profile.show');
    }
}
