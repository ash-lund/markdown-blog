<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class Post
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function all()
    {
        $posts = Storage::disk('marker')->allDirectories();
        dd($posts);
    }
}
