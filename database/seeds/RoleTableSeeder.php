<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'admin';
        $role_employee->description = 'Administrator';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'user';
        $role_manager->description = 'User';
        $role_manager->save();
    }
}
