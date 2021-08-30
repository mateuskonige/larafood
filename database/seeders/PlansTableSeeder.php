<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Enterprise',
            'url' => 'enterprise',
            'price' => 399.90,
            'description' => 'Enterprise description'
        ]);
    }
}
