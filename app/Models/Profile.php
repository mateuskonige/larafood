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
}
