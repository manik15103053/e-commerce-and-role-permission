<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         // Call the AdminSeeder to create an admin user
    $this->call(AdminSeeder::class);

    // Call the RolePermissionSeeder to create roles and permissions
    $this->call(RolePermissionSeeder::class);
    }
}
