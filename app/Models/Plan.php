<?php

namespace App\Models;

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
}
