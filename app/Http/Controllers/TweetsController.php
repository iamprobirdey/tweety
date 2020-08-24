<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function store(Request $request){

        $request->validate(['tweet' => 'required|max:255']);

        Tweet::create([
            'user_id' => auth()->user()->id,
            'body' => $request->input('tweet')
        ]);

        return redirect('/');
    }
}
