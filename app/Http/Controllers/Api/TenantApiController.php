<?php

namespace App\Http\Controllers\Api;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Services\TenantService;
use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;

class TenantApiController extends Controller
{
    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function index() {
        return TenantResource::collection(Tenant::paginate());
    }

    public function show($uuid) {   
        if(!$tenant = Tenant::where('uuid', $uuid)->first()){
            return response()->json(['message' => 'Tenant not found'], 404);
        }
        return new TenantResource($tenant);
    }
}
