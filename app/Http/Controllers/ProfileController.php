<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;

class ProfileController extends Controller
{
    public function show()
    {
        $data['plan'] = Plan::where('stripe_id', auth()->user()->subscription()->stripe_price)->first();
        return view('profile.show', $data);
    }

    public function subscription()
    {
        $data['currently_plan'] = Plan::where('stripe_id', auth()->user()->subscription()->stripe_price)->first();
        $data['plans'] = Plan::orderBy('id', 'asc')->get();
        return view('profile.subscription', $data);
    }
}
