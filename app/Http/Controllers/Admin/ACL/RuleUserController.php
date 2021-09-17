<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuleUserController extends Controller
{
    public function users($idRule) {
        $rule = Rule::find($idRule);

        if (!$rule) {
            return redirect()->back();
        }
        
        $users = $rule->users()->paginate();

        return view('admin.pages.rules.users.users', compact('rule', 'users'));
    }

    public function rules($idUser) {
        $user = User::find($idUser);

        if (!$user) {
            return redirect()->back();
        }
        
        $rules = $user->rules()->paginate();

        return view('admin.pages.users.rules.rules', compact('user', 'rules'));
    }    

    public function usersAvailable(Request $request, $idRule) {
        $rule = Rule::find($idRule);

        if (!$rule) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $users = $rule->usersAvailable($request->filter);

        return view('admin.pages.rules.users.available', compact('rule', 'users', 'filters'));
    }

    public function attachUsersRule(Request $request, $idRule) {
        $rule = Rule::find($idRule);

        if (!$rule) {
            return redirect()->back();
        }

        if(!$request->users || count($request->users) == 0) {
            return redirect()->back()
                            ->with('error', 'Escolha pelo menos uma permissão para vincular.');
        }

        $rule->users()->attach($request->users);

        return redirect()->route('rules.users', $rule->id);
    }

    public function detachUsersAvailable($idRule, $idUser) {
        $rule = Rule::find($idRule);
        $user = User::find($idUser);

        if (!$rule || !$user) {
            return redirect()->back();
        }

        $rule->users()->detach($user);

        return redirect()->back();
    }
}
