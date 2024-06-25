<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Permission;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'view-hotels',
            'create-hotels',
            'edit-hotels',
            'delete-hotels',
            'view-rooms',
            'create-rooms',
            'edit-rooms',
            'delete-rooms',
            'view-services',
            'create-services',
            'edit-services',
            'delete-services',
            'make-reservation',
            'cancel-reservation',
            'view-reservation',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        
        $guestRole = Role::create(['name' => 'guest']);
        $adminRole = Role::create(['name' => 'admin']);
        $employeeRole = Role::create(['name' => 'employee']);

        $employeeRole->givePermissionTo([
            'view-hotels',
            'view-rooms',
            'view-services',
        ]);

        $guestRole->givePermissionTo([
            'view-hotels',
            'view-rooms',
            'view-services',
            'make-reservation',
            'cancel-reservation',
            'view-reservation',
        ]);
        $adminRole->givePermissionTo(Permission::all());
    }
}
