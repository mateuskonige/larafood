<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanProfileController extends Controller
{
    public function profiles($urlPlan)
    {
        $plan = Plan::where('url', $urlPlan)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', compact('plan', 'profiles'));
    }

    public function plans($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', compact('profile', 'plans'));
    }

    public function profilesAvailable(Request $request, $urlPlan)
    {
        $plan = Plan::where('url', $urlPlan)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available', compact('plan', 'profiles', 'filters'));
    }

    public function attachProfilesPlan(Request $request, $urlPlan)
    {
        $plan = Plan::where('url', $urlPlan)->first();

        if (!$plan) {
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()->back()
                ->with('error', 'Escolha pelo menos uma perfil para vincular.');
        }

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $plan->url);
    }

    public function detachProfilesAvailable($urlPlan, $idProfile)
    {
        $plan = Plan::where('url', $urlPlan)->first();
        $profile = Profile::find($idProfile);

        if (!$plan || !$profile) {
            return redirect()->back();
        }

        $plan->profiles()->detach($profile);

        return redirect()->back();
    }
}
