<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    public function create()
    {
        $sections = Section::orderBy('created_at', 'desc')->get();

        return view('sections.create')->with([
            'sections' => $sections
        ]);
    }

    public function store(Request $request)
    {
        Section::create([
            'user_id'   => Auth::user()->id,
            'name'     => Str::title($request->input('name')),
        ]);

        return redirect('/sections/create')->with('success', 'Section created!');
    }
}
