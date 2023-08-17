<div>
    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">
            {{__('Lend Book: ').$book?->name}}
        </x-slot>
        <x-slot name="content">
            <form class=" space-y-4 pb-20">
                <div class="flex flex-col " x-data="{open:false}" @click.away="open = false">
                    <label for="">{{__('User')}}</label>
                    <div class="w-full flex items-center relative">
                        <input @mousedown="open=true"
                               @input="open=true"
                               type="text"
                               class="rounded-md h-10 border border-gray-200 w-full"
                               wire:model="searchUser"
                               wire:click="clearUser"
                        >
                        <div class="h-5 absolute right-0 mr-2">
                            <i class="fa fa-arrow-down" x-show="open"></i>
                            <i class="fa fa-arrow-up" x-show="!open"></i>
                        </div>

                        <div class="absolute mt-2 w-full top-full rounded-md bg-white shadow-md h-32
                overflow-y-scroll divide-y border border-gray-200" x-show="open">
                            @foreach($users as $user)
                                <div class="p-2 hover:bg-gray-100"
                                     @click="open=false"
                                     wire:click="setUser({{$user->id}})">
                                    <span class="font-semibold">{{$user}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @error('user') <span class="error">{{ $message }}</span> @enderror
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('show')" wire:loading.attr="disabled">
                {{__('Cancel')}}
            </x-jet-secondary-button>
            @if($book?->status === \App\Enums\BookStatus::Taken)
                <x-jet-button class="ml-2" wire:click="unassign" wire:loading.attr="disabled">
                    {{__('Unassign')}}
                </x-jet-button>
            @endif
            <x-jet-button class="ml-2" wire:click="lendBook" wire:loading.attr="disabled">
                {{__('Save')}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

