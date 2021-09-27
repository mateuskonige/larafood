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
        return TenantResource::collection(Tenant::all());
    }

    public function show($uuid) {   
        return new TenantResource(Tenant::where('uuid', $uuid)->first());
    }
}
