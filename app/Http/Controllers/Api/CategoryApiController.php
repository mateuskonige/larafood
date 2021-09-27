<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\DB;

class CategoryApiController extends Controller
{
    public function categoriesbyTenant($uuid) {        

        $categories = DB::table('categories')
            ->join('tenants', 'tenants.id', '=', 'categories.tenant_id')
            ->where('tenants.uuid', $uuid)
            ->select('categories.*')
            ->get();

        return CategoryResource::collection($categories);
    }
}
