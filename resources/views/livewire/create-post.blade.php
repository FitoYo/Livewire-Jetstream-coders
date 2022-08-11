<div>
    <x-jet-danger-button wire:click="$set('open', true)"> {{-- metodo megic para no crear un metodo en el componente ya que es simple --}}
        Crear nuevo post
    </x-jet-danger-button>
    {{--componente Model predefinido por jetstream--}}
         {{-- tiene que definir 3 x-slot por defecto--}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Titulo del Post"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="title"></x-jet-input> {{--wire:model.defer hace esperar para que no se renderice--}}
        {{--@error('title')                                quito .defer porque uso validateOnly
                <span>{{$message}}</span>
            @enderror --}}
            <x-jet-input-error for="title"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del Post"></x-jet-label>
                <textarea class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" rows="6" wire:model="content"></textarea> {{--quito .defer--}}
            <x-jet-input-error for="content"></x-jet-input-error>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.remove wire:target="save">Crear Post</x-jet-danger-button>
            <span wire:loading wire:target="save">Cargando....</span>
            {{-- loading hace hidden el componente y solo lo muestra cuando se ejecuta un proceso y target hace que solo se muestre cuando se ejecuta el proceso(funcion) indicado --}}
        </x-slot>
    </x-jet-dialog-modal>
</div>
