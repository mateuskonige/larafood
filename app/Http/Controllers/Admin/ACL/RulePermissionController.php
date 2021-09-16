<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Rule;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RulePermissionController extends Controller
{
    public function permissions($idRule) {
        $rule = Rule::find($idRule);

        if (!$rule) {
            return redirect()->back();
        }
        
        $permissions = $rule->permissions()->paginate();

        return view('admin.pages.rules.permissions.permissions', compact('rule', 'permissions'));
    }

    public function rules($idPermission) {
        $permission = Permission::find($idPermission);

        if (!$permission) {
            return redirect()->back();
        }
        
        $rules = $permission->rules()->paginate();

        return view('admin.pages.permissions.rules.rules', compact('permission', 'rules'));
    }    

    public function permissionsAvailable(Request $request, $idRule) {
        $rule = Rule::find($idRule);

        if (!$rule) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $rule->permissionsAvailable($request->filter);

        return view('admin.pages.rules.permissions.available', compact('rule', 'permissions', 'filters'));
    }

    public function attachPermissionsRule(Request $request, $idRule) {
        $rule = Rule::find($idRule);

        if (!$rule) {
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back()
                            ->with('error', 'Escolha pelo menos uma permissão para vincular.');
        }

        $rule->permissions()->attach($request->permissions);

        return redirect()->route('rules.permissions', $rule->id);
    }

    public function detachPermissionsAvailable($idRule, $idPermission) {
        $rule = Rule::find($idRule);
        $permission = Permission::find($idPermission);

        if (!$rule || !$permission) {
            return redirect()->back();
        }

        $rule->permissions()->detach($permission);

        return redirect()->back();
    }}
