<?php

namespace App\Livewire\Frontpage;

use App\Post;
use Livewire\Component;

class Latest extends Component
{
    public function render()
    {
        // $posts = [
        //     ['title' => 'This is post no. 2', 'content' => 'This is the content of post no. 2'],
        //     ['title' => 'This is post no. 1', 'content' => 'This is the content of post no. 1'],
        // ];

        $posts = (new Post())->all();

        return view('livewire.frontpage.latest', [
            'posts' => $posts,
        ]);
    }
}
