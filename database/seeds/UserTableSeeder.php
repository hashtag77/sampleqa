<?php

use App\User;
use App\RoleUser;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name         = 'Administrator';
        $user->email        = 'admin@sampleqa.com';
        $user->username     = '@ADMIN';
        $user->password     = '$2y$10$vosXcdM9PwygkiZ06bZ07uyD5l6mcy0xy6K0nJhRVe5qeGuPavNna
        ';
        $user->created_at   = Carbon::now();
        $user->updated_at   = Carbon::now();
        $user->save();

        $role_user = new RoleUser();
        $role_user->role_id     = 1;
        $role_user->user_id     = $user->id;
        $role_user->created_at  = Carbon::now();
        $role_user->updated_at  = Carbon::now();
        $role_user->save();


        $user = new User();
        $user->name         = 'User';
        $user->email        = 'user@sampleqa.com';
        $user->username     = '@USER';
        $user->password     = '$2y$10$vosXcdM9PwygkiZ06bZ07uyD5l6mcy0xy6K0nJhRVe5qeGuPavNna
        ';
        $user->created_at   = Carbon::now();
        $user->updated_at   = Carbon::now();
        $user->save();

        $role_user = new RoleUser();
        $role_user->role_id     = 2;
        $role_user->user_id     = $user->id;
        $role_user->created_at  = Carbon::now();
        $role_user->updated_at  = Carbon::now();
        $role_user->save();
    }
}
