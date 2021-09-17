<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rule extends Model
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
     * Get users
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }

    /**
     * Permissoes nao linkadas ao perfil
     */
    public function permissionsAvailable($filter = NULL) {
        $permissions = Permission::whereNotIn('id', function($query) {
            $query->select('permission_rule.permission_id');
            $query->from('permission_rule');
            $query->whereRaw("permission_rule.rule_id=$this->id");
        })
        ->where(function($queryFilter) use ($filter) {
            if($filter) {
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return $permissions;
    }

    /**
     * Permissoes nao linkadas ao perfil
     */
    public function usersAvailable($filter = NULL) {
        $users = User::whereNotIn('id', function($query) {
            $query->select('rule_user.user_id');
            $query->from('rule_user');
            $query->whereRaw("rule_user.rule_id=$this->id");
        })
        ->where(function($queryFilter) use ($filter) {
            if($filter) {
                $queryFilter->where('users.name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return $users;
    }
}
