<?php

namespace App\Http\Controllers\Web;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function index() {
        $plans = Plan::with('details')->orderBy('price', 'ASC')->get();

        return view('web.pages.index', compact('plans'));
    }

    public function plan($urlPlan) {
        if(!$plan = Plan::where('url', $urlPlan)->first()){
            return redirect()->back();
        };

        session()->put('plan', $plan);

        return redirect()->route('register');
    }
}
