<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // CREATE PERMISSIONS
        // =========================
        $permissionMap = [
            'Pengguna' => [
                    'akun.view', 'akun.create', 'akun.edit', 'akun.delete',
                    'akses.view', 'akses.create', 'akses.edit', 'akses.delete'
                ],
        ];

        $allPermissions = [];

        foreach ($permissionMap as $group => $actions) {
            foreach ($actions as $action) {
                $name = Str::slug($group, '_') . '.' . $action;

                $permission = Permission::updateOrCreate(
                    ['name' => $name],
                    [
                        'display_name' => Str::headline($action),
                        'description' => Str::headline($action) . ' ' . $group,
                        'group_name' => $group,
                        'is_active' => true,
                    ]
                );

                $allPermissions[$group][$action] = $permission->id;
            }
        }

        // =========================
        // CREATE SUPER ADMIN ROLE
        // =========================
        $superAdmin = Role::updateOrCreate(
            ['name' => 'Super-admin'],
            ['is_active' => true]
        );

        // Assign all permissions to Super Admin
        $superAdmin->permissions()->sync(
            collect($allPermissions)->flatten()->values()->toArray()
        );

        // =========================
        // ASSIGN USER ID 1 → SUPER ADMIN
        // =========================
        $user = User::find(1);
        $role = Role::where('name', 'Super-admin')->first();

        if ($user && $role) {
            // Clear all existing roles and assign Super Admin
            $user->roles()->sync([$role->id]);
        }
    }
}