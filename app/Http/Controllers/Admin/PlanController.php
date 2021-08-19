<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index() {
        $plans = Plan::all();
        return view('admin.pages.plans.index', compact('plans'));
    }
}
