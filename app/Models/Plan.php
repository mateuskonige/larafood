<?php

namespace App\Models;

use App\Models\Profile;
use App\Models\DetailPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'price',
        'description'
    ];

    public function details() {
        return $this->hasMany(DetailPlan::class);
    }

    public function profiles() {
        return $this->belongsToMany(Profile::class);
    }

    /**
     * Perfis nao linkados ao plano
     */
    public function profilesAvailable($filter = NULL)
    {
        $profiles = Profile::whereNotIn('id', function ($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id=$this->id");
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter) {
                    $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
                }
            })
            ->paginate();

        return $profiles;
    }
}
