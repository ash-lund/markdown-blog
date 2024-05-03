<?php

namespace App\Livewire\Post;

use Livewire\Component;

class Content extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.post.content', [
            'post' => $this->post,
        ]);
    }
}
