<?php

namespace App\Models;

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
}
