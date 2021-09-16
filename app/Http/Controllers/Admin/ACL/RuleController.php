<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRule;

class RuleController extends Controller
{
    public function __construct(Rule $rule){
        $this->middleware('can:rules');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = Rule::latest()->paginate();
        return view('admin.pages.rules.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.rules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateRule  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRule $request)
    {
        Rule::create($request->all());

        return redirect()->route('rules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rule = Rule::where('id', $id)->first();

        if (!$rule) {
            return redirect()->back();
        }

        return view('admin.pages.rules.show', compact('rule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rule = Rule::where('id', $id)->first();

        if (!$rule) {
            return redirect()->back();
        }

        return view('admin.pages.rules.edit', compact('rule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateRule $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRule $request, $id)
    {
        $rule = Rule::where('id', $id)->first();

        if (!$rule) {
            return redirect()->back();
        }

        $rule->update($request->all());

        return redirect()->route('rules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rule = Rule::where('id', $id)->first();

        if (!$rule) {
            return redirect()->back();
        }

        $rule->delete();

        return redirect()->route('rules.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $rules = Rule::where('name', 'LIKE', "%{$request->filter}%")
        ->orWhere('description', 'LIKE', "%{$request->filter}%")
        ->paginate(1);

        return view('admin.pages.rules.index', compact('rules', 'filters'));
    }
}
