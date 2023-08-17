<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books with the category') }}: {{$category->name}}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <p class="bg-white shadow-md rounded flex flex-col p-8 mb-4">{{ $category->description }}</p>
        <livewire:child-books-table :parent="$category"></livewire:child-books-table>
    </div>
</x-app-layout>
