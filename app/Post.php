<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug'];

    public static function createSlug($title) {
        $slug = Str::slug($title);
        $counterSlug = $slug;
        $postFound = Post::where('slug', $slug)->first();
        $counter = 1;
        while($postFound){
            $counterSlug = $slug . '_' . $counter;
            $counter++;
            $postFound = Post::where('slug', $counterSlug)->first();
        }
        return $counterSlug;
    }
}
