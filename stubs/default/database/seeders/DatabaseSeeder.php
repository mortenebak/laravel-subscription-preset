<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Plans
        Plan::query()->create([
            'title' => 'Pro - $99 / month',
            'slug' => 'monthly',
            'stripe_id' => 'price_XXXXXXXXXXXXX'
        ]);
        Plan::query()->create([
            'title' => 'Pro - $999 / year',
            'slug' => 'yearly',
            'stripe_id' => 'price_XXXXXXXXXXXXX'
        ]);
    }
}
