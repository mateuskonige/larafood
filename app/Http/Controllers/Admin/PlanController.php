<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function store(Request $request) {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        //Plano de contas + kebab = plano-de-contas
        
        Plan::create($data);
        return redirect()->route('plans.index');
    }
}
