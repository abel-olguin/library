<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Books of')}} {{$author}}
        </h2>
    </x-slot>

    <div class="py-8 w-full">
        <livewire:child-books-table :parent="$author"></livewire:child-books-table>
    </div>
</x-app-layout>
