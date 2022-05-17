<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieCommentsController extends Controller
{
    public function store(Movie $movie)
    {
        request()->validate([
            'comment' => 'required|max:250',
            'name' => 'required|min:3|max:100'
        ]);

        $movie->comments()->create([
            'user_id' => request()->user()->id,
            'name' => request('name'),
            'comment' => request('comment')
        ]);

        return back();
    }
}
