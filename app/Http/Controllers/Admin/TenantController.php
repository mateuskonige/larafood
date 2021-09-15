<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUpdateTenant;

class TenantController extends Controller
{
    public function __construct(Tenant $tenant){
        $this->middleware('can:tenants');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::latest()->paginate();
        return view('admin.pages.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateTenant  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTenant $request)
    {
        Tenant::create($request->all());

        return redirect()->route('tenants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = Tenant::findOrFail($id);

        return view('admin.pages.tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant = Tenant::findOrFail($id);

        return view('admin.pages.tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateTenant  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTenant $request, $id)
    {
        $tenant = Tenant::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('logo') && $request->logo->isValid()) {

            if (Storage::exists($tenant->logo)) {
                Storage::delete($tenant->logo);
            }

            $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}");
        }

        $tenant->update($data);

        return redirect()->route('tenants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);

        if (Storage::exists($tenant->logo)) {
            Storage::delete($tenant->logo);
        }

        $tenant->delete();

        return redirect()->route('tenants.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $tenants = Tenant::where('name', 'LIKE', "%{$request->filter}%")
            ->orWhere('email', 'LIKE', "%{$request->filter}%")
            ->latest()
            ->paginate(1);

        return view('admin.pages.tenants.index', compact('tenants', 'filters'));
    }
}
