<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Get permissions
     */
    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Get plans
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }
    /**
     * Permissoes nao linkadas ao perfil
     */
    public function permissionsAvailable($filter = NULL) {
        $permissions = Permission::whereNotIn('id', function($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id=$this->id");
        })
        ->where(function($queryFilter) use ($filter) {
            if($filter) {
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return $permissions;
    }
}
