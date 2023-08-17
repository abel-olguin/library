<div class="py-4 w-full">
    <div class="bg-white shadow-md rounded pb-8 mb-4 flex flex-col divide-y">
        <div class="flex justify-between p-8 space-x-2">
            <form action="" class="w-full">
                <input type="text"
                       wire:model="search"
                       class="rounded-full px-4 border border-gray-200 outline-0 w-full h-10"
                       placeholder="{{__('Search')}}">
            </form>
            @if($search)
                <button wire:click="$set('search','')" class="rounded-md px-2 border border-gray-200 outline-0 h-10">clear</button>
            @endif
            <select wire:model="perPage" class="rounded-full h-10 border border-gray-200 outline-0 w-40">
                <option value="5">5 {{__('Per page')}}</option>
                <option value="10">10 {{__('Per page')}}</option>
                <option value="15">15 {{__('Per page')}}</option>
                <option value="20">20 {{__('Per page')}}</option>
            </select>

        </div>
        @if($books->count())
            <div class="p-8">
                <table class="table-fixed mt-4 rounded-md overflow-hidden w-full">
                    <thead>
                    <tr class="focus:outline-none h-16 border border-gray-100 rounded bg-gray-100 ">
                        <th>{{__('Image')}}</th>
                        <th>
                            <a href="#" wire:click.prevent="setOrder('id')"
                               class="flex space-x-2 items-center">
                                <span>{{__('Id')}}</span>
                                @if(str($order)->contains('id'))
                                    <i class="fa fa-arrow-{{ str($order)->contains('-')?'down':'up'}} text-xs"></i>
                                @endif
                            </a></th>
                        <th>
                            <a href="#" wire:click.prevent="setOrder('name')"
                               class="flex space-x-2 items-center">
                                <span>{{__('Name')}}</span>
                                @if(str($order)->contains('name'))
                                    <i class="fa fa-arrow-{{ str($order)->contains('-')?'down':'up'}} text-xs"></i>
                                @endif

                            </a>
                        </th>
                        <th>{{__('Status')}}</th>
                        <th >
                            <a href="#" wire:click.prevent="setOrder('publication_date')"
                               class="flex space-x-2 items-center">
                                <span>{{__('Publication date')}}</span>
                                @if(str($order)->contains('publication_date'))
                                    <i class="fa fa-arrow-{{ str($order)->contains('-')?'down':'up'}} text-xs"></i>
                                @endif
                            </a>
                        </th>
                        <th>{{__('Taken by')}}</th>
                        <th>{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr class="focus:outline-none h-16 border border-gray-100 rounded hover:bg-gray-100">
                            <td class="mx-auto">
                                <img src="{{$book->image}}" alt="{{$book}}" class="w-10 mx-auto rounded-full">
                            </td>
                            <td class="px-5">{{$book->id}}</td>
                            <td class="px-5">{{$book->name}}</td>
                            <td class="px-5 text-center ">
                                <div class="
                                border-{{$book->color}}-400 bg-{{$book->color}}-100 text-{{$book->color}}-400
                                rounded-full border  text-center text-sm w-24 py-1 mx-auto">
                                    {{__($book->status->value)}}
                                </div>
                            </td>
                            <td class="px-5">{{$book->publication_date}}</td>
                            <td class="px-5">
                                @if($book->status === \App\Enums\BookStatus::Taken)
                                    {{$book->latest_loan->user}}
                                @endif
                            </td>
                            <td class="px-5">
                                <div class="flex space-x-4 relative" x-data="{ open: false }">
                                    <button class="rounded-full p-2 px-3
                                                    border border-gray-400 text-gray-600
                                                    hover:bg-gray-600 hover:text-white"
                                            @click="open = true">
                                        <i class="fa fa-gear "></i>
                                    </button>

                                    <div class="absolute top-full bg-white shadow-sm border
                                                    border-gray-100 rounded-md w-40 text-center
                                                    grid  p-2 z-10 "
                                         x-show="open"
                                         @click.away="open = false"
                                         x-cloak
                                    >
                                        <button class="bg-green-500 hover:bg-green-600 text-white rounded "
                                                title="{{__('View')}}"
                                                wire:click.prevent="$emit('toggleShowBook', {{$book->id}})"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </button>

                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                <div class="mt-8">
                    {{$books->links()}}
                </div>
            </div>

        @else
            <div class="p-8">
                {{__('No results')}}
            </div>
        @endif
    </div>
    <livewire:show-book-modal ></livewire:show-book-modal>
</div>
