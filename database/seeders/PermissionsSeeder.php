<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
         $admin = Role::updateOrCreate([
            "name"=> "super_admin",
        ]);


        $permissions = [
            'roles' => ['view', 'manage'],
            'users' => ['view', 'manage'],
            'clients' => ['view', 'manage'],
            'projects' => ['view', 'manage'],
            'tasks' => ['view', 'manage'],
            'settings' => ['view', 'manage'],
        ];


        foreach ($permissions as $type => $actions)
        {
            foreach ($actions as $action)
            {
                $allPermissions[] = Permission::updateOrCreate (
                    [
                        'name' => "{$action}.{$type}",
                    ],
                    [
                        'guard_name' => 'web'
                    ]
                 );
            }
        }
         $admin->syncPermissions($allPermissions);
    }
}
