<?php

namespace App\Models;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPlan extends Model
{
    use HasFactory;

    protected $table = 'details_plan';

    protected $fillable = ['name'];

    public function plan() {
        $this->belongsTo(Plan::class);
    }
}
