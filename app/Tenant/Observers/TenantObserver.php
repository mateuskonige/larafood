<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class TenantObserver {
    /**
     * Handle the Category "creating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function creating(Model $model)
    {
        $managerTenant = App::make(ManagerTenant::class);

        $model->tenant_id = $managerTenant->getTenantIdentity();
    }
}
