<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){

        $roles = Role::with('permissions')->latest()->get();
   
        return view('admin.role.index',compact('roles'));
    }

    public function create(){
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);

        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.role.index')->with('success', 'Role Created Successfully');
    }

    public function edit($id){

        $permissions = Permission::all();
        $role = Role::find($id);
        $data = $role->permissions()->pluck('id')->toArray();
        return view('admin.role.edit', compact('permissions', 'role', 'data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
        ]);


        $role = Role::find($id);

    // Update the role's name
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.role.index')->with('success', 'Role Updated Successfully');
    }

    public function delete($id)
{
    // Find the role by its ID
    $role = Role::find($id);

    // Check if the role exists
    if (!$role) {
        return redirect()->route('admin.role.index')->with('error', 'Role not found.');
    }

    // Delete the role
    $role->delete();

    return redirect()->route('admin.role.index')->with('success', 'Role Deleted Successfully');
}
}
