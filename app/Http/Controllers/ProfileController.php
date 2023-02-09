<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show');
    }

    public function update(Request $request)
    {
        $array = $request->validate(
            [
                'subscription_as' => ['required', 'string'],
            ]
        );

        try {

            User::where(['id' => auth()->user()->id])->update($array);

            session()->flash('success', 'Your subscription plan has been updated successful.');
        } catch (\Throwable $throwable) {
            session()->flash('failed', 'Your subscription plan has been updated failed.');
        }
        return redirect()->route('profile.show');

    }
}
