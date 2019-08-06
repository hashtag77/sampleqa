<?php

use App\ToDo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ToDoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $todo = new ToDo();
        $todo->user_id       = 1;
        $todo->title         = "Recent Activity";
        $todo->section_id    = 1;
        $todo->status        = "PENDING";
        $todo->created_at    = Carbon::now();
        $todo->updated_at    = Carbon::now();
        $todo->save();

        $todo = new ToDo();
        $todo->user_id       = 1;
        $todo->title         = "Form Input";
        $todo->section_id    = 2;
        $todo->status        = "DONE";
        $todo->created_at    = Carbon::now();
        $todo->updated_at    = Carbon::now();
        $todo->save();
    }
}
