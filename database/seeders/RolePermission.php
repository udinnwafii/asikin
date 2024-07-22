<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $permissions = [
        'kbeasiswa-list',
        'kbeasiswa-create',
        'kbeasiswa-edit',
        'kbeasiswa-delete',
        'user-list',
        'user-create',
        'user-edit',
        'user-delete',
        'level-list',
        'level-create',
        'level-edit',
        'level-delete',
        'studi-list',
        'studi-create',
        'studi-edit',
        'studi-delete'
    ];

    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create admin User and assign the role to him.
        $user = User::create([
            'name' => 'Prevail Ejimadu',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}

