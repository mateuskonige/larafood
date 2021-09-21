<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TenantService {

    private $plan, $data = [];
    private $repository;

    public function __contruct(TenantRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function getaAllTenants(){
        return $this->repository->getAllTenants();
    }

    public function make(Plan $plan, array $data) {
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->storeTenant();
        $user = $this->storeUser($tenant);

        return $user;
    }

    public function storeTenant() {
        $data = $this->data;

        return $this->plan->tenants()->create([
            'cnpj' => $data['cnpj'],
            'name' => $data['empresa'],
            'email' => $data['email'],

            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    public function storeUser($tenant) {

        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => Hash::make($this->data['password']),
        ]);

        return $user;
    }
}
