<?php

namespace App\Models;

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
     * Permissoes nao linkadas ao perfil
     */
    public function permissionsAvailable() {
        $permissions = Permission::whereNotIn('id', function($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id=$this->id");
        })
        ->paginate();

        return $permissions;
    }
}
