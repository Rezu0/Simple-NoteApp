<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\noteApp;
use Illuminate\Support\Str;

class noteApps extends Controller
{
    public function index(){
        return view('index');
    }

    public function postInputNote(Request $request){
        $request->validate([
            'title' => 'required|max:255|min:3',
            'desc' => 'required|min:10'
        ]);

        noteApp::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc
        ]);

        return redirect('/');
    }
}
