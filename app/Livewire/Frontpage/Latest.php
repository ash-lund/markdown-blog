<?php

namespace App\Livewire\Frontpage;

use App\Post;
use Livewire\Component;

class Latest extends Component
{
    public function render()
    {
        $posts = (new Post())->all();

        return view('livewire.frontpage.latest', [
            'posts' => $posts,
        ]);
    }
}
