<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class CreatePost extends Component
{
    public $open = false;
    public $title;
    public $content;

    public function save()
    {
        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
