<?php

namespace App\Models;

use App\Models\Rule;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Get profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
    /**
     * Get rules
     */
    public function rules()
    {
        return $this->belongsToMany(Rule::class);
    }
}
