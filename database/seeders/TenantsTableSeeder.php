<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();
        
        $plan->tenants()->create([
            'cnpj' => '89378289109827',
            'name' => 'DreamHouse',
            'url' => 'dream-house',
            'email' => 'dream-house@gmail.com'    
        ]);
    }
}
