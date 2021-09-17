<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait {
    public function permissions() {
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRule = $this->permissionsRule();

        $permissions = [];
        foreach ($permissionsRule as $permission) {
            if(in_array($permission, $permissionsPlan)){
                array_push($permissions, $permission);
            }
        }

        return $permissions;
    }

    public function permissionsPlan(): array {
        // $tenant = $this->tenant;
        // $plan = $tenant->plan;

        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;

        $permissions = [];
        foreach ($plan->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    public function permissionsRule(): array {
        $rules = $this->rules()->with('permissions')->get();

        $permissions = [];
        foreach ($rules as $rule) {
            foreach ($rule->permissions as $permission) {
                array_push($permissions, $permission->name);
            }        
        }       

        return $permissions;
    }

    public function hasPermission(string $permissionName): bool {
        return in_array($permissionName, $this->permissions());
    }
    
    public function isAdmin(): bool {
        return in_array($this->email, config('acl.admins'));
    }
}
