<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;

class ProfileController extends Controller
{
    public function show()
    {
        $data['stripe_id'] = null;
        if (auth()->user()->subscribed()) {
            $data['stripe_id'] = auth()->user()->subscription()->stripe_price;
        }
        $data['plans'] = Plan::orderBy('id', 'asc')->get();
        return view('profile.show', $data);
    }

    public function update(Request $request)
    {
        $array = $request->validate(
            [
                'subscription_as' => ['required', 'string'],
            ]
        );
        $data['plans'] = Plan::orderBy('id', 'asc')->get();
        return view('profile.show', $data);

    }
}
