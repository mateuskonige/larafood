<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\DetailPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailPlanController extends Controller
{
    public function index($urlPlan)
    {
        if (!$plan = Plan::where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    public function create($urlPlan) {
        if (!$plan = Plan::where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $details = $plan->details();

        
        return view('admin.pages.plans.details.create', compact('plan', 'details'));
    }

    public function store(Request $request, $urlPlan)
    {
        if (!$plan = Plan::where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $plan->details()->create($request->all());
        
        return redirect()->route('plan.details.index', $plan->url);
    }
}
