<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class EditPost extends Component
{
    
    public $open = false;
    public $post;

    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }
    public function save()
    {
        $this->validate();
        $this->post->save();

        $this->reset(['open']);
        $this->emitTo('show-posts', 'render'); //emite un evento solo para show-posts

        $this->emit('alert', 'El post se actualizo correctamente');
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
