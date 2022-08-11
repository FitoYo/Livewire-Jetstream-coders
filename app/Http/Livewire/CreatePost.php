<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads; // componente para subir imagenes con Livewire

    public $open = false;
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|max:10',
        'content' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        // validateOnly chequea que cada ves que se ejecute un evento, este cumpla con las reglas de validacion
        // nesecito quitar del componente la referencia .defer del wire:model.defer
    }

    public function save()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);
        // con emitTo hago que solo pueda escuchar el evento el componente que yo quiero. es el 1 parametro, 2 es como se llama el evento creado
        //$this->emitTo('show-posts', 'render');

        $this->emit('render'); // creo y emito un evento para ser escuchado
        $this->reset(['open', 'title', 'content']);
        $this->emit('alert', 'El Post se creo satisfactoriamente'); // emito ahora un evento pero lo escuchare no con livewire sino co JavaScript
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
