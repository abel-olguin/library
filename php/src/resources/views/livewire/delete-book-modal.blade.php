<div>
    <x-jet-confirmation-modal wire:model="show">
        <x-slot name="title">
            {{__('Delete Book: ').$book?->name}}?
        </x-slot>
        <x-slot name="content">


        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('show')" wire:loading.attr="disabled">
                {{__('Cancel')}}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteBook" wire:loading.attr="disabled">
                {{__('Delete')}}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
