<div>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> 

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <x-table>

            <div class="px-6 py-4 flex item-center">
              {{--  <input type="text" wire:model="search">  --}}
                <x-jet-input class="flex-1 mr-4" placeholder="Que Busca" type="text" wire:model="search"></x-jet-input>                
                @livewire('create-post')
            </div>

            @if($posts->count())
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="w-24 cursor-pointer px-6 py-6 text-left text-xs font-medium text-gray-500 uppercase tracking" wire:click="order('id')">
                        ID
                        {{-- sort --}}
                        @if ($sort == 'id')
                            @if ($direction == 'desc')
                                <i class="fas fa-sort-alpha-down-alt float-right"></i>
                            @else
                                <i class="fas fa-sort-alpha-up-alt float-right"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right"></i>
                        @endif
                        </th>
                        <th scope="col" class="cursor-pointer px-6 py-6 text-left text-xs font-medium text-gray-500 uppercase tracking" wire:click="order('title')">
                        Title
                        {{-- sort --}}
                        @if ($sort == 'title')
                            @if ($direction == 'desc')
                                <i class="fas fa-sort-alpha-down-alt float-right"></i>
                            @else
                                <i class="fas fa-sort-alpha-up-alt float-right"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right"></i>
                        @endif
                        </th>
                        <th scope="col" class="cursor-pointer px-6 py-6 text-left text-xs font-medium text-gray-500 uppercase tracking" wire:click="order('content')">
                        Content
                        {{-- sort --}}
                        @if ($sort == 'content')
                            @if ($direction == 'desc')
                                <i class="fas fa-sort-alpha-down-alt float-right"></i>
                            @else
                                <i class="fas fa-sort-alpha-up-alt float-right"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right"></i>
                        @endif
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>                        
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($posts as $post)

                    <tr>

                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{$post->id}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{$post->title}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{$post->content}}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium w-24">
                            @livewire('edit-post', ['post' => $post], key($post->id)) {{--componente de anidamiento. necesitamos pasarle una key unica de referencia--}}
                        </td>
                    </tr>                        
                    @endforeach
                </tbody>

            </table>
            @else
                <div class="px-6 py-4">
                    No existe ningún registro coincidente
                </div>
            @endif
        </x-table>
    
    </div>
</div>
