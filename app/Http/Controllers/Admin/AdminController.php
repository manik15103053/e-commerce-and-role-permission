<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
{
    // $this->middleware(['permission: user list'])->only(['index']);
    // $this->middleware(['permission: create user'])->only(['create']);
    // $this->middleware(['permission: edit user'])->only(['edit']);
    // $this->middleware(['permission: delete user'])->only(['delete']);
}
    public function index(){

        $users = Admin::with('roles')->orderBy('id', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create(){

        $roles = Role::latest()->get();
        return view('admin.user.create' ,compact('roles'));
    }

    public function store(Request $request){


        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email',
            'phone' => 'required',
            'password' => 'required',
            'roles' => 'required',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ]);
        $admin->syncRoles($request->roles);

        return redirect()->route('admin.user.index')->with('success', 'User Created Successfully');
    }

    public function edit($id){

        $user = Admin::find($id);
        $roles = Role::latest()->get();
        $data = $user->roles->pluck('id')->toArray();
        return view('admin.user.edit', compact('user', 'roles', 'data'));
    }

    public function update(Request $request,  $id){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email,'.$id,
            'phone' => 'required',
            'roles' => 'required',
        ]);

        $admin = Admin::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->status = $request->status;
        $admin->save();

        $admin->syncRoles($request->roles);

        return redirect()->route('admin.user.index')->with('success', 'User Updated Successfully');
    }

    public function delete($id){
        $admin = Admin::find($id);

        if (!$admin) {
            return redirect()->route('admin.user.index')->with('error', 'User not found.');
        }
        $admin->delete();
        return redirect()->route('admin.user.index')->with('success', 'User Deleted Successfully');
    }
}
