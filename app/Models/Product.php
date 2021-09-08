<?php

namespace App\Models;

use App\Models\Tenant;
use App\Models\Category;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use TenantTrait;

    protected $fillable = [
        'title',
        'flag',
        'price',
        'description',
        'image',
    ];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
