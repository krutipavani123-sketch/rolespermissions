<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Permission::create(["name" => "create task"]);
        Permission::create(["name" => "view task"]);
        Permission::create(["name" => "delete task"]);
        Permission::create(["name" => "update task"]);

        $admin = Role::create(["name" => "admin"]);
        $user = Role::create(["name" => "user"]);


        $admin->givePermissionTo(Permission::all());
        $user->givePermissionTo('view task');

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
