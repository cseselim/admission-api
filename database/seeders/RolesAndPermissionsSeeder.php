<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create permissions
        Permission::create(['name' => 'shift.index','display_name' => 'Shift List']);
        Permission::create(['name' => 'shift.store','display_name' => 'Shift Add']);
        Permission::create(['name' => 'shift.edit','display_name' => 'Shift Edit']);
        Permission::create(['name' => 'shift.destroy','display_name' => 'Shift Delete']);

        Permission::create(['name' => 'school.index','display_name' => 'School List']);
        Permission::create(['name' => 'school.store','display_name' => 'School Add']);
        Permission::create(['name' => 'school.edit','display_name' => 'School Edit']);
        Permission::create(['name' => 'school.destroy','display_name' => 'School Delete']);

        // Create roles and assign created permissions
        $adminRole = Role::create(['name' => 'admin']);
        $teacherRoles = Role::create(['name' => 'Teacher']);
        $parentRoles = Role::create(['name' => 'Parent']);

        $teacherRoles->givePermissionTo('shift.index');
        $teacherRoles->givePermissionTo('shift.store');
        $teacherRoles->givePermissionTo('shift.edit');
        $teacherRoles->givePermissionTo('shift.destroy');
        $adminRole->givePermissionTo(Permission::all());
    }
}
