<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::latest()->paginate();
        return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProfile  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {
        Profile::create($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::where('id', $id)->first();

        if (!$profile) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::where('id', $id)->first();

        if (!$profile) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProfile $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfile $request, $id)
    {
        $profile = Profile::where('id', $id)->first();

        if (!$profile) {
            return redirect()->back();
        }

        $profile->update($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::where('id', $id)->first();

        if (!$profile) {
            return redirect()->back();
        }

        $profile->delete();

        return redirect()->route('profiles.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $profiles = Profile::where('name', 'LIKE', "%{$request->filter}%")
        ->orWhere('description', 'LIKE', "%{$request->filter}%")
        ->paginate(1);

        return view('admin.pages.profiles.index', compact('profiles', 'filters'));
    }
}
