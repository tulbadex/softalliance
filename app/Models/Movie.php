<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Save slug on save
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            //
            $model->slug = Str::slug($model->name.'-'.Str::random(10), '-');
        });
    }

    /* public function slug(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::slug($this->name.Str::random(10), '-')
        );
    } */

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
