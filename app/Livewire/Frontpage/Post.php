<?php

namespace App\Livewire\Frontpage;

use Livewire\Component;

class Post extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.frontpage.post', [
            'post' => $this->post,
        ]);
    }
}
