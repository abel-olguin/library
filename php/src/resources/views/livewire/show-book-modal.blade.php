<div>
    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">
            {{$this->book?->name}}
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between space-x-4">
                <img src="{{$this->book?->image}}" alt="{{$this->book?->name}}" class="w-60 h-60 object-cover rounded-md">
                <div class="grid grid-cols-2 gap-2">
                    <span>{{__('Name')}}: </span>
                    <span>{{$this->book?->name}}</span>

                    <span>{{__('Category')}}: </span>
                    <span>
                        @if($this->book?->category)
                            <a href="{{route('categories.show', $this->book?->category)}}" class="hover:font-semibold">
                                {{$this->book?->category}}
                            </a>
                        @endif
                    </span>

                    <span>{{__('Author')}}: </span>
                    <span>
                        @if($this->book?->category)
                            <a href="{{route('authors.show', $this->book?->author)}}" class="hover:font-semibold">
                                    {{$this->book?->author}}
                            </a>
                        @endif
                    </span>

                    <span>{{__('Publication date')}}: </span>
                    <span>{{$this->book?->publication_date}}</span>

                    <span>{{__('status')}}: </span>
                    <span>{{__($this->book?->status->value)}}</span>

                    <span>{{__('Taken by')}}: </span>
                    @if($this->book?->status === \App\Enums\BookStatus::Taken)
                        {{$book->latest_loan->user}}
                    @else
                        {{__('NA')}}
                    @endif
                </div>
            </div>
            @if($this->book?->loans?->count())
                <div class="mt-4 ">
                    <h2 class="font-semibold text-lg">{{__('Loans log')}}</h2>
                    <div class="divide-y overflow-y-scroll h-40 mt-2">
                        @foreach($this->book?->loans  as $loan)
                            <div class="p-2 hover:bg-gray-100">{{$loan->user}} - ({{$loan->created_at->diffForHumans()}})</div>
                        @endforeach
                    </div>
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="$toggle('show')" wire:loading.attr="disabled">
                Ok
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
