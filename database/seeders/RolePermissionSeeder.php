<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         // Create an admin role
         $role = Role::create(['name' => 'admin', 'guard_name' => 'admin']);

         // Define permissions
         $permissions = [
             'user list',
             'create user',
             'edit user',
             'delete user',
             'role list',
             'create role',
             'edit role',
             'delete role',
         ];
 
         // Create permissions
         foreach ($permissions as $permission) {
            if (!Permission::where(['name' => $permission, 'guard_name' => 'admin'])->exists()) {
                Permission::create(['name' => $permission, 'guard_name' => 'admin']);
            }

         }
 
         $role->syncPermissions(Permission::all());
         // Find or create an admin user
        $admin = Admin::firstOrNew(['email' => 'admin@gmail.com']);
        $admin->password = Hash::make('12345678'); // Set the admin's password
        $admin->save();
       
 
         // Assign the admin role to the admin user
         $admin->assignRole($role, 'admin');
     }


    }

