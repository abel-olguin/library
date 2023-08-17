<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\IsBookTable;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class ChildBooksTable extends Component
{
    use WithPagination, IsBookTable;
    public $parent;

    public function render()
    {
        $this->books = $this->parent->books()->queriable($this->search, $this->order, $this->perPage);
        return view('livewire.child-books-table', ['books' => $this->books]);
    }

    public function toggleShowBook(Book $book)
    {
        $this->modalShow = !$this->modalShow;
        $this->book = $book;
    }
}
