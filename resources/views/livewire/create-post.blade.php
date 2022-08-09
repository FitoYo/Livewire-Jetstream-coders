<div>
    <x-jet-danger-button wire:click="$set('open', true)"> {{-- metodo megic para no crear un metodo en el componente ya que es simple --}}
        Crear nuevo post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Titulo del Post"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="title"></x-jet-input> {{--.defer hace esperar para que no se renderice--}}
            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del Post"></x-jet-label>
                <textarea class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" rows="6" wire:model.defer="content"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="save">Crear Post</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
