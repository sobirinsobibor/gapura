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
        // CREATE PERMISSIONS (auto from Filament resources)
        // =========================
        $this->command?->info('Men-generate permission dari resource Filament...');

        $permissions = [];

        foreach (filament()->getResources() as $resource) {
            $groupName = $resource::getRbacGroupLabel();
            $groupSlug = $resource::getRbacGroup();
            $resourceSlug = $resource::getRbacResource();

            $this->command?->line("  - {$groupName} / {$resourceSlug}");

            foreach ($resource::getRbacPermissionNames() as $action => $name) {
                $permission = Permission::updateOrCreate(
                    ['name' => $name],
                    [
                        'display_name' => Str::headline($action) . ' ' . Str::headline($resourceSlug),
                        'description' => Str::headline($action) . ' data ' . Str::headline($resourceSlug) . ' (' . Str::headline($groupName) . ')',
                        'group_name' => $groupName,
                        'is_active' => true,
                    ]
                );

                $permissions[$name] = $permission->id;
            }
        }

        // =========================================================
        // 2. CREATE/UPDATE SUPER ADMIN ROLE
        // =========================================================
        $superAdmin = Role::updateOrCreate(
            ['name' => 'Super-admin'],
            [
                'display_name' => 'Super Admin',
                'description' => 'Memiliki seluruh izin akses',
                'is_active' => true,
            ]
        );

        // Assign all permissions to Super Admin
        $superAdmin->permissions()->sync(array_values($permissions));

        // =========================================================
        // 3. ASSIGN USER ID 1 → SUPER ADMIN
        // =========================================================
        $user = User::find(1);
        $role = Role::where('name', 'Super-admin')->first();

        if ($user && $role) {
            // Clear all existing roles and assign Super Admin
            $user->roles()->sync([$role->id]);
            $user->forgetAccessCache();
        }
    }
}