<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Validators\MovieValidator;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    /**
     * 
     * @return void  
    */
    public function index()
    {
        $movies = Movie::latest()->paginate(100);
        return view('movies.index', compact('movies'));

    }

    /**
     * 
     * @return void  
    */
    public function create()
    {
        return view('movies.create');

    }

    /**
     * 
     * @return void  
    */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * 
     * @return void  
    */
    public function store()
    {
        $validate = (new MovieValidator())->validate(
            $movie = new Movie(),
            request()->all()
        );

        // $path = request()->file('photo')->store('/public/images');
        $path = request()->file('photo')->storePublicly('/images', 'public');
        $validate['photo'] = $path;

        $movie->fill($validate)->save();

        return redirect('/movies')->with('message', 'Movie successfully added');

    }
}
