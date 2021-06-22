<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Inertia\Inertia;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function create(){
        return Inertia::render('Song/Create');
    }

    public function store(){
        Song::create(request()->all());
        return back()->with('success','Song was succesfully created');
    }
}
