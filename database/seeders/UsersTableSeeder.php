<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();
        
        $tenant->users()->create([
            'name' => 'Mateus Reis',
            'email' => 'admin@admin.com',
            'password' => bcrypt('testando'),
        ]);
    }
}
