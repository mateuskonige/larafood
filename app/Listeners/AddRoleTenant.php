<?php

namespace App\Listeners;

use App\Models\Rule;
use App\Events\TenantCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddRoleTenant
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TenantCreated $event)
    {
        $user = $event->user();

        if (!$rule = Rule::first()) {
            return;
        }

        $user->rules()->attach($rule);
        
        return 1;
    }
}
