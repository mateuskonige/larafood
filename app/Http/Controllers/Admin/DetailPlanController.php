<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\DetailPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;

class DetailPlanController extends Controller
{
    // public function __construct(DetailPlan $detailPlan){
    //     $this->middleware('can:detailPlans');
    // }
    
    public function index($urlPlan)
    {
        if (!$plan = Plan::where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    public function show($urlPlan, $idDetail)
    {
        $plan = Plan::where('url', $urlPlan)->first();
        $detail = DetailPlan::where('id', $idDetail)->first();

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', compact('plan', 'detail'));
    }


    public function create($urlPlan) {
        if (!$plan = Plan::where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $details = $plan->details();

        
        return view('admin.pages.plans.details.create', compact('plan', 'details'));
    }

    public function store(StoreUpdateDetailPlan $request, $urlPlan)
    {
        if (!$plan = Plan::where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('plan.details.index', $plan->url);
    }

    public function edit($urlPlan, $idDetail)
    {
        $plan = Plan::where('url', $urlPlan)->first();
        $detail = DetailPlan::where('id', $idDetail)->first();
        
        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
    }

    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail)
    {
        $plan = Plan::where('url', $urlPlan)->first();
        $detail = DetailPlan::where('id', $idDetail)->first();

        if (!$plan || !$detail) {
            return redirect()->back();
        }
        
        $detail->update($request->all());

        return redirect()->route('plan.details.index', $plan->url);
    }

    public function destroy($urlPlan, $idDetail)
    {
        $plan = Plan::where('url', $urlPlan)->first();
        $detail = DetailPlan::where('id', $idDetail)->first();

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->delete();

        return redirect()->route('plan.details.index', $plan->url)
                        ->with('success', 'Registro deletado com sucesso.');
    }
}
