<?php

use App\Section;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = new Section();
        $section->user_id       = 1;
        $section->name          = "Users Dashboard";
        $section->created_at    = Carbon::now();
        $section->updated_at    = Carbon::now();
        $section->save();

        $section = new Section();
        $section->user_id       = 1;
        $section->name          = "Create Thread";
        $section->created_at    = Carbon::now();
        $section->updated_at    = Carbon::now();
        $section->save();
    }
}
