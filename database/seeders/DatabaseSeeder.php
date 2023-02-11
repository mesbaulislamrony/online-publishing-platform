<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create(
            [
                'name' => 'Mesbaul Islam',
                'email' => 'mesbaul.cse26@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make(12345678),
                'remember_token' => Str::random(10),
                'role' => 'admin',
            ]
        );

        \App\Models\User::factory(2)->create();

        \App\Models\Plan::factory()->create(
            [
                'name' => 'Free',
                'slug' => 'free',
                'stripe_id' => env('FREE_PLAN_STRIP_ID'),
                'price' => '0',
                'currency' => env('CASHIER_CURRENCY'),
                'description' => 'You can create 2 posts daily but you\'re not able to scheduling your posts.'
            ]
        );

        \App\Models\Plan::factory()->create(
            [
                'name' => 'Premium',
                'slug' => 'premium',
                'stripe_id' => env('PREMIUM_PLAN_STRIP_ID'),
                'price' => '10',
                'currency' => env('CASHIER_CURRENCY'),
                'description' => 'You can create unlimited posts and you\'re able to scheduling your posts.'
            ]
        );
    }
}
