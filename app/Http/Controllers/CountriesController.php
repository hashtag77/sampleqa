<?php

namespace App\Http\Controllers;

use Auth;
use App\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function create()
    {
        $countries = Country::orderBy('name', 'asc')->get();

        return view('countries.create')->with([
            'countries' => $countries
        ]);
    }

    public function store(Request $request)
    {
        $country = Country::create([
            'abbr'      => strtoupper($request->input('abbr')),
            'name'      => Str::title($request->input('name')),
            'creator'   => Auth::user()->id
        ]);

        return redirect('/countries/create')->with('success', $country->name.' added successfully!');
    }
}
