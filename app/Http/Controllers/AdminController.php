<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function dashboard()
    {
        $float = Auth::user()->agent_float;

        //get sum of all entry amount after the agent_period date of type withdrawal
        $withdrawals = Entry::where('user_id', Auth::user()->id)->where('type', 'withdrawal')->where('created_at', '>', Auth::user()->float_period)->sum('amount');

        //now get deposits
        $deposits = Entry::where('user_id', Auth::user()->id)->where('type', 'deposit')->where('created_at', '>', Auth::user()->float_period)->sum('amount');

        //add float to deposits
        $float = $float + $deposits;

        //deduct withdrawals from float
        $float = $float - $withdrawals;

        return view('agent.dashboard')->with('float', $float);
    }

    public function dashboardAdmin()
    {
        return view('admin.dashboard');
    }

    public function dashboardAdminUsers()
    {
        return view('admin.users');
    }

    public function dashboardAdminUser($user)
    {
        $user = User::whereSlug($user)->firstOrFail();
        $roles = Role::all();
        return view('admin.user')->with('user', $user)->with('roles', $roles);
    }

    public function updateRolesPermissions(Request $request)
    {
        $user = User::findBySlug($request->input('user'));

        // Retrieve the selected roles and permissions from the form submission
        $roleIds = $request->input('roles', []);
        $permissionIds = $request->input('permissions', []);

        // Retrieve the corresponding role and permission models
        $roles = Role::whereIn('id', $roleIds)->get();
        $permissions = Permission::whereIn('id', $permissionIds)->get();

        // Sync the roles and permissions for the user
        $user->syncRoles($roleIds);
        $user->syncPermissions($permissions);

        // Redirect back or show a success message
        return redirect()->back()->with('success', 'Roles and permissions updated successfully.');
    }
}
