<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        $permissionsList = [
            'Manger users',
            'Manger admins',
            'Manger posts',
            'Manger contacts',
            'Manger travelers',
            'settings',
            ];
        $roles = [
            'admin' => $permissionsList,
            'user' => []

        ];

        foreach ($roles as $role => $permissions) {
            $Role = Role::findOrCreate($role);
            foreach ($permissions as $permission) {
                Permission::findOrCreate($permission);
                $Role->syncPermissions(Permission::whereIn('name', $permissions)->get());
            }
        }
    }
}
