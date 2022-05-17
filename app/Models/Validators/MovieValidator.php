<?php

namespace App\Models\Validators;

use App\Models\Movie;
use Illuminate\Validation\Rule;

class MovieValidator
{
    public function validate(Movie $movie, array $attributes): array
    {
        return validator($attributes,
            [
                'name' => [Rule::when($movie->exists, 'sometimes'), 'required', 'string'],
                'description' => [Rule::when($movie->exists, 'sometimes'), 'required', 'string'],
                'release_date' => [Rule::when($movie->exists, 'sometimes'), 'required', 'date'],
                'rating' => [Rule::when($movie->exists, 'sometimes'), 'required', 'integer', 'min:1', 'max:5'],
                'ticket_price' => [Rule::when($movie->exists, 'sometimes'), 'required', 'string'],
                'country' => [Rule::when($movie->exists, 'sometimes'), 'required', 'string', 'max:100'],
                'genre' => [Rule::when($movie->exists, 'sometimes'), 'required'],


                'photo' => [Rule::when($movie->exists, 'sometimes'), 
                   'required', 'image', 'max:2000000', 'mimes:jpg,png,jpeg,gif,svg'
                ],
            ]
        )->validate();
    }
}