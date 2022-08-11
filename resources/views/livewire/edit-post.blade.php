<div>
    <a class="btn btn-green" wire:click="$set('open', true)"> {{-- $set metodo magic para asignar valores simple sin ir componenteControlller --}}
        <i class="fas fa-edit"></i>
    </a>
    {{--componente Model predefinido por jetstream--}}
    {{-- tiene que definir 3 x-slot por defecto--}}
    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar Post
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Titulo del post"></x-jet-label>
                <x-jet-input wire:model="post.title" type="text" class="w-full"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Comentario del post"></x-jet-label>
                <textarea wire:model="post.content" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" rows="6"></textarea> {{--quito .defer--}}
                <x-jet-input-error for="content"></x-jet-input-error>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25" >Actualizar</x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
