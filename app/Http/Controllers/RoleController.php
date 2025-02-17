<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.role-permission.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.role-permission.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $role = Role::create(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('backend.role-permission.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);
        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }


    public function addpermission(string $id)
    {
        $permissions = Permission::all();
        $role = Role::findOrFail($id);
        $rolepermissions = DB::table('role_has_permissions')->where('role_id', $id)->pluck('permission_id')->toArray();
        return view('backend.role-permission.role.addpermission', compact('role','permissions','rolepermissions'));
    }

    public function givepermission(Request $request, $roleid)
    {
        $request->validate([
            'permissions' => 'required|array',
        ]);
        $role = Role::findOrFail($roleid);

        $permissions = $request->input('permissions', []);
        $role->syncPermissions($permissions);
        return redirect()->back()->with('success', 'Permission Updated successfully.');
    }

    
}
