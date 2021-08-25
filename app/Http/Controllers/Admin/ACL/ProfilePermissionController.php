<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Profile;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilePermissionController extends Controller
{
    public function permissions($idProfile) {
        $profile = Profile::find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }
        
        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.permissions', compact('profile', 'permissions'));
    }

    public function profiles($idPermission) {
        $permission = Permission::find($idPermission);

        if (!$permission) {
            return redirect()->back();
        }
        
        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles', compact('permission', 'profiles'));
    }    

    public function permissionsAvailable(Request $request, $idProfile) {
        $profile = Profile::find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $profile->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
    }

    public function attachPermissionsProfile(Request $request, $idProfile) {
        $profile = Profile::find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back()
                            ->with('error', 'Escolha pelo menos uma permissão para vincular.');
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions', $profile->id);
    }

    public function detachPermissionsAvailable($idProfile, $idPermission) {
        $profile = Profile::find($idProfile);
        $permission = Permission::find($idPermission);

        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        return redirect()->back();
    }
}
