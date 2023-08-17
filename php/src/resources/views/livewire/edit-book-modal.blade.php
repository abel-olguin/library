<div>
    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">
            Create Book
        </x-slot>
        <x-slot name="content">
            <form class=" space-y-4 pb-8">

                <div class="flex flex-col">
                    <label for="">{{__('Name')}}</label>
                    <input wire:model="book.name" type="text" class="rounded-md">
                    @error('book.name') <span class="error">{{ $message }}</span> @enderror

                </div>

                <div class="flex flex-col" x-data="{open:false}" @click.away="open = false">
                    <label for="">{{__('Author')}}</label>
                    <div class="w-full flex items-center relative">
                        <input @mousedown="open=true"
                               @input="open=true"
                               type="text"
                               class="rounded-md h-10 border border-gray-200 w-full"
                               wire:model="searchAuthor"
                               wire:click="clearAuthor"
                        >
                        <input type="hidden" wire:model="author">
                        <div class="h-5 absolute right-0 mr-2">
                            <i class="fa fa-arrow-down" x-show="open"></i>
                            <i class="fa fa-arrow-up" x-show="!open"></i>
                        </div>

                        <div class="absolute mt-2 w-full top-full rounded-md bg-white shadow-md h-40
                overflow-y-scroll divide-y border border-gray-200 z-10" x-show="open" >
                            @foreach($this?->authors?:[] as $author)
                                <div class="flex justify-between p-2 hover:bg-gray-100"
                                     @click="open=false"
                                     wire:click="setAuthor({{$author->id}})">
                                    <img src="{{$author->photo}}" alt="{{$author}}"
                                         class="rounded-full h-10 border border-indigo-400">
                                    <div class="flex flex-col">
                                        <span class="font-semibold">{{$author}}</span>
                                        <small class="text-gray-500 text-xs">{{$author->birthday}}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @error('author') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col" x-data="{open:false}" @click.away="open = false">
                    <label for="">{{__('Category')}}</label>
                    <div class="w-full flex items-center relative">
                        <input @mousedown="open=true"
                               @input="open=true"
                               type="text"
                               class="rounded-md h-10 border border-gray-200 w-full"
                               wire:model="searchCategory"
                               wire:click="clearCategory"
                        >
                        <div class="h-5 absolute right-0 mr-2">
                            <i class="fa fa-arrow-down" x-show="open"></i>
                            <i class="fa fa-arrow-up" x-show="!open"></i>
                        </div>

                        <div class="absolute mt-2 w-full top-full rounded-md bg-white shadow-md h-40
                overflow-y-scroll divide-y border border-gray-200" x-show="open">
                            @foreach($this?->categories?:[] as $category)
                                <div class="p-2 hover:bg-gray-100"
                                     @click="open=false"
                                     wire:click="setCategory({{$category->id}})">
                                    <span class="font-semibold">{{$category}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @error('category') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="">{{__('Publication date')}}</label>
                    <input wire:model="book.publication_date" type="date" class="rounded-md" >
                    @error('book.publication_date') <span class="error">{{ $message }}</span> @enderror
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('show')" wire:loading.attr="disabled">
                {{__('Cancel')}}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveBook" wire:loading.attr="disabled">
                {{__('Save')}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
