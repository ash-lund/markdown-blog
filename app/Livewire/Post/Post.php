<?php

namespace App\Livewire\Post;

use Livewire\Component;

class Post extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.post.post', [
            'post' => $this->post,
        ]);
    }
}
