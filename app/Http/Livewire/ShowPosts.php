<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPosts extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['render' => 'render']; // cuando escuche un evento de nombre render (creado por otro componente) ejecute el metodo render de aca

/*  public functio mount()
    {}*/

    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('content', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();


        return view('livewire.show-posts', compact('posts'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }            
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }
        
        
    }
}
