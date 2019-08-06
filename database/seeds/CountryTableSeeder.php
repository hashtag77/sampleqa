<?php

use App\Country;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new Country();
        $country->abbr          = "IND";
        $country->name          = "India";
        $country->creator       = 1;
        $country->created_at    = Carbon::now();
        $country->updated_at    = Carbon::now();
        $country->save();

        $country = new Country();
        $country->abbr          = "USA";
        $country->name          = "United States";
        $country->creator       = 1;
        $country->created_at    = Carbon::now();
        $country->updated_at    = Carbon::now();
        $country->save();
    }
}
