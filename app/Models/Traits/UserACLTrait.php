<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait {
    public function permissions() {
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRule = $this->permissionsRule();

        $permissions = [];
        foreach ($permissionsRule as $permissionRule) {
            if(in_array($permissionRule, $permissionsPlan)){
                array_push($permissions);
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

    public function permissionsRole(): array {
        $rules = $this->rules()->with('permissions')->get();

        $permissions = [];        
        foreach ($rules->permissions as $permission) {
            array_push($permissions, $permission->name);
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
