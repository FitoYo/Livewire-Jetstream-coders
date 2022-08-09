<div>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> 

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <x-table>

            <div class="px-6 py-4">
              {{--  <input type="text" wire:model="search">  --}}
                <x-jet-input class="w-full" placeholder="Que Busca" type="text" wire:model="search"></x-jet-input>                
            </div>

            @if($posts->count())
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-6 text-left text-xs font-medium text-gray-500 uppercase tracking">
                        ID
                        </th>
                        <th scope="col" class="px-6 py-6 text-left text-xs font-medium text-gray-500 uppercase tracking">
                        Title
                        </th>
                        <th scope="col" class="px-6 py-6 text-left text-xs font-medium text-gray-500 uppercase tracking">
                        Content
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
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
