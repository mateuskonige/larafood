<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index() {
        $plans = Plan::latest()->paginate();
        return view('admin.pages.plans.index', compact('plans'));
    }

    public function show($url) {
        $plan = Plan::where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.show', compact('plan'));
    }

    public function create() {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request) {
        Plan::create($request->all());
        
        return redirect()->route('plans.index');
    }

    public function edit($url) {
        $plan = Plan::where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', compact('plan'));
    }

    public function update(StoreUpdatePlan $request, $url) {
        $plan = Plan::where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }

    public function destroy($id) {
        $plan = Plan::with('details')->where('id', $id)->first();

        if (!$plan) {
            return redirect()->back();
        }

        if($plan->details->count() > 0) {
            return redirect()->back()->with('error', 'Há detalhes vinculados a este registro, não é possível excluir.');
        }

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request) {
        $filters = $request->except('_token');
        
        $plans = Plan::where('name', 'LIKE', "%{$request->filter}%")
        ->orWhere('description', 'LIKE', "%{$request->filter}%")
        ->paginate(1);

        return view('admin.pages.plans.index', compact('plans', 'filters'));
    }
}
