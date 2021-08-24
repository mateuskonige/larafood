<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Profile;
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

        return view('admin.pages.profiles.permissions.index', compact('profile', 'permissions'));
    }
}
