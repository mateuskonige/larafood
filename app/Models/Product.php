<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'flag',
        'price',
        'description',
        'image',
    ];

    public function categories(){
        
        return $this->belongsToMany(Category::class);
    }
}
