<?php

namespace App\Models;

use App\Models\Tenant;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;
    use TenantTrait;

    protected $fillable = [
        'identify',
        'description',
    ];

    public function tenant() {
        return $this->belongsTo(Tenant::class);
    }
}
