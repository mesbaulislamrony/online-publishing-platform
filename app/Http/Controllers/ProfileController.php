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

    public function migrate(Request $request)
    {
        $this->validate($request, [
            'subscription_as' => 'required'
        ]);

        if (auth()->user()->subscribed('default')) {
            auth()->user()->subscription('default')->swap($request->subscription_as);
        } else {
            auth()->user()->newSubscription('default', $request->subscription_as)->create();
        }
        session()->flash('success', 'Your subscription plan has been updated successful.');
        return redirect()->route('profile.show');
    }
}
