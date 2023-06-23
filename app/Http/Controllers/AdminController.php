<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('agent.dashboard');
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
